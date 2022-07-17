<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Support\Facades\Http;

class NetPowersSMS{

    public $recepientNumber;
    public $message;
    public $id = "rent@abudiab";
    public $password = "rent@cars@22";
    public $sender = "KSA DAY";

    public function __construct($_recepientNumber,$_message)
    {
        $this->recepientNumber = $_recepientNumber;
        $this->message = $_message;
    }

    public function sendMessage(){
        $response = Http::post('http://sms.netpowers.net/http/api.php', [
            'id' => $this->id,
            'password' => $this->password,
            'to' => $this->recepientNumber,
            'sender' => $this->sender,
            'msg' => $this->message,
        ]);
        if($response->status() == 200 && $response->ok() == true &&$response->successful() == true){
            return $result = ['status' => true,'message'=> 'Done'];
        }
        else if ($response->serverError() == true){
            return $result = ['false' => true,'message'=> 'Server Error'];
        }
        else if($response->clientError() == true){
            return $result = ['false' => true,'message'=> 'Client Error'];
        }
        else if($response->failed() == true){
            return $result = ['false' => true,'message'=> 'Response Failed'];
        }
        else{
            return $result = ['false' => true,'message'=> 'Failed'];
        }
    }
}
