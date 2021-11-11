<!DOCTYPE html>
<html lang="tr">
<head>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.6.0.min.js"></script>

  <title>SİPARİŞLER</title>
  
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
<?php include ("adminmenu.php") ?>
     
<div id="main" class="container">
      <!-----------NAVBAR-------------->
    <?php include ("adminnavbar.php") ?>

 <!-------------------SAYFA İÇERİĞİ------------------------->
      <div class="row">
      <div  class="col-md-4" id="yazi"><i class="fa fa-chevron-right"></i>Sipariş Bilgileri</div>
      </div>


<div class="container">
  <?php
$sorgu = $db->prepare("Select 
        tblalisverisgecmisi.alisverisID as AlisverisID,
        tblalisverisgecmisi.musteriID as Musteri,
        tblalisverisgecmisi.urunID as Urun,
        tblalisverisgecmisi.renk as Renk,
        tblalisverisgecmisi.adet as UrunAdet,
        tblalisverisgecmisi.alisveris_tarihi as Tarih,
        tblalisverisgecmisi.adres as Adres,
        tblalisverisgecmisi.toplam_tutar as ToplamTutar,
  


        tblurunler.id as URUNID,
        tblurunler.urun_adi as UrunAD, 

        tblmusteri_hesaplari.id as MusteriID,
        tblmusteri_hesaplari.musteri_ad as MusteriAD,
        tblmusteri_hesaplari.musteri_soyad as MusteriSOYAD

         From tblalisverisgecmisi INNER JOIN tblurunler ON tblurunler.id = tblalisverisgecmisi.urunID  INNER JOIN tblmusteri_hesaplari ON tblmusteri_hesaplari.id = tblalisverisgecmisi.musteriID");
  $sorgu->execute(); ?>

<table class="table table-hover table-bordered table-striped" id="table">
      
      <thead>
        <th class="text-center">Alışveriş ID</th>
        <th class="text-center">Müşteri ID</th>
        <th class="text-center">Müşteri Adı</th>
        <th class="text-center">Müşteri Soyadı</th>
        <th class="text-center">Ürün Adı</th>
      
       
        <th class="text-center">Renk</th>
        <th class="text-center">Adet</th>
        <th class="text-center">Alışveriş Tarihi</th>
        <th class="text-center">Adres</th>
        <th class="text-center">Toplam Tutar</th>
      </thead>

       <tbody>

<?php
while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
        <td><?php echo $satir["AlisverisID"]; ?></td>
        <td><?php echo $satir["MusteriID"]; ?></td>
        <td><?php echo $satir["MusteriAD"]; ?></td>
        <td><?php echo $satir["MusteriSOYAD"]; ?></td>
        <td><?php echo $satir["UrunAD"]; ?></td>
     
        <td><?php echo $satir["Renk"]; ?></td>
        <td><?php echo $satir["UrunAdet"]; ?></td>
        <td><?php echo $satir["Tarih"]; ?></td>
        <td><?php echo $satir["Adres"]; ?></td>
        <td><?php echo $satir["ToplamTutar"]; ?></td>
        
        </tr>
      <?php } ?>
  
      </tbody>
 
</table>








  

</div>
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
</body>
</html>