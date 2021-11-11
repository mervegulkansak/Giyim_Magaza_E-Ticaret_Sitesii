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
      <div  class="col-md-12" id="yazi"><i class="fa fa-chevron-right">PERSONEL İŞLEMLERİ</i></div>
      </div><br>

      <?php if (isset($_GET["durum"])) {
        if ($_GET["durum"] == "yes") {
          echo "<div class='alert alert-success text-center' role='alert'>
              <h6>İşlem Başarılı</h6>
            </div>";
        }else{
          echo "Hata!İşlem Başarısız.";
           
        } 
      }?>
<!-- Kayıt Formu -->

    <form action="ekle.php" method="post" class="row">
     
      <div class="textbox col-sm-2  input-icons ">
        <i class="fas fa-star-of-life icon" aria-hidden="true"></i>
        <input class="form-control form-control-sm input-field" type="text" placeholder="Adı*" name="admin_ad"  required onkeyup="this.setAttribute('value', this.value);"  value="" autocomplete="off">
      </div><br><br><br><br>

      <div class="textbox col-sm-2 input-icons">
        <i class="fas fa-star-of-life icon"></i>
        <input class="form-control form-control-sm input-field" type="text" placeholder="Soyadı*" name="admin_soyad"  required onkeyup="this.setAttribute('value', this.value);"  value="" autocomplete="off">
      </div><br><br><br><br>
      <div class="textbox col-sm-2 input-icons">
        <i class="fa fa-envelope icon"></i>
        <input class="form-control form-control-sm input-field" type="email" placeholder="E-Posta*" name="admin_eposta"  required onkeyup="this.setAttribute('value', this.value);"  value="" style="text-transform: lowercase;">
      </div><br><br><br><br>

      <div class="textbox col-sm-2 input-icons">
        <i class="fa fa-phone icon"></i>
        <input class="form-control form-control-sm input-field" type="text" placeholder="Telefon" name="admin_tel"  required onkeyup="this.setAttribute('value', this.value);"  value="" onkeypress="return event.charCode>=48 && event.charCode<=57">
      </div><br><br><br><br>

          

      <div class="col-sm-2 input-icons">
       <i class="fa fa-user icon"></i>
       <input class="form-control form-control-sm input-field" type="text" placeholder="Kullanıcı Adı*" name="kullanici_adi"  required onkeyup="this.setAttribute('value', this.value);"  value="" style="text-transform: lowercase;">
      </div><br><br><br><br>

      <div class="textbox col-sm-2 input-icons">
        <i class="fa fa-lock icon"></i>
        <input class="form-control form-control-sm input-field" type="password" placeholder="Şifre*" name="admin_sifre"  required onkeyup="this.setAttribute('value', this.value);"  value="" style="text-transform: lowercase;">
      </div><br><br>
         <div align="center" class="textbox col-sm-2"><button name="btnpersonelekle" class="btn btn-success">Personel Ekle</button></div><br><br>

           
          
         
    </div>
    </form>

<div class="col-sm-12 container">
  <table class="table table-hover table-bordered table-striped" id="table">
      
      <thead>
        <th class="text-center">ID</th>
        <th class="text-center">Adı</th>
        <th class="text-center">Soyadı</th>
        <th class="text-center">E-Posta</th>
        <th class="text-center">Telefon</th>
        <th class="text-center">Kullanıcı Adı</th>
        <th class="text-center">Güncelle/Sil</th>
      </thead>
      <tbody>
      <?php 
      $sorgu=$db->prepare("SELECT * FROM tbladmin");
      $sorgu->execute();

      while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
        <td><?php echo $satir["adminID"]; ?></td>
        <td><?php echo $satir["admin_ad"]; ?></td>
        <td><?php echo $satir["admin_soyad"]; ?></td>
        <td><?php echo $satir["admin_eposta"]; ?></td>
        <td><?php echo $satir["admin_tel"]; ?></td>
        <td><?php echo $satir["kullanici_adi"]; ?></td>
         <td>
          <div align="center"> 

          <a href="personel_guncelle.php?adminID=<?php echo $satir["adminID"]; ?>"><button class="btn btn-warning"><i class="fas fa-user-edit"></i></button></a>

          <a href="personel_sil.php?adminID=<?php echo $satir["adminID"]; ?>"> <button class="btn btn-danger"><i class="fas fa-user-times"></i></button></a>
        </div>
      </td>
        </tr>
    <?php } ?>
      </tbody>
</table>

<br><br><br>
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