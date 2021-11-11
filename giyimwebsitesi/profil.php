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
  <?php 
    if (isset($_SESSION['kullanici'])) { 
        $id = $_SESSION['kullanici'] ['id'];
        $kullanici_adi = $_SESSION['kullanici'] ['kullanici_adi'];
        $musteri_ad = $_SESSION['kullanici']['musteri_ad'];
        $musteri_soyad = $_SESSION['kullanici']['musteri_soyad'];
        $musteri_email = $_SESSION['kullanici']['musteri_email'];
        $musteri_tel = $_SESSION['kullanici']['musteri_tel'];
        $musteri_adres = $_SESSION['kullanici']['musteri_adres'];
        $musteri_sifre = $_SESSION['kullanici']['musteri_sifre'];
  ?>

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
        <th class="text-center">ID</th>
        <th class="text-center">Ad</th>
        <th class="text-center">Soyad</th>
        <th class="text-center">E-Posta</th>
        <th class="text-center">Adres</th>
        <th class="text-center">Telefon</th>
        <th class="text-center">Kullanıcı Adı</th>
        <th class="text-center">Şifre</th>
        
        <th class="text-center">Güncelle/Sil</th>
      </thead>

      <tbody>
        
       

        
        <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $musteri_ad; ?></td>
        <td><?php echo $musteri_soyad; ?></td>
        <td><?php echo $musteri_email; ?></td>
        <td><?php echo $musteri_adres; ?></td>
        <td><?php echo $musteri_tel; ?></td>
        <td><?php echo $kullanici_adi; ?></td>
        <td><input style="border:none;" type="password" name="" value="<?php echo $musteri_sifre; ?>"></td>
        <td><div align="center"><a href="profil_guncelle.php?id=<?php echo $id; ?>"><button class="btn btn-warning" name="btnprofilguncelle"><i class="fas fa-user-edit"></i></button></a></div></td>
        </tr>
       
  
     
      </tbody>
</table>
</div>

    <?php }else {
        echo "<div class='alert alert-danger text-center' role='alert' style='margin-top: 100px;'>
              <h6>HENÜZ GİRİŞ YAPMADINIZ! <a href='giris.php'>Giriş yapmak için tıklayınız.</a></h6>
            </div>";
    }
  ?>











  

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