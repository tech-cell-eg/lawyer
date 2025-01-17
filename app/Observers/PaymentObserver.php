<?php

namespace App\Observers;

use App\Models\Payment;
use App\Notifications\UserNotification;

class PaymentObserver
{
    public function created(Payment $payment): void
    {
        $data = [
            'title' => "New Payment!",
            'msg' => "You payment is successful!"
        ];
        if (auth('sanctum')->check()) {
            auth('sanctum')->user->notify(new UserNotification($data));
        }
    }
}
