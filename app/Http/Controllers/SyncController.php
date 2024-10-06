<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountMaster;
use App\Models\Attendance;
use App\Models\InputMaster;
use App\Models\Location;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SyncController extends Controller
{
    public function syncData()
    {
        $token = 'Qalat_Al_Khaleej';
        $url1 = 'https://account.softplatoon.com/api/sync-account';
        $url2 = 'https://account.softplatoon.com/api/sync-account-master';
        $url3 = 'https://account.softplatoon.com/api/sync-input-master';
        $url4 = 'https://account.softplatoon.com/api/sync-employee';
        $url5 = 'https://account.softplatoon.com/api/sync-location';
        $url6 = 'https://account.softplatoon.com/api/sync-attendance';
        $showData1 = [];
        $showData2 = [];
        $showData3 = [];
        $showData4 = [];
        $showData5 = [];
        $showData6 = [];
        // Make a GET request to the API
        $response1 = Http::get($url1);
        $response2 = Http::get($url2);
        $response3 = Http::get($url3);
        $response4 = Http::get($url4);
        $response5 = Http::get($url5);
        $response6 = Http::get($url6);

        // $data = [];

        // Check Account
        if ($response1->successful()) {
            // Decode the JSON response
            $data1 = $response1->json();

            foreach ($data1 as $datom1) {
                $has1 = Account::where('description', $datom1['description'])->where('date', $datom1['date'])->exists();
                if (!$has1) {
                    $showData1[] = $datom1;
                }
            }

            $existingDescriptions1 = collect($data1)->pluck('description')->toArray();
            $existingDates1 = collect($data1)->pluck('date')->toArray();

            // Fetch accounts that do not exist in the response data
            $missingAccounts1 = Account::whereNotIn('description', $existingDescriptions1)
                ->orWhereNotIn('date', $existingDates1)
                ->get();
            // Return the data, you can also pass it to a view
            // if ($showData) {
            //     foreach ($showData as $showDatom) {
            //         $saveData1 = Account::create([
            //             'description' => $showDatom['description'],
            //             'cash_out_debit' => $showDatom['cash_out_debit'],
            //             'cash_in_credit' => $showDatom['cash_in_credit'],
            //             'date' => $showDatom['date']
            //         ]);
            //     }
            // }
            // $post1 = 'https://account.softplatoon.com/api/sync-store-account';
            // $postResponse1 = Http::post($post,$missingAccounts1);

            // return response([
            //     'data'  =>    $showData,
            //     'account' => $missingAccounts

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

            // if ($showData2) {
            //     foreach ($showData2 as $showDatom2) {
            //         $saveData2 = AccountMaster::create($showDatom2);
            //     }
            // }
            // $post2 = 'https://account.softplatoon.com/api/sync-store-account-master';
            // $postResponse2 = Http::post($post2,$missingAccounts2);


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

            // if ($showData3) {
            //     foreach ($showData3 as $showDatom3) {
            //         $saveData3 = InputMaster::create($showDatom3);
            //     }
            // }
            // $post3 = 'https://account.softplatoon.com/api/sync-store-input-master';
            // $postResponse3 = Http::post($post3,$missingAccounts3);

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

            // if ($showData4) {
            //     foreach ($showData4 as $showDatom4) {
            //         $saveData4 = Worker::create($showDatom4);
            //     }
            // }
            // $post4 = 'https://account.softplatoon.com/api/sync-store-employee';
            // $postResponse4 = Http::post($post4,$missingAccounts4);


            // return response()->json([$missingAccounts4, $showData4]);

        }
        //Check Location

        if ($response5->successful()) {
            $data5 = $response5->json();

            foreach ($data5 as $datom5) {
                $has5 =Location::where('location_name', $datom5['location_name'])->exists();
                if (!$has5) {
                    $showData5[] = $datom5;
                }
            }

            $existingDescriptions5 = collect($data5)->pluck('location_name')->toArray();

            // Fetch accounts that do not exist in the response data
            $missingAccounts5 = Location::whereNotIn('location_name', $existingDescriptions5)
                ->get();

            // if ($showData5) {
            //     foreach ($showData5 as $showDatom5) {
            //         $saveData5 = Location::create($showDatom5);
            //     }
            // }
            // $post5 = 'https://account.softplatoon.com/api/sync-store-location';
            // $postResponse5 = Http::post($post5,$missingAccounts5);


            // return response()->json([$missingAccounts5, $showData5]);

        }
        //Check Attendance
        if ($response6->successful()) {
            $data6 = $response6->json();

            foreach ($data6 as $datom6) {
                $has6 =Attendance::where('location_name', $datom6['location_name'])->exists();
                if (!$has6) {
                    $showData6[] = $datom6;
                }
            }

            $existingDescriptions6 = collect($data6)->pluck('location_name')->toArray();

            // Fetch accounts that do not exist in the response data
            $missingAccounts6 = Location::whereNotIn('location_name', $existingDescriptions6)
                ->get();

            // if ($showData6) {
            //     foreach ($showData6 as $showDatom6) {
            //         $saveData6 = Location::create($showDatom6);
            //     }
            // }
            // $post6 = 'https://account.softplatoon.com/api/sync-store-location';
            // $postResponse6 = Http::post($post6,$missingAccounts6);


            // return response()->json([$missingAccounts6, $showData6]);

        }
    }
}
