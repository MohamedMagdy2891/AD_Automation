<?php

namespace App\Http\Controllers\DASHBOARD\DataResources;

use App\Http\Controllers\Setting\CarSharing;
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

    public function createOne($car_id,$iemi,$vin)
    {
        $car = Car::find($car_id);
        $planet_number = $car->planet_number;
        $name = $car->en_name;

        $carSharing = new CarSharing();
        $data = $carSharing->create($name,$planet_number,$iemi,$vin);
        return $data;
    }

    public function getOne($id)
    {
        $row = CarDevice::findOrFail($id);
        return $row;
    }

    public function updateOne($id,$car_id,$iemi,$vin)
    {
        $row = CarDevice::findOrFail($id);
        if($row->car_id != $car_id || $row->iemi != $iemi || $row->vin != $vin){
            $row->car_id = $car_id;
            $row->iemi = $iemi;
            $row->vin = $vin;
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

    public function CarDeviceSearch($vin)
    {
        $rows = CarDevice::query()->where('vin','LIKE','%'.$vin.'%')->paginate(15);
        return $rows;
    }

}
