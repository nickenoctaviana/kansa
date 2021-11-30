<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1c604228ee.js" crossorigin="anonymous"></script>

    <title>Sistem Transaksi</title>
  </head>
  <body>
    <!--navbar-->
    <nav class="navbar navbar-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" style="color:white;">Kansa</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Kasir Kansa</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Akun
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                        <li><a class="dropdown-item" href="#">Pengaturan Akun</a></li>
                        <li><a class="dropdown-item" href="/login">Keluar</a></li>
                        </ul>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
        </nav>
    <!--akhir navbar-->

    <!--awal form-->
    <div>
        <style>
            .qty{
                width:20%;
                display:inline;
            }
        </style>
    <div class="card-body">
        <div class="form-group row pb-5">
            <form class="row g-3 mt-3" wire:submit.prevent="submit">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="color:black;padding-left:100px;"><strong>Jenis Tiket</strong></label>
                <div class="col-sm-8">
                    <select class="form-control" wire:model="kategori" required>
                        <option>--Pilih Jenis Tiket--</option>
                       @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{$kategori->nama}}</option>
                       @endforeach
                    </select>
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-success w-100">Submit</button>
                </div>
            </form>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-seccess">
                {{session('message')}}
            </div>
        @endif

        <div class="card-body border-top pb-5 p-0 mt-3">
            <table class="table table-striped table-hover" style="background:grey;">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">qty</th>
                        <th scope="col">Harga/qty</th>
                        <th scope="col" style="width:200px;">Total</th>
                        <th scope="col"style="width:10px;"></th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td> </td>
                        <td> </td>
                        <td>
                            <div wire:ignore>
                                <button class="button btn-minus disabled" type="button">-</button>
                                <input class="inputt" type="text" id="quantity" readonly="" value="">
                                <button class="button btn-plus disabled" type="button">+</button>
                            </div>
                        </td>
                        <td>Rp </td>
                        <td>Rp </td>
                        <td>
                            <button class="btn btn-danger btn-sm "><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <td></td>
                    <td></td>
                    <td></td> 
                    <td style="text-align:right;">Total Pembelian</td>
                    <td>
                        Rp
                    </td>
                    <tr>
                        <td style="border:none;"></td>
                        <td style="border:none;"></td>
                        <td style="border:none;"></td>
                        <td style="text-align:right;">Pembayaran</td>
                        <td style="text-align:right;">
                            <input type="number" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td style="border:none;"></td>
                        <td style="border:none;"></td>
                        <td style="border:none;"></td>
                        <td style="text-align:right;">Kembalian</td>
                        <td style="text-align:leftt;">
                        
                        </td>
                    </tr>
                </tfoot>
            </table>
            <div class="">
            <button class="btn btn-success btn-sm" style="float:right;width:100px;">Bayar</button>
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
</html>

<!-- CSS -- #46BA98-->
<style type="text/css">
    .navbar-light{
        background: #212529;
    }
    .navbar-brand{
        padding-left:40px;
        font-size: 24px;
        font-weight: 600;
    }
    .navbar-toggler{
        margin-right:70px;
        background: white;
    }
    .button{
     width:30px;
     height: 30px;
     line-height:30px;
     border-radius: 5px;
     outline: none;
     border: none;
     color: white;
     background: #46BA98;
     cursor: pointer;
     box shadow: inset -2px -2px 2px rgba(255,255,255,.2),
                 inset 2px 5px 15px rgba(0,0,0,.5);
    }
 
 .button:active{
     box-shadow: inset 2px 2px 2px rgba(255,255,255,.1),
                 inset -2px -5px 15px rgba(0,0,0,.5);
 }
 .inputt{
    height:10px;
    border-radius: 3px;
    padding: 15px 0;
    width: 100px;
    text-align: center;
    margin: 0 10px;
    box-shadow: inset -2px -2px 2px rgba(255,255,255,.2);
 }
 .offcanvas-end{
        width:300px;
    }
    .card-body{
        margin:80px;
        line-height:30px;
        border-radius: 5px;
        outline: none;
        border: none;
        color: white;
        cursor: pointer;
        box shadow: inset -2px -2px 2px rgba(255,255,255,.2),
                    inset 2px 5px 15px rgba(0,0,0,.5);
    }
</style>