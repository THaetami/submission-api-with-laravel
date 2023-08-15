<?php

namespace App\Http\Requests;

use App\Models\mssalesman;
use App\Models\trpenjualan;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSalesRequest extends CustomSalesMessagesRequest
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
        $salesId = $this->route('id'); // Mendapatkan nilai id dari route

        return [
            'sal_nm' => [
                'required',
                'min:3',
                'regex:/^[a-zA-Z ]*$/',
                function ($attribute, $value, $fail) use ($salesId) {
                    $sales = mssalesman::find($salesId);
                    if ($sales && $sales->sal_nm !== $value) {
                        $exists = mssalesman::where('sal_nm', $value)->exists();
                        if ($exists) {
                            $fail('The ' . $attribute . ' has already been taken.');
                        }
                    }
                },
            ],
            'sal_bekerjasejak' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($salesId) {
                    $existingPenjualan = trpenjualan::findByJulSalId($salesId)->first();

                    if ($existingPenjualan) {
                        if (new \DateTime($value) > new \DateTime($existingPenjualan->jul_tanggaljual)) {
                            $fail('tanggal bekerja tidak benar.');
                        }
                    }
                },
            ],
            'sal_kta_id' => ['required'],
        ];
    }

    public function messages()
    {
        return $this->customSalesMessages();
    }
}
