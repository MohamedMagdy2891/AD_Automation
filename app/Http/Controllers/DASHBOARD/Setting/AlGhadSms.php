<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Support\Facades\Http;

class AlGhadSMS{

    public $recepientNumber;
    public $message;
    public $username = "966554001172";
    public $key = "ofalt1i0lrpn";
    public $senderId = "Abudiyab";


    public function __construct($_recepientNumber,$_message)
    {
        $this->recepientNumber = $_recepientNumber;
        $this->message = $_message;
    }

    public function sendMessage(){
        $response = Http::get('https://alghaddm.com/sms/api.php', [
            'username' => $this->username,
            'key' => $this->key,
            'sender' => $this->senderId,
            'RecepientNumber' => $this->recepientNumber,
            'Message' => $this->message,
        ]);
        if($response->status() == 200 && $response->ok() == true &&$response->successful() == true){
            return $result = ['status' => true,'message'=> 'Done'];
        }
        else if ($response->serverError() == true){
            return $result = ['status' => false,'message'=> 'Server Error'];
        }
        else if($response->clientError() == true){
            return $result = ['status' => false,'message'=> 'Client Error'];
        }
        else if($response->failed() == true){
            return $result = ['status' => false,'message'=> 'Response Failed'];
        }
        else{
            return $result = ['status' => false,'message'=> 'Failed'];
        }
    }
}
