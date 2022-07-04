<?php

namespace App\Http\Controllers\DASHBOARD\DataResources;

use App\Models\SMS;

class SmsDataResource{


    public function getAll()
    {
        $rows = SMS::get()->all();
        if(count($rows) == 0){
            $this->createOne('alghad');
        }
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


}
