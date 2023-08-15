<?php

namespace App\Http\Controllers;

use App\Helpers\JsonResponseHelper;
use App\Http\Requests\AddSalesRequest;
use App\Http\Requests\UpdateSalesRequest;
use App\Models\mskota;
use App\Models\mssalesman;
use App\Models\trpenjualan;
use Illuminate\Http\Request;

class SalesmanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $salesman = mssalesman::get();

        return JsonResponseHelper::respondSuccess([
            "salesman" => $salesman
        ]);
    }

    public function detail($id)
    {
        $sales = mssalesman::where('sal_id', $id)->first();

        if (!$sales) {
            return JsonResponseHelper::respondErrorNotFound('sales tidak ditemukan');
        }

        return JsonResponseHelper::respondSuccess([
            "salesman" => $sales
        ]);
    }


    public function store(AddSalesRequest $request)
    {
        $data = $request->validated();

        $kota = mskota::where('kta_id', $data['sal_kta_id'])->first();

        if (!$kota) {
            return JsonResponseHelper::respondErrorNotFound('kota tidak ditemukan');
        }

        $sales = mssalesman::lastSalesId();

        $lastNumericPart = $sales->sal_id? intval(substr($sales->sal_id, 1)) : 0;
        $newNumericPart = $lastNumericPart + 1;
        $new_sal_id = 'S' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);

        $data['sal_id'] = $new_sal_id;

        $sales_new = mssalesman::create($data);

        if ($sales_new) {
            return JsonResponseHelper::respondSuccess([
                "addedsales" => [
                    "sales" => $sales_new
                ]
            ], 201);
        } else {
            return JsonResponseHelper::respondFail("user gagal ditambahkan", 400);
        }
    }

    public function update(UpdateSalesRequest $request, $id)
    {
        $sales = mssalesman::where('sal_id', $id)->first();

        if (!$sales) {
            return JsonResponseHelper::respondErrorNotFound('sales tidak ditemukan');
        }

        $data = $request->validated();

        $kota = mskota::where('kta_id', $data['sal_kta_id'])->first();

        if (!$kota) {
            return JsonResponseHelper::respondErrorNotFound('kota tidak ditemukan');
        }

        $sales->update($data);

        return JsonResponseHelper::respondSuccess([
            "updatedsales" => [
                "sales" => $sales
            ]
        ]);
    }

    public function destroy($id)
    {
        $sales = mssalesman::where('sal_id', $id)->first();

        if (!$sales) {
            return JsonResponseHelper::respondErrorNotFound('sales tidak ditemukan');
        }

        $penjualan = trpenjualan::findByJulSalId($id)->first();

        if ($penjualan) {
            return JsonResponseHelper::respondFail('sales tidak boleh dihapus', 422);
        }

        $sales->delete();

        return JsonResponseHelper::respondSuccess([], 204);
    }
}
