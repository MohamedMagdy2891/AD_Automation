<?php

namespace App\Http\Controllers\DASHBOARD\DataResources;

use App\Models\Order;

class OrderDataResource{


    public function getAll()
    {
        $rows = Order::latest()->paginate(15);

        return $rows;
    }

    public function createOne($ar_name,$en_name)
    {
        $row = new Order();
        $row->ar_name = $ar_name;
        $row->en_name = $en_name;
        $row->save();
        return $row;
    }

    public function getOne($id)
    {
        $row = Order::findOrFail($id);
        return $row;
    }

    public function updateOne($id,$ar_name,$en_name)
    {
        $row = Order::findOrFail($id);
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
        $row = Order::findOrFail($id);
        $ar_name = $row->ar_name;
        $row->delete();
        return $ar_name;
    }

    public function deleteAllData()
    {
        $rows = Order::get()->all();
        foreach($rows as $row){
            $row->delete();
        }
    }
    public function searchByName($name)
    {
        $rows = Order::query()
        ->join('cars', 'cars.id', '=', 'orders.car_id')
        ->where('code','LIKE','%'.$name.'%')->paginate(15);
        return $rows;
    }

}
