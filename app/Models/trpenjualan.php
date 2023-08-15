<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trpenjualan extends Model
{
    use HasFactory;
    protected $primaryKey = 'jul_id';
    public $incrementing = false;

    protected $fillable = [
        'jul_id',
        'jul_tanggaljual',
        'jul_sal_id',
        'jul_cus_id',
        'jul_notes',
        'jul_tanggalbayar',
        'jul_batal'
    ];

    protected $hidden = ['jul_sal_id', 'jul_cus_id'];

    public function mssalesman()
    {
        return $this->belongsTo(mssalesman::class, 'jul_sal_id', 'sal_id');
    }

    public function mscustomer()
    {
        return $this->belongsTo(mscustomer::class, 'jul_cus_id', 'cus_id');
    }

    public function dtpenjualan()
    {
        return $this->hasMany(dtpenjualan::class, 'djul_jul_id', 'jul_id');
    }

    public function scopeFindByJulSalId($query, $jul_sal_id)
    {
        return $query->where('jul_sal_id', $jul_sal_id)
            ->orderBy('jul_tanggaljual', 'ASC')
            ->first();
    }

}
