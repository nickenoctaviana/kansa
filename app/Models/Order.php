<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =[
        'no_order',
        'nama_kasir',
        'grand_total',
        'pembayaran',
        'kembalian'
    ];

    public function tiketOrder()
    {
        return $this->hasMany('App\Models\OrderTiket','order_id');
    }

}
