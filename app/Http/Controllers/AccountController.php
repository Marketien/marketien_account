<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\AccountMaster;
use Carbon\Carbon;

class AccountController extends Controller
{
    public function accountTable(){
        $data = Account::all();
        foreach($data as $account){
            $balance = Account::where('created_at', '<', $account->created_at)->get();
            $debit = $balance->sum('cash_out_debit');
            $credit = $balance->sum('cash_in_credit');
            $account->calc_amount = $credit - $debit + $account->cash_in_credit - $account->cash_out_debit ;
        }
        return view('account.accountTable',['accounts'=>$data]);
    }

    public function accountForm(){
        return view('account.accountForm');
    }
    public function accountStore(Request $req)
    {
        $account = Account::latest('created_at')->first();
        $data = new Account();
        $data->description = $req->description;
        // $data->invoice_no = $req->invoice_no;
        $data->cash_out_debit = $req->cash_out;
        $data->cash_in_credit = $req->cash_in;
        // if ($req->type === "cash-out") {
        //     $data->cash_in_credit = '0';
        //     $data->cash_out_debit = $req->amount;
        // } else {
        //     $data->cash_in_credit = $req->amount;
        //     $data->cash_out_debit = '0';
        // }
        $data->date = Carbon::now()->format('Y-m-d');
        // if($account){
        //     if($req->type === "cash-out"){

        //         $data->balanced_amount = ($account->balanced_amount - $req->amount);
        //     }else{
        //         $data->balanced_amount = ($account->balanced_amount + $req->amount);

        //     }

        // }else{
        //     if($req->type === "cash-in"){

        //         $data->balanced_amount = $req->amount;
        //     }else{

        //         $data->balanced_amount = '0';
        //     }

        // }
        $result = $data->save();
        if ($result) {
            return back()->with('success', 'Your Acoount Updated Successfully');
        } else {
            return back()->with('fail', 'something went wrong,try again');
        }
    }
    public function accountEdit(Request $req){
        $data = Account::find($req->id);
        $data->description = $req->description;
        $data->cash_in_credit = $req->cash_in;
        $data->cash_out_debit = $req->cash_out;
        $result = $data->save();
        if ($result) {
            return back()->with('success', 'Your Acoount Edited Successfully');
        } else {
            return back()->with('fail', 'something went wrong,try again');
        }
    }
    function accountDelete($id)
    {
        $data = Account::find($id);
        $data->delete();
        return back()->with('success','Your Acoount Edited Successfully');
    }

    // Acount Master

    public function accountMasterForm(){
        return view('account.accountMasterForm');
    }
    public function accountMasterStore(Request $req){
        $data = new AccountMaster();
        $data->client_name = $req->client_name;
        $data->invoice_no = $req->invoice_no;
        $data->description = $req->description;
        $data->invoice_date = $req->invoice_date;
        $data->lpo = $req->lpo;
        $data->amount = $req->amount;
        $data->credit = $req->credit;
        $data->due = $req->due;
        $data->remark = $req->remark;

        $result = $data->save();
        if ($result) {
            return back()->with('success', 'Your Acoount Master Added Successfully');
        } else {
            return back()->with('fail', 'something went wrong,try again');
        }

    }

}
