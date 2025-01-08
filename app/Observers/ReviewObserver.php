<?php

namespace App\Observers;

use App\Models\Review;
use App\Notifications\UserNotification;

class ReviewObserver
{
    /**
     * Handle the Review "created" event.
     */
    public function created(Review $review): void
    {
        if ($review->rating == 5) {
            $data = [
                'title' => "Thank You for Your Review!",
                'msg' => "We truly appreciate your 5-star review! Your feedback means the world to us and helps us continue to deliver great service. Thank you for your support!"
            ];
        }

        if ($review->rating == 1) {
            $data = [
                'title' => "We're Sorry to Hear This",
                'msg' => "We're sorry your experience didn’t meet your expectations. Please let us know how we can make things right. Your feedback helps us improve!"
            ];
        }
        if (auth('sanctum')->check()) {
            auth('sanctum')->user->notify(new UserNotification($data));
        }
    }
}
