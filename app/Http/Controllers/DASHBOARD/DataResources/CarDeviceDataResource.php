<?php

namespace App\Http\Controllers\DASHBOARD\DataResources;

use App\Http\Controllers\Setting\CarSharing;
use App\Models\CarDevice;
use App\Models\Car;

class CarDeviceDataResource{

    public function getAll()
    {
        $carSharing = new CarSharing();
        if($carSharing->getAll()['status'] == true){
            $rows = $carSharing->getAll()['data']['content'];
        }else{
            $rows = [];
        }
        return [$rows,$carSharing->getAll()['accessToken']];
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

    public function getOneCarDeviceCommand($vin)
    {
        $carSharing = new CarSharing();
        $data= $carSharing->getSingleCarDeviceCommand($vin);
        return $data;

    }

    public function updateOne($vin,$type,$commandId)
    {
        $carSharing = new CarSharing();
        $data= $carSharing->updateCarDeviceCommandStatus($vin,$type,$commandId);

        return $data;
    }




}
