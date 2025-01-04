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
use Illuminate\Support\Facades\Route;

// **************************************************************
// **************************************************************
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
Route::get("lawyers/rate/{n}", [LawyerController::class, "rate"]);
Route::get("lawyers/experience_years/{range}", [LawyerController::class, "experience_years"]);
Route::get("lawyers/price/{range}", [LawyerController::class, "price"]);
Route::get("lawyers/category/{id}", [LawyerController::class, "category"]);
Route::get("lawyers/free", [LawyerController::class, "free"]);
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