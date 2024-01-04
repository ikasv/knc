<?php

namespace App\Http\Controllers\Admin\Management;

use App\Http\Controllers\Controller;
use App\Models\Dealer;
use App\Models\SalesExecutive;

class DealerController extends Controller
{
    # Global 
        # View
        public $index_view                  =   "admin.dealer.index";
        public $create_or_edit_view         =   "admin.dealer.single";
        # End View

        # Route
        public $index_route                 =   "admin::dealers.index";
        public $create_route                =   "admin::dealers.create";
        public $edit_route                  =   "admin::dealers.edit";
        public $store_route                 =   "admin::dealers.store";
        public $show_route                  =   "admin::dealers.show";
        public $destroy_route               =   "admin::dealers.destroy";
        public $restore_route               =   "admin::dealers.restore";
        # End Route

        # Permission Key
        public $permission_key              =   "dealers";
        # End Permission Key

        # Table Name
        public $table_name                  =   "dealers";
        # End Table Name

        # Pages Title
        public $index_page_title            =   "Dealer List";
        public $single_page_title           =   "Add / Edit Dealer";
        # End Pages Title
    
    # Model 
    public function eloquentModel(){
        return new Dealer();
    }
    # End Model 
    
    # End Global 

    public function index()
    {
        $this->authorize('permissions', [$this->permission_key, 'view']);

        $records            =   $this->eloquentModel()->withTrashed()->get();

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
        $custom_errors                              =   [];

        $back_msg                       =   "";
        $id                             =   request()->id ?? 0;

        request()->validate([
                            'sales_executive_id'    =>  "required",
                            'name'                  =>  "required|max:225|unique:$this->table_name,name,".request()->id,
                            'email'                 =>  "required|max:225|unique:$this->table_name,email,".request()->id,
                            'mobile'                =>  "required|max:225|digits:10|unique:$this->table_name,mobile,".request()->id,
                            'profile_image'         =>  "image|mimes:jpeg,png,jpg|max:2048",
                            'business_id'           =>  "required",
                            'business_name'         =>  "required",
                            'business_email'        =>  "required",
                            'business_address'      =>  "required",
                        ]);

        # Media
        $profile_image                 =   uploadFile(request(), 'profile_image', 'dealer/profile-images');
        # End Media

        $result                         =   $this->eloquentModel()->updateOrCreate(
                                                [
                                                    'id'                    => request()->id
                                                ],
                                                [
                                                    'sales_executive_id'    => request()->sales_executive_id,
                                                    'name'                  => request()->name,
                                                    'email'                 => request()->email,
                                                    'mobile'                => request()->mobile,
                                                    'profile_image'         => $profile_image,
                                                    'business_id'           => request()->business_id,
                                                    'business_name'         => request()->business_name,
                                                    'business_email'        => request()->business_email,
                                                    'business_mobile'       => request()->business_mobile,
                                                    'business_address'      => request()->business_address,
                                                    'business_gst_number'   => request()->business_gst_number,
                                                    'status'                => request()->status
                                                ]
                                            );

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
