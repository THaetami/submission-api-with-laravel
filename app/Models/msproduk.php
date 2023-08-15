<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class msproduk extends Model
{
    use HasFactory;
    protected $primaryKey = 'prd_id';

    protected $fillable = [
        'prd_id',
        'prd_nm',
        'prd_typ_id',
        'prd_aktif',
        'prd_notes',
        'prd_hargamodal',
        'prd_stokawal'
    ];

    public function mstypeproduk()
    {
        return $this->belongsTo(mstypeproduk::class, 'prd_typ_id', 'typ_id');
    }

    public function dtpenjualan()
    {
        return $this->hasMany(dtpenjualan::class, 'djul_prd_id', 'prd_id');
    }
}
