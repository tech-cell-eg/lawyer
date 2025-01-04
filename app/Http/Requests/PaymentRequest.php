<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "card_id" => ['required', "numeric", 'exists:cards,id'],
            "paid" => ['required', 'in:1,0']
        ];
    }
}
