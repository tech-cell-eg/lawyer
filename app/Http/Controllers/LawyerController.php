<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;
use App\Traits\ApiResponse;

class LawyerController extends Controller
{
    use ApiResponse;

    function handelLawyers($lawyers) 
    {
        foreach ($lawyers as $lawyer) {
            // filter lang and category
            $lawyer["langs"] =  $lawyer->languages->pluck("name")->toArray();
            $lawyer["practice_area"] =  $lawyer->area_of_practice->pluck("name")->toArray();

            // calc rating
            $rate = 0;
            if (count($lawyer->reviews) > 0) {
                foreach ($lawyer->reviews as $review) {
                    $rate += $review->rating;
                }
                $lawyer["rate"] = round(($rate / count($lawyer->reviews)), 1);
            }

            // hide 
            $lawyer->makeHidden("languages", "area_of_practice", "reviews");
        }
    }

    function index() 
    {
        $lawyers = Lawyer::with("languages", "area_of_practice", "reviews")->get();
        $this->handelLawyers($lawyers);
        return $this->success("Lawyers List", $lawyers);
    }

    function rate($rating)
    {
        $lawyers = Lawyer::with("languages", "area_of_practice", "reviews")->get();
        $filtered_lawyers = [];

        foreach ($lawyers as $lawyer) {
            // Calculate rating
            $rate = 0;
            if (count($lawyer->reviews) > 0) {
                foreach ($lawyer->reviews as $review) {
                    $rate += $review->rating;
                }
                $rate = round(($rate / count($lawyer->reviews)), 1);

                // Only include lawyers with specified rating
                if ($rate >= $rating) {
                    // Add required fields
                    $lawyer["langs"] = $lawyer->languages->pluck("name")->toArray();
                    $lawyer["practice_area"] = $lawyer->area_of_practice->pluck("name")->toArray();
                    $lawyer["rate"] = $rate;

                    // Hide relationships
                    
                    $filtered_lawyers[] = $lawyer;
                }
            }
            $lawyer->makeHidden("languages", "area_of_practice", "reviews");
        }

        return $this->success("Lawyers filtered by rating", $filtered_lawyers);
    }

    function experience_years($range)
    {
        $years = explode('-', $range);
        $min_years = $years[0];
        $max_years = $years[1];

        $lawyers = Lawyer::with("languages", "area_of_practice", "reviews")
            ->whereBetween('experience_years', [$min_years, $max_years])
            ->get();

        $this->handelLawyers($lawyers);

        return $this->success("Lawyers filtered by years of experience", $lawyers);
    }

    function price($range)
    {
        $prices = explode('-', $range);
        $min_price = $prices[0];
        $max_price = $prices[1];

        $lawyers = Lawyer::with("languages", "area_of_practice", "reviews")
            ->whereBetween('hour_price', [$min_price, $max_price])
            ->get();

        $this->handelLawyers($lawyers);

        return $this->success("Lawyers filtered by price range", $lawyers);
    }

    function category($id)
    {
        $lawyers = Lawyer::with("languages", "area_of_practice", "reviews")
            ->whereHas('area_of_practice', function ($query) use ($id) {
                $query->where('category_id', $id);
            })
            ->get();

        $this->handelLawyers($lawyers);

        return $this->success("Lawyers filtered by category", $lawyers);
    }

    function free()
    {
        $lawyers = Lawyer::with("languages", "area_of_practice", "reviews")
            ->where('hour_price', 0)
            ->get();
        $this->handelLawyers($lawyers);
        return $this->success("Free lawyers list", $lawyers);
    }
}
