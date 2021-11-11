 <?php ob_start(); ?>
 <?php error_reporting(0); ?>
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
<?php include ("yanmenu.php") ?>


<div id="main" class="container">
 
    <!--NAVBAR-->
  <?php include("navbar.php"); ?>
      <div class="row">
      <div  class="col-md-4" id="yazi"><i class="fa fa-chevron-right"></i>FAVORİLER</div>
      </div>

     <!--  FAVORİLERDEN ÇIKARMA İŞLEMİ -->
      <?php
      if(isset($_GET['cikar'])){

        $id = @$_GET['cikar'];
        $kullanici_id = @$_SESSION['kullanici']['id'];
        if (!$id) {
            header('Location:giris.php');
          }else{
            $favsil = $db->prepare("DELETE FROM tblfavoriler WHERE musteriID =:id1 AND favori_urunID=:id2");

            $favsil->execute([':id1'=>$kullanici_id,':id2'=>$id]);

            if ($favsil) {
              echo "<div class='alert alert alert-success'>FAVORİLERDEN SİLİNDİ</div>";
              header('refresh:1;url=kadinpantolon.php');
            } else {
              echo "<div class='alert alert alert-danger'>hata oluştu</div>";
            }
            
          }
      }

      // FAVORİYE EKLEME VE AYNI ÜRÜNÜN TEKRAR ETMESİNİ ENGELLEME

      if (isset($_GET['id'])) {
          $id = @$_GET['id'];
          $kullanici_id = @$_SESSION['kullanici']['id'];
          
          if (!$id) {
            header('Location:giris.php');// Kullanıcı girişi yapılmamışsa favoriye eklemez ve giriş sayfasına yönlendirir
          }else{

            $varmi = $db->prepare("SELECT * FROM tblfavoriler WHERE musteriID=:id1 AND favori_urunID=:id2");

            $varmi->execute(['id1'=>$kullanici_id, ':id2'=>$id]);

            if ($varmi->rowCount()) {
              echo "<div class='alert alert alert-danger'>Bu ürün favorilerinizde</div>";
            }else{

            $eklefav = $db->prepare("INSERT INTO tblfavoriler SET musteriID =:musteri, favori_urunID =:urun");

            $eklefav->execute(array(':musteri'=>$kullanici_id, ':urun'=>$id));

            if ($eklefav) {
              echo "<div class='alert alert alert-success'>FAVORİLERE EKLENDİ</div>";
               header('refresh:1;url=favoriler.php');
            }else{
              echo "<div class='alert alert alert-danger'>HATA OLUŞTU</div>";
            }

            }

          }
        }
       ?>


  <?php


    $urun = $db->prepare("SELECT * FROM tblfavoriler INNER JOIN tblurunler ON tblurunler.id = tblfavoriler.favori_urunID WHERE musteriID=:id1");
    $urun->execute(array(':id1'=>$_SESSION['kullanici']['id']));  ?>

      

    <div class="row">
        <?php foreach ($urun as $urunler) { ?>
    <div class="col-md-4">
<div class="card" style="width: 25rem; float: right;">
  <img class="card-img-top" id="aw-zoom" src="<?php echo $urunler['urun_foto']; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $urunler['urun_adi']; ?></h5>
    <h6><s><?php echo $urunler['eski_fiyat']; ?></s> <span style="color: red;">₺<?php echo $urunler['fiyat']; ?></span> </h6>   
    <button urun_id="<?php echo $urunler['id']; ?>" class="btn btn-warning btn-sm btn_sepeteEkle">Sepete Ekle</button>

    <?php 
            echo '<a href="favoriler.php?cikar='.$urunler['id'].'" class="btn btn-danger btn-sm">Favorilerden Çıkar</a>';
        
     ?>


     <?php 
      $beden=$db->prepare("SELECT * FROM tblbeden where bedenID BETWEEN '1' AND '5'");
      $beden->execute();
      $satirlar = $beden->fetchALL(PDO::FETCH_ASSOC);
       ?>

     <select>
      <option selected>Beden</option>
        <?php foreach ($satirlar as $satir) {?>
          
           <option value="<?php echo $satir['bedenID']; ?>">
             <?php echo $satir['beden_adi']; ?>
           </option>

         <?php  } ?>
    </select>
  </div>
</div>
  </div>
  <?php } ?>
       




           























 </div>
<script>
function openNav() {
  document.getElementById("YanMenu").style.width = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("YanMenu").style.width = "0";
  document.body.style.backgroundColor = "white";
}
</script>



<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
 <?php ob_flush(); ?>