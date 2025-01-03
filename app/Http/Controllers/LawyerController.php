<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;
use App\Traits\ApiResponse;

class LawyerController extends Controller
{
    use ApiResponse;
    function index() {
        $lawyers = Lawyer::with("languages", "area_of_practice", "reviews")->get();

        foreach ($lawyers as $lawyer) {
            // filter lang and category
            $lawyer["langs"] =  $lawyer->languages->pluck("name")->toArray();
            $lawyer["practice_area"] =  $lawyer->area_of_practice->pluck("name")->toArray();

            // calc rating
            $rate = 0;
            foreach ($lawyer->reviews as $review) {
                $rate += $review->rating;
            }
            $lawyer["rate"] = round(($rate / count($lawyer->reviews)),1);

            // hide 
            $lawyer->makeHidden("languages", "area_of_practice", "reviews");
        }


        return $this->success("Lawyers List", $lawyers);
    }
}
