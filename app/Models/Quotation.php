<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;
    protected $fillable = ['ref_no','date','ms','po_box','phone_no','email','kind_attn','project_name','projects','conditon','total_amount','vat_amount','total_net_amount'];
}
