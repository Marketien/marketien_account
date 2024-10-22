<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SmsController extends Controller
{
    // public function sms()
    // {
    //     $basic  = new \Vonage\Client\Credentials\Basic("8907d8da", "wurXL6eDUM5dJwld");
    //     $client = new \Vonage\Client($basic);
    //     $response = $client->sms()->send(
    //         new \Vonage\SMS\Message\SMS("8801521222080", "Laravel", 'I am Adnan')
    //     );

    //     $message = $response->current();

    //     if ($message->getStatus() == 0) {
    //         echo "The message was sent successfully\n";
    //     } else {
    //         echo "The message failed with status: " . $message->getStatus() . "\n";
    //     }
    // }
    public function sms(){

        $url = "https://api.budgetsms.net/testsms/";
        // $credential[] = [
        //     [
        //     'username'=>'adnan karim',
        //     'userid'  => 26684,
        //     'handle'=>'34f1f6a9ecc0b3566b4a4dc942e80807',
        //     'msg'=>'this is a test',
        //     'from'  => 'test',
        //     'to' => 8801843884571,
        //     ]
        // ];
        $username = 'adnan karim';
        $userid  = '26684';
        $handle = '34f1f6a9ecc0b3566b4a4dc942e80807';
        $msg='this is a test';
        $from  = 'test';
        $to = '8801843884571';
        $fullUrl = $url . '?username='.$username.'&userid='. $userid.'&handle='.$handle.'&msg='.$msg.'&from='.$from.'&to='. $to;
        $response = Http::get($fullUrl);
        return $response;

    }
}
