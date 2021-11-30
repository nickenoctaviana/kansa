<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'qty',
        'total'
    ];

    public function kategori()
    {
        return $this->belongsTo('\App\Models\Kategori', 'kategori_id');
    }
}
