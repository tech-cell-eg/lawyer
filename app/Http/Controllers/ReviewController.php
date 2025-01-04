<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use App\Traits\ApiResponse;
use Illuminate\Routing\Controllers\HasMiddleware;

class ReviewController extends Controller implements HasMiddleware
{
    use ApiResponse;

    public static function middleware(): array
    {
        return ["auth:sanctum"];
    }

    function index() {
        $reviews = Review::where("user_id", auth("sanctum")->id())->get();
        return $this->success("all reviews", $reviews);
    }

    function store(ReviewRequest $request) {
        $request["user_id"] = auth("sanctum")->id();
        $review = Review::create($request->toArray());
        return $this->success("Review Created successfully.", $review);
    }
}
