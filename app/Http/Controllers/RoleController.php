<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;
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
        $rolePermissions = DB::table('role_has_permissions')
                            ->where('role_has_permissions.role_id',$role->id)
                            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                            ->all();

        return view('role-permission.addPermissionToRole',[
            'role'=>$role,
            'permissions'=>$permissions,
            'rolePermissions'=>$rolePermissions
        ]);
       }
       public function updatePermissionToRole(Request $req ,$id){
          $req->validate([
           'permission'=>'required'
          ]);
          $role = Role::findOrFail($id);
          $role->syncPermissions($req->permission);
          return back()->with('status','Permissions are assigned Succesfully');
       }
}
