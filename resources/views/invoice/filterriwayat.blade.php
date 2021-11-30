<x-app-layout>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/1c604228ee.js" crossorigin="anonymous"></script>

        <title>Filter Riwayat Transaksi</title>
    </head>

    <body>
        <div class="card-body" style="border-color:brown;border-width:3px;margin:30px;">
            <div class="row" style="margin:40px;">
                <div class="col-md-12">
                    <h4>{{ $title }}</h4>
                    <div class="box box-warning">
                        <div class="box-header">
                            <p>
                                <button class="btn btn-sm btn-flat btn-success" style="float:right;" onClick="window.location.reload();"><i class="fa fa-refresh" style="color:beige;"></i> Refresh</button>
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
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    </body>
</x-app-layout>