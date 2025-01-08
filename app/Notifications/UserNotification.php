<?php

namespace App\Notifications;
use Illuminate\Notifications\Notification;

class UserNotification extends Notification
{
    public function __construct(public $data) {}

    public function via(): array
    {
        return ['database'];
    }

    public function toArray(): array
    {
        return [
            'title' => $this->data['title'],
            'msg' => $this->data['msg']
        ];
    }
}
