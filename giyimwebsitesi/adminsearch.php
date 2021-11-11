<?php ob_start(); ?>
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
  <?php 
  $adminarama = strip_tags(trim($_GET["adminarama"]));
  if(!$adminarama){
    header('Location:adminpanel.php');
  }
 $sorgu = $db->prepare("Select 
        tblurunler.id as URUNID,
        tblurunler.urun_foto as UrunFoto, 
        tblurunler.urun_adi as UrunAD, 
        tblurunler.renk as UrunRenk, 
        tblurunler.eski_fiyat as EskiFiyat, 
        tblurunler.fiyat as UrunFiyat, 
        tblurunler.kategoriID as UrunKAT,
        tblurunler.cinsiyetID as UrunCins,

        tblkategori.kategoriID as UrunKATID,
        tblkategori.kategori_adi as UrunKATAD,

        tblcinsiyet.cinsiyetID as UrunCinsID,
        tblcinsiyet.cinsiyet as UrunCinsAD

         From tblurunler INNER JOIN tblkategori ON tblurunler.kategoriID = tblkategori.kategoriID INNER JOIN tblcinsiyet ON tblurunler.cinsiyetID = tblcinsiyet.cinsiyetID  WHERE urun_adi LIKE :adi");
  $sorgu->execute([":adi" => "%".$adminarama."%"]); 
  $sonuc = $sorgu->rowCount();

  ?>

<div id="main" class="container">
 
    <!--NAVBAR-->
  <?php include("adminnavbar.php"); ?>




      <div class="row">
      <div  class="col-md-12" id="yazi"><i class="fa fa-chevron-right">ÜRÜN İŞLEMLERİ</i></div>
      </div><br>



<!-- Kayıt Formu -->
<form action="ekle.php" method="post" class="row">
     
     

     <?php if (isset($_GET["durum"])) {
        if ($_GET["durum"] == "yes") {
          echo "<div class='alert alert-success text-center' role='alert'>
              <h6>İşlem Başarılı</h6>
            </div>";
        }else{
          echo "Hata!İşlem Başarısız.";
           
        } 
      }?>
       

    <div class="col-sm-12 container">
      
  <table class="table table-hover table-bordered table-striped" id="table">
      
      <thead>
        <th class="text-center">Ürün ID</th>
        <th class="text-center">Ürün Fotoğrafı</th>
        <th class="text-center">Ürün Adı</th>
        <th class="text-center">Renk</th>
        <th class="text-center">Eski Fiyat</th>
        <th class="text-center">Fiyat</th>
        <th class="text-center">Beden</th>
        <th class="text-center">Kategori</th>
        <th class="text-center">Cinsiyet</th>
        <th class="text-center">Güncelle/Sil</th>
      </thead>
      <tbody>

<?php
while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
        <td><?php echo $satir["URUNID"]; ?></td>
        <td align="center"><img src="<?php echo $satir["UrunFoto"];?>" width="70"></td>
        <td><?php echo $satir["UrunAD"]; ?></td>
        <td><?php echo $satir["UrunRenk"]; ?></td>
        <td><?php echo $satir["EskiFiyat"]; ?></td>
        <td><?php echo $satir["UrunFiyat"]; ?></td>
        <td></td>
        <td><?php echo $satir["UrunKATAD"]; ?></td>
        <td><?php echo $satir["UrunCinsAD"]; ?></td>
        <td><div align="center"><a href="urun_guncelle.php?id=<?php echo $satir["URUNID"]; ?>"><button class="btn btn-warning"><i class="fas fa-edit"></i></button></a> 
          <a href="urun_sil.php?id=<?php echo $satir["URUNID"]; ?>"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></div></td>
        </tr>
      <?php } ?>
    
      </tbody>
</table>
</div>
         
         
    </div>
    </form>



 


























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