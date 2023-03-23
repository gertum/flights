<?php

namespace App\Http\Controllers;

use App\Models\City;

class CityController extends Controller
{
    public function list() {
        return view('city_list', ['cities'=>City::query()->get()]);
    }
}
