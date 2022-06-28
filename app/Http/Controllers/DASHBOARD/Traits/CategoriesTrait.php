<?php
namespace App\Http\Controllers\DASHBOARD\Traits;

trait CategoriesTrait{
    public function getCategories()
    {
        return [
            [
                "id" => 0,
                "ar_name"=> "اقتصادية",
                "en_name"=> "Economic",
            ],
            [
                "id" => 1,
                "ar_name"=> "كومباكت",
                "en_name"=> "Compact",
            ],
            [
                "id" => 2,
                "ar_name"=> "مميزة",
                "en_name"=> "Featured",
            ],
            [
                "id" => 3,
                "ar_name"=> "باص",
                "en_name"=> "Bus",
            ],
            [
                "id" => 4,
                "ar_name"=> "سيدان صغيرة",
                "en_name"=> "Small Sedan",
            ],
            [
                "id" => 5,
                "ar_name"=> "سيدان متوسطة",
                "en_name"=> "Medium Sedan",
            ],
            [
                "id" => 6,
                "ar_name"=> "سيدان كبيرة",
                "en_name"=> "Big Sedan",
            ],
            [
                "id" => 7,
                "ar_name"=> "عائلية اقتصادية",
                "en_name"=> "Economical Family",
            ],
            [
                "id" => 8,
                "ar_name"=> "عائلية متوسطة",
                "en_name"=> "Medium Family",
            ],
            [
                "id" => 9,
                "ar_name"=> "عائلية كبيرة",
                "en_name"=> "Big Family",
            ],
            [
                "id" => 10,
                "ar_name"=> "فخمة صغيرة",
                "en_name"=> "Small Luxury",
            ],
            [
                "id" => 11,
                "ar_name"=> "فخمة متوسطة",
                "en_name"=> "Medium Luxury",
            ],
            [
                "id" => 12,
                "ar_name"=> "فخمة كبيرة",
                "en_name"=> "Big Luxury",
            ],


         ];
    }
}
