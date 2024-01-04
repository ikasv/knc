<?php

namespace App\Http\Controllers\Admin\Management;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches        =   Branch::get();
        return view("admin.pages.managment.branches.index", compact('branches'));
    }

    public function create()
    {
        $roles          =   Role::select('id', 'name')->notSuperAdmin()->get();

        return view("admin.pages.managment.branches.single", compact('roles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'                 =>  'required'
        ]);

        Branch::updateOrCreate(
            [
                'id'                => $request->id
            ],
            [
                'title'             => $request->title,
                'status'            => $request->status
            ]
        );

        return redirect()->route('admin::branches.index');
    }


    public function show($id)
    {
        //
    }


    public function edit(Branch $branch)
    {
        $roles          =   Role::select('id', 'name')->notSuperAdmin()->get();

        return view("admin.pages.managment.branches.single", compact('roles', 'branch'));
    }

    public function update(Request $request, $id)
    {
      
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('admin::branches.index');
   }
}
