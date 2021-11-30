<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTiket extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'kategori_id',
        'qty',
        'total'
    ];

    public function namaKategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'kategori_id');
    }
}