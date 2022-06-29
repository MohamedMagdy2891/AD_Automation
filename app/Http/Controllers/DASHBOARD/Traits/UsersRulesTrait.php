<?php
namespace App\Http\Controllers\DASHBOARD\Traits;

trait UsersRulesTrait{
    public function usersRules()
    {
        return [
            [
                'id'=> 0,
                "role"=> "الأدمن",
            ],
            [
                'id'=> 1,
                "role"=> "التسويق",
            ],
            [
                'id'=> 2,
                "role"=> "مستخدم عادي ",
            ]

         ];
    }
}
