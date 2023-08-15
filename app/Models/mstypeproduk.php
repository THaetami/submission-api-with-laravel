<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mstypeproduk extends Model
{
    use HasFactory;
    protected $primaryKey = 'typ_id';

    protected $fillable = [
        'typ_id',
        'typ_nm',
        'typ_persenkomisi',
        'typ_notes',
        'typ_aktif'
    ];

    public function msproduk()
    {
        return $this->hasMany(msproduk::class, 'prd_typ_id', 'typ_id');
    }
}
