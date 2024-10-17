<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\AccountMaster;
use App\Models\InputMaster;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;

class AccountController extends Controller
{
    public function accountTable()
    {
        $data = Account::all();
        foreach ($data as $account) {
            $balance = Account::where('id', '<', $account->id)->get();
            $debit = $balance->sum('cash_out_debit');
            $credit = $balance->sum('cash_in_credit');
            $account->calc_amount = $credit - $debit + $account->cash_in_credit - $account->cash_out_debit;
        }
        return view('account.accountTable', ['accounts' => $data]);
    }

    public function accountForm()
    {
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
    public function accountEdit(Request $req)
    {
        $data = Account::find($req->id);
        $data->description = $req->description;
        $data->cash_in_credit = $req->cash_in;
        $data->cash_out_debit = $req->cash_out;
        $data->date = $req->date;
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
        return back()->with('success', 'Your Acoount Deleted Successfully');
    }
    public function searchAccount(Request $req)
    {
        $data = Account::query();
        if($req->has('dateFrom') && $req->has('dateTo') && !empty($req->input('dateFrom')) && !empty($req->input('dateTo'))){
          $data->whereBetween('date',[$req->dateFrom,$req->dateTo]);
        }
        else{
            if ($req->has('dateFrom') && !empty($req->input('dateFrom'))) {
                $data->whereDate('date', $req->input('dateFrom'));
            }
            if ($req->has('dateTo') && !empty($req->input('dateTo'))) {
                $data->whereDate('date', $req->input('dateTo'));
            }
        }
        if ($req->has('month') && !empty($req->input('month'))) {

            $month = $req->input('month');
            $strtdate = Carbon::create('2024',$month,'01');
            $formatedStart = $strtdate->format('Y-m-d');

            $enddate = Carbon::create('2024',$month,'30');
            $formatedEnd = $enddate->format('Y-m-d');

            $data->whereBetween('date',[$formatedStart,$formatedEnd]);
        }
        $masters = $data->get();
        foreach($masters as $master){
            $balance = $masters->where('created_at','<',$master->created_at);
            $debit = $balance->sum('cash_out_debit');
            $credit = $balance->sum('cash_in_credit');
            $master['calc_amount'] = $credit - $debit + $master->cash_in_credit - $master->cash_out_debit;
        }
        return view(
            'account.searchAccount',
            [
                'accounts' => $masters,

            ]
        );
    }
    public function previewAccount(){
        $data = Account::paginate(20);
        foreach ($data as $account) {
            $balance = Account::where('created_at', '<', $account->created_at)->get();
            $debit = $balance->sum('cash_out_debit');
            $credit = $balance->sum('cash_in_credit');
            $account->calc_amount = $credit - $debit + $account->cash_in_credit - $account->cash_out_debit;
        }

        return view('account.previewAccount',['accounts'=>$data]);
    }
    public function accountPDF(){
        $data = Account::all();
        foreach ($data as $account) {
            $balance = Account::where('created_at', '<', $account->created_at)->get();
            $debit = $balance->sum('cash_out_debit');
            $credit = $balance->sum('cash_in_credit');
            $account->calc_amount = $credit - $debit + $account->cash_in_credit - $account->cash_out_debit;
        }
        $pdf = FacadePdf::loadView('account.pdfAccount',['accounts'=>$data]);
        return $pdf->setPaper('a4', 'letter')->download();
    }

    // Acount Master

    public function generateInvoice()
    {
        $invoice_no = Helper::IdGenerator(new InputMaster(), 'invoice_no', 5, 'QAK');
        return response()->json($invoice_no);
    }
    public function generateRefNo()
    {
        $ref_no = Helper::IdGenerator(new InputMaster(), 'ref_no', 5, 'REF');
        return response()->json($ref_no);
    }

    public function accountMasterForm()
    {
        return view('account.accountMasterForm');
    }
    public function accountMasterStore(Request $req)
    {
        $data = new AccountMaster();
        $input = new InputMaster();
        //acountmaster
        $data->client_name = $req->name;
        $data->invoice_no = $req->invoice_no;
        $data->description = $req->work_scope;
        $data->invoice_date = $req->date;
        $data->lpo = $req->lpo;
        $data->amount = $req->amount_topay;
        $data->credit = $req->credit;
        $data->due = $req->total_net_amount;
        //masterDetail
        $input->to = $req->to;
        $input->address = $req->address;
        $input->phoneNo = $req->phone_no;
        $input->name = $req->name;
        $input->date = $req->date;
        $input->proect_name = $req->project_name;
        $input->email = $req->email;
        $input->ref_no = $req->ref_no;
        $input->invoice_no = $req->invoice_no;
        $input->work_scope = $req->work_scope;
        $input->lpo = $req->lpo;
        $input->trn1 = $req->trn1;
        $input->trn2 = $req->trn2;
        $input->credit = $req->credit;
        $input->term_pay = $req->term_pay;
        $input->projects = json_encode($req->projects);
        $input->amount = $req->amount_topay;
        $input->total_net_amount = $req->total_net_amount;
        $result1 = $data->save();
        $result2 = $input->save();
        if ($result1 && $result2) {
            if ($req->credit > 0) {
                Account::create([
                    'description' => $req->work_scope,
                    'invoice_no' => $req->invoice_no,
                    'cash_in_credit' => $req->credit,
                    'date' => Carbon::now()->format('Y-m-d')
                ]);
            }
            return response([
                'result' => "data stored successfully"
            ]);
        } else {
            return response([
                'result' => "something went wrong"
            ]);
        }
    }
    public function accountMasterTable()
    {
        $data = AccountMaster::all();
        $total_amount = $data->sum('amount');
        $total_credit = $data->sum('credit');
        $total_due = $data->sum('due');
        return view(
            'mainsection.accountlayout',
            [
                'masters' => $data,
                'amount' => $total_amount,
                'credit' => $total_credit,
                'due'   => $total_due
            ]
        );
    }
    public function searchMaster(Request $req)
    {
        $data = AccountMaster::query();
        if ($req->has('date') && !empty($req->input('date'))) {
            $data->whereDate('invoice_date', $req->input('date'));
        }
        if ($req->has('invoice_no') && !empty($req->input('invoice_no'))) {
            $data->where('invoice_no', 'like', '%' . $req->input('invoice_no') . '%');
        }
        if ($req->has('client_name') && !empty($req->input('client_name'))) {
            $data->where('client_name', 'like', '%' . $req->input('client_name') . '%');
        }
        if ($req->has('lpo') && !empty($req->input('lpo'))) {
            $data->where('lpo', 'like', '%' . $req->input('lpo') . '%');
        }
        if ($req->has('month') && !empty($req->input('month'))) {

            $month = $req->input('month');
            $strtdate = Carbon::create('2024',$month,'01');
            $formatedStart = $strtdate->format('Y-m-d');

            $enddate = Carbon::create('2024',$month,'30');
            $formatedEnd = $enddate->format('Y-m-d');

            $data->whereBetween('invoice_date',[$formatedStart,$formatedEnd]);
        }
        $masters = $data->get();
        $total_amount = $data->sum('amount');
        $total_credit = $data->sum('credit');
        $total_due = $data->sum('due');

        return view(
            'account.searchMaster',
            [
                'masters' => $masters,
                'amount' => $total_amount,
                'credit' => $total_credit,
                'due'   => $total_due

            ]
        );
    }

    public function purchaseInvoice($id)
    {

        $data = InputMaster::find($id);

        return view('mainsection.invoiceOrder', ['purchase' => $data,]);
    }
    function accountMasterDelete($id)
    {
        $data = AccountMaster::find($id);
        $data->delete();
        return back()->with('success', 'Your Account Master Deleted Successfully');
    }
    public function account_sms($id)
    {
        $data = AccountMaster::find($id);
        $tel = '8801843884571';
        $message = "your order $data->invoice_no 's date is $data->invoice_date";
        $result = $this->sms_send($tel, $message);
        if ($result) {
            return back()->with('success', 'Sms Sent Successfully');
        } else {
            return back()->with('fail', 'something went wrong,try again');
        }
    }
    function sms_send($phone, $sms)
    {
        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "tqaynG0piLxtv6zgxbNI";
        $senderid = "8809617617020";
        $number = $phone;
        $message = $sms;

        $data = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => $number,
            "message" => $message
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}
