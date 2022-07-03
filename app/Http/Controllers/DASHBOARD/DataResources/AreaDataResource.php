<?php

namespace App\Http\Controllers\DASHBOARD\DataResources;

use App\Models\Area;
use App\Models\Region;

class AreaDataResource{


    public function getAll()
    {
        $rows = Area::latest()->paginate(15);
        return $rows;
    }

    public function getAllRegions()
    {
        $rows = Region::get()->all();
        return $rows;
    }

    public function createOne($ar_area,$en_area,$region_id,$lat,$lang)
    {
        $row = new Area();
        $row->ar_area = $ar_area;
        $row->en_area = $en_area;
        $row->region_id = $region_id;
        $row->lat = $lat;
        $row->lang = $lang;
        $row->save();
        return $row;
    }

    public function getOne($id)
    {
        $row = Area::findOrFail($id);
        return $row;
    }

    public function updateOne($id,$ar_area,$en_area,$region_id,$lat,$lang)
    {
        $row = Area::findOrFail($id);
        if($row->ar_area != $ar_area || $row->en_area != $en_area || $row->region_id != $region_id || $row->lat != $lat || $row->lang != $lang){
            $row->ar_area = $ar_area;
            $row->en_area = $en_area;
            $row->region_id = $region_id;
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
        $row = Area::findOrFail($id);
        $ar_area = $row->ar_area;
        $row->delete();
        return $ar_area;
    }

    public function deleteAllData()
    {
        $rows = Area::get()->all();
        foreach($rows as $row){
            $row->delete();
        }
    }

    public function areaSearch($ar_area)
    {
        $rows = Area::query()->where('ar_area','LIKE','%'.$ar_area.'%')->paginate(15);
        return $rows;
    }
}
