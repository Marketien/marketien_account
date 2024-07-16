<?php

namespace App\Http\Controllers;

use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Models\Worker;
use App\Models\Location;
use App\Models\Attendance;
use App\Models\Salary;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function attendanceForm()
    {
        $data1 = Worker::all();
        $data2 = Location::all();
        return view('mainsection.attendanceForm', ['workers' => $data1, 'locations' => $data2]);
    }
    public function storeEmployee(Request $req)
    {
        $data = new Worker();
        $data->employee_name = $req->employee_name;
        $data->designation = $req->designation;
        $data->department = $req->department;
        $result = $data->save();
        if ($result) {
            return back()->with('success', 'Employee Added Successfully');
        } else {
            return back()->with('fail', 'something went wrong,try again');
        }
    }

    public function storeLocation(Request $req)
    {
        $data = new Location();
        $data->location_name = $req->location_name;
        $data->location_code = $req->location_code;
        $result = $data->save();
        if ($result) {
            return back()->with('success', 'Location Added Successfully');
        } else {
            return back()->with('fail', 'something went wrong,try again');
        }
    }
    public function storeAttendance(Request $req)
    {
        $data = new Attendance();
        $data->employee_id = $req->employee_id;
        $data->date = Carbon::now()->format('Y-m-d');
        $data->location_id = $req->location_id;
        $data->attd = $req->attd;
        $data->std_hour = $req->std_hour;
        $data->ot = $req->ot;
        $result = $data->save();
        if ($result) {
            return back()->with('success', 'Attendance Added Successfully');
        } else {
            return back()->with('fail', 'something went wrong,try again');
        }
    }
    public function employeeLocation()
    {
        $data1 = Worker::all();
        $data2 = Location::all();
        return view('mainsection.employeeLocation', ['workers' => $data1, 'locations' => $data2]);
    }
    public function findDateHelper(int $year, int $month)
    {

        $daysInMonth = Carbon::createFromDate($year, $month, 1)->daysInMonth;

        $days = [];
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = Carbon::createFromDate($year, $month, $day);
            $days[] = [
                'date' => $date->format('Y-m-d'),
                'weekday' => $date->format('l') // 'l' format gives full weekday name
            ];
        }

        return $days;
    }
    public function attendance()
    {
        $year = Carbon::now()->format('Y');
        $month = Carbon::now()->format('m');
        $dayNumber = [];
        $daysInMonth = $this->findDateHelper($year, $month);
        // $dayNumber[] = json_decode($daysInMonth, true);
        // Output the days
        // foreach ($dayNumber as $day) {
        //     return $day . "<br>";
        // }
        return $dayNumber;
    }
    public function employeeDetail($id)
    {
        $salary = Salary::where('employee_id', $id)->latest('created_at')->first();
        $data = Attendance::where('employee_id', $id)->get();
        return view('mainsection.employeeDetail', ['attends' => $data, 'salary' => $salary]);
    }
    public function salary(Request $req)
    {
        $data = new Salary();
        $data->employee_id = $req->id;
        $data->basic = $req->basic;
        $data->holyday_ot = $req->holyday_ot;
        $data->weekday_ot = $req->weekday_ot;
        $data->food = $req->food;
        $data->other = $req->other;
        $data->other_due = $req->other_due;
        $data->project_bonus = $req->project_bonus;

        $data->salary = $req->total_net_salary;
        $data->deduction = $req->deduction;
        $data->net_salary = ($req->total_net_salary - $req->deduction);
        $result = $data->save();
        if ($result) {
            return response([
                'result' => "data stored successfully"
            ]);
        } else {
            return response([
                'result' => "something went wrong"
            ]);
        }
    }
    public function payslip($id)
    {
        $year = Carbon::now()->format('Y');
        $month = Carbon::now()->format('m');
        $dayNumber = [];
        $daysInMonth = $this->findDateHelper($year, $month);
        $emp = Worker::where('id',$id)->first();
        $salary = Salary::where('employee_id',$id)->latest('created_at')->first();
        // $dayNumber[] = json_decode($daysInMonth, true);



        foreach ($daysInMonth as &$day) { // Use &$day to modify the original array elements
            $data = Attendance::where('employee_id', $id)
                ->where('date', $day['date']) // Access 'date' as array key
                ->first();

            if ($data) {
                $day['project_location'] = $data->location_id;
                $day['attd'] = $data->attd;
                $day['std_hour'] = $data->std_hour;
                $day['ph'] = $data->ph;
                $day['we'] = $data->we;
                $day['ot'] = $data->ot;
                $day['inc'] = $data->inc;
                $day['base'] = $data->base;

                $day['remarks'] = $data->remarks;
            } else {
                // Handle case where no attendance data is found for that day
                $day['project_location'] = null;
                $day['attd'] = null;
                $day['std_hour'] = null;
                $day['ph'] = null;
                $day['we'] = null;
                $day['ot'] = null;
                $day['inc'] = null;
                $day['base'] = null;
                $day['remarks'] = null;
            }
        }
        return view('mainsection.paySlip',['attendances'=>$daysInMonth,'employee'=>$emp, 'salary'=> $salary]);
        // return $daysInMonth;
    }
}
