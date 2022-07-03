<?php

namespace App\Http\Controllers\DASHBOARD\DataResources;

use App\Models\Garage;
use App\Models\Area;

class GarageDataResource{


    public function getAll()
    {
        $rows = Garage::latest()->paginate(15);
        return $rows;
    }

    public function getAllArea()
    {
        $rows = Area::get()->all();
        return $rows;
    }

    public function createOne($ar_garage,$en_garage,$area_id,$lat,$lang)
    {
        $row = new Garage();
        $row->ar_garage = $ar_garage;
        $row->en_garage = $en_garage;
        $row->area_id = $area_id;
        $row->lat = $lat;
        $row->lang = $lang;
        $row->save();
        return $row;
    }

    public function getOne($id)
    {
        $row = Garage::findOrFail($id);
        return $row;
    }

    public function updateOne($id,$ar_garage,$en_garage,$area_id,$lat,$lang)
    {
        $row = Garage::findOrFail($id);
        if($row->ar_garage != $ar_garage || $row->en_garage != $en_garage || $row->area_id != $area_id || $row->lat != $lat || $row->lang != $lang){
            $row->ar_garage = $ar_garage;
            $row->en_garage = $en_garage;
            $row->area_id = $area_id;
            $row->lat = $lat;
            $row->lang = $lang;
            $row->update();
            return $row;
        }else{
            return null;
        }

    }

    public function deleteOne($id)
    {
        $row = Garage::findOrFail($id);
        $ar_garage = $row->ar_garage;
        $row->delete();
        return $ar_garage;
    }

    public function deleteAllData()
    {
        $rows = Garage::get()->all();
        foreach($rows as $row){
            $row->delete();
        }
    }

    public function garageSearch($ar_garage)
    {
        $rows = Garage::query()->where('ar_garage','LIKE','%'.$ar_garage.'%')->paginate(15);
        return $rows;
    }
}
