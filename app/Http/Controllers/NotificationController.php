<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Routing\Controllers\HasMiddleware;

class NotificationController extends Controller implements HasMiddleware
{
    use ApiResponse;

    public static function middleware(): array
    {
        return ["auth:sanctum"];
    }

    function notifications() {
        return auth('sanctum')->user()->notifications;
    }

    function index()
    {
        $ids = $this->notifications()->pluck("id")->toArray();
        $data = $this->notifications()->pluck("data")->toArray();
        for ($i = 0; $i < count($data); $i++) $data[$i]["id"] = $ids[$i];
        return $this->success("all notifications", $data);
    }

    function show($id)
    {
        foreach ($this->notifications() as $notification) {
            if ($notification->id == $id) {
                return $this->success("notification found!", $notification);
            }
        }

        return $this->failed(404, "id is not exist!");
    }

    function destroy($id)
    {
        foreach ($this->notifications() as $notification) {
            if ($notification->id == $id) {
                $notification->delete();
                return $this->success("notification deleted!");
            }
        }

        return $this->failed(404, "id is not exist!");
    }
}
