<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Http\Controllers\AccountController;
use App\Models\AccountMaster;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function(){
         $prev_day = Carbon::now()->subDays(6)->startOfDay();
         $now = Carbon::now();
         $data = AccountMaster::whereBetween('created_at',[$prev_day,$now])->get();
         if($data){

             foreach($data as $account){
                 $tel = '8801843884571';
                 $message = "your order $account->invoice_no 's date is $account->invoice_date";
                 $this->sms_send($tel, $message);
             }
         }
        })->everyMinute();

    }
    function sms_send($phone, $sms)
    {
        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "tqaynG0piLxtv6zgxbNI";
        $senderid = "8809617617020";
        $number = $phone;
        $message = $sms;

        $data = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => $number,
            "message" => $message
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands() : void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
