<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function quotationList(){
        $data = Quotation::all();
        return view('mainsection.quotationList',['quotations'=>$data]);
    }
    public function quotationDetail($id){
        $data = Quotation::find($id);
        return view('mainsection.quotation',['quotation'=>$data]);
    }
    public function quotationStore(Request $req){
        $data = new Quotation();
        $data->ref_no = $req->ref_no;
        $data->date = $req->date;
        $data->ms = $req->ms;
        $data->po_box = $req->po_box;
        $data->phone_no = $req->phone_no;
        $data->email = $req->email;
        $data->kind_attn = $req->kind_attn;
        $data->project_name = $req->project_name;
        $data->conditon = $req->conditon;
        $data->projects = json_encode($req->projects);
        $data->total_amount =$req->total_amount;
        $data->vat_amount =$req->vat_amount;
        $data->total_net_amount =$req->total_net_amount;
        $result = $data->save();
        if ($result) {
            return response([
                'result' => "quotation stored successfully"
            ]);
        } else {
            return response([
                'result' => "something went wrong"
            ]);
        }

    }
    function quotationDelete($id)
    {
        $data = Quotation::find($id);
        $data->delete();
        return back()->with('success', 'Your quotation Deleted Successfully');
    }
}
