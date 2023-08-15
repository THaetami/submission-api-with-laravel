<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mscustomer extends Model
{
    use HasFactory;
    protected $primaryKey = 'cus_id';

    protected $fillable = [
        'cus_id',
        'cus_nm',
        'cus_tanggallahir',
        'cus_kta_id',
        'cus_aktif',
    ];

    public function mskota()
    {
        return $this->belongsTo(mskota::class, 'cus_kta_id', 'kta_id');
    }

    public function trpenjualan()
    {
        return $this->hasMany(trpenjualan::class, 'jul_cus_id', 'cus_id');
    }
}
