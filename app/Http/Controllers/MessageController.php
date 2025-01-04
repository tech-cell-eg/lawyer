<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Traits\ApiResponse;
use Illuminate\Routing\Controllers\HasMiddleware;

class MessageController extends Controller implements HasMiddleware
{
    use ApiResponse;

    public static function middleware(): array
    {
        return ["auth:sanctum"];
    }

    public function index()
    {
        $msgs = Message::where('user_id', auth('sanctum')->id())->get();
        return $this->success('all user messages!', $msgs);
    }

    public function show($id)
    {
        $msgs = Message::where('user_id', auth('sanctum')->id())->where('lawyer_id', $id)->get();
        return $this->success('all message with specific lawyer', $msgs);
    }

    public function store(MessageRequest $request)
    {
        $request["user_id"] = auth('sanctum')->id();
        $msg = Message::create($request->toArray());
        return $this->success('message send!', $msg);
    }

    public function destroy(Message $msg)
    {
        $msg->delete();
        return $this->success('message deleted!');
    }

    public function clear()
    {
        $msgs = Message::where('user_id', auth('sanctum')->id())->get();
        foreach ($msgs as $msg) $msg->delete();
        return $this->success('all user messages deleted!');
    }
}
