<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    use ApiResponse;
    function index() {
        $reviews = Review::where("user_id", auth("sanctum")->id())->get();
        return $this->success("all reviews", $reviews);
    }
}
