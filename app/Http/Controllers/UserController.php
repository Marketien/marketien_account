<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountMaster;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userCheck(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
        ]);
        $user = User::where('email', '=', $req->email)->first();
        if ($user) {
            if (Hash::check($req->password, $user->password)) {
                $req->session()->put('admin', $user->id);
                return redirect('/account-master-form');
            } else {
                return back()->with('fail', 'Invalid password');
            }
        } else {
            return back()->with('fail', 'No account for this email');
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
    public function logout()
    {
        if (session()->has('admin')) {
            session()->pull('admin');
            return redirect('/');
        }
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
        $masterDue = $dataMaster->where('due','!=',0);
        // graph for account
        $income = [];
        $expense = [];
        for($i =1;$i<=$number;$i++){
            $account = Account::where('date',Carbon::create($year,$month,$i))->get();
            $debit = $account->sum('cash_out_debit');
            $credit = $account->sum('cash_in_credit');
            $income[$i-1] = $credit;
            $expense[$i-1] = $debit;
        }


        return view('dashboard',
         [
            'incToday' => $incToday,
            'expToday' => $expToday,
            'incMonth' => $incMonth,
            'expMonth' => $expMonth,
            'totalOrder' => $totalOrder,
            'totalRecieved' => $totalRecieved,
            'totalDue' => $totalDue,
            'income' => implode(',',$income),
            'expense' => implode(',',$expense),
            'maturity'=> $masterDue


         ]);
    }
}
