<!DOCTYPE html>
<html lang="tr">
<head>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>MGK FASHION</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="CSS1/bootstrap.min.css">
  <link rel="stylesheet" href="CSS1/all.css">
  <link rel="stylesheet" type="text/css" href="CSS1/style.css">
  <link rel="stylesheet" type="text/css" href="CSS1/genelstyle.css">
  <link rel="stylesheet" type="text/css" href="CSS1/mainstyle.css">
  <link rel="shortcut icon" type="image" href="img/titlelogo1.ico"/>
  
</head>

<body>
<!--VERİTABANINA BAĞLANMA -->
  <?php include("baglantidb.php");
  session_start();
   ?>
<?php include ("adminmenu.php") ?>


<div id="main" class="container-fluid">
 
     <!-----------NAVBAR-------------->
    <?php include ("adminnavbar.php"); ?>
 
<section class="home">

<div id="carousel" class="carousel slide" data-bs-ride="carousel">

  <div class="carousel-controls">
      <ol class="carousel-indicators">
        <li data-bs-target="#carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#carousel" data-bs-slide-to="2"></li>
     </ol>
      <a class="carousel-control-prev" href="#carousel" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" style="background-image:url('img/urunekle.jpg');">
      <div class="container">
       <a class="linkver" href="urunislemleri.php"><h1 style="color: white;">ÜRÜN İŞLEMLERİ</h1></a>
         <h1 style="color: #f9e0b3">Ürün ekleme,silme ve güncelleme işlemleri için tıklayınız.</h1>
               
      </div>
    </div>
    <div class="carousel-item" style="background-image:url('img/musteri.jpg');">
         <div class="container">
          <a class="linkver" href="musteri_islemleri.php"><h1 style="color: white;">MÜŞTERİ İŞLEMLERİ</h1></a>
           <h1 style="color: #f9e0b3">Müşteri ekleme,silme ve güncelleme işlemleri için tıklayınız.</h1>
         </div>
    </div>
    <div class="carousel-item" style="background-image:url('img/personel.jpg');">
         <div class="container">
        <a class="linkver" href="personel.php"><h1 style="color: white;">PERSONEL İŞLEMLERİ</h1></a>
         <h1 style="color: #f9e0b3">Personel ekleme,silme ve güncelleme işlemleri için tıklayınız.</h1>
      </div>
    </div>
    
  </div>
 
</div>
</section>
   


  </div>





























 </div>
<script>
function openNav() {
  document.getElementById("YanMenu").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("YanMenu").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>



<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>