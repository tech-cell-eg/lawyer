<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Models\Card;
use App\Traits\ApiResponse;
use Illuminate\Routing\Controllers\HasMiddleware;

class CardController extends Controller implements HasMiddleware
{
    use ApiResponse;

    public static function middleware(): array
    {
        return ["auth:sanctum"];
    }

    public function index()
    {
        $cards = Card::where("user_id", auth("sanctum")->id())->get();
        return $this->success("all Cards", $cards);
    }

    public function show($card_id)
    {
        $card = Card::where("user_id", auth("sanctum")->id())
        ->where("id", $card_id)->first();
        return $this->success("Card found!", $card);
    }

    public function store(CardRequest $request)
    {
        $request["user_id"] = auth("sanctum")->id();
        $card = Card::create($request->toArray());
        return $this->success("card added successfully.", $card);
    }

    public function destroy($card_id)
    {
        $card = Card::where("user_id", auth("sanctum")->id())
        ->where("id", $card_id)->first();
        $card->delete();
        return $this->success("card deleted successfully.", $card);
    }
}
