<?php
namespace App\Http\Controllers\DASHBOARD\Traits;

trait StatusTrait{
    public function getStatus()
    {
        return [
            [
                "id" => 0,
                "ar_name"=> "تعمل",
                "en_name"=> "Economic",
            ],
            [
                "id" => 1,
                "ar_name"=> "تحت الصيانة",
                "en_name"=> "Compact",
            ],
            [
                "id" => 2,
                "ar_name"=> "معطلة",
                "en_name"=> "Featured",
            ]


         ];
    }
}
