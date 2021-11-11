<?php error_reporting(0); ?>
<?php 
require_once("baglantidb.php");

//INNER JOIN İLE TBLURUNLER TABLOSUNDAKİ KATEGORİ VE CİNSİYET VERİLERİ İLGİLİ TABLOLARDAN BİRE-ÇOK İLİŞKİ İLE ÇEKİLMİŞTİR.
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

         From tblurunler INNER JOIN tblkategori ON tblurunler.kategoriID = tblkategori.kategoriID INNER JOIN tblcinsiyet ON tblurunler.cinsiyetID = tblcinsiyet.cinsiyetID where tblurunler.id=:id_alias");
  $sorgu->execute(array('id_alias'=> $_GET["id"]
)
); 

$kayit = $sorgu->fetch(PDO::FETCH_ASSOC);


 ?>

<!DOCTYPE html>
<html>
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
  <?php require_once("baglantidb.php");
  session_start();
   ?>
<?php include ("adminmenu.php") ?>


<div id="main" class="container">
 
    <!--NAVBAR-->
  <?php include("adminnavbar.php"); ?>


 <?php 
$kategori=$db->prepare("SELECT * FROM tblkategori");
$kategori->execute();
$satir = $kategori->fetchALL(PDO::FETCH_ASSOC);
 ?>

 <?php 
$cinsiyet=$db->prepare("SELECT * FROM tblcinsiyet");
$cinsiyet->execute();
$veriler = $cinsiyet->fetchALL(PDO::FETCH_ASSOC);
 ?>
 
<div class="container">
<h5 align="center">ÜRÜN GÜNCELLEME</h5>

<!-- Kayıt Formu -->
<form action="ekle.php" method="post" class="row">
     
      <div class="textbox col-sm-2">
         <input class="form-control" type="file" placeholder="Ürün Fotoğrafı*" name="urun_foto"  required=""  value="<?php echo $kayit["UrunFoto"] ?>" autocomplete="off">
        
      </div><br><br>

      <div class="textbox col-sm-2">
        <input class="form-control" type="text" placeholder="Ürün Adı*" name="urun_ad"  required=""  value="<?php echo $kayit["UrunAD"] ?>" autocomplete="off">
      </div><br><br>
      <div class="textbox col-sm-2">
     
        <input class="form-control" type="text" placeholder="Renk*" name="urun_renk"  required=""  value="<?php echo $kayit["UrunRenk"] ?>">
      </div><br><br>

      <div class="textbox col-sm-2">
      
        <input class="form-control" type="text" placeholder="Eski Fiyat" name="eskifiyat"   value="<?php echo $kayit["EskiFiyat"] ?>">
      </div><br><br>

      <div class="textbox col-sm-2">
      
        <input class="form-control" type="text" placeholder="Fiyat*" name="urun_fiyat"  required=""  value="<?php echo $kayit["UrunFiyat"] ?>"></input>
      </div><br><br>

      <div class="textbox col-sm-3">
      
        

   <div class="textbox col-sm-3">
     <select name="urun_kategori" style="width: 85px; height: 30px; border-radius: 7px;">
        <option>Kategori</option>
        <?php foreach ($satir as $satirlar) {?>
          
           <option <?php 
           echo $satirlar['kategoriID'] == $kayit["UrunKATID"] ? "selected":'';
           ?> 
           value="<?php echo $satirlar['kategoriID']; ?>"
           >
             <?php echo $satirlar['kategori_adi']; ?>
           </option>

         <?php  } ?>
      </select><br><br>
    </div><br><br>
    <div class="textbox col-sm-3">
      <select name="urun_cinsiyet" style="width: 85px; height: 30px; border-radius: 7px;">
        <option>Cinsiyet</option>
        <?php foreach ($veriler as $veri) {?>
          
           <option <?php
           echo $veri['cinsiyetID'] == $kayit["UrunCinsID"] ?"selected":'';
            ?>

           value="<?php echo $veri['cinsiyetID'];?>"
           >
             <?php echo $veri['cinsiyet']; ?>
           </option>

         <?php  } ?>
      </select>
      </div><br>    
      <button name="btnurunguncelle" class="btn btn-success">Ürün Güncelle</button><br><br>
        







         
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

