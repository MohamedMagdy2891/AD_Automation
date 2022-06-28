<?php

namespace App\Http\Controllers\DASHBOARD;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarImageController extends Controller
{
    public function index($id)
    {
        $row = Car::find($id);
        return view('dashboard.car_image.index',compact('row'));
    }
}
