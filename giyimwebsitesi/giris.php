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


 <form action="login.php" method="POST">

        <div class="text-center"><h2>GİRİŞ YAP</h2></div>
       
       <?php if (isset($_GET["durum"])) {
        if ($_GET["durum"] == "yes") {
          echo "<div class='alert alert-success text-center' role='alert'>
              <h6>Giriş Başarılı</h6>
            </div>";
        }else{
          echo "<div class='alert alert-danger text-center' role='alert'>
              <h6>Kullanıcı Adı/Şifre yanlış.Lütfen tekrar deneyiniz!</h6>
            </div>";
           
        } 
      }?>
      
      <div class="input-icons" style="width: 300px; margin-left: 494px; margin-top: 50px;">
       <i class="fa fa-user icon"></i>
       <input class="form-control form-control-sm input-field" type="text" placeholder="Kullanıcı Adı*" name="kullanici_adi"  required onkeyup="this.setAttribute('value', this.value);"  value="" style="text-transform: lowercase;">
      </div><br>
   


    <div class="input-icons" style="width: 300px; margin-left: 494px;">
        <i class="fa fa-lock icon"></i>
        <input class="form-control form-control-sm input-field" type="password" placeholder="Şifre*" name="musteri_sifre"  required onkeyup="this.setAttribute('value', this.value);"  value="" style="text-transform: lowercase;">
    </div><br>

   <center>
      <button class="btn btn-outline-success" name="btngiris" style="width: 300px;" >GİRİŞ YAP</button><br>
        </center><br>
 </form>

 <center>
  <p>Hesabınız yok mu?</p>
<a href="uyeol.php"> <button style="width: 300px;" class="btn btn-outline-danger">ÜYE OL</button> </a>
</center>
 





































 </div>
  <script>
   function girisyap(){
   	var username, username1, pass;
  
 	username= document.getElementById("kuladi").value.length;
 	username1 = document.getElementById("kuladi").value;
 	pass= document.getElementById("sifre").value.length;
 	

   	if ( username == 0 || pass == 0 ) {
   		alert("Lütfen Kullanıcı Adı ve Şifrenizi Giriniz!")
   	}
   	else{
    alert("HOŞGELDİNİZ "+username1)
}
   }
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

