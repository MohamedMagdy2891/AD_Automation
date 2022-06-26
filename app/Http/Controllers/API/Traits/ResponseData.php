<?php

    namespace App\Http\Controllers\API\Traits;

    trait ResponseData{

        public function Data($data, $message , $status = false , $code = 500){
            return response()->json([
                'data' => $data,
                'message' => $message,
                'status' => $status
            ])->setStatusCode($code);

        }
    }
