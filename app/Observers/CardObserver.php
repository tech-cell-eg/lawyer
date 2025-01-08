<?php

namespace App\Observers;

use App\Models\Card;
use App\Notifications\UserNotification;

class CardObserver
{
    /**
     * Handle the Card "created" event.
     */
    public function created(Card $card): void
    {
        $data = [
            'title' => "New Card!",
            'msg' => "Your $card->holder_name Card is stored successful"
        ];
        if (auth('sanctum')->check()) {
            auth('sanctum')->user->notify(new UserNotification($data));
        }
    }

    public function deleted(Card $card): void
    {
        $data = [
            'title' => "Card deleted",
            'msg' => "Your $card->holder_name Card is deleted successful"
        ];

        auth('sanctum')->user->notify(new UserNotification($data));
    }
}
