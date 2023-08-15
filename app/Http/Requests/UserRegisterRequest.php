<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends CustomMessageRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'max:12', 'min:5', 'regex:/^[a-zA-Z0-9]*$/'],
        ];
    }

    public function messages()
    {
        return $this->customMessages();
    }
}
