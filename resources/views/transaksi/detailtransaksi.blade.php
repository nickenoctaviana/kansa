<x-app-layout>

    <head>
        <title>Struk Belanja</title>

    <body>
        <div class="py-12">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8 ">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="container">
                        <div class="header" style="margin-bottom: 30px;">
                            <h3 style="text-align:center;margin-top:10px">Kandang Sapi</h3>
                            <p style="text-align: center;">Jl. Anjasmoro Dsn Tukum, RT.06/RW.04, Notorejo, Wonosalam,
                                Kabupaten Jombang, Jawa
                                Timur 61476</p>
                        </div>
                        <hr>
                        <div class="flex-container-1">
                            <div class="left">
                                <ul>
                                    <li>No Order</li>
                                    <li>Kasir</li>
                                    <li>Tanggal</li>
                                </ul>
                            </div>
                            <div class="right">
                                <ul>
                                    <li> {{ $order->no_order }} </li>
                                    <li> {{ $order->nama_kasir }} </li>
                                    <li> {{ date('Y-m-d : H:i:s', strtotime($order->created_at)) }} </li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <div class="flex-container" style="margin-bottom: 10px; text-align:right;">
                            <div style="text-align: left;">Pembelian</div>
                            <div>Harga/Qty</div>
                            <div>Total</div>
                        </div>
                        @foreach ($order->tiketOrder as $item)
                        <div class="flex-container" style="text-align: right;">
                            @php
                            if(!empty($item->namaKategori->nama)) {
                            $arr_name = explode(' ', $item->namaKategori->nama);
                            $name = $arr_name[0];
                            } elseif ($item->namaKategori->nama != '') {
                            $name = $item->namaKategori->nama;
                            } else {
                            $name = 'there';
                            }
                            @endphp
                            <div style="text-align: left;">{{ $item->qty }}x {{ $name }}</div>
                            <div>Rp {{ number_format($item->namaKategori->harga) }} </div>
                            <div>Rp {{ number_format($item->total) }} </div>
                        </div>
                        @endforeach
                        <hr>
                        <div class="flex-container" style="text-align: right; margin-top: 10px;">
                            <div></div>
                            <div>
                                <ul>
                                    <li>Grand Total</li>
                                    <li>Pembayaran</li>
                                    <li>Kembalian</li>
                                </ul>
                            </div>
                            <div style="text-align: right;">
                                <ul>
                                    <li>Rp {{ number_format($order->grand_total) }} </li>
                                    <li>Rp {{ number_format($order->pembayaran) }}</li>
                                    <li>Rp {{ number_format($order->kembalian) }}</li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <div class="header" style="margin-top: 30px;">
                            <h3>Terimakasih</h3>
                            <p>Silahkan berkunjung kembali</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </head>
</x-app-layout>

<style>
.container {
    width: 300px;
}

.header {
    margin: 0;
    text-align: center;
}

.flex-container-1 {
    display: flex;
    margin-top: 10px;
}

.flex-container-1>div {
    text-align: left;
}

.flex-container-1 .right {
    text-align: right;
    width: 200px;
}

.flex-container-1 .left {
    width: 100px;
}

.flex-container {
    width: 300px;
    display: flex;
}

.flex-container>div {
    -ms-flex: 1;
    /* IE 10 */
    flex: 1;
}

ul {
    display: contents;
}

ul li {
    display: block;
}

hr {
    border-style: dashed;
}
</style>