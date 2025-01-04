<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'holder_name' => ['required', 'string', 'max:255'],
            'card_number' => ['required', 'string', 'unique:cards', 'regex:/^\d{4}-\d{4}-\d{4}-\d{4}$/'],
            'expiry_date' => ['required', 'string', 'regex:/^(0[1-9]|1[0-2])\/([0-9]{2})$/'],
            'cvv' => ['required', 'integer', 'min:100', 'max:999']
        ];
    }
}
