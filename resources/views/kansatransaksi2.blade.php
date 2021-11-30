<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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

    <!--dropdown-->
    <div class="dropdown" style="width: 50rem;
        position: absolute;
        left: 50%;
        top: 23%;
        transform: translate(-50%, -50%);">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false" >
            Weekday
        </button>
        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
            <li><a class="dropdown-item" href="/transaksi2">Weekend</a></li>
        </ul>
    </div>

    <div class="card" >
        <div class="card-body">
            <div class="mb-3">
                
                <div class="quantity">
                    <label class="form-label" style="font-size:20pt">Masukkan Jumlah Tiket</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="button btn-minus disabled" type="button">-</button>
                    <input class="input" type="text" id="quantity" readonly="" value="1">
                    <button class="button btn-plus disabled" type="button">+</button>
                </div>
            </div>
            <div class="mb-3">
                
                <!-- kalkulasi harga -->
                <p class="total-price">
                    <label class="form-label" style="font-size:20pt;font-weight:bold;">Total</label>
                    <span style="font-size:20pt;font-weight:bold;padding-left:520px;">Rp</span>
                    <span id="price" style="font-size:20pt;font-weight:bold;">20000</span>
                </p>
            </div>
            <!--<p class="card-text" style="font-weight:bold;">Total</p>-->
        </div>
    </div>
    
    <!--modal-->
    <button type="button" class="btn-modal" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Proses</button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Proses Transaksi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Masukkan Jumlah Uang yang Dibayar</label>
                <input type="text" class="form-control" id="recipient-name">
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn" style="background: #46BA98;color:white">Bayar</button>
        </div>
        </div>
    </div>
    </div>

    <script>
    document.querySelector(".btn-minus").setAttribute("disabled","disabled");
    //value incremenr decrement
    var valueCount

    //variable harga
    var price = document.getElementById("price").innerText;

    //function harga
    function priceTotal(){
        var total = valueCount * price;
        document.getElementById("price").innerText = total;
    }
    
    //plus button
    document.querySelector(".btn-plus").addEventListener("click", function(){
        valueCount=document.getElementById("quantity").value;
    //input increment
    valueCount++;
    //setting increment input value
    document.getElementById("quantity").value = valueCount;
    
    if (valueCount > 1 ){
        document.querySelector(".btn-minus").removeAttribute("disabled")
        document.querySelector(".btn-minus").classList.remove("disabled");
    }

    //memanggil fungsi
    priceTotal()

    });

    //minus button
    document.querySelector(".btn-minus").addEventListener("click", function(){
        valueCount=document.getElementById("quantity").value;
    //input decrement
    valueCount--;
    //setting decrement input value
    document.getElementById("quantity").value = valueCount;

    if(valueCount == 1){
        document.querySelector(".btn-minus").setAttribute("disabled","disabled");
    }

    //memanggil fungsi
    priceTotal()

    });
    </script>

    

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

<!-- CSS -->
<style type="text/css">
    .navbar-light{
        background: #46BA98;
    }
    .navbar-brand{
        padding-left:40px;
        font-size: 24px;
        font-weight: 600;
    }
    .navbar-toggler{
        margin-right:70px;
    }
    .card{
        width: 50rem;
        position: absolute;
        left: 50%;
        top: 45%;
        transform: translate(-50%, -50%);
        box-shadow: 1px 1px grey;
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
 .input{
    height:10px;
    border-radius: 3px;
    padding: 15px 0;
    width: 100px;
    text-align: center;
    margin: 0 10px;
    box-shadow: inset -2px -2px 2px rgba(255,255,255,.2);
 }
 .btn-modal{
    position: absolute;
    left: 50%;
    top: 57%;
    transform: translate(-50%, -50%);
    width:800px;
    background:#46BA98;
    border:none;
    box-shadow: 1px 1px grey;
    color: white;
    font-weight:bold;
    font-size:20pt;
 }
 .offcanvas-end{
        width:300px;
    }
</style>