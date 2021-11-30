<div class="row" style="margin:20px;">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-success" onClick="window.location.reload();"><i class="fa fa-refresh" style="color:beige;"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">
                <form class="form-inline" style="padding-bottom:20px;" method="get" action="{{url('/filterriwayat/periode')}}">
                    <div class="form-group">
                        <label for="email">Tanggal Awal:</label>
                        <input type="date" name="tanggal_awal" id="" class="form-cotrol" />
                        <label for="pwd">Tanggal Akhir:</label>
                        <input type="date" name="tanggal_akhir" id="" class="form-cotrol" />
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form> 
                <div class="table-responsive">
                    <table class="table table-stripped myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>no_order</th>
                                <th>Nama Kasir</th>
                                <th>Grand Total</th>
                                <th>Pembayaran</th>
                                <th>Kembalian</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $e=>$dt)
                            <tr>
                                <td>{{$e+1}}</td>
                                <td>{{$dt->no_order}}</td>
                                <td>{{$dt->nama_kasir}}</td>
                                <td>{{number_format($dt->grand_total)}}</td>
                                <td>{{number_format($dt->pembayaran)}}</td>
                                <td>{{number_format($dt->kembalian)}}</td>
                                <td>{{date('d M Y H:i:s', strtotime($dt->created_at))}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>
                                    <b><i>Total</i></b>
                                </th>
                                <th></th>
                                <th><b><i>{{number_format($dt->sum('grand_total'))}}</i></b></th>
                                <th><b><i>{{number_format($dt->sum('pembayaran'))}}</i></b></th>
                                <th><b><i>{{number_format($dt->sum('kembalian'))}}</i></b></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>