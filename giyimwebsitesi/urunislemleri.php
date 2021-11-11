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


<div id="main" class="container">
 
    <!--NAVBAR-->
  <?php include("adminnavbar.php"); ?>




      <div class="row">
      <div  class="col-md-12" id="yazi"><i class="fa fa-chevron-right">ÜRÜN İŞLEMLERİ</i></div>
      </div><br>
<?php 
//ADMİN GİRİŞİ YAPILMIŞSA
if (isset($_SESSION['admin'])) {
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

         From tblurunler INNER JOIN tblkategori ON tblurunler.kategoriID = tblkategori.kategoriID INNER JOIN tblcinsiyet ON tblurunler.cinsiyetID = tblcinsiyet.cinsiyetID order by tblurunler.id");
  $sorgu->execute(); ?>


 <?php 
$kategori=$db->prepare("SELECT * FROM tblkategori");
$kategori->execute();
$kayitlar = $kategori->fetchALL(PDO::FETCH_ASSOC);
 ?>

 <?php 
$cinsiyet=$db->prepare("SELECT * FROM tblcinsiyet");
$cinsiyet->execute();
$veriler = $cinsiyet->fetchALL(PDO::FETCH_ASSOC);
 ?>
<!-- Kayıt Formu -->
<form action="ekle.php" method="post" class="row">
     
      <div class="textbox col-sm-2">
         <input class="form-control" type="file" placeholder="Ürün Fotoğrafı*" name="urun_foto"  required=""  value="" autocomplete="off">
        
      </div><br><br>

      <div class="textbox col-sm-2">
        <input class="form-control" type="text" placeholder="Ürün Adı*" name="urun_ad"  required=""  value="" autocomplete="off">
      </div><br><br>
      <div class="textbox col-sm-2">
     
        <input class="form-control" type="text" placeholder="Renk*" name="urun_renk"  required=""  value="">
      </div><br><br>

      <div class="textbox col-sm-2">
      
        <input class="form-control" type="text" placeholder="Eski Fiyat" name="eskifiyat"   value="">
      </div><br><br>

      <div class="textbox col-sm-2">
      
        <input class="form-control" type="text" placeholder="Fiyat*" name="urun_fiyat"  required=""  value=""></input>
      </div><br><br>

 <div align="center" class="textbox col-sm-2"><button name="btnurunekle" class="btn btn-success">Ürün Ekle</button></div><br><br>

     <?php if (isset($_GET["durum"])) {
        if ($_GET["durum"] == "yes") {
          echo "<div class='alert alert-success text-center' role='alert'>
              <h6>İşlem Başarılı</h6>
            </div>";
        }else{
          echo "Hata!İşlem Başarısız.";
           
        } 
      }?>
     
    
   <div class="textbox col-sm-3">
     <select name="urun_kategori" style="width: 85px; height: 30px; border-radius: 7px;">
        <option selected="">Kategori</option>
        <?php foreach ($kayitlar as $kayit) {?>
          
           <option value="<?php echo $kayit['kategoriID']; ?>">
             <?php echo $kayit['kategori_adi']; ?>
           </option>

         <?php  } ?>
      </select><br><br>
    </div><br><br>
    <div class="textbox col-sm-3">
      <select name="urun_cinsiyet" style="width: 85px; height: 30px; border-radius: 7px;">
        <option selected="">Cinsiyet</option>
        <?php foreach ($veriler as $veri) {?>
          
           <option value="<?php echo $veri['cinsiyetID']; ?>">
             <?php echo $veri['cinsiyet']; ?>
           </option>

         <?php  } ?>
      </select>
      </div><br>    

       

    
         
         
    </div>
    </form>
<div class="col-sm-12 container">

  <table class="table table-hover table-bordered table-striped" id="table">
      
      <thead>
        <th class="text-center">Ürün ID</th>
        <th class="text-center">Ürün Fotoğrafı</th>
        <th class="text-center">Ürün Adı</th>
        <th class="text-center">Renk</th>
        <th class="text-center">Eski Fiyat</th>
        <th class="text-center">Fiyat</th>
       
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
     
        <td><?php echo $satir["UrunKATAD"]; ?></td>
        <td><?php echo $satir["UrunCinsAD"]; ?></td>
        <td><div align="center"><a href="urun_guncelle.php?id=<?php echo $satir["URUNID"]; ?>"><button class="btn btn-warning"><i class="fas fa-edit"></i></button></a> 
          <a href="urun_sil.php?id=<?php echo $satir["URUNID"]; ?>"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></div></td>
        </tr>
      <?php } ?>
    <?php   }else{//ADMİN GİRİŞ YAPMAMIŞSA ÜRÜN BİLGİLERİ LİSTELENMEZ EKRANDA UYARI VERİR
      echo "<div class='alert alert-danger text-center' role='alert'>
              <h6>ÜRÜN İŞLEMLERİ YAPABİLMEK İÇİN YÖNETİCİ GİRİŞİ YAPINIZ! <a href='admin.php'>Giriş yapmak için tıklayınız.</a></h6>
            </div>";
            }
            ?>
      </tbody>
</table>
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