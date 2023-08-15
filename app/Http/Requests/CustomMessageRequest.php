<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function customMessages()
    {
        return [
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',

            'password.required' => 'Password harus diisi.',
            'password.max' => 'Password maksimal :max karakter.',
            'password.min' => 'Password minimal :min karakter.',
            'password.regex' => 'Gunakan karakter alfanumerik untuk password.',
        ];
    }
}
