<?php

namespace App\Http\Controllers;

use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Models\Worker;
use App\Models\Location;
use App\Models\Attendance;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function attendanceForm(){
        $data1 = Worker::all();
        $data2 = Location::all();
        return view('mainsection.attendanceForm',['workers'=>$data1,'locations'=>$data2]);
    }
    public function storeEmployee(Request $req){
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

    public function storeLocation(Request $req){
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
    public function storeAttendance(Request $req){
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
    public function employeeLocation(){
        $data1 = Worker::all();
        $data2 = Location::all();
        return view('mainsection.employeeLocation',['workers'=>$data1,'locations'=>$data2]);
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

           return json_encode($days);
    }
    public function attendance()
    {
        $year = 2024;
        $month = 2;
        $dayNumber=[];
        $daysInMonth = $this->findDateHelper($year, $month);
        $dayNumber[] = json_decode($daysInMonth);
        // Output the days
        // foreach ($dayNumber as $day) {
        //     return $day . "<br>";
        // }
        return $dayNumber;

    }

}
