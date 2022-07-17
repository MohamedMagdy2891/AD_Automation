<?php

namespace App\Http\Controllers\Support;

use App\Models\SMS as ModelsSMS;
use Illuminate\Support\Facades\Http;

class SMS{
    public function sendMessage($number,$message){
        $row = ModelsSMS::take(1)->first();
        if($row == 'netpowers'){
            $sms = new NetPowersSMS($number,$message);
            return $sms->sendMessage();
        }
        else{
            $sms = new AlGhadSMS($number,$message);
            return $sms->sendMessage();
        }
    }
}

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
        $response = Http::get('http://sms.netpowers.net/http/api.php', [
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

