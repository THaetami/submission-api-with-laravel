<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\CodeCleaner\ReturnTypePass;

class mssalesman extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'sal_id';
    public $incrementing = false;

    protected $fillable = [
        'sal_id',
        'sal_nm',
        'sal_bekerjasejak',
        'sal_aktif',
        'sal_kta_id',
    ];

    protected $with = ['mskota','trpenjualan'];
    protected $hidden = ['sal_kta_id'];

    public function mskota()
    {
        return $this->belongsTo(mskota::class, 'sal_kta_id', 'kta_id');
    }

    public function trpenjualan()
    {
        return $this->hasMany(trpenjualan::class, 'jul_sal_id', 'sal_id');
    }

    public function scopeLastSalesId($query)
    {
        return $query->orderBy('sal_id', 'DESC')->select('sal_id')->first();
    }
}
