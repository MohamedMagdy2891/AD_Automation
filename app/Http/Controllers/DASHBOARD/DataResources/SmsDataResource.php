<?php

namespace App\Http\Controllers\DASHBOARD\DataResources;

use App\Http\Controllers\Support\SMS as SupportSMS;
use App\Models\SMS;
use App\Models\SmsMessage;

class SmsDataResource{


    public function __construct()
    {
        $rows = SMS::get()->all();
        if(count($rows) == 0){
            $this->createOne('alghad');
        }
    }

    public function getAll()
    {
        $rows = SMS::get()->all();
        return $rows;
    }
    public function getAllMessages()
    {
        $rows = SmsMessage::latest()->paginate(15);
        return $rows;
    }

    public function createOne($gateway)
    {
        $row = new SMS();
        $row->gateway = $gateway;
        $row->save();
        return $row;
    }

    public function getOne()
    {
        $row = SMS::take(1)->first();
        return $row;
    }

    public function updateOne($gateway)
    {
        $row = SMS::take(1)->first();
        if($row->gateway != $gateway ){
            $row->gateway = $gateway;
            $row->update();
            return $row;
        }else{
            return null;
        }

    }


    public function sendOneMessage($phone,$message)
    {
        $row = new SmsMessage();
        $row->phone = $phone;
        $row->message = $message;
        $row->gateway = $this->getOne()->gateway;
        $sms = new SupportSMS();
        if($sms->sendMessage($phone,$message)['status'] == true){
            $row->save();
            return $row;

        }else{
            return null;
        }
    }


}
