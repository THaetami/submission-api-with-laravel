<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSalesRequest extends CustomSalesMessagesRequest
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
            'sal_nm' => ['required', 'min:3', 'unique:mssalesmen', 'regex:/^[a-zA-Z ]*$/'],
            'sal_bekerjasejak' => ['required', 'date'],
            'sal_kta_id' => ['required']
        ];
    }

    public function messages()
    {
        return $this->customSalesMessages();
    }
}
