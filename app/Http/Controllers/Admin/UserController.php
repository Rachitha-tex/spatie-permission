<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }
    public function shoW(User $user){
        $permissions=Permission::all();
        $roles=Role::all();
        return view('admin.users.role',compact('user','permissions','roles'));
    }
    public function destroy(Role $role){
        $role->delete();
        return redirect()->route('admin.users.role')->with('message','Role deleted Successfully!!');

    }
    public function assignRole(Request $request,User $user){
        if($user->hasRole($request->role)){
            return back()->with('message','Role Exists.');
        }
         $user->assignRole($request->role);
         return back()->with('message','Role Added.');
    }

    public function removeRole(User $user, Role $role){
        if($user->hasRole($role)){
            $user->removeRole($role);
         return back()->with('message','Role removed.');

        }
        return back()->with('message','Role nnot exist.');

    }

    public function givePermission(Request $request,User $user){
        if($user->hasPermissionTo($request->permission)){
            return back()->with('message','Permission Exists.');
        }
         $user->givePermissionTo($request->permission);
         return back()->with('message','Permission Added.');


    }

    public function revokePermission(User $user,Permission $permission){
        if($user->hasPermissionTo($permission)){
            $user->revokePermissionTo($permission);
            return back()->with('message','Permission Deleted.');
        }
        return back()->with('message','Permission Not Exist.');

    }

}
