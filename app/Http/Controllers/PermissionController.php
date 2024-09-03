<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
  public function index(){
   $permission = Permission::all();
   return view('role-permission.permission.permissionlist',[
     'permissions'=>$permission
   ]);
  }

  public function create(){

   return view('role-permission.permission.addPermission');
  }

  public function store(Request $req){
   $req->validate([
    'name'=> [
        'required',
        'string',
        'unique:permissions,name'
    ]
   ]);
   Permission::create([
    'name'=>$req->name
   ]);
   return redirect('/permission-index')->with('status','Permission Created Succesfully');
  }
  public function edit($id){
    $permission = Permission::find($id);
    return view('role-permission.permission.editPermission',[
        'permission'=>$permission
    ]);
  }
  public function update(Request $req, Permission $permission){
    $req->validate([
        'name'=> [
            'required',
            'string',
            'unique:permissions,name'
        ]
       ]);
       $permission->update([
        'name'=>$req->name
       ]);
       return redirect('/permission-index')->with('status','Permission Updated Succesfully');
  }
  public function destroy($id){
   $permission = Permission::find($id);
   $permission->delete();
   return back()->with('status','Permission deleted Succesfully');
  }
}
