<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class PermissionController extends Controller
{
    public function index(){
        $permissions=Permission::all();
        return view('admin.permissions.index',compact('permissions'));
    }
    public function create(){
        return view('admin.permissions.create');
    }

    public function store(Request $request){
        $validated=$request->validate([
            'name'=>['required','min:3']
        ]);
        if(!$validated){
            return redirect()->back();
        }else{
            Permission::create($validated);
            return redirect()->route('admin.permissions.index');
        }
    }

    public function edit(Permission $permission)
    {
        $roles=Role::all();
        return view('admin.permissions.edit',compact('permission','roles')); 
    }

    public function update(Request $request,Permission $permission){
        $validated=$request->validate([
            'name'=>['required','min:3']
        ]);

        $permission->update($validated);
        return redirect()->route('admin.permissions.index');

    }
    public function destroy(Permission $permission){
        $permission->delete();
        return redirect()->route('admin.permissions.index')->with('message','Permission deleted Successfully!!');

    }
    public function assignRole(Request $request,Permission $permission){
        if($permission->hasRole($request->role)){
            return back()->with('message','Role Exists.');
        }
         $permission->assignRole($request->role);
         return back()->with('message','Role Added.');
    }

    public function removeRole(Permission $permission, Role $role){
        if($permission->hasRole($role)){
            $permission->removeRole($role);
         return back()->with('message','Role removed.');

        }
        return back()->with('message','Role nnot exist.');

    }
}
