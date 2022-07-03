<?php

namespace App\Http\Controllers\DASHBOARD\DataResources;

use App\Models\User;

class UserDataResource{

    public function getAll()
    {
        $rows = User::latest()->paginate(15);
        return $rows;
    }

    public function createOne($ar_name,$en_name)
    {
        $row = new User();
        $row->ar_name = $ar_name;
        $row->en_name = $en_name;
        $row->save();
        return $row;
    }

    public function getOne($id)
    {
        $row = User::findOrFail($id);
        return $row;
    }

    public function updateOne($id,$ar_name,$en_name)
    {
        $row = User::findOrFail($id);
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
        $row = User::findOrFail($id);
        $ar_name = $row->ar_name;
        $row->delete();
        return $ar_name;
    }

    public function deleteAllData()
    {
        $rows = User::get()->all();
        foreach($rows as $row){
            $row->delete();
        }
    }


}
