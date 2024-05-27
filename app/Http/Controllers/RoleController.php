<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function __construct()
    {
        
       $this->middleware('permission:view role',['only'=> ['index']]);
       $this->middleware('permission:edit role',['only'=> ['edit','update']]);
       $this->middleware('permission:create role',['only'=> ['create','store','addPermissionsToRole','givePermissionsToRole']]);
       $this->middleware('permission:delete role',['only'=> ['destroy']]);
    }
    public function index()
    {
        $roles = Role::all();

        return view("role-permissions.role.index" ,[
            'roles'=> $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("role-permissions.role.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>[
                'required','string','unique:roles,name',
            ]
            ]);
            Role::create(['name' =>$request->name]);
            return redirect('roles')->with('status','Role created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('role-permissions.role.edit' ,[
            'role'=> $role,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=>[
                'required','string','unique:roles,name',
            ]
            ]);
            $role->update(['name' =>$request->name]);
            return redirect('roles')->with('status','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($roleId)
    {
        $role = role::find($roleId);
        $role->delete();
        return redirect('roles')->with('status','Role Deleted successfully');


    }
    public function addPermissionsToRole($roleId)
    {
        $permissions= Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermissions=DB::table('role_has_permissions')
        ->where('role_has_permissions.role_id',$role->id)
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();
        return view('role-permissions.role.add-Permissions',[
            'role'=> $role,
            'permissions'=> $permissions,
            'rolePermissions'=>$rolePermissions
        ]);

     

    }

    public function givePermissionsToRole(Request $request, $roleId)
    {
        $request->validate([
            'permission'=>'required'
        ]);
        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with('status','Permissions added to Role');
    }

}
