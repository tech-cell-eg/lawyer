<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Traits\ApiResponse;
use Illuminate\Routing\Controllers\HasMiddleware;

class PaymentController extends Controller implements HasMiddleware
{
    use ApiResponse;

    public static function middleware(): array
    {
        return ["auth:sanctum"];
    }

    public function index()
    {
        $payments = Payment::where("user_id", auth('sanctum')->id())->get();
        return $this->success('all payments', $payments);
    }

    public function show($id)
    {
        $payment = Payment::where("user_id", auth('sanctum')->id())->where('id', $id)->first();
        return $this->success('payment found!', $payment);
    }

    public function store(PaymentRequest $request)
    {
        $request["user_id"] = auth('sanctum')->id();
        $payment = Payment::create($request->toArray());
        return $this->success('payment added successfully.', $payment);
    }

}
