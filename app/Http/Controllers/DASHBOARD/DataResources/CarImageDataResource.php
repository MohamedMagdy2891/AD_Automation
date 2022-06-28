<?php

namespace App\Http\Controllers\DASHBOARD\DataResources;

use App\Models\CarImage;
use App\Http\Controllers\DASHBOARD\Traits\ImageTrait;
use App\Models\Car;

class CarImageDataResource{
    use ImageTrait;

    public function findCar($id)
    {
        $car = Car::Find($id);
        return $car;
    }

    public function getAll()
    {
        $rows = CarImage::latest()->paginate(4);
        return $rows;
    }

    public function createOne($car_id,$image)
    {
        $row = new CarImage();
        $row->car_id = $car_id;
        $row->image = $this->Image($row,'CarImages',$image);
        $row->save();

        return $car_id;
    }

    public function deleteOne($id)
    {
        $row = CarImage::findOrFail($id);
        $car_id = $row->car_id;
        if($row->image != null){
            unlink($row->image);
        }
        $row->delete();
        return $car_id;
    }

}
