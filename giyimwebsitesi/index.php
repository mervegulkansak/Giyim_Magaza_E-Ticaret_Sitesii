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
  <?php include("baglantidb.php"); ?>
<!--------------------------->
<?php session_start() ?>
      <!---------------YAN MENU------------------>
<?php include ("yanmenu.php"); ?>



<div id="main" class="container-fluid">
 
     <!-----------NAVBAR-------------->
    <?php include ("navbar.php"); ?>
 
<section class="home">

<div id="carousel" class="carousel slide" data-bs-ride="carousel">

  <div class="carousel-controls">
      <ol class="carousel-indicators">
        <li data-bs-target="#carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#carousel" data-bs-slide-to="2"></li>
        <li data-bs-target="#carousel" data-bs-slide-to="3"></li>
        <li data-bs-target="#carousel" data-bs-slide-to="4"></li>
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
    <div class="carousel-item active" style="background-image:url('img/indirimslide.png');">
      <div class="container">
       <h1 style="color: red">TÜM ÜRÜNLERDE</h1>
       <h3>50%    60%     70%</h3>
       <h1 style="color: red">İNDİRİM</h1>
       <a href="kadin.php"><button type="button" class="btn btn-dark">KADIN</button></a> 
       <a href="erkek.php"><button type="button" class="btn btn-dark">ERKEK</button></a>
       <a href="cocuk.php"><button type="button" class="btn btn-dark">ÇOCUK</button></a>
       <a href="bebek.php"><button type="button" class="btn btn-dark">BEBEK</button></a>
        
      </div>
    </div>
    <div class="carousel-item" style="background-image:url('img/kadinslide.jpg');">
         <div class="container">
          <a class="linkver" href="kadin.php"><h3 style="color: #8ca0c5">KADIN</h3></a>
        <h1 style="color: black">Daima Işıltılı Olmak MGK Fashion'da</h1>
         </div>
    </div>
    <div class="carousel-item" style="background-image:url('img/erkekcocukslide.jpg');">
         <div class="container">
        <a class="linkver" href="cocuk.php"><h3 style="color: #c28a22">ERKEK ÇOCUK</h3></a>
        <h1 style="color: #f9e0b3">Tarz Giyinen Çocuklar MGK Fashion'da</h1>
      </div>
    </div>
    <div class="carousel-item" style="background-image:url('img/kizcocukslide.jpg');">
         <div class="container">
         <a class="linkver" href="cocuk.php"><h3 style="color: #43641b">KIZ ÇOCUK</h3></a>
      <h1 style="color: black">Tarz Giyinen Çocuklar MGK Fashion'da</h1>
      </div>
    </div>
    <div class="carousel-item" style="background-image:url('img/bebekslide.jpg');">
         <div class="container">
       <a class="linkver" href="bebek.php"><h3 style="color: #5e1318">BEBEK</h3></a>
      <h1 style="color: #9b9da1">Tarz Bebekler..</h1>
      </div>
    </div>
  </div>
 
</div>
</section>
   


  </div>

 

</div>

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