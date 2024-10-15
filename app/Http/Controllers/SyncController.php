<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountMaster;
use App\Models\Attendance;
use App\Models\InputMaster;
use App\Models\Location;
use App\Models\Worker;
use App\Models\Quotation;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SyncController extends Controller
{
    //synData for Online
    // Account
    // function syncAccount()
    // {
    //     $data = Account::all();
    //     return response()->json($data);
    // }
    // function syncAccountStore(Request $req)
    // {
    //     foreach ($req->all() as $accountData) {
    //         Account::create($accountData);
    //     }
    //     return response()->json(['message' => 'Data sent successfully!'], 201);
    // }
    // // AccountMaster
    // function syncAccountMaster()
    // {
    //     $data = AccountMaster::all();
    //     return response()->json($data);
    // }
    // function syncAccountMasterStore(Request $req)
    // {
    //     foreach ($req->all() as $accountData) {
    //         AccountMaster::create($accountData);
    //     }
    //     return response()->json(['message' => 'Data sent successfully!'], 201);
    // }
    // //Input Master

    // function syncInputMaster()
    // {
    //     $data = InputMaster::all();
    //     return response()->json($data);
    // }
    // function syncInputMasterStore(Request $req)
    // {
    //     foreach ($req->all() as $accountData) {
    //         InputMaster::create($accountData);
    //     }
    //     return response()->json(['message' => 'Data sent successfully!'], 201);
    // }
    // //Employee
    // function syncEmployee()
    // {
    //     $data = Worker::all();
    //     return response()->json($data);
    // }
    // function syncEmployeeStore(Request $req)
    // {
    //     foreach ($req->all() as $accountData) {
    //         Worker::create($accountData);
    //     }
    //     return response()->json(['message' => 'Data sent successfully!'], 201);
    // }
    // //Location

    // function syncLocation()
    // {
    //     $data = Location::all();
    //     return response()->json($data);
    // }
    // function syncLocationStore(Request $req)
    // {
    //     foreach ($req->all() as $accountData) {
    //         Location::create($accountData);
    //     }
    //     return response()->json(['message' => 'Data sent successfully!'], 201);
    // }
    // //Attendance
    // function syncAttendance()
    // {
    //     $data = Attendance::all();
    //     return response()->json($data);
    // }
    // function syncAttendanceStore(Request $req)
    // {
    //     foreach ($req->all() as $accountData) {
    //         Attendance::create($accountData);
    //     }
    //     return response()->json(['message' => 'Data sent successfully!'], 201);
    // }
    // //Quotation
    // function syncQuotation(){
    //     $data = Quotation::all();
    //     return response()->json($data);
    // }
    // function syncQuotationStore(Request $req){
    //     foreach($req->all() as $accountData){
    //         Quotation::create($accountData);
    //     }
    //      return response()->json(['message' => 'Data sent successfully!'], 201);
    // }
    ////Salary

    // function syncSalary(){
    //     $data = Salary::all();
    //     return response()->json($data);
    // }
    // function syncSalaryStore(Request $req){
    //     foreach($req->all() as $accountData){
    //         Salary::create($accountData);
    //     }
    //      return response()->json(['message' => 'Data sent successfully!'], 201);
    // }





    public function syncDataForOffline()
    {
        try {
            $response = Http::get('https://account.softplatoon.com');
            if ($response->successful()) {
                $token = 'Qalat_Al_Khaleej';
                $url1 = 'https://account.softplatoon.com/api/sync-account';
                $url2 = 'https://account.softplatoon.com/api/sync-account-master';
                $url3 = 'https://account.softplatoon.com/api/sync-input-master';
                $url4 = 'https://account.softplatoon.com/api/sync-employee';
                $url5 = 'https://account.softplatoon.com/api/sync-location';
                $url6 = 'https://account.softplatoon.com/api/sync-attendance';
                $url7 = 'https://account.softplatoon.com/api/sync-quotation';
                $url8 = 'https://account.softplatoon.com/api/sync-salary';
                $showData1 = [];
                $showData2 = [];
                $showData3 = [];
                $showData4 = [];
                $showData5 = [];
                $showData6 = [];
                $showData7 = [];
                $showData8 = [];

                // Make a GET request to the API
                $response1 = Http::get($url1);
                $response2 = Http::get($url2);
                $response3 = Http::get($url3);
                $response4 = Http::get($url4);
                $response5 = Http::get($url5);
                $response6 = Http::get($url6);
                $response7 = Http::get($url7);
                $response8 = Http::get($url8);

                // $data = [];

                // Check Account
                if ($response1->successful()) {
                    // Decode the JSON response
                    $data1 = $response1->json();
                    $accountX = Account::all();
                    $testCollect1 = collect($data1);

                    foreach ($data1 as $datom1) {
                        $has1 = Account::where('description', $datom1['description'])->where('date', $datom1['date'])->exists();
                        if (!$has1) {
                            $showData1[] = $datom1;
                        }
                    }
                    $testsqx1 = [];
                    foreach ($accountX as $accounty) {
                        $ext1 = $testCollect1->where('description', $accounty['description'])->where('date', $accounty['date'])->first();
                        if (!$ext1) {
                            $testsqx1[] = $accounty;
                        }
                    }


                    // $existingDescriptions1 = collect($data1)->pluck('description')->toArray();
                    // $existingDates1 = collect($data1)->pluck('date')->toArray();

                    // Fetch accounts that do not exist in the response data
                    // $missingAccounts1 = Account::whereNotIn('date', $existingDates1)
                    // ->orWhereNotIn('description', $existingDescriptions1)
                    //     ->get();


                    // Return the data, you can also pass it to a view
                    if ($showData1) {
                        foreach ($showData1 as $showDatom1) {
                            $saveData1 = Account::create([
                                'description' => $showDatom1['description'],
                                'cash_out_debit' => $showDatom1['cash_out_debit'],
                                'cash_in_credit' => $showDatom1['cash_in_credit'],
                                'date' => $showDatom1['date']
                            ]);
                        }
                    }
                    $post1 = 'https://account.softplatoon.com/api/sync-store-account';
                    $postResponse1 = Http::post($post1, $testsqx1);
                    // return response([
                    //     // 'data'  =>    $showData1,
                    //     'account' => $testsqx1,
                    //     // 'test'=>$existingDescriptions1

                    // ]);

                }
                //Check Account Master
                if ($response2->successful()) {
                    $data2 = $response2->json();

                    foreach ($data2 as $datom2) {
                        $has2 = AccountMaster::where('invoice_no', $datom2['invoice_no'])->exists();
                        if (!$has2) {
                            $showData2[] = $datom2;
                        }
                    }

                    $existingDescriptions2 = collect($data2)->pluck('invoice_no')->toArray();

                    // Fetch accounts that do not exist in the response data
                    $missingAccounts2 = AccountMaster::whereNotIn('invoice_no', $existingDescriptions2)
                        ->get();

                    if ($showData2) {
                        foreach ($showData2 as $showDatom2) {
                            $saveData2 = AccountMaster::create($showDatom2);
                        }
                    }
                    $post2 = 'https://account.softplatoon.com/api/sync-store-account-master';
                    $postResponse2 = Http::post($post2, $missingAccounts2);


                    // return response()->json([$missingAccounts2, $showData2]);
                }
                //Check input Master
                if ($response3->successful()) {
                    $data3 = $response3->json();

                    foreach ($data3 as $datom3) {
                        $has3 = InputMaster::where('invoice_no', $datom3['invoice_no'])->exists();
                        if (!$has3) {
                            $showData3[] = $datom3;
                        }
                    }

                    $existingDescriptions3 = collect($data3)->pluck('invoice_no')->toArray();

                    // Fetch accounts that do not exist in the response data
                    $missingAccounts3 = InputMaster::whereNotIn('invoice_no', $existingDescriptions3)
                        ->get();

                    if ($showData3) {
                        foreach ($showData3 as $showDatom3) {
                            $saveData3 = InputMaster::create($showDatom3);
                        }
                    }
                    $post3 = 'https://account.softplatoon.com/api/sync-store-input-master';
                    $postResponse3 = Http::post($post3, $missingAccounts3);

                    // $input = InputMaster::all();
                    // return response()->json([$missingAccounts3, $showData3]);
                    // return response()->json($input);
                }

                //check Employee
                if ($response4->successful()) {
                    $data4 = $response4->json();

                    foreach ($data4 as $datom4) {
                        $has4 = Worker::where('employee_name', $datom4['employee_name'])->exists();
                        if (!$has4) {
                            $showData4[] = $datom4;
                        }
                    }

                    $existingDescriptions4 = collect($data4)->pluck('employee_name')->toArray();

                    // Fetch accounts that do not exist in the response data
                    $missingAccounts4 = Worker::whereNotIn('employee_name', $existingDescriptions4)
                        ->get();

                    if ($showData4) {
                        foreach ($showData4 as $showDatom4) {
                            $saveData4 = Worker::create($showDatom4);
                        }
                    }
                    $post4 = 'https://account.softplatoon.com/api/sync-store-employee';
                    $postResponse4 = Http::post($post4, $missingAccounts4);


                    // return response()->json([$missingAccounts4, $showData4]);

                }
                //Check Location

                if ($response5->successful()) {
                    $data5 = $response5->json();

                    foreach ($data5 as $datom5) {
                        $has5 = Location::where('location_name', $datom5['location_name'])->exists();
                        if (!$has5) {
                            $showData5[] = $datom5;
                        }
                    }

                    $existingDescriptions5 = collect($data5)->pluck('location_name')->toArray();

                    // Fetch accounts that do not exist in the response data
                    $missingAccounts5 = Location::whereNotIn('location_name', $existingDescriptions5)
                        ->get();

                    if ($showData5) {
                        foreach ($showData5 as $showDatom5) {
                            $saveData5 = Location::create($showDatom5);
                        }
                    }
                    $post5 = 'https://account.softplatoon.com/api/sync-store-location';
                    $postResponse5 = Http::post($post5, $missingAccounts5);


                    // return response()->json([$missingAccounts5, $showData5]);

                }
                //Check Attendance
                if ($response6->successful()) {
                    $data6 = $response6->json();
                    $attendanceX = Attendance::all();
                    $testCollect6 = collect($data6);

                    foreach ($data6 as $datom6) {
                        $has6 = Attendance::where('employee_name', $datom6['employee_name'])->where('date', $datom6['date'])->exists();
                        if (!$has6) {
                            $showData6[] = $datom6;
                        }
                    }
                    $testsqx6 = [];
                    foreach ($attendanceX as $attendancey) {
                        $ext6 = $testCollect6->where('employee_name', $attendancey['employee_name'])->where('date', $attendancey['date'])->first();
                        if (!$ext6) {
                            $testsqx6[] = $attendancey;
                        }
                    }

                    // $existingDescriptions6 = collect($data6)->pluck('employee_name')->toArray();
                    // $existingDates6 = collect($data6)->pluck('date')->toArray();

                    // // Fetch accounts that do not exist in the response data
                    // $missingAccounts6 = Attendance::whereNotIn('employee_name', $existingDescriptions6)
                    //     ->WhereNotIn('date',$existingDates6)
                    //     ->get();

                    if ($showData6) {
                        foreach ($showData6 as $showDatom6) {
                            $saveData6 = Attendance::create($showDatom6);
                        }
                    }
                    $post6 = 'https://account.softplatoon.com/api/sync-store-attendance';
                    $postResponse6 = Http::post($post6, $testsqx6);


                    // return response()->json([$testsqx6 , $showData6]);

                }
                //check Quotation
                if ($response7->successful()) {
                    $data7 = $response7->json();

                    foreach ($data7 as $datom7) {
                        $has7 = Quotation::where('ref_no', $datom7['ref_no'])->exists();
                        if (!$has7) {
                            $showData7[] = $datom7;
                        }
                    }

                    $existingDescriptions7 = collect($data7)->pluck('ref_no')->toArray();

                    // Fetch accounts that do not exist in the response data
                    $missingAccounts7 = Quotation::whereNotIn('ref_no', $existingDescriptions7)
                        ->get();

                    if ($showData7) {
                        foreach ($showData7 as $showDatom7) {
                            $saveData7 = Quotation::create($showDatom7);
                        }
                    }
                    $post7 = 'https://account.softplatoon.com/api/sync-store-quotation';
                    $postResponse7 = Http::post($post7, $missingAccounts7);


                    // return response()->json([$missingAccounts7, $showData7]);

                }
                //check salary
                if ($response8->successful()) {
                    $data8 = $response8->json();

                    foreach ($data8 as $datom8) {
                        $has8 = Salary::where('employee_name', $datom8['employee_name'])->exists();
                        if (!$has8) {
                            $showData8[] = $datom8;
                        }
                    }

                    $existingDescriptions8 = collect($data8)->pluck('employee_name')->toArray();

                    // Fetch accounts that do not exist in the response data
                    $missingAccounts8 = Salary::whereNotIn('employee_name', $existingDescriptions8)
                        ->get();

                    if ($showData8) {
                        foreach ($showData8 as $showDatom8) {
                            $saveData8 = Salary::create($showDatom8);
                        }
                    }

                    $post8 = 'https://account.softplatoon.com/api/sync-store-salary';
                    $postResponse8 = Http::post($post8, $missingAccounts8);


                    // return redirect()->back()->with('success', 'Data is synced successfully');
                    return response()->json('success', 200);
                }
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Your Internet connection failed, try again with internet'], 500);
        }
    }
}
