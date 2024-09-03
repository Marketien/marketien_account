<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $role = Role::all();
        return view('role-permission.role.rolelist',[
          'roles'=>$role
        ]);
       }

       public function create(){

        return view('role-permission.role.addRole');
       }

       public function store(Request $req){
        $req->validate([
         'name'=> [
             'required',
             'string',
             'unique:roles,name'
         ]
        ]);
        Role::create([
         'name'=>$req->name
        ]);
        return redirect('/role-index')->with('status','Role Created Succesfully');
       }
       public function edit($id){
         $role = Role::find($id);
         return view('role-permission.role.editRole',[
             'role'=>$role
         ]);
       }
       public function update(Request $req, Role $role){
         $req->validate([
             'name'=> [
                 'required',
                 'string',
                 'unique:permissions,name'
             ]
            ]);
            $role->update([
             'name'=>$req->name
            ]);
            return redirect('/role-index')->with('status','Role Updated Succesfully');
       }
       public function destroy($id){
        $role = Role::find($id);
        $role->delete();
        return back()->with('status','Role deleted Succesfully');
       }
       public function addPermissionToRole($id){
        $permissions = Permission::get();
        $role = Role::findOrFail($id);
        return view('role-permission.addPermissionToRole',[
            'role'=>$role,
            'permissions'=>$permissions
        ]);
       }
}
