<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mskota extends Model
{
    use HasFactory;
    protected $primaryKey = 'kta_id';
    public $incrementing = false;

    protected $fillable = [
        'kta_id',
        'kta_nm',
        'kta_notes'
    ];

    public function mssalesman()
    {
        return $this->hasMany(mssalesman::class, 'sal_kta_id', 'kta_id');
    }

    public function mscustomer()
    {
        return $this->hasMany(mscustomer::class, 'cus_kta_id', 'kta_id');
    }

}
