<?php

namespace App\Observers;

use App\Models\Appointment;
use App\Models\Lawyer;
use App\Notifications\UserNotification;

class AppointmentObserver
{
    /**
     * Handle the Appointment "created" event.
     */
    public function created(Appointment $appointment): void
    {
        $lawyer_name = Lawyer::find($appointment->lawyer_id)?->name;

        $data = [
            'title' => "Appointment booked",
            'msg' => "Your appointment booking is successful with $lawyer_name."
        ];
        if (auth('sanctum')->check()) {
            auth('sanctum')->user->notify(new UserNotification($data));
        }
    }
}
