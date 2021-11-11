<?php 
require_once("baglantidb.php");

$sorgu = $db->prepare("SELECT * from tblmusteri_hesaplari where id=:id_alias");
$sorgu->execute(array('id_alias'=>$_GET["id"]));
$kaydet=$sorgu->fetch(PDO::FETCH_ASSOC);


 ?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.6.0.min.js"></script>

  <title>PROFİLİM</title>
  
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
<?php include ("yanmenu.php") ?>
     
<div id="main" class="container">
      <!-----------NAVBAR-------------->
    <?php include ("navbar.php") ?>

 <!-------------------SAYFA İÇERİĞİ------------------------->
      <div class="row">
      <div  class="col-md-4" id="yazi"><i class="fa fa-chevron-right"></i>Profil</div>
      </div><br>


<div class="container">
  
    <?php if (isset($_GET["durum"])) {
        if ($_GET["durum"] == "yes") {
          echo "<div class='alert alert-success text-center' role='alert'>
              <h6>İşlem Başarılı</h6>
            </div>";
        }else{
          echo "Hata!İşlem Başarısız.";
           
        } 
      }?>

    
        <form action="islem.php" method="POST" class="row">
      
      <div class="textbox col-md-6  input-icons ">
        <i class="fas fa-star-of-life icon" aria-hidden="true"></i>
        <input class="form-control form-control-sm input-field" style="border: none;" type="text" placeholder="Adı*" name="musteri_ad" value="<?php echo $kaydet["musteri_ad"] ?>" autocomplete="off">
      </div><br><br><br><br>

      <div class="textbox col-md-6 input-icons">
        <i class="fas fa-star-of-life icon"></i>
        <input class="form-control form-control-sm input-field" style="border: none;" type="text" placeholder="Soyadı*" name="musteri_soyad"  required=" "  value="<?php echo $kaydet["musteri_soyad"] ?>" autocomplete="off">
      </div><br><br><br><br>
      <div class="textbox col-md-6 input-icons">
        <i class="fa fa-envelope icon"></i>
        <input class="form-control form-control-sm input-field" style="border: none;" type="email" placeholder="E-Posta*" name="musteri_email"  required=""  value="<?php echo $kaydet["musteri_email"] ?>" style="text-transform: lowercase;">
      </div><br><br><br><br>

      <div class="textbox col-md-6 input-icons">
        <i class="fa fa-phone icon"></i>
        <input class="form-control form-control-sm input-field" style="border: none;" type="text" placeholder="Telefon" name="musteri_tel"  required=""  value="<?php echo $kaydet["musteri_tel"] ?>" onkeypress="return event.charCode>=48 && event.charCode<=57">
      </div><br><br><br><br>

      <div class="textbox col-md-12 input-icons">
        <i class="fa fa-home icon"></i>
        <textarea class="form-control input-field" style="border: none;" type="text" placeholder="Adres" name="musteri_adres" value=""><?php echo $kaydet["musteri_adres"] ?></textarea>
      </div><br><br><br><br>

      <div class="col-md-6 input-icons">
       <i class="fa fa-user icon"></i>
       <input class="form-control form-control-sm input-field" style="border: none;" type="text" placeholder="Kullanıcı Adı*" name="kullanici_adi"  required="" value="<?php echo $kaydet["kullanici_adi"] ?>" style="text-transform: lowercase;">
      </div><br><br><br><br>

      <div class="textbox col-md-6 input-icons">
        <i class="fa fa-lock icon"></i>
        <input class="form-control form-control-sm input-field" style="border: none;" type="password" placeholder="Şifre*" name="musteri_sifre"   value="<?php echo $kaydet["musteri_sifre"] ?>" style="text-transform: lowercase;">
      </div><br>
      <div class="textbox col-sm-6  input-icons ">
        <input class="form-control form-control-sm input-field" style="border: none;" type="text" hidden="" placeholder="ID" name="id"  required=""  value="<?php echo $kaydet["id"] ?>" autocomplete="off">
      </div><br><br>

<button class="btn btn-success" name="btnprofilguncelle"><h6>BİLGİLERİ GÜNCELLE</h6></button>
</form>
    











  

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