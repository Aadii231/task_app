<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\RoleController;


class UserController extends Controller
{
    public function __construct()
    {
        
       $this->middleware('permission:view user',['only'=> ['index']]);
       $this->middleware('permission:edit user',['only'=> ['edit','update']]);
       $this->middleware('permission:add user',['only'=> ['create','store']]);
       $this->middleware('permission:delete user',['only'=> ['destroy']]);
    }
   public function index()
   {
        $users = User::all();
        return view("role-permissions.user.index", [
            "users"=> $users,
        ]);
   }
   public function create()
   {
    
        $roles = Role::pluck('name','name')->all();
        return view("role-permissions.user.create",[
            "roles"=> $roles,
        ]);
    }


   public function store(Request $request)
   {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string'],
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->syncRoles($request->role);

            return redirect('users')->with('status','user created successfully');
   }

   public function edit(user $user)
   {
        $roles = Role::pluck('name','name')->all();
        $userRole=$user->roles->pluck('name','name')->all();
        return view('role-permissions.user.edit' ,[
            'user'=> $user,
            'roles'=>$roles,
            'userRole'=>$userRole
            ]);
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, user $user)
   {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['string','nullable'],
            'role' => 'required'
        ]);
            $data=[
                'name' => $request->name,
                'email' => $request->email,
            ];
            if(!empty($request->password)){
                $data+=[
                    'password' => Hash::make($request->password),
                ];
            }
           $user->update($data);
           $user->syncRoles($request->role);
           return redirect('users')->with('status','user updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($userId)
    {
        $user = user::find($userId);
        $user->delete();
        return redirect('users')->with('status','user Deleted successfully');


    }
}
