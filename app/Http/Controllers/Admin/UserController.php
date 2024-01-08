<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Auth;

class UserController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {

            $role_id = auth('admin')->user()->role_id;
            $permissions = get_permissions($role_id);
            $action_method = $request->route()->getActionMethod();
            if(isset($permissions['users'])){
               $perms = $permissions['users'];
                if ($perms['rr_view']==1 && $action_method=='index') { }
                else if ($perms['rr_create']==1 && ($action_method=='create' || $action_method=='store')) { }
                else if ($perms['rr_edit']==1 && ($action_method=='edit' || $action_method=='update')) { }
                else if ($perms['rr_delete']==1 && $action_method=='destroy') { }
                else { return redirect('/admin'); }
            }
            else { return redirect('/admin'); }

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->get();

        return view("admin.users.index",compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view("admin.users.single",compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if(!request()->id && !request()->password):
            return back()->withErrors(['password' => ['Please enter password']]);
        endif;

        $id                 =   request()->id ?? 0;

        $request->validate([
                                'name'          =>  'required',
                                'email'         =>  "required|email|unique:users,email,$id",
                                'mobile'        =>  "required|digits:10|unique:users,mobile,$id",
                                'dealer_id'     =>  'required'
                            ]);

         # Media
         $profile_image                 =   uploadFile(request(), 'profile_image', 'users/profile-images');
         # End Media

        $inputs                         =   [
                                                'name'              => request()->name,
                                                'email'             => request()->email,
                                                'mobile'            => request()->mobile,
                                                'dealer_id'         => request()->dealer_id,
                                                'profile_image'     => $profile_image
                                            ];
        
        if(request()->password):
            $inputs['password']                         =    Hash::make(request()->password);
        endif;

        User::updateOrCreate([
                                    'id'        => request()->id,
                                ],
                                $inputs);

        return redirect()->route('admin::users.index')->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $record = User::findOrFail($id);

            return view("admin.users.single",compact('record'));
        }
        catch (ModelNotFoundException $e)
        {
            return redirect()->route('admin::users.index')->with('error','User Not Found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

            $user = User::findOrFail($id);

            $request->validate([
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'required',
                'mobile'=>'required',
                'role_id'=>'required'
            ]);

            $update_array = $request->all();
            
            $update_array['password'] = ($update_array['password'])?$update_array['password']:$user->password;

            $user->update($update_array);

            return redirect()->route('admin::users.index')->with('success','User updated successfully.');
        }
        catch (ModelNotFoundException $e){
            return redirect()->route('admin::users.index')->with('error','User Not Found.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $user = User::findOrFail($id);

            $user->delete();

            return redirect()->route('admin::users.index')->with('success','User deletd successfully.');

        }
        catch(ModelNotFoundException $e)
        {
            return redirect()->route('admin::users.index')->with('error','User Not Found');
        }
    }
}
