<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\Dealer;
use App\Models\SalesExecutive;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{

    # Task's
    # 1. Register Request
    # 2. List - Dealer, Customer
    # 3. Profile - Sales Executive, Dealer, Customer
    # 4. Category - List, Single
    # 5. Products - List, SIngle

    # Login With Email or Mobile and Password
    public function login_with_email_or_mobile_and_password()
    {
        $arr                =   [];
        $validator          =   Validator::make(request()->all(), [
                                        'email_or_mobile'           => 'required',
                                        'password'                  => 'required',
                                        'role'                      => 'required'
                                    ]);
         
        if($validator->failed()):
            return response()->json(['status' => false, 'message' => $validator->errors()->first()]);
        endif;

        $user                   =   $this->user(request()->role);
        if($user):
            if(Hash::check(request()->password, $user->password)):
                $access_token            =   $user->createToken('KNC')->plainTextToken;
                $arr                    =   [ 'status' => true, 'message' => 'Login successfully', 'role'   =>  request()->role, 'access_token' => $access_token, 'data' => $user ];
            else:
                $arr                    =   [ 'status' => false, 'message' => 'Password Incorrect', 'access_token' => null, 'data' => null ];
            endif;
        else:
            $arr                    =   [ 'status' => false, 'message' => 'Record not found', 'access_token' => null, 'data' => null  ];
        endif;


    	return response()->json($arr);
    }
    # End Login With Email or Mobile and Password
    
    # Login With Mobile and Otp
    public function login_with_mobile_and_otp()
    {
        $arr                =   [];
        $validator          =   Validator::make(request()->all(), [
                                        'mobile'                    => 'required',
                                        'password'                  => 'required',
                                        'role'                      => 'required'
                                    ]);
         
        if($validator->failed()):
            return response()->json(['status' => false, 'message' => $validator->errors()->first()]);
        endif;

        $user                           =   $this->user(request()->role);
        if($user):
            if(Hash::check(request()->password, $user->password)):
                $accessToken            =   $user->createToken('KNC')->plainTextToken;
                $arr                    =   [ 'status' => true, 'message' => 'Login successfully', 'role'   =>  request()->role, 'accessToken' => $accessToken, 'data' => $user ];
            else:
                $arr                    =   [ 'status' => false, 'message' => 'Password Incorrect', 'accessToken' => null, 'data' => null ];
            endif;
        else:
            $arr                    =   [ 'status' => false, 'message' => 'Record not found', 'accessToken' => null, 'data' => null  ];
        endif;


    	return response()->json($arr);
    }
    # End Login With Email or Mobile and Password

    # Send Otp
    public function send_otp(){
        $arr                        =   array();
        
        $validator                  =   Validator::make(request()->all(), [
            'mobile'    => 'required|digits:10|numeric',
        ]);
        
        if($validator->fails()):
            $arr                   =   array('status' => false, 'message' => $validator->errors()->first());
            return response()->json($arr);
        endif;
        
        $user                       =   $this->user(request()->role);;

                $otp                    =   mt_rand(100000,999999);

            # Third Party - Send Otp
                $data               =   array (
                                                    'mobile'    =>  request()->mobile,
                                                    'otp'       =>  $otp,
                                                );

                if(request()->mobile != '7877621911'):
                    sendOtp((object)$data);
                endif;
            # End Third Party - Send Otp
        
            $access_token                           =   null;
            if($user):
                if(request()->mobile == '7877621911'):
                    $user->otp = 123456;
                else:
                    $user->otp = $otp;
                endif;
                
                $user->save();
                $access_token            =   $user->createToken('KNC')->plainTextToken;
                
            endif;
            

            $arr                    =   array('status' => true, 'message' => "Otp sent successfully", 'otp' => $otp, 'is_user_exits' => $user ? true : false, 'user' => $user ?? null, 'access_token' => $access_token );
         
        
            return response()->json($arr);
    }
    # End Send Otp
    
    public function dealers(){
        return Dealer::get();
    }

    # User
    public function user($role){
        $user                       =   null;

        switch($role):
            case 'sale_executive':
                $user               =   SalesExecutive::whereMobile(request()->mobile)->first();
                break;
                
            case 'dealer':
                $user               =   Dealer::whereMobile(request()->mobile)->first();
            break;

            case 'customer':
                $user               =   User::whereMobile(request()->mobile)->first();
            break;

        endswitch;

        return $user;
    }
    # End User
}