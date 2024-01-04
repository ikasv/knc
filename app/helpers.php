<?php
use App\Http\Controllers\Ecommerce;
use App\Models\SiteSetting;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Module;
use App\Models\Product;
use App\Models\Order;
use App\Models\Wishlist;
use App\Models\User;
use App\Models\Address;
use App\Models\Slider;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Zoho\Zoho;
use App\Http\Controllers\OfferController;
use App\Models\Lab\LabCart;
use App\Models\LabPackage;
use App\Models\LabTest;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

function zoho(){
  return new Zoho;
}

// function str(){
//   return new Str;
// }


function ecommerce(){
  return new Ecommerce;
}

function offer(){
  return new OfferController;
}

if (!function_exists('sendMail')) {
  function sendMail($to,$from,$subject,$html)
  {
    $from = ($from)?$from:env('MAIL_FROM_ADDRESS');
  $result = Mail::send(array(), array(), function ($message) use ($to,$from,$subject,$html) {
    $message->to($to)
      ->subject($subject)
      ->from($from)
      ->setBody($html, 'text/html');
  });

    return ($result)?1:0;
  }
}

if (!function_exists('get_user_email')) {
  function get_user_email()
  {
    $user = Auth::user();
    return $user->email;
  }
}

  # Upload Image
    if(!function_exists('uploadFile')) {
      function uploadFile($request, $file, $path = ''){
        $file_name              =   "";
        if($request->hasFile($file)):
            $img                            =   $request->file($file);
            $file_name                      =   uniqid().'.'.$img->extension();
            $path                           .=  '/';
            
            Storage::disk('public')->put($path.$file_name, file_get_contents($request->{$file}));
        else:
          $file_name        = $request->{'old_'.$file};

          if($path == 'gallery_images'):
            $file_name        = $request->{str_replace('.image', '.old_image', $file)};
          endif;
        endif;
        return $file_name;
    }
    }
  # End Upload Image
 
  # Upload Gallery Files
    if(!function_exists('uploadGalleryFiles')) {
      function uploadGalleryFiles($file, $path){

        $file_name_arr              =   [];
        $file_name                  =   "";

        if(request()->hasFile($file)):
            $files                            =   request()->file($file);

            foreach ($files as $file):
              $file_name                      =   uniqid().'.'.$file->extension();
              $file_name_arr[]                =   $file_name;

              Storage::disk('public')->put($path.'/'.$file_name, file_get_contents($file));
            endforeach;
        else:
          $file_name        = request()->{'old_'.$file};

        endif;
        return $file_name_arr;
    }
    }
  # End Upload Image

if (!function_exists('get_permissions')) {
  function get_permissions($role_id=null)
  {

    $permissions = array();
    if(Auth::guard('admin')->check()){
      $role_id = ($role_id)?$role_id:Auth::guard('admin')->user()->role_id;
      $permission_data = Module::select('module_code','rr_create', 'rr_edit', 'rr_delete', 'rr_view')
      ->leftJoin('role_rights', function($join) use ($role_id) {
        $join->on('role_rights.module_id', '=', 'modules.id');
        $join->where('role_rights.role_id', '=', $role_id);
      })
      ->where('status', 1)
      ->get();

      if ($permission_data) {
          foreach ($permission_data as $row) {
              $permissions[$row->module_code] = $row;
          }
      }
    }
    return $permissions;
  }
 
  # Wishlist
  if (!function_exists('wishlist')) {
    function wishlist($paginate = false, $guard = ''){
      $wishlist = Wishlist::with('products:slug,id,name,sku,drug_category,brand,sale_price,mrp_price')->where('user_id', auth($guard)->user()->id);
      if($paginate):
        $wishlist = $wishlist->paginate(10);
      else:
        $wishlist = $wishlist->get();
      endif;

      return  $wishlist;
    }
  }
  # End wishlist

  # Add to wishlist
  if (!function_exists('add_to_wishlist')) {
    function add_to_wishlist($product_id, $guard = ''){
        $arr                      =   array();
        $data                     =   array();
        
        $data['product_id']      =   $product_id;
        
        if(auth($guard)->check()):
          $data['user_id']        =   auth($guard)->user()->id;
        else:
          $data['session_id']     =   session()->get('session_id');
        endif;

        $wishlist                 =   Wishlist::create($data);
        
        if($wishlist):
          $arr                    =   array('status' => true, 'message' => 'Added to wishlist');
        else:
          $arr                    =   array('status' => false, 'message' => 'Some error occured');
        endif;

        return response()->json($arr);
    }
  }
  # End add to wishlist

  # Remove from wishlist
  if (!function_exists('remove_from_wishlist')) {
    function remove_from_wishlist($product_id,  $guard = ''){
      $arr            =   array();
        
        $wishlist       =   Wishlist::where('product_id', $product_id);
        
        if(auth($guard)->check()):
          $wishlist->where('user_id', auth($guard)->user()->id); 
        else:
          $wishlist->where('session_id', session()->get('session_id')); 
        endif;

        $wishlist                 =   $wishlist->delete();

        if($wishlist):
          $arr            =   array('status' => true, 'message' => 'Removed from wishlist');
        else:
          $arr            =   array('status' => false, 'message' => 'some error occured');
        endif;

        return response()->json($arr);
    }
  }
  # End remove from wishlist
}

# Calculate Percentage
if (!function_exists('calculatePercentage')) {
  function calculatePercentage($mrp, $salePrice) {
    if($mrp > $salePrice):
      $percentage = (($mrp - $salePrice) / $mrp) * 100;
      return number_format($percentage, 2).'% off';
    endif;
    return false;
  }
}
# Calculate Percentage
	
	# Get Product Discount
	if (!function_exists('getProductDiscount')) {
      	function getProductDiscount($mrp, $sale_price){
        	if($mrp > $sale_price):
              	$percentage = (($mrp - $sale_price) / $mrp) * 100;
              	return number_format($percentage, 2).'%';
            endif;
          
            return 0;
        }
    }
	# End Get Product Discount

  function getTempUser(){     
    return  session()->get('session_id');
  }

// -------------- Ecommmerce Functions -----------------


# Products
if (!function_exists('products')) {
  function products($where){
      return ecommerce()->products($where);
  }
}
# Products

# Single Product
if (!function_exists('product')) {
  function product($where){
      return ecommerce()->product($where);
  }
}
# Products

# Categories
if (!function_exists('categories')) {
  function categories($where){
      return ecommerce()->categories($where);
  }
}
# Categories

# Single Category
if (!function_exists('category')) {
  function category($where){
      return ecommerce()->category($where);
  }
}
# Single Category

# Brands
if (!function_exists('brands')) {
  function brands($where){
      return ecommerce()->brands($where);
  }
}
# Brands

# Single Brand
if (!function_exists('brand')) {
  function brand($where){
      return ecommerce()->brand($where);
  }
}
# Single Brand


 
    # Get Cart Items
    if (!function_exists('getCartItems')) {
      function getCartItems(){
              $total                  		=   0;
              $sub_total                  	=   0;
              $total_tax                    =   0;
              $mrp_total                  	=   0;
              $delivery_charge            	=   0;
              $payment_gateway_details      =   array();
              $cod_arr            			=   array();
              $boi_sab_paisa_arr            =   array();

              $cart_items                 	=   Product::select("products.slug", "products.id", "products.brand_id", "products.zoho_item_id", "products.hsn_sac_code", "products.gst", "products.name", "products.slug", "products.manage_stock", "products.stock_status", 
                                                      "products.quantity", "products.mrp_price", "products.sale_price", "products.featured_image", "carts.qty", 'products.drug_category', 'products.discount', 'products.stock_quantity', 
                                                                "products.category_ids")
                                             	->join('carts', 'carts.product_id', '=', 'products.id')
                                             	->where('products.status',1);
        
                                              if(Auth::check()){
                                                  $cart_items = $cart_items->where('user_id', Auth::user()->id);
                                              }
                                              else {
                                                  $cart_items = $cart_items->where('session_id', getTempUser());
                                              }
                    
              $cart_items                 =   $cart_items->get();

              foreach($cart_items as $cart_item):
                    $cart_item->qty           =   $cart_item->qty ?? 1;
                    $sub_total              +=   $cart_item->sale_price * $cart_item->qty;
                    $mrp_total      +=   $cart_item->mrp_price * $cart_item->qty;

                    $total_tax            +=   $cart_item->tax_details ? ( str_replace(',', '', $cart_item->tax_details->cgst) + str_replace(',', '', $cart_item->tax_details->sgst) ) : 0;
                  
              endforeach;

      # $cart_items->total_count            =   $cart_items->count();
      # $cart_items->sub_total              =   $sub_total;
      # $cart_items->delivery_charge        =   $delivery_charge;
      # $cart_items->mrp_total                =   $mrp_total;
      # $cart_items->total_tax                      =   $total_tax;
      # $cart_items->total                  =   $sub_total + $delivery_charge + $total_tax;
        
         $cart_items->total_count         =   $cart_items->count();
        $cart_items->sub_total            =   number_format($sub_total, 2, ".", "");
        $cart_items->delivery_charge      =   $delivery_charge;
        $cart_items->mrp_total            =   number_format($mrp_total, 2, ".", "");
        $cart_items->total_discount       =   number_format((float) $cart_items->mrp_total - (float) $cart_items->sub_total, 2, ".", "");
        $cart_items->gst                  =   0;
        $cart_items->total_tax                      =   $total_tax;
        $cart_items->total                =   number_format($sub_total + $delivery_charge, 2, ".", "");
   
      
      $total                              =   $cart_items->total;

      # Payment Details
      switch(true):
          case $total < 1:
                  $cod_arr              = (object) [
                                                      'status' => false,
                                                      'message' => "Payable amount is less than 1"
                                                    ];

                  $boi_sab_paisa_arr              = (object) [
                                                      'status' => false,
                                                      'message' => "Payable amount is less than 1"
                                                    ];
            break;

          case $total > 50:
            $cod_arr              = (object) [
                                                      'status' => true,
                                                      'message' => "Payable amount is more than 50"
                                                    ];
                                                    
                  $boi_sab_paisa_arr              = (object) [
                                                      'status' => true,
                                                      'message' => "Payable amount is more than 50"
                                                    ];
            break;
          
          default:
          $cod_arr              = (object) [
            'status' => true,
            'message' => "cod"
          ];
          
$boi_sab_paisa_arr              = (object) [
            'status' => true,
            'message' => "sab paisa"
          ];
            break;

      endswitch;

      $payment_gateway_details['cod']    = $cod_arr;
      $payment_gateway_details['boi_sab_paisa']    = $boi_sab_paisa_arr;

      $cart_items->payment_gateway_details        = $payment_gateway_details;
      # End Payment Details

        # Return Result    
        return $cart_items;
    }
}
# End Get Cart Items

# Update Cart Item
  if(!function_exists('update_cart')) {
      function update_cart($product_id, $quantity, $guard = '', $apiTempUser = ''){
          if($quantity < 1):
              return false;
          endif;
          
          $cart_items  =  Cart::where('product_id', $product_id);
          
          if(auth($guard)->check()):
              $cart_items->where('user_id', auth($guard)->user()->id);
          else:
            if($guard == 'api'):
              if($apiTempUser == ''):
                return false;
              endif;
              $cart_items->where('session_id', $apiTempUser);
            else:
              $cart_items->where('session_id', getTempUser());
            endif;
          endif;
          
          $cart_items = $cart_items->update(['qty' => $quantity]);
          
          return $cart_items;
    }
  }
# End Update Cart Item

# Remove Cart Item
if (!function_exists('remove_cart_item')) {
  function remove_cart_item($product_id, $guard = '', $apiTempUser = ''){
      $cart_items  =  Cart::where('product_id', $product_id);

      if(auth($guard)->check()):
          $cart_items->where('user_id', auth($guard)->user()->id);
      else:
        if($guard == 'api'):
          if($apiTempUser == ''):
            return false;
          endif;
          $cart_items->where('session_id', $apiTempUser);
        else:
          $cart_items->where('session_id', getTempUser());
        endif;
      endif;

      $result = $cart_items->delete();
      return $result;
  }
}
# End Remove Cart Item

# Empty Cart
if (!function_exists('empty_cart')) {
  function empty_cart(){
      Cart::where('user_id', auth()->user()->id)->delete();
      return true;
  }
}
# End Empty Cart

# Update Cart Items to Temp User to Logged User
if (!function_exists('updateTempCartItems')) {
  function updateTempCartItems(){

    $temp_items          = Cart::where('session_id', getTempUser())->get();
      if(auth()->check()):
          foreach($temp_items as $temp_item):
              Cart::updateOrCreate([
                  'user_id'     =>  auth()->user()->id,
                  'product_id'  => $temp_item->product_id
              ],[
                  'product_id'    => $temp_item->product_id,
                  'user_id'       => auth()->user()->id
              ])->increment('qty');
            endforeach;

            Cart::where('session_id', getTempUser())->delete();
        endif;
   }
}
# End Update Cart Items to Temp User to Logged User
// -------------- Ecommmerce Functions End -----------------

# OTP API
if (!function_exists('sendOtp')) {
  function sendOtp($data){
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.sinthan.co.in/pushapi/sendmsg?username=DISCOUNTMEDICAAPI&dest=91$data->mobile&apikey=Tj4ItM2D1ytLioshPVwZAZ8w7ry7LYJf&signature=DISMDC&msgtype=PM&msgtxt=Dear%20Customer%2C%20Your%20Discount%20Medica%20App%20Login%20OTP%20is%20$data->otp.Please%20don%27t%20share%20it%20with%20anyone.%20Discount%20Medica&templateid=1707168812673097894&entityid=1701168447986091270",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        $error = "cURL Error #:" . $err;
    } else {
        $data   = json_decode($response);
    }
    return $data;

  }
}
# OTP API

# Get Cart Items Helper Function
if (!function_exists('getCartItemsForApi')) {
function getCartItemsForApi(&$cart_details, &$cart_items, $session_id = '')
{
    $sub_total                                          =   0;
    $gst                                                =   0;
    $mrp_total                                          =   0;
    $delivery_charge                                    =   0;
    $is_prescription_required                           =   false;
   $total_save                                         	=   0;

    $cart_items                                         =   Product::select(
      																			"products.slug",
                                                                                "products.id",
                                                                                "products.name",
                                                                                "products.sku",
                                                                                "products.drug_category",
                                                                                "products.featured_image",
                                                                                "products.brand",
                                                                                "products.sale_price",
                                                                                "products.mrp_price",
                                                                                "products.stock_quantity",
																		       "products.zoho_item_id", "products.hsn_sac_code",
      																				"products.stock_quantity",
      																				"products.category_ids"
                                                                            )
                                                                    ->join('carts', 'carts.product_id', '=', 'products.id')
                                                                    ->where('products.status', 1);

    if (auth('api')->check()) :
        $cart_items                                     =   $cart_items->where('user_id', auth('api')->user()->id);
    else :
        $cart_items                                     =   $cart_items->where('session_id', $session_id);
    endif;

    $cart_items                                         =   $cart_items->get();


    if ($cart_items) :

        foreach ($cart_items as $cart_item) :
            $cart_item->qty                 =   $cart_item->quantity_in_cart;
            $sub_total                      +=   $cart_item->sale_price * $cart_item->qty;
            $mrp_total                      +=   $cart_item->mrp_price * $cart_item->qty;
            $gst                            +=   ($cart_item->sale_price * $cart_item->tax) / 100;

            if($cart_item->drug_category == 'RX'):
              $is_prescription_required     = true;
            endif;
        endforeach;

        $cart_details                       =   (object) array();
        $cart_details->total_count          =   $cart_items->count();
        $cart_details->sub_total            =   number_format($sub_total, 2, ".", "");
        $cart_details->delivery_charge      =   $delivery_charge ? $delivery_charge : "<span style='color:#01a89e;'>Free</span>";
        $cart_details->mrp_total            =   number_format($mrp_total, 2, ".", "");
        $cart_details->total_discount       =   number_format((float) $cart_details->mrp_total - (float) $cart_details->sub_total, 2, ".", "");
        $cart_details->gst                  =   $gst;
  		$cart_details->total_save           =   $total_save;
        $cart_details->total                =   number_format($sub_total + $delivery_charge, 2, ".", "");
        $cart_details->is_prescription_required                  =   $is_prescription_required;

        $cart_items->makeHidden(['qty', 'status_label', 'status_label_view', 'product_type_label', 'gallery_images', 'categories', 'product_images', 'type', 'quantitiy_in_cart', 'featured_image']);

        return true;
    else :
        return false;
    endif;
}
}
# End Get Cart Items Helper Function

# Total Cart Items Count
if (!function_exists('cartItemsCount')) {
  function cartItemsCount($session_id = '')
  {
    $cart_items           =   Cart::select('id');
    
    if (auth()->check()) :
      $cart_items->where('user_id', auth()->user()->id);
    elseif (auth('api')->check()) :
      $cart_items->where('user_id', auth('api')->user()->id);
      else :
        $cart_items->where('session_id', $session_id);
      endif;
      return   $cart_items->count() ?? 0;
    }
  }
  # End Total Cart Items Count
  
  # Products via Categories
  if (!function_exists('products_via_categories')) {
    function products_via_categories($paginate = false, $ids=[], $sort = 'latest', $brand_ids = []){
      	
        $products         = array();
        
        $products         = Product::select('slug', 'id', 'name', 'sku', 'strength', 'qty_per_box', 'brand_id', 'c_pack_type_name', 'featured_image', 'short_description', 'long_description', 'sale_price', 'mrp_price', 'cf_prescription_required', 'brand', 'manufacturer', 'hsn_or_sac', 'cf_category');
        if(is_array($ids)):
          foreach($ids as $id):
            $products->orWhereRaw('FIND_IN_SET('.$id.', category_ids)');
          endforeach;
        else:
          $products->whereRaw('FIND_IN_SET('.$ids.', category_ids)');          
        endif;
		
      	# Brands 
      	if(count($brand_ids) > 0):
      		$products->whereIn('brand_id', $brand_ids);
	    endif;
      	# End Brands
      
      	# Sort
			$products = $products->sortBy($sort);
      	# End Sort
      
      	$products->active();
      
        if($paginate):
          $products = $products->paginate(10);
        else:
          $products = $products->get();
        endif;

        if($products):
          $products->makeHidden(['status_label', 'status_label_view', 'product_type_label', 'gallery_images', 'categories', 'product_images', 'type', 'quantitiy_in_cart', 'featured_image']);  
        endif;
        
        return $products;
    }
  }
  # End Products via Categories
 
  	# Send Order to Zoho crm ( Sale Order )
	function send_order_to_zoho_crm($display_id){
      	
      	$order				=	Order::whereDisplayId($display_id)->first();
     
      	if($order && !$order->crm_status):
      		if($order->zoho_sale_order_data != ''):
      			return Zoho::create_sale_order(json_decode($order->zoho_sale_order_data), $order);
      		else:
      			if($order->customer->zoho_contact_id != ''):
      	
      				foreach($order->purchase_items as $purchase_item):
      
      					# Zoho items Scheme
                          $zoho_sale_order_data[]           =    (object) [
                                                                              'item_id'       => $purchase_item->product->zoho_item_id,
                                                                              'name'          => $purchase_item->itemname,
                                                                              'description'   => $purchase_item->itemname,
                                                                              'mrp_price'     => (float) $purchase_item->product->mrp_price,
													            			  'sale_price'    => (float) $purchase_item->sale_price,
                                                                              'quantity'      => $purchase_item->item_qty,
                                                                              'item_total'    => $purchase_item->item_qty * (float) $purchase_item->productprice,
                                                                              'hsn_sac_code'    => $purchase_item->product->hsn_sac_code ?? 0,
                                                                          ];

                      # End Zoho items Scheme
      				endforeach;
      			
      				# Zoho Sale Order Scheme
      					 $zoho_sale_order_data_final               =   (object) array(
                                                                                    'customer'                      =>  $order->customer,
                                                                                    'order'                         =>  $order,
                                                                                    'prescriptions_urls_arr'		=>	$prescriptions_urls_arr ?? [],
                                                                                    'prescriptions_urls'			=>	$prescriptions_urls ?? '',
                                                                                    'items'                         =>  $zoho_sale_order_data,
                                                                                );
      				# End Zoho Sale Order Scheme
      				
     					 $order->zoho_sale_order_data    = 	json_encode($zoho_sale_order_data_final);
                        $order->save();
      
      					return Zoho::create_sale_order(json_decode($order->zoho_sale_order_data), $order);
      			endif;
      		endif;
        endif;
      
    	return false;
    }
 	# End Send Order to Zoho crm ( Sale Order )

	# Create Customer in Zoho
	function create_customer_in_zoho($address_id){
    	# Create Customer
      	if(auth()->check()):

            # Address
               $address                           =   Address::find($address_id);
            # End Address

            $zoho_customer_data =   (object) array(
                'customer'                      =>  auth()->user(),
                'shipping_address'              => (object) [
                                                                'attention'     => auth()->user()->name,
                                                                'address'       => $address->address,
                                                                'street2'       => '',
                                                                'city'          => $address->city,
                                                                'state'         => $address->state,
                                                                'zip'           => $address->postcode,
                                                                'country'       => 'India',
                                                            ],
                'billing_address'               => (object) [
                                                                'attention'     => auth()->user()->name,
                                                                'address'       => $address->address,
                                                                'street2'       => '',
                                                                'city'          => $address->city,
                                                                'state'         => $address->state,
                                                                'zip'           => $address->postcode,
                                                                'country'       => 'India',
                                                            ]
            );

            $zoho_customer_result                                               =  Zoho::create_customer($zoho_customer_data);

            if($zoho_customer_result->code == 0 && auth()->user()->zoho_contact_id  == ''):
                $user                           =   User::find(auth()->user()->id);
                $user->zoho_contact_id          =   $zoho_customer_result->contact->contact_id;
                $user->save();
            endif;
      		
      	return true;
      endif;
            # End Create Customer
      return false;
    }
	# End create customer in zoho

	# Get category details via slug or id
	  if (!function_exists('getCategoryViaSlugOrId')) {
        function getCategoryViaSlugOrId($slugOrId){
        	return Category::whereId($slugOrId)->orWhere('slug', $slugOrId)->first();
        }
      }
	# Get category details via slug or id

	# Get slider via code
	if (!function_exists('getSliderViaCode')) {
    	function getSliderViaCode($slider_code){
          return Slider::with('slides:slider_id,id,mobile_image')
              								->with('slides', function($query){
                                              $query->where('mobile_image', '!=', '');
                                              $query->where(function($sub_query){
                                                  $sub_query->where('slider_for', '!=', 1);
                                                });
                                               	
                                              $query->whereStatus(1);
                                              $query->select('slider_id', 'id', 'image', 'mobile_image', 'slider_url');
                                              $query->orderBy('sort_order', 'asc');
                                            })
              								->code($slider_code)->whereStatus(1)->first();
        }
    }
	# End Get slider via code

 	    # Testing
    function T_ENV(){
      return auth()->check() && ( auth()->user()->mobile == 7231876076 || auth()->user()->mobile == 9548829374 ) ? true : false;
    }
    # End Testing

    	# Custom Pagination
 	if (!function_exists('custom_pagination')) {
    function custom_pagination($items, $perPage = 1, $currentPage = 1){
        
        $offSet = ($currentPage * $perPage) - $perPage;
        
        if(count($items) > $perPage):
            $itemsForCurrentPage = array_slice($items, $offSet, $perPage, true);
        endif;
        
        $items_with_pagination = new LengthAwarePaginator($itemsForCurrentPage ?? $items, count($items), $perPage, 1);
        return $items_with_pagination;
    }
 }
# End Custom Pagination
	
	# Site Settings
		if (!function_exists('site_setting')) {
          function site_setting(){
      			return SiteSetting::first();
          }
        }
	# End Site Settings

   # Get Amount Summary
   function getLabAmountSummary(){

    $total_mrp_price                    =   0;
    $total_sale_price                   =   0;
    $saved_amount                       =   0;
    $grand_total                        =   0;
    $coupon_amount                      =   0;
    $sub_total                          =   0;

    $cart_items                         =   LabCart::where(function($query){
                                                auth('api')->check() ? $query->where('user_id', auth('api')->user()->id) : $query->where('temp_user', request()->temp_user);
                                            })
                                            ->first();


        foreach($cart_items->items ?? [] as $item):
          
        $total_mrp_price            +=   ( $item->lab_detail->current_location_price->mrp_price ?? 0 ) * ( $item->patient_count ?? 0 ) ;
        $total_sale_price           +=   ( $item->lab_detail->current_location_price->sale_price ?? 0 ) * ( $item->patient_count ?? 0 ) ;


        
      endforeach;

      $sub_total                =   $total_sale_price;
      $grand_total              =   $total_sale_price;

    return (object) [
                        'total_mrp_price'       =>  $total_mrp_price,
                        'total_sale_price'      =>  $total_sale_price,
                        'discount_on_mrp'       =>  $total_mrp_price - $total_sale_price,
                        'saved_amount'          =>  $saved_amount,
                        'coupon_amount'         =>  $coupon_amount,
                        'sub_total'             =>  $sub_total,
                        'grand_total'           =>  $grand_total,
                    ];
}
# End Get Amount Summary

# Update Lab Cart After Login
if (!function_exists('updateLabCart')) {
  function updateLabCart(){
    LabCart::whereTempUser(session()->get('session_id'))->update([ 'user_id' => auth()->user()->id, 'temp_user' => null ]);
  }
}
# End Update Lab Cart After Login
