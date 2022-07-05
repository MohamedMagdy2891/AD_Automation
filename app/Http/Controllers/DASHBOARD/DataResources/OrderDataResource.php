<?php

namespace App\Http\Controllers\DASHBOARD\DataResources;

use App\Models\Car;
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

    public function getCar($id)
    {
        $row = Car::find($id);
        return $row;
    }

    public function getOne($id)
    {
        $row = Order::findOrFail($id);
        return $row;
    }
        public function calculateTimeDateDifference($receive_time,$deliver_time){
            $to = \Carbon\Carbon::createFromFormat('Y-m-d  H:s:i',$deliver_time );
            $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $receive_time);
            $diff_in_hours = $from->diffInHours($to);
            return $diff_in_hours;
        }
        public function calculatePrice($hours,$car_id)
        {
            $row=$this->getCar($car_id);

            $price=($row->price_per_hour * $hours)+($row->insurance ? $row->insurance_price : 0 ) ;
            return $price;
        }
    public function updateOne($id,$client_id,$car_id,$receive_place,$deliver_place,$receive_time,$deliver_time,$killometers_consumed,$hours_consumed,$total,$status,$rejection_reason)
    {

        $row = Order::findOrFail($id);
        if($row->client_id != $client_id || $row->car_id != $car_id ||$row->receive_place != $receive_place ||
            $row->deliver_place != $deliver_place|| $row->receive_time !=$receive_time || $row->deliver_time!=$deliver_time
         || $row->killometers_consumed != $killometers_consumed || $row->hours_consumed!=$hours_consumed||
           $row->total!= $total || $row->order_status != $status||$row->reason_of_rejection !=$rejection_reason){

            $car = $this->getCar($car_id);
            $hours=$this->calculateTimeDateDifference($receive_time,$deliver_time);
            $price=$this->calculatePrice($hours,$car_id);
            $row->client_id = $client_id;
            $row->car_id = $car_id;
            $row->receive_place = $receive_place;
            $row->deliver_place = $deliver_place;
            $row->receive_time = $receive_time;
            $row->deliver_time = $deliver_time;
            // $row->killometers_consumed = $killometers_consumed;
            // $row->hours_consumed = $hours_consumed;
            // $row->extra_driver_price = $car->extra_driver_price;
            // $row->shield_price = $car->shield_price;
            // $row->baby_seat_price = $car->baby_seat_price;
            // $row->open_kilometers_price = $car->open_kilometers_price;
            $row->total = $total;
            $row->order_status = $status;
            $row->reason_of_rejection=$rejection_reason;
            $row->total= $price;
            $row->update();
            return $row;
        }else{
            return null;
        }

    }


    public function searchByIdCard($idCard)
    {
        $rows = Order::query()
        ->join('clients', 'clients.id', '=', 'orders.client_id')
        ->where('clients.idCardNumber','LIKE','%'.$idCard.'%')->paginate(15);
        return $rows;
    }

}
