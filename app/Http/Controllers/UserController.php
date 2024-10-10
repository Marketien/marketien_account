<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Account;
use App\Models\AccountMaster;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
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
                return redirect('/user-list')->with('status', 'user created successfully');
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
    //   return redirect('/user-list')->with('status','user created successfully');

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
    public function userUpdate(Request $req, User $user)
    {
        try {
            $response = Http::timeout(5)->get('https://account.softplatoon.com');
            if ($response->successful()) {

                $req->validate([
                    'name' => 'required|string|max:255',
                    'password' => 'nullable|string|min:5|max:20',
                    'roles' => 'required|array'
                ]);
                // $data = [
                //     'name' => $req->name,
                //     'email' => $req->email,
                // ];
                // if (!empty($req->password)) {
                //     $data += [
                //         'password' => Hash::make($req->password),
                //     ];
                // }
                // $user->update($data);
                // $user->syncRoles($req->roles);
                $userpost = $req->all();
                $userId = $user->id;
                $userpost['userId'] = $userId;
                $postUser = "https://account.softplatoon.com/api/user-update-api";
                $postResponse1 = Http::put($postUser, $userpost);
                $res = $postResponse1->json();
                // return redirect('/user-list')->with('status', 'User updated successfully');
                return response()->json($res);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Your Internet connection is failed, try with internet');
        }
    }
    public function userDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('status', 'User Deleted successfully');
    }
}
