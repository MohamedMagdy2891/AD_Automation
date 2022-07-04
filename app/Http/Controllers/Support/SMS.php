<?php

namespace App\Http\Controllers\Support;

use App\Models\SMS as ModelsSMS;

class SMS{
    public function sendMessage($number,$message){
        $row = ModelsSMS::take(1)->first();
        if($row == 'alghad'){
            $sms = new AlGhadSMS($number,$message);
            return $sms->sendMessage();
        }else if($row == 'netpowers'){
            $sms = new NetPowersSMS($number,$message);
            return $sms->sendMessage();
        }
        else{
            $sms = new AlGhadSMS($number,$message);
            return $sms->sendMessage();
        }
    }
}
