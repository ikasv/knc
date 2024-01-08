<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use App\Models\Product;
use App\Models\SalesExecutive;

class ProductController extends Controller
{
    # Global 
        # View
        public $index_view                  =   "admin.store.products.index";
        public $create_or_edit_view         =   "admin.store.products.single";
        # End View

        # Route
        public $index_route                 =   "admin::products.index";
        public $create_route                =   "admin::products.create";
        public $edit_route                  =   "admin::products.edit";
        public $store_route                 =   "admin::products.store";
        public $show_route                  =   "admin::products.show";
        public $destroy_route               =   "admin::products.destroy";
        public $restore_route               =   "admin::products.restore";
        # End Route

        # Permission Key
        public $permission_key              =   "products";
        # End Permission Key

        # Table Name
        public $table_name                  =   "products";
        # End Table Name

        # Pages Title
        public $index_page_title            =   "Product List";
        public $single_page_title           =   "Add / Edit Product";
        # End Pages Title
    
    # Model 
    public function eloquentModel(){
        return new Product();
    }
    # End Model 
    
    # End Global 

    public function index()
    {
        $this->authorize('permissions', [$this->permission_key, 'view']);

        $records            =   $this->eloquentModel()->get();

        return  view($this->index_view, compact('records'))
                ->with([
                            'permission_key'    =>  $this->permission_key,
                            'title'             =>  $this->index_page_title,
                            'create_route'      =>  $this->create_route,
                            'edit_route'        =>  $this->edit_route,
                            'destroy_route'     =>  $this->destroy_route,
                            'restore_route'     =>  $this->restore_route
                        ]);
    }
    
    public function create()
    {
        $this->authorize('permissions', [$this->permission_key, 'create']);
       
        return  view($this->create_or_edit_view)
                ->with([
                        'permission_key'    =>  $this->permission_key,
                        'title'             =>  $this->single_page_title,
                        'index_route'       =>  $this->index_route,
                        'store_route'       =>  $this->store_route
                    ]);
    }
    
    
    public function store()
    {
        $this->authorize('permissions', [$this->permission_key, 'create']);

        $back_msg                       =   "";
        $id                             =   request()->id ?? 0;

        request()->validate([
            'name'                  =>  "required|max:225",
          	'slug'                  =>  "required|max:225|unique:categories,slug,$id",
             'icon'                  =>  "image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048",
            'featured_image'        =>  "image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048",
            'banner_image'          =>  "image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048",
          
        ]);

        
        $icon                           =   uploadFile(request(), 'icon', 'product/icons');
        $featured_image                 =   uploadFile(request(), 'featured_image', 'product/featured_images');
        $banner_image                   =   uploadFile(request(), 'banner_image', 'product/banner_images');
       
        $result                       =    $this->eloquentModel()::updateOrCreate(
                                                                            [
                                                                                'id'                    =>  request()->id
                                                                            ],
                                                                            [
                                                                                'name'                  =>  request()->name,
                                                                                'slug'                  =>  request()->slug,
                                                                                'parent_id'             =>  request()->parent_id,
                                                                                'icon'                  =>  $icon,
                                                                                'featured_image'        =>  $featured_image,
                                                                                'banner_image'          =>  $banner_image,
                                                                                'short_description'     =>  request()->short_description,
                                                                                'long_description'      =>  request()->long_description,
                                                                                'show_on_menu'          =>  request()->show_on_menu,
                                                                                'show_on_home'          =>  request()->show_on_home,
                                                                                'show_on_footer'        =>  request()->show_on_footer,
                                                                                'status'                =>  request()->status,
                                                                                'meta_title'            =>  request()->meta_title,
                                                                                'meta_description'      =>  request()->meta_description,
                                                                              	'is_featured'			=>	request()->is_featured,
                                                                              	'is_popular'			=>	request()->is_popular,
                                                                                'sku'                   =>  request()->sku,
                                                                                'dimensions'            =>  request()->dimensions,
                                                                                'finishing'             =>  request()->finishing,
                                                                                'mrp'                   =>  request()->mrp,
                                                                                'sale_price'            =>  request()->sale_price,
                                                                                'packing'               =>  request()->packing,
                                                                                'points'                =>  request()->points
                                                                            ]
                                                                        );
   
        # Gallery Images
        $gallery_images                           =   uploadGalleryFiles('gallery_images', 'category/gallery_images');

        foreach($gallery_images as $gallery_image):
            GalleryImage::create([
                                    'type'                  =>  'category',
                                    'parent_id'             =>  $result->id,
                                    'name'                  =>  $gallery_image
                                ]);
        endforeach;
        # End Gallery Images

        if($result):
            $back_msg                            =   $result->wasRecentlyCreated ? 
                                                        "<div class='alert alert-success'>Record added successfully </div>"
                                                        :
                                                        "<div class='alert alert-success'>Record udpated successfully </div>"
                                                        ;
        else:
            $back_msg                            =   "<div class='alert alert-danger'>Some error occured</div>";
        endif;

        return redirect()->route($this->index_route)->with('back_msg', "$back_msg");
    }

    public function show($id)
    {
        $this->authorize('permissions', [$this->permission_key, 'view']);
    }

    public function edit($id)
    {
        $this->authorize('permissions', [$this->permission_key, 'edit']);
        
        $record                 =   $this->eloquentModel()->find($id);
       
        return  view($this->create_or_edit_view, compact('record'))
                ->with([
                    'permission_key'    =>  $this->permission_key,
                    'title'             =>  $this->single_page_title,
                    'index_route'       =>  $this->index_route,
                    'store_route'       =>  $this->store_route
                ]);
    }
    
    public function update(Request $request, $id)
    {
        
    }
    
    public function destroy($id)
    {
        $this->authorize('permissions', [$this->permission_key, 'delete']);
        $record    = $this->eloquentModel()->find($id);
        $record->delete();
        return back()->with('back_msg', "<div class='alert alert-success'>Record deleted successfully</div>");
   }
    
   public function restore($id)
    {
        $this->authorize('permissions', [$this->permission_key, 'delete']);
        $record    = $this->eloquentModel()->withTrashed()->find($id)->restore();
        return back()->with('back_msg', "<div class='alert alert-success'>Record restored successfully</div>");
   }
}
