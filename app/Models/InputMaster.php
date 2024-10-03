<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputMaster extends Model
{
    use HasFactory;
    protected $casts = [
        'projects' => 'array'
      ];
      protected $fillable = ['invoice_no','date','lpo','amount','credit','total_net_amount','trn2','trn1','projects','work_scope','term_pay','ref_no','email','proect_name','name','phoneNo','address','to'];
}
