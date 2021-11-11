<!DOCTYPE html>
<html lang="tr">
<head>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>KADIN</title>
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
  <?php session_start();  ?>
<?php include("yanmenu.php"); ?>


  
  <?php 
  
  $arama = strip_tags(trim($_GET["arama"])); //strip_tags fonksiyonu inputtaki verinin güvenliği için kullanılmış olup "trim" ise inputa girilen kelimenin başı ve sonundaki boşluklarının kaldırılıp o şekilde arama yapılması amacıyla kullanılmıştır.
  if(!$arama){
    header('Location:index.php');
  }
  //SEARCH İNPUTUNA GİRİLEN KELİME GÖRE SİTE İÇERİSİNDE LIKE SORGUSU İLE ARAMA YAPILMASI
  $urun = $db->prepare("SELECT * from tblurunler WHERE urun_adi LIKE :adi");
  $urun->execute([":adi" => "%".$arama."%"]); 
  $sonuc = $urun->rowCount();

  ?>
  
<div id="main" class="container">
  <!--NAVBAR-->
  <?php include("navbar.php"); ?>

      <div class="row">
      <div  class="col-md-12" id="yazi"><i class="fa fa-chevron-right"></i><?php echo "'".$arama."' İÇİN ARAMA SONUÇLARI (".$sonuc." Ürün)";?></div>
      </div>

    <!-- ARAMA YAPILAN KELİMEYE GÖRE ÜRÜN VERİLERİNİ ÇEKME-->
      <div class="row">
        <?php while ($urunler = $urun->fetch(PDO::FETCH_OBJ)) { ?>
    <div class="col-md-4">
<div class="card" style="width: 25rem; float: right;">
  <img class="card-img-top" id="aw-zoom" src="<?php echo $urunler->urun_foto; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $urunler->urun_adi; ?></h5>
    <h6><s><?php echo $urunler->eski_fiyat; ?></s> <span style="color: red;">₺<?php echo $urunler->fiyat; ?></span> </h6>   
    <a href="#"  class="btn btn-success btn-sm">Hemen Al!</a>
    <button urun_id="<?php echo $urunler->id; ?>" class="btn btn-warning btn-sm btn_sepeteEkle">Sepete Ekle</button>
    <a href="#" class="btn btn-danger btn-sm">Favorilere Ekle</a>
     <select>
      <option selected> </option>
      <option>XS</option>
      <option>S</option>
      <option>M</option>
      <option>L</option>
      <option>XL</option>
    </select>
  </div>
</div>
  </div>
  <?php } ?>



    </div>



</div>





</div>
<button id="btnScrollToTop">
    <i class="fa fa-arrow-up fa-2x" style="color: white"></i>
  </button>
<script>
  const btnScrollToTop = document.querySelector("#btnScrollToTop");
  btnScrollToTop.addEventListener("click", function(){
    window.scrollTo(0, 0);
  }); 
</script>
<script>
function openNav() {
  document.getElementById("YanMenu").style.width = "250px";
  
}

function closeNav() {
  document.getElementById("YanMenu").style.width = "0";
  
}
</script>
<script src="js/main.js"></script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
