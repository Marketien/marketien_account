<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function userCheck(Request $req){
        $req ->validate([
            'email'=>'required|email',
        ]);
        $user = User::where('email','=',$req->email)->first();
        if($user){
            if(Hash::check($req->password,$user->password)){
                $req->session()->put('admin',$user->id);
                return redirect('/account-master-form');
            }
            else{
                return back()->with('fail','Invalid password');
            }
        }
        else{
            return back()->with('fail','No account for this email');
        }
    }
    public function registry(Request $req){
       $data = new User();
       $data->name = $req->name;
       $data->email = $req->email;
       $data->password =Hash::make($req->name);
       $data->role = $req->role;
       $result= $data->save();
       if ($result) {
        return back()->with('success', 'Your Regitration has been complited');

    } else {

        return back()->with('fail', 'something went wrong,try again');
    }
    }
    public function logout(){
      if(session()->has('admin')){
        session()->pull('admin');
        return redirect('/');
      }
    }

}
