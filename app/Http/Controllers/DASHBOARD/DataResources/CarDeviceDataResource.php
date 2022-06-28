<?php

namespace App\Http\Controllers\DASHBOARD\DataResources;

use App\Models\CarDevice;
use App\Models\Car;

class CarDeviceDataResource{

    public function getAll()
    {
        $rows = CarDevice::latest()->paginate(15);
        return $rows;
    }

    public function getAllCars()
    {
        $rows = Car::get()->all();
        return $rows;
    }

    public function createOne($car_id,$serial_no)
    {
        $row = new CarDevice();
        $row->car_id = $car_id;
        $row->serial_no = $serial_no;
        $row->save();
        return $row;
    }

    public function getOne($id)
    {
        $row = CarDevice::findOrFail($id);
        return $row;
    }

    public function updateOne($id,$car_id,$serial_no)
    {
        $row = CarDevice::findOrFail($id);
        if($row->car_id != $car_id || $row->serial_no != $serial_no){
            $row->car_id = $car_id;
            $row->serial_no = $serial_no;
            $row->update();
            return $row;
        }else{
            return null;
        }

    }

    public function deleteOne($id)
    {
        $row = CarDevice::findOrFail($id);
        $carName = $row->getCar->ar_name;
        $row->delete();
        return $carName;
    }

    public function deleteAllData()
    {
        $rows = CarDevice::get()->all();
        foreach($rows as $row){
            $row->delete();
        }
    }

    public function CarDeviceSearch($serial_no)
    {
        $rows = CarDevice::query()->where('serial_no','LIKE','%'.$serial_no.'%')->paginate(15);
        return $rows;
    }

}
