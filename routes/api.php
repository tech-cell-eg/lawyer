<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LawyerController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// *** Auth
// **************************************************************
Route::post("register", [AuthController::class, "register"]);
Route::post("login", [AuthController::class, "login"]);
Route::post("logout", [AuthController::class, "logout"]);
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
// *** Lawyer
// **************************************************************
Route::get("lawyers", [LawyerController::class, "index"]);
// **************************************************************
// **************************************************************
// **************************************************************
// *** Review
// **************************************************************
Route::get("reviews", [ReviewController::class, "index"]);
Route::post("reviews", [ReviewController::class, "store"]);
// **************************************************************
// **************************************************************
// **************************************************************
// *** Appointment
// **************************************************************
Route::get("appointments", [AppointmentController::class, "index"]);
Route::post("appointments", [AppointmentController::class, "store"]);
// **************************************************************
// **************************************************************
// **************************************************************
// *** Card
// **************************************************************
Route::apiResource("cards", CardController::class);
// **************************************************************
// **************************************************************
// **************************************************************
// *** Payment
// **************************************************************
Route::apiResource("payments", PaymentController::class);
// **************************************************************
// **************************************************************
// **************************************************************
// *** Message
// **************************************************************
Route::delete("messages/clear", [MessageController::class, 'clear']);
Route::apiResource("messages", MessageController::class);
// **************************************************************
// **************************************************************
// **************************************************************