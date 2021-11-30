<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Increment/Decrement</title>
</head>
<body>
    <div class="quantity">
        <button class="btn btn-minus disabled" type="button">-</button>
        <input class="input" type="text" id="quantity" readonly="" value="1">
        <button class="btn btn-plus disabled" type="button">+</button>
    </div>

    <!-- kalkulasi harga -->
    <p class="total-price">
        <span id="price">15000</span>
    </p>
    
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
</body>
</html>

<style type="text/css">
 .btn{
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
</style>