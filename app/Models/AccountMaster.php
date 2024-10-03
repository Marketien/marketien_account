<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountMaster extends Model
{
    use HasFactory;
    protected $fillable = ['client_name','invoice_no','description','invoice_date','lpo','amount','credit','due','remark'];
}
