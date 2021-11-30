<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;
use App\Models\Order;

class Keuangan extends Component
{
    public function render()
    {
        $keuangan = Order::get();
        $keuangan=\DB::table('orders')->select([
            \DB::raw('count(*) as jumlah'),
            \DB::raw('sum(grand_total) as pemasukan'),
            \DB::raw('DATE(created_at) as tanggal')
        ])
        ->groupBy('tanggal')
        ->whereRaw('DATE(created_at)>=?',[date('Y-m-d',strtotime('-30 days'))])
        ->orderBy('tanggal','asc')
        ->get()
        ->toArray();
        
        return view('livewire.laporan.keuangan',compact('keuangan'));
    }

    public function countperhari(){
        
        
    }

}
