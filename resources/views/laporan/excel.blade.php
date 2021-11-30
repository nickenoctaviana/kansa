<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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
</body>

</html>