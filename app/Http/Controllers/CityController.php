<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    use ApiResponse;
    function index() {
        $cities = City::all();
        $data = $cities->pluck("name", "id")->toArray();
        return $this->success("cities List", $data);
    }
}
