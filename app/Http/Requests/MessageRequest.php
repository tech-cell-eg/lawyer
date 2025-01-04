<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'lawyer_id' => ['required', 'numeric', 'exists:lawyers,id'],
            'msg' => ['required', 'string']
        ];
    }
}
