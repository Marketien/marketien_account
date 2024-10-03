<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountMaster;
use App\Models\InputMaster;
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
        $showData1 = [];
        $showData2 = [];
        $showData3 = [];
        // Make a GET request to the API
        $response1 = Http::get($url1);
        $response2 = Http::get($url2);
        $response3 = Http::get($url3);

        // $data = [];

        // Check if the response is successful
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
            $postResponse3 = Http::post($post3,$missingAccounts3);


            return response()->json([$missingAccounts3, $showData3]);
        }
    }
}
