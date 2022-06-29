<?php

namespace App\Http\Controllers\DASHBOARD\DataResources;

use App\Models\Car;

class CarDataResource{

    public function getAll()
    {
        $rows = Car::latest()->paginate(15);
        return $rows;
    }


    public function createOne($ar_name,$en_name,$code,$color,$status_id,$model_id,$garage_id,$category_id,$car_model_year,$no_doors,$no_bags,$car_type,
    $price_per_hour,$discount_per_hour,$discount_price_per_hour,
    $price_per_half_day,$discount_per_half_day,$discount_price_per_half_day,
    $price_per_day,$discount_per_day,$discount_price_per_day,
    $insurance,$insurance_price,
    $extra_driver,$extra_driver_price,
    $shield,$shield_price,
    $baby_seat,$baby_seat_price,
    $open_kilometers,$open_kilometers_price)
    {
        $row = new Car();
        $row->ar_name = $ar_name;
        $row->en_name = $en_name;
        $row->code = $code;
        $row->color = $color;
        $row->status_id = $status_id;
        $row->model_id = $model_id;
        $row->garage_id = $garage_id;
        $row->category_id = $category_id;
        $row->car_model_year = $car_model_year;
        $row->no_doors = $no_doors;
        $row->no_bags = $no_bags;
        $row->car_type = $car_type;

        /************/
        $row->price_per_hour = $price_per_hour;
        $row->discount_per_hour = $discount_per_hour;
        $row->discount_price_per_hour = $discount_price_per_hour;

        /************/
        $row->price_per_half_day = $price_per_half_day;
        $row->discount_per_half_day = $discount_per_half_day;
        $row->discount_price_per_half_day = $discount_price_per_half_day;

        /************/
        $row->price_per_day = $price_per_day;
        $row->discount_per_day = $discount_per_day;
        $row->discount_price_per_day = $discount_price_per_day;

        /************/
        $row->insurance = $insurance;
        $row->insurance_price = $insurance_price;

        /************/
        $row->extra_driver = $extra_driver;
        $row->extra_driver_price = $extra_driver_price;

        /************/
        $row->shield = $shield;
        $row->shield_price = $shield_price;


        /************/
        $row->baby_seat = $baby_seat;
        $row->baby_seat_price = $baby_seat_price;


        /************/
        $row->open_kilometers = $open_kilometers;
        $row->open_kilometers_price = $open_kilometers_price;




        $row->save();
        return $row;
    }

    public function getOne($id)
    {
        $row = Car::findOrFail($id);
        return $row;
    }

    public function updateOne($id,$ar_name,$en_name,$code,$color,$status_id,$model_id,$garage_id,$category_id,$car_model_year,$no_doors,$no_bags,$car_type,
    $price_per_hour,$discount_per_hour,$discount_price_per_hour,
    $price_per_half_day,$discount_per_half_day,$discount_price_per_half_day,
    $price_per_day,$discount_per_day,$discount_price_per_day,
    $insurance,$insurance_price,
    $extra_driver,$extra_driver_price,
    $shield,$shield_price,
    $baby_seat,$baby_seat_price,
    $open_kilometers,$open_kilometers_price)
    {
        $row = Car::findOrFail($id);
        if($row->ar_name != $ar_name || $row->en_name != $en_name || $row->code != $code || $row->color != $color || $row->status_id != $status_id || $row->model_id != $model_id || $row->garage_id != $garage_id ||
        $row->category_id != $category_id || $row->car_model_year != $car_model_year || $row->no_doors != $no_doors || $row->no_bags != $no_bags || $row->car_type != $car_type ||

        $row->price_per_hour != $price_per_hour || $row->discount_per_hour != $discount_per_hour || $row->discount_price_per_hour != $discount_price_per_hour ||
        $row->price_per_half_day != $price_per_half_day || $row->discount_per_half_day != $discount_per_half_day || $row->discount_price_per_half_day != $discount_price_per_half_day ||
        $row->price_per_day != $price_per_day || $row->discount_per_day != $discount_per_day || $row->discount_price_per_day != $discount_price_per_day ||

        $row->insurance != $insurance || $row->insurance_price != $insurance_price ||
        $row->extra_driver != $extra_driver || $row->extra_driver_price != $extra_driver_price ||
        $row->shield != $shield || $row->shield_price != $shield_price ||
        $row->baby_seat != $baby_seat || $row->baby_seat != $baby_seat ||
        $row->open_kilometers != $open_kilometers || $row->open_kilometers_price != $open_kilometers_price ){
            $row->ar_name = $ar_name;
            $row->en_name = $en_name;
            $row->code = $code;
            $row->color = $color;
            $row->status_id = $status_id;
            $row->model_id = $model_id;
            $row->garage_id = $garage_id;
            $row->category_id = $category_id;
            $row->car_model_year = $car_model_year;
            $row->no_doors = $no_doors;
            $row->no_bags = $no_bags;
            $row->car_type = $car_type;

            /************/
            $row->price_per_hour = $price_per_hour;
            $row->discount_per_hour = $discount_per_hour;
            $row->discount_price_per_hour = $discount_price_per_hour;

            /************/
            $row->price_per_half_day = $price_per_half_day;
            $row->discount_per_half_day = $discount_per_half_day;
            $row->discount_price_per_half_day = $discount_price_per_half_day;

            /************/
            $row->price_per_day = $price_per_day;
            $row->discount_per_day = $discount_per_day;
            $row->discount_price_per_day = $discount_price_per_day;

            /************/
            $row->insurance = $insurance;
            $row->insurance_price = $insurance_price;

            /************/
            $row->extra_driver = $extra_driver;
            $row->extra_driver_price = $extra_driver_price;

            /************/
            $row->shield = $shield;
            $row->shield_price = $shield_price;


            /************/
            $row->baby_seat = $baby_seat;
            $row->baby_seat_price = $baby_seat_price;


            /************/
            $row->open_kilometers = $open_kilometers;
            $row->open_kilometers_price = $open_kilometers_price;

            $row->update();
            return $row;
        }else{
            return null;
        }

    }

    public function deleteOne($id)
    {
        $row = Car::findOrFail($id);
        $ar_name = $row->ar_name;
        $row->delete();
        return $ar_name;
    }

    public function deleteAllData()
    {
        $rows = Car::get()->all();
        foreach($rows as $row){
            $row->delete();
        }
    }

    public function CarSearch($code)
    {
        $rows = Car::query()->where('code','LIKE','%'.$code.'%')->paginate(15);
        return $rows;
    }
}
