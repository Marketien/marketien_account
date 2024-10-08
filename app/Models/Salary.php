<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $fillable = ['employee_name','basic','holyday_ot','weekday_ot','food','other','other_due','project_bonus','salary','deduction','net_salary'];
}
