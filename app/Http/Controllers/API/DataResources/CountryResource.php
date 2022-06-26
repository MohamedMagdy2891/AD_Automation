<?php

namespace App\Http\Controllers\API\DataResources;

use App\Models\Country;

class CountryResource{
    public function getAllCountries(){
        $countries = Country::get()->all();
        return $countries;
    }
}
