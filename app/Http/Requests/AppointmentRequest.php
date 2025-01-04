<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "lawyer_id" => ["required", "numeric", "exists:lawyers,id"],
            "date" => ["required", "date","after_or_equal:today", "unique:appointments"]
        ];
    }

    public function messages()
    {
        return [
            "date.unique" => "This date has been booked. Please choose another date.",
            "date.after_or_equal" => "You cannot make an appointment in the past."
        ];
    }
}
