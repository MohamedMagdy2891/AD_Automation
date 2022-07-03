<?php

namespace App\Http\Controllers\DASHBOARD\DataResources;

use App\Models\CarCategory;
use App\Http\Controllers\DASHBOARD\Traits\ImageTrait;

class CarCategoryDataResource{
    use ImageTrait;

    public function getAll()
    {
        $rows = CarCategory::latest()->paginate(4);
        return $rows;
    }
    public function getOne($id)
    {
        $row = CarCategory::findOrFail($id);
        return $row;
    }
    public function createOne($ar_name,$en_name)
    {
        $row = new CarCategory();
        $row->ar_name = $ar_name;
        $row->en_name = $en_name;
        $row->save();

        return $ar_name;
    }
    public function updateOne($id,$ar_name,$en_name)
    {
        $row = CarCategory::findOrFail($id);
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
        $row = CarCategory::findOrFail($id);
        $name = $row->ar_name;
        $row->delete();
        return $name;
    }



}
