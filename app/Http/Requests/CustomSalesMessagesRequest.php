<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomSalesMessagesRequest extends FormRequest
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
    public function customSalesMessages()
    {
        return [
            'sal_nm.required' => 'sal_nm harus diisi.',
            'sal_nm.min' => 'sal_nm minimal :min karakter.',
            'sal_nm.unique' => 'sal_nm sudah digunakan.',
            'sal_nm.regex' => 'Gunakan karakter alphabet dan spasi untuk sal_nm.',

            'sal_bekerjasejak.required' => 'sal_bekerjasejak harus diisi.',
            'sal_bekerjasejak.date' => 'format tanggal salah.',

            'sal_kta_id.required' => 'sal_kta_id harus diisi'
        ];
    }
}
