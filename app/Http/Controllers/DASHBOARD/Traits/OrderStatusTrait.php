<?php
namespace App\Http\Controllers\DASHBOARD\Traits;

trait OrderStatusTrait{
    public function orderStatus()
    {
        return [
            [
                'id'=> 0,
                "status"=> "بانتظار الموافقة",
            ],
            [
                'id'=> 1,
                "status"=> "موافقة",
            ],
            [
                'id'=> 2,
                "status"=> " رفض ",
            ]

         ];
    }
}
