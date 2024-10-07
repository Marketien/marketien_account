<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = ['employee_name','date','location_name','attd','std_hour','ph','we','ot','inc','base','remarks'];
}
