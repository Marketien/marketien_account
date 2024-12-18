<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AccountController;
use App\Models\Account;
use App\Models\AccountMaster;
use App\Models\Otp;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use PhpParser\Node\Stmt\TryCatch;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $accountController;

    public function __construct()
    {
        $this->accountController = new AccountController;
    }
    // public function userCheck(Request $req)
    // {
    //     $req->validate([
    //         'email' => 'required|email',
    //     ]);
    //     $user = User::where('email', '=', $req->email)->first();
    //     if ($user) {
    //         if (Hash::check($req->password, $user->password)) {
    //             $req->session()->put('admin', $user->id);
    //             return redirect('/account-master-form');
    //         } else {
    //             return back()->with('fail', 'Invalid password');
    //         }
    //     } else {
    //         return back()->with('fail', 'No account for this email');
    //     }
    // }
    public function userCheck(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = User::where('email', $req->email)->first();
            $store = 'storekeeper';
            $userRoles = $user->roles->pluck('name', 'name')->all();
            if (in_array($store, $userRoles)) {

                return redirect('/attendance-form');
            } else {

                return redirect('/account-master-form');
            }
        } else {
            // Authentication failed
            return back()->with('fail', 'Invalid email or password');
        }
    }
    public function registry(Request $req)
    {
        $data = new User();
        $data->name = $req->name;
        $data->email = $req->email;
        $data->password = Hash::make($req->name);
        $data->role = $req->role;
        $result = $data->save();
        if ($result) {
            return back()->with('success', 'Your Regitration has been complited');
        } else {

            return back()->with('fail', 'something went wrong,try again');
        }
    }
    // public function logout()
    // {
    //     if (session()->has('admin')) {
    //         session()->pull('admin');
    //         return redirect('/');
    //     }
    // }
    public function logout(Request $request)
    {
        // Log the user out of the application
        Auth::logout();

        // Invalidate the user's session
        $request->session()->invalidate();

        // Regenerate the session token to prevent session fixation attacks
        $request->session()->regenerateToken();

        // Redirect the user to the login page or home page
        return redirect('/');
    }
    public function dashboard()
    {
        $year = date('Y');
        $month = date('m');
        $number = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        //  account
        $data = Account::all();
        $data1 = Account::where('date', date('Y-m-d'))->get();
        $incToday = $data1->sum('cash_in_credit');
        $expToday = $data1->sum('cash_out_debit');
        $strtdate = Carbon::create($year, $month, '01');
        $formatedStart = $strtdate->format('Y-m-d');

        $enddate = Carbon::create($year, $month, $number);
        $formatedEnd = $enddate->format('Y-m-d');

        $data2 = $data->whereBetween('date', [$formatedStart, $formatedEnd]);
        $incMonth = $data2->sum('cash_in_credit');
        $expMonth = $data2->sum('cash_out_debit');
        // account master
        $dataMaster = AccountMaster::all();
        $totalOrder = $dataMaster->sum('amount');
        $totalRecieved = $dataMaster->sum('credit');
        $totalDue = $dataMaster->sum('due');
        $masterDue = $dataMaster->where('due', '!=', 0);
        // graph for account
        $income = [];
        $expense = [];
        for ($i = 1; $i <= $number; $i++) {
            $account = Account::where('date', Carbon::create($year, $month, $i)->format('Y-m-d'))->get();
            $debit = $account->sum('cash_out_debit');
            $credit = $account->sum('cash_in_credit');
            $income[$i - 1] = $credit;
            $expense[$i - 1] = $debit;
        }


        return view(
            'dashboard',
            [
                'incToday' => $incToday,
                'expToday' => $expToday,
                'incMonth' => $incMonth,
                'expMonth' => $expMonth,
                'totalOrder' => $totalOrder,
                'totalRecieved' => $totalRecieved,
                'totalDue' => $totalDue,
                'income' => implode(',', $income),
                'expense' => implode(',', $expense),
                'maturity' => $masterDue


            ]
        );
        // return response(implode(',',$income));
        // return response($account);
    }
    public function userList()
    {
        $users = User::all();
        return view('user.userlist', ['users' => $users]);
    }

    public function userCreate()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('user.addUser', ['roles' => $roles]);
    }
    public function userStore(Request $req)
    {
        try {


            $response = Http::timeout(5)->get('https://account.softplatoon.com');
            if ($response->successful()) {


                $req->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|string|min:5|max:20',
                    'roles' => 'required|array'
                ]);
                $user = User::create([
                    'name' => $req->name,
                    'email' => $req->email,
                    'password' => Hash::make($req->password),
                    'role' => '1'
                ]);
                $user->syncRoles($req->roles);
                $userpost = $req->all();
                $postUser = 'https://account.softplatoon.com/api/user-store-api';
                $postResponse1 = Http::post($postUser, $userpost);
                return redirect('/user-list')->with('success', 'user created successfully');
                // return response()->json($req);
            }
        } catch (\Exception $e) {

            return redirect()->back()->with('fail', 'Your Internet connection is failed, try with internet');
        }
    }
    //for online
    // Public function userStore(Request $req){
    //   $req->validate([
    //     'name'=>'required|string|max:255',
    //     'email'=>'required|email|unique:users,email',
    //     'password'=>'required|string|min:5|max:20',
    //     'roles'=> 'required|array'
    //   ]);
    //   $user = User::create([
    //       'name'=> $req->name,
    //       'email'=>$req->email,
    //       'password'=>Hash::make($req->password),
    //       'role'=>'1'
    //   ]);
    //   $user->syncRoles($req->roles);
    //   return redirect('/user-list')->with('success','user created successfully');

    //  }

    //  Public function userStoreApi(Request $req){
    //   $user = User::create([
    //       'name'=> $req->name,
    //       'email'=>$req->email,
    //       'password'=>Hash::make($req->password),
    //       'role'=>'1'
    //   ]);
    //   $user->syncRoles($req->roles);
    //   if($user){
    //   return response()->json(['message'=>'Data is integrated successfully']);
    //   }else{
    //     return response()->json(['message'=>'something went wrong']);
    //   }

    //  }

    public function userEdit($id)
    {

        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $user->roles->pluck('name', 'name')->all();
        return view('user.editUser', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);
    }
    public function userUpdate(Request $req, $user)
    {
        $userEd = User::where('name', $user)->first();
        try {
            $response = Http::get('https://account.softplatoon.com');
            if ($response->successful()) {

                $req->validate([
                    'name' => 'required|string|max:255',
                    'password' => 'nullable|string|min:5|max:20',
                    'roles' => 'required|array'
                ]);

                $userpost = $req->all();
                // // unset($userpost['_method']);
                // unset($userpost['_token']);

                $postUser = "https://account.softplatoon.com/api/user-update-api/{$userEd->name}";
                $postResponse1 = Http::put($postUser, $userpost);
                $data = [
                    'name' => $req->name,
                    'email' => $req->email,
                ];
                if (!empty($req->password)) {
                    $data += [
                        'password' => Hash::make($req->password),
                    ];
                }
                $userEd->update($data);
                $userEd->syncRoles($req->roles);
                return redirect('/user-list')->with('success', 'User updated successfully');
                // return response()->json($userpost);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Your Internet connection is failed, try with internet');
        }
    }
    //for online
    // Public function userUpdate(Request $req, User $user){
    //     $req->validate([
    //        'name'=>'required|string|max:255',
    //        'password'=>'nullable|string|min:5|max:20',
    //        'roles'=> 'required|array'
    //     ]);
    //     $data = [
    //        'name'=> $req->name,
    //        'email'=>$req->email,
    //     ];
    //     if(!empty($req->password)){
    //        $data += [
    //            'password'=>Hash::make($req->password),
    //         ];
    //     }
    //     $user->update($data);
    //     $user->syncRoles($req->roles);
    //     return redirect('/user-list')->with('success','User updated successfully');
    //     }
    //     Public function userUpdateApi(Request $req, $user){
    //        $userEd = User::where('name', $user)->first();
    //     $data = [
    //        'name'=> $req->name,
    //        'email'=>$req->email,
    //     ];
    //     if(!empty($req->password)){
    //        $data += [
    //            'password'=>Hash::make($req->password),
    //         ];
    //     }
    //    // $user->name = $req->name;
    //    // $user->email = $req->email;
    //    //  if(!empty($req->password)){
    //    //     $user->password = $req->password;
    //    //  }
    //    $userEd->update($data);
    //    // $user->save();
    //    $userEd->syncRoles($req->roles);

    //     return response()->json(['message'=>'Data updated Successfully']);
    //     }
    public function userDestroy($id)
    {
        $user = User::findOrFail($id);
        try {
            $response = Http::get('https://account.softplatoon.com');
            if ($response->successful()) {
                if($user->email != "admin@test.com"){

                    $user->delete();
                    $postUser = Http::get("https://account.softplatoon.com/api/user-delete-api/{$user->name}");
                    return back()->with('success', 'User Deleted successfully');
                }else{
                    return back()->with('fail', 'Admin Credential Cannot be Deleted');
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Your Internet connection is failed, try with internet');
        }
    }
    //for online
    // Public function userDestroy($id){
    //     $user = User::findOrFail($id);
    //     $user->delete();
    //     return back()->with('success','User Deleted successfully');
    //   }
    //   Public function userDestroyApi($name){
    //     $user = User::where('name',$name)->first();
    //     $user->delete();
    //     return response()->json(['message'=>'Data Deleted Successfully']);
    //   }
    public function otpGenerate(Request $req)
    {
        $data = User::where('email', $req->email)->first();
        if ($data) {
            $userOtp = Otp::where('email', $data->email)->first();
            if ($userOtp) {
                $userOtp->delete();
            }
            $createOtp = Otp::create([
                'otp' => rand(123456, 999999),
                'phoneNo' => $data->phoneNo,
                'email' => $data->email
            ]);
            $msg = 'Your OTP for password reset:' . $createOtp->otp;
            if ($createOtp) {
                $this->accountController->sms_send($data->phoneNo, $msg);
                return redirect('forgot-pass2/'.$data->email)->with('success', 'otp is sent to your phone,please check');
            } else {
                return back()->with('fail', 'something went wrong, try again later');
            }
        } else {
            return back()->with('fail', 'Your email is not registered');
        }
    }
    public function resendOtp($mail)
    {
        $data = User::where('email', $mail)->first();
        if ($data) {
            $userOtp = Otp::where('email', $data->email)->first();
            if ($userOtp) {
                $userOtp->delete();
            }
            $createOtp = Otp::create([
                'otp' => rand(123456, 999999),
                'phoneNo' => $data->phoneNo,
                'email' => $data->email
            ]);
            $msg = 'Your OTP for password reset:' . $createOtp->otp;
            if ($createOtp) {
                $this->accountController->sms_send($data->phoneNo, $msg);
                return back()->with('success', 'otp is sent to your phone again');
            } else {
                return back()->with('fail', 'something went wrong, try again later');
            }
        } else {
            return back()->with('fail', 'Your email is not registered');
        }
    }
    public function otpVerify(Request $req)
    {
        $data = Otp::where('email', $req->email)->first();
        if ($data) {
            if ($data->created_at > Carbon::now()->subMinutes(35)->toDateTimeString()) {
                if ($data->otp === $req->otp) {
                    return redirect('forgot-pass3/' . $data->email . '/' . $data->otp)->with('success', 'You otp is accepted');
                } else {
                    return back()->with('fail', 'your otp didnot match,try again');
                }
            } else {
                return back()->with('fail', 'your otp is expired');
            }
        } else {
            return back()->with('fail', 'invalid number');
        }
    }
    public function resetPass(Request $req)
    {

        try {
            $response = Http::get('https://account.softplatoon.com');
            if ($response->successful()) {

                $data = User::where('email', $req->email)->first();
                if ($data) {
                    $userOtp = Otp::where('email', $data->email)->where('otp', $req->otp)->first();
                    if ($userOtp) {
                        $userpost = $req->all();
                        $postUser = "https://account.softplatoon.com/api/reset-pass-api";
                        $postResponse1 = Http::post($postUser, $userpost);
                        $data->password = Hash::make($req->password);
                        $result = $data->save();
                        if ($result) {
                            return redirect('/')->with('success', 'Your new password is generated');
                        } else {
                            return back()->with('fail', 'Something went wrong');
                        }
                    } else {
                        return back()->with('fail', 'Invalid OTP');
                    }
                } else {
                    return back()->with('fail', 'Invalid Email');
                }
            }
        } catch (\Exception $e) {
            return back() - with('fail', 'Your Internet connection is failed, try with internet');
        }
    }
    //for online
    // public function passUpdateApi(Request $req){
    //     $data = User::where('email',$req->email)->first();
    //     $data->password = Hash::make($req->password);
    //     $result = $data->save();
    //     if($result){
    //        return response()->json(['message'=>'Password Updated Successfully']);
    //     }else{
    //          return response()->json(['message'=>'Something went wrong']);
    //     }
    // }

}
