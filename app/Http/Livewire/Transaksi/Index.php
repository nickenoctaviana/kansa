<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Component;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\Order;
use App\Models\OrderTiket;

class Index extends Component
{
    public $kategori_id;
    public $pembayaran;
    public $kembalian;
    public $grand_total;

    protected $rules = [
        'kategori_id' => 'required|unique:transaksis'
    ];

    public function submit()
    {
        $this->validate();
        // dd(\DB::table('kategoris')->where('id' , $this->kategori_id)->value('harga'));
        $transaksi = Transaksi::create([
            'kategori_id' => $this->kategori_id,
            'qty' => 1,
            'total' => \DB::table('kategoris')->where('id', $this->kategori_id)->value('harga')
        ]);
        $transaksi->total = $transaksi->kategori->harga;
        $transaksi->save();

        session()->flash('message', 'Tiket berhasil di tambah');
    }

    public function increment($id)
    {
        // dd($id);
        $transaksi = Transaksi::find($id);
        $transaksi->update([
            'qty' => $transaksi->qty + 1,
            'total' => $transaksi->kategori->harga * ($transaksi->qty + 1)
        ]);
        session()->flash('message', 'jumlah tiket berhasil di tambah');

        return redirect()->to('/transaksi');
    }

    public function decrement($id)
    {
        // dd($id);
        $transaksi = Transaksi::find($id);
        $transaksi->update([
            'qty' => $transaksi->qty - 1,
            'total' => $transaksi->kategori->harga * ($transaksi->qty - 1)
        ]);
        session()->flash('message', 'jumlah tiket berhasil di kurang');

        return redirect()->to('/transaksi');
    }

    public function deleteTransaksi($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        session()->flash('message', 'Transaksi berhasil di hapus');
    }

    public function bayar()
    {
        // dd($this->pembayaran);
        $transaksi = Transaksi::get();
         
        $order = Order::create([
            'no_order' => 'KNS-' . date('YmdHis'),
            'nama_kasir' => auth()->user()->name,
            'grand_total' => $transaksi->sum('total'),
            'pembayaran' => $this->pembayaran,
            'kembalian' => $this->pembayaran - $transaksi->sum('total')
        ]);


        foreach ($transaksi as $key => $value) {
            $kategori = array(
                'order_id' => $order->id,
                'kategori_id' => $value->kategori_id,
                'qty' => $value->qty,
                'total' => $value->total,
                'created_at' => \Carbon\carbon::now(),
                'updated_at' => \Carbon\carbon::now(),
            );

            $orderTiket = OrderTiket::insert($kategori);

            $deleteTransaksi = Transaksi::where('id', $value->id)->delete(); //hapus dr table transaksi, masuk ke table order tiket
        }
        // session()->flash('message', 'Transaksi berhasil disimpan');
        return redirect()->to('/detail/' . $order->no_order);
    }

    public function render()
    {
        return view('livewire.transaksi.index', [
            'kategoris' => Kategori::orderBY('nama', 'asc')->get(),
            'transaksis' => Transaksi::get()
        ]);
    }
}