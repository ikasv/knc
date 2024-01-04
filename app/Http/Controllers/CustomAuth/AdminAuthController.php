<?php

namespace App\Http\Controllers\CustomAuth;
use App\Http\Controllers\Controller;
use App\Models\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    public function index()
    {
    	return view("admin.login");
    }
 
    public function login_process(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'username' => 'required|max:255',
            'password' => 'required',
        ]);
 
        if($validator->fails()){
             return response()->json([
                 'status'=>false,
                 'message'=>implode(", ",$validator->messages()->all())
             ]);
        }
         
        $user   =   Administrator::where("username", $request->username)->where('status', 1)->first();
        
        if($user){
             
             if (Hash::check($request->password, $user->password)) {
                 
                auth('admin')->login($user);
                
                if(auth('admin')->check()):
                    return redirect('admin');
                else:
                    return back()->with('back_msg', 'Some error occured');
                endif;

             }else{
                return back()->with('back_msg', 'Invalid password');
             }
    }else{
        return back()->with('back_msg', 'User not found');
    }

}
        public function logout(){
            auth('admin')->logout();
            return redirect('admin');
        }
}