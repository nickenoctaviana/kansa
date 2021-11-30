<?php

namespace App\Http\Livewire\Invoice;

use Livewire\Component;
use App\Models\Order;

class Riwayat extends Component
{
    public function render()
    {
        $title='Riwayat Transaksi';
        $data = Order::orderBy('created_at','desc')->get();
        
        return view('livewire.invoice.riwayat',compact('title','data'));
    }

    public function total_jumlah_bayar(){
        return $this->sum('pembayaran');
    }
}
