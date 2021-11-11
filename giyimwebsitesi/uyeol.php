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
  
  <?php
session_start();
?>
<?php include ("yanmenu.php") ?>
 
<div id="main" class="container">
 
    <!--NAVBAR-->
  <?php include("navbar.php"); ?><br><br>





<!-- Kayıt Formu -->

    <form action="kayitol.php" method="post" class="row">
      <h2 class="text-center">ÜYE OL</h2>
      <div class="textbox col-md-6  input-icons ">
        <i class="fas fa-star-of-life icon" aria-hidden="true"></i>
        <input class="form-control form-control-sm input-field" type="text" placeholder="      Adı*" name="musteri_ad"  required onkeyup="this.setAttribute('value', this.value);"  value="" autocomplete="off">
      </div><br><br><br><br>

      <div class="textbox col-md-6 input-icons">
        <i class="fas fa-star-of-life icon"></i>
        <input class="form-control form-control-sm input-field" type="text" placeholder="      Soyadı*" name="musteri_soyad"  required onkeyup="this.setAttribute('value', this.value);"  value="" autocomplete="off">
      </div><br><br><br><br>
      <div class="textbox col-md-6 input-icons">
        <i class="fa fa-envelope icon"></i>
        <input class="form-control form-control-sm input-field" type="email" placeholder="      E-Posta*" name="musteri_email"  required onkeyup="this.setAttribute('value', this.value);"  value="" style="text-transform: lowercase;">
      </div><br><br><br><br>

      <div class="textbox col-md-6 input-icons">
        <i class="fa fa-phone icon"></i>
        <input class="form-control form-control-sm input-field" type="text" placeholder="      Telefon" name="musteri_tel"  required onkeyup="this.setAttribute('value', this.value);"  value="" onkeypress="return event.charCode>=48 && event.charCode<=57">
      </div><br><br><br><br>

      <div class="textbox col-md-12 input-icons">
        <i class="fa fa-home icon"></i>
        <textarea class="form-control input-field" type="text" placeholder="      Adres" name="musteri_adres"  required onkeyup="this.setAttribute('value', this.value);"  value=""></textarea>
      </div><br><br><br><br>

      

      <div class="col-md-6 input-icons">
       <i class="fa fa-user icon"></i>
       <input class="form-control form-control-sm input-field" type="text" placeholder="         Kullanıcı Adı*" name="kullanici_adi"  required onkeyup="this.setAttribute('value', this.value);"  value="" style="text-transform: lowercase;">
      </div><br><br><br><br>

      <div class="textbox col-md-6 input-icons">
        <i class="fa fa-lock icon"></i>
        <input class="form-control form-control-sm input-field" type="password" placeholder="       Şifre*" name="musteri_sifre"  required onkeyup="this.setAttribute('value', this.value);"  value="" style="text-transform: lowercase;">
      </div><br><br><br><br>

      <div class="col-md-12 text-center">
        <button type="button" class="btn btn-outline-primary col-md-6 text-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Üyelik Şartlarını Okumak İçin Tıklayın!
</button><br><br><br>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ÜYELİK ŞARTLARI</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-dialog modal-dialog-scrollable">
       <b>KULLANIM VE GİZLİLİK SÖZLEŞMESİ</b> <br>
<p style="text-align: justify;">Bir taraftan “15 Temmuz Mah. Gülbahar Cad. No:41 Bağcılar/İSTANBUL” adresinde mukim MGK FASHION Mağazacılık Hizmetleri Tic. A.Ş. (Aşağıda kısaca “MGK FASHION” olarak anılacaktır) ile diğer tarafta www.lcwaikiki.com internet sitesi ve/veya mobil uygulama (“Site ve/veya Mobil Uygulama”) üyesi (“Üye”) arasında, aşağıdaki şartlarda iş bu sözleşme akdedilmiştir.</p>

  <p style="text-align: justify;">
<center><b>Sözleşmenin Başlangıcı, Amacı ve Kapsamı</b><br></center>
MGK FASHION  işbu sözleşmede belirlenen esaslara uygun olarak, Site ve/veya Mobil Uygulama üzerinden, Üyelerine ürün tedariki ve hizmet sağlar. Üye, Site’de ve/veya Mobil Uygulamada kayıt işlemlerini tamamladıktan sonra, işbu Sözleşme’de belirtilen şartlara uymak koşulu ile e-posta adresini ve şifresini girerek Site’yi ve/veya Mobil Uygulamayı kullanmaya başlayabilir.<br> 
</p>
<b>ÜYE KABUL VE ONAY BEYANI</b><br>
İşbu sözleşmenin tarafı olmayı kabul eder ve ayrıca yukarıda yazan hususları okuduğumu, anladığımı ve yükümlülüklerime uygun şekilde hareket edeceğimi beyan ve taahhüt ederim. Aksi takdirde MGK FASHION’nın tüm talepleri derhal yerine getireceğimi ve uğrayacağı tüm zararı ödeyeceğimi kabul ve taahhüt ederim.<br>
<b>ONAY</b><br>
<b>MGK FASHION</b> Mağazacılık Hizmetleri Tic. A.Ş.
Merkez:15 Temmuz Mahallesi Gülbahar Cad. No:41 Bağcılar, 34212 İstanbul / TÜRKİYE
Telefon: +90 212 657 55 55 - 44 44 529 (44 44 LCW) (<b>MGK FASHION</b> Müşteri Hizmetleri, haftanın 7 günü 08.00 – 24.00 saatleri arasında hizmet vermektedir.)
</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">KAPAT</button>
      </div>
    </div>
  </div>
</div>
<br>
         <br>
         <div class="col-md-12 text-center">
          <input type="checkbox" id="uyesart" name="sozlesme" required="">Üyelik Şartlarını Okudum,kabul ediyorum.</div>
          <br>
          <br>

        <center><button name="btnuye" style="width: 85px;" class="btn btn-outline-danger">ÜYE OL</button>
          <a href="giris.php"><button type="button" class="btn btn-outline-success">GİRİŞ YAP</button></a></center>
    </div>
    </form>
      
 <br>
 <center>


</center>



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


