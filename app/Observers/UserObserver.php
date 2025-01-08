<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\UserNotification;

class UserObserver
{
    public function created(User $user): void
    {
        $data['title'] = "$user->name Welcome to lawyerUp";
        $data['msg'] = "Welcome to our web site. you can see all notifications here";

        $user->notify(new UserNotification($data));
    }

    public function updated(User $user): void
    {
        if($user->isDirty('password')) {
            $data = [
                'title' => "password changed!",
                'msg' => "Your password is change at $user->updated_at"
            ];
            $user->notify(new UserNotification($data));
        }
    }
}
