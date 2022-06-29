<?php

namespace App\Http\Controllers\DASHBOARD\DataResources;

use App\Models\CarStatus;
use App\Http\Controllers\DASHBOARD\Traits\ImageTrait;

class CarStatusDataResource{
    use ImageTrait;

    public function getAll()
    {
        $rows = CarStatus::latest()->paginate(15);
        return $rows;
    }

    public function createOne($ar_name,$en_name)
    {
        $row = new CarStatus();
        $row->ar_name = $ar_name;
        $row->en_name = $en_name;
        $row->save();
        return $row;
    }

    public function getOne($id)
    {
        $row = CarStatus::findOrFail($id);
        return $row;
    }

    public function updateOne($id,$ar_name,$en_name)
    {
        $row = CarStatus::findOrFail($id);
        if($row->ar_name != $ar_name || $row->en_name != $en_name){
            $row->ar_name = $ar_name;
            $row->en_name = $en_name;
            $row->update();
            return $row;
        }else{
            return null;
        }

    }

    public function deleteOne($id)
    {
        $row = CarStatus::findOrFail($id);
        $ar_name = $row->ar_name;
        $row->delete();
        return $ar_name;
    }

    public function deleteAllData()
    {
        $rows = CarStatus::get()->all();
        foreach($rows as $row){
            $row->delete();
        }
    }


}
