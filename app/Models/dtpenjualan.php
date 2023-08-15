<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dtpenjualan extends Model
{
    use HasFactory;
    protected $primaryKey = 'djul_id';

    protected $fillable = [
        'djul_id',
        'djul_jul_id',
        'djul_prd_id',
        'djul_qtyjual',
        'djul_hargasatuan',
    ];

    public function msproduk()
    {
        return $this->belongsTo(msproduk::class, 'djul_prd_id', 'prd_id');
    }

    public function trpenjualan()
    {
        return $this->belongsTo(trpenjualan::class, 'djul_jul_id', 'jul_id');
    }
}
