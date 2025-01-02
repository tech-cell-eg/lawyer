<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Traits\ApiResponse;

class LanguageController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $languages = Language::all();
        $data = $languages->pluck("name")->toArray();
        return $this->success("Languages List", $data);
    }
}
