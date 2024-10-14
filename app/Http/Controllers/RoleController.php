<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Psy\Command\WhereamiCommand;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::all();
        return view('role-permission.role.rolelist', [
            'roles' => $role
        ]);
    }

    public function create()
    {

        return view('role-permission.role.addRole');
    }

    public function store(Request $req)
    {
        try {
            $response = Http::timeout(5)->get('https://account.softplatoon.com');
            if ($response->successful()) {
                $req->validate([
                    'name' => [
                        'required',
                        'string',
                        'unique:roles,name'
                    ]
                ]);
                Role::create([
                    'name' => $req->name
                ]);
                $userpost = $req->all();
                $postUser = 'https://account.softplatoon.com/api/role-store-api';
                $postResponse1 = Http::post($postUser, $userpost);
                return redirect('/role-index')->with('success', 'Role Created Succesfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Your Internet connection is failed, try with internet');
        }
    }
    //for online
    // public function store(Request $req){
    //     $req->validate([
    //      'name'=> [
    //          'required',
    //          'string',
    //          'unique:roles,name'
    //      ]
    //     ]);
    //     Role::create([
    //      'name'=>$req->name
    //     ]);
    //     return redirect('/role-index')->with('success','Role Created Succesfully');
    //    }
    //    public function storeApi(Request $req){

    //     Role::create([
    //      'name'=>$req->name
    //     ]);
    //     return response()->json(['messgae'=>'role created successfully']);
    //    }
    public function edit($id)
    {
        $role = Role::find($id);
        return view('role-permission.role.editRole', [
            'role' => $role
        ]);
    }
    public function update(Request $req, Role $role)
    {
        try {
            $response = Http::get('https://account.softplatoon.com');
            if ($response->successful()) {
                $req->validate([
                    'name' => [
                        'required',
                        'string',
                        'unique:permissions,name'
                    ]
                ]);

                $userpost = $req->all();
                $postUser = "https://account.softplatoon.com/api/role-update-api/{$role->name}";
                $postResponse1 = Http::put($postUser, $userpost);
                $role->update([
                    'name' => $req->name
                ]);
                return redirect('/role-index')->with('success', 'Role Updated Succesfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Your Internet connection is failed, try with internet');
        }
    }
    //for online
    // public function update(Request $req, Role $role){
    //     $req->validate([
    //         'name'=> [
    //             'required',
    //             'string',
    //             'unique:permissions,name'
    //         ]
    //        ]);
    //        $role->update([
    //         'name'=>$req->name
    //        ]);
    //        return redirect('/role-index')->with('success','Role Updated Succesfully');
    //  }
    //  public function updateApi(Request $req, $role){
    //      $roleEd = Role::where('name',$role)->first();
    //     $req->validate([
    //         'name'=> [
    //             'required',
    //             'string',
    //             'unique:permissions,name'
    //         ]
    //        ]);
    //        $roleEd->update([
    //         'name'=>$req->name
    //        ]);
    //        return response()->json(['messgae'=>'role updated successfully']);
    //  }
    public function destroy($id)
    {
        $role = Role::find($id);
        try {
            $response = Http::get('https://account.softplatoon.com');
            if ($response->successful()) {
                $role->delete();
                $postUser = Http::get("https://account.softplatoon.com/api/role-delete-api/{$role->name}");
                return back()->with('success', 'Role deleted Succesfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Your Internet connection is failed, try with internet');
        }
    }
    //for online
    // public function destroy($id){
    //     $role = Role::find($id);
    //     $role->delete();
    //     return back()->with('success','Role deleted Succesfully');
    //    }
    //    public function destroyApi($name){
    //     $role = Role::where('name',$name)->first();
    //     $role->delete();
    //     return response()->json(['messgae'=>'role deleted successfully']);
    //    }

    public function addPermissionToRole($id)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($id);
        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('role-permission.addPermissionToRole', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions
        ]);
    }
    public function updatePermissionToRole(Request $req, $id)
    {
        try {
            $response = Http::get('https://account.softplatoon.com');
            $role = Role::findOrFail($id);
            if ($response->successful()) {
                $req->validate([
                    'permission' => 'required'
                ]);
                $userpost = $req->all();

                $postUser = "https://account.softplatoon.com/api/give-permission-api/{$role->name}";
                $postResponse1 = Http::put($postUser, $userpost);


                $role->syncPermissions($req->permission);

                return back()->with('success', 'Permissions are assigned Succesfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Your Internet connection is failed, try with internet');
        }
    }
    //for online
    // public function updatePermissionToRole(Request $req ,$id){
    //     $req->validate([
    //      'permission'=>'required'
    //     ]);
    //     $role = Role::findOrFail($id);
    //     $role->syncPermissions($req->permission);
    //     return back()->with('success','Permissions are assigned Succesfully');
    //  }
    //  public function updatePermissionToRoleApi(Request $req ,$name){
    //     $role = Role::where('name',$name)->first();
    //     $role->syncPermissions($req->permission);
    //     return response()->json(['messgae'=>'permission assigned successfully']);
    //  }
}
