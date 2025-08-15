<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuestRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'teacher_id' => 'required|exists:teachers,id',
            'category' => 'required|string|max:255',
            'appointment_datetime' => 'nullable|date',
            'description' => 'nullable|string',
            'photo' => 'required|string',
        ];
    }
}
