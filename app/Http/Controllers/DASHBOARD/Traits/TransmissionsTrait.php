<?php
namespace App\Http\Controllers\DASHBOARD\Traits;

trait TransmissionsTrait{
    public function getTransmissions()
    {
        return [
            [
                "id" => 0,
                "ar_name"=> "ناقل  حركة أوتوماتيكي",
                "en_name"=> "Automatic Transmission",
            ],
            [
                "id" => 1,
                "ar_name"=> "ناقل حركة يدوي",
                "en_name"=> "Manual Transmission",
            ],


         ];
    }
}
