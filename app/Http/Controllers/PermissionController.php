<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view permission',['only'=> ['index']]);
        $this->middleware('permission:edit permission',['only'=> ['edit','update']]);
        $this->middleware('permission:create permission',['only'=> ['create','store']]);
        $this->middleware('permission:delete permission',['only'=> ['destroy']]);
    }
   
    public function index()
    {
        $permissions = Permission::get();

        return view("role-permissions.permission.index" ,[
            'Permissions'=> $permissions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("role-permissions.permission.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>[
                'required','string','unique:permissions,name',
            ]
            ]);
            Permission::create(['name' =>$request->name]);
            return redirect('permissions')->with('status','Permission created successfully');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('role-permissions.permission.edit' ,[
            'Permission'=> $permission,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name'=>[ 'required','string','unique:permissions,name',]
            ]);
            $permission->update(['name' =>$request->name]);
            return redirect('permissions')->with('status','Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($permissionId)
    {
            $permission = permission::find($permissionId);
            $permission->delete();
            return redirect('permissions')->with('status','Permission Deleted successfully');


    }
}
