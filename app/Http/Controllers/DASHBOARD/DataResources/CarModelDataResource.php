<?php

namespace App\Http\Controllers\DASHBOARD\DataResources;

use App\Models\CarModel;
use App\Http\Controllers\DASHBOARD\Traits\ImageTrait;

class CarModelDataResource{
    use ImageTrait;

    public function getAll()
    {
        $rows = CarModel::latest()->paginate(15);
        return $rows;
    }

    public function createOne($ar_name,$en_name,$image)
    {
        $row = new CarModel();
        $row->ar_name = $ar_name;
        $row->en_name = $en_name;
        $row->image = $this->Image($row,'CarModel',$image);
        $row->save();
        return $row;
    }

    public function getOne($id)
    {
        $row = CarModel::findOrFail($id);
        return $row;
    }

    public function updateOne($id,$ar_name,$en_name,$image)
    {
        $row = CarModel::findOrFail($id);
        if($row->ar_name != $ar_name || $row->en_name != $en_name || $image != null){
            $row->ar_name = $ar_name;
            $row->en_name = $en_name;
            if($image != null){
                if($row->image != null){
                    unlink($row->image);
                }
                $row->image = $this->Image($row,'CarModel',$image);
            }
            $row->update();
            return $row;
        }else{
            return null;
        }

    }

    public function deleteOne($id)
    {
        $row = CarModel::findOrFail($id);
        $ar_name = $row->ar_name;
        if($row->image != null){
            unlink($row->image);
        }
        $row->delete();
        return $ar_name;
    }

    public function deleteAllData()
    {
        $rows = CarModel::get()->all();
        foreach($rows as $row){
            if($row->image != null){
                unlink($row->image);
            }
            $row->delete();
        }
    }

    public function carModelSearch($ar_name)
    {
        $rows = CarModel::query()->where('ar_name','LIKE','%'.$ar_name.'%')->paginate(15);
        return $rows;
    }
}
