<?php

namespace App\Http\Controllers\DASHBOARD\DataResources;

use App\Models\Client;

class ClientDataResource{

    public function getAll()
    {
        $rows = Client::latest()->paginate();
        return $rows;
    }

    public function getAllActiveClient()
    {
        $rows = Client::query()->where('verification_status',true)->latest()->paginate();
        return $rows;
    }

    public function getOne($id)
    {
        $row = Client::find($id);
        return $row;
    }

    public function updateOne($id,$full_name,$verification_status)
    {
        $row = Client::find($id);
        if($row->full_name != $full_name || $row->verification_status != $verification_status){
            $row->full_name = $full_name;
            $row->verification_status = $verification_status;
            $row->update();
            return $row;
        }
        else{
            return null;
        }
    }

}
