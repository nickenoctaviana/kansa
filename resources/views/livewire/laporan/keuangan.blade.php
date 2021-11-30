<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header borer-0">
                <h3 class="mb-0">Laporan Keuangan</h3>
            </div>
            <form class="form-inline" method="get" action="{{url('/laporan/cari')}}">
                <div class="form-group" style="padding:30px;">
                    <label for="email">Dari:</label>
                    <input type="date" name="dari" id="" class="form-cotrol" />
                    <label for="pwd" style="padding-left:20px;">Sampai:</label>
                    <input type="date" name="sampai" id="" class="form-cotrol" />
                    <button type="submit" class="btn btn-success" wire:click="cari">Cari</button>
                </div>
            </form>
            <a href="/export" class="btn btn-warning">Cetak Excel</a>
            <div class="table-responsive" style="padding:20px;">
                <table id="table-pemasukan" class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Banyak Transaksi</th>
                            <th scope="col">Pemasukan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($keuangan as $e=>$k)
                        <tr>
                            <td>{{$e+1}}</td>
                            <td>{{date('d M Y', strtotime($k->tanggal))}}</td>
                            <td>{{$k->jumlah}}</td>
                            <td>{{number_format($k->pemasukan)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>