<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\LanguageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// *** Auth
// **************************************************************
Route::post("register", [AuthController::class, "register"]);
Route::post("login", [AuthController::class, "login"]);
Route::post("logout", [AuthController::class, "logout"])->middleware('auth:sanctum');
// **************************************************************
// **************************************************************
// **************************************************************
// *** Category
// **************************************************************
Route::get("categories", [CategoryController::class, "index"]);
// **************************************************************
// **************************************************************
// **************************************************************
// *** Language
// **************************************************************
Route::get("languages", [LanguageController::class, "index"]);
// **************************************************************
// **************************************************************
// **************************************************************
// *** City
// **************************************************************
Route::get("cities", [CityController::class, "index"]);
// **************************************************************
// **************************************************************
// **************************************************************