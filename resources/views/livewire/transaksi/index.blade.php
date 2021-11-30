<div>
    <style>
    .qty {
        width: 20%;
        display: inline;
    }
    </style>
    <div class="card-body">
        <div class="form-group row pb-5">
            <form class="row g-3 mt-3" wire:submit.prevent="submit">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori Tiket</label>
                <div class="col-sm-8">
                    <select class="form-control @error('kategori_id') is-invalid @enderror" wire:model="kategori_id"
                        required>
                        <option>-- Pilih Jenis Tiket --</option>
                        @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{$kategori->nama}}</option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                    <!-- <span class="error">{{$message}}</span> -->
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-success w-100" style="background:#46BA98">Submit</button>
                </div>
            </form>
        </div>

        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

        <div class="card-body border-top pb-5 p-0 mt-3">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">qty</th>
                        <th scope="col">Harga/Qty</th>
                        <th scope="col" style="width: 200px;">Total</th>
                        <th scope="col" style="width: 10px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $transaksi)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$transaksi->kategori->nama}}</td>
                        <td>
                            <div wire:ignore>
                                @if ($transaksi->qty > 1)
                                <span class="btn btn-danger btn-sm" wire:click="decrement({{$transaksi->id}})">-</span>
                                @endif
                                <input type="text" class="form-control qty" value="{{$transaksi->qty}}" readonly
                                    style="text-align:center;">
                                <span class="btn btn-success btn-sm" wire:click="increment({{$transaksi->id}})">+</span>
                            </div>
                        </td>
                        <td>Rp. {{number_format($transaksi->kategori->harga)}}</td>
                        <td>Rp. {{number_format($transaksi->kategori->harga*$transaksi->qty)}}</td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm"
                                wire:click="deleteTransaksi({{$transaksi->id}})"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align:right;">Total Pembelian</td>
                    <td>
                        Rp {{number_format($transaksis->sum('total'))}}
                    </td>
                    <tr>
                        <td style="border:none;"></td>
                        <td style="border:none;"></td>
                        <td style="border:none;"></td>
                        <td style="text-align:right;">Pembayaran</td>
                        <td style="text-align:right;">
                            <input type="number" wire:model="pembayaran" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td style="border:none;"></td>
                        <td style="border:none;"></td>
                        <td style="border:none;"></td>
                        <td style="text-align:right;">Kembalian</td>
                        <td style="text-align:left;">
                            Rp {{number_format($pembayaran-$transaksis->sum('total'))}}
                        </td>
                    </tr>
                </tfoot>
            </table>
            <div class="">
                <button class="btn btn-success btn-sm" type="button" wire:click="bayar" style="float:right;width:200px;background:#46BA98">Bayar</button>
            </div>
        </div>
    </div>
</div>