<!DOCTYPE html>
<html lang="tr">
<head>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.6.0.min.js"></script>

  <title>SİPARİŞ ONAY</title>
  
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
      <div  class="col-md-4" id="yazi"><i class="fa fa-chevron-right"></i>Sipariş Onay</div>
      </div>

<div class="container">

<?php if($toplam_adet > 0){ ?>
  <h5 class="text-center"><strong class="color-danger"><?php echo $toplam_adet ?></strong> adet siparşinizin tamamlanabilmesi için lütfen adres bilgilerinizi giriniz!</h5>



  

  <form action="siparis.php" method="POST">
     <!--ÜRÜN BİLGİLERİ-->
     <?php foreach ($alınan_urunler as $urun) { ?>
          <input type="image" name="foto" src="<?php echo $urun->urun_foto; ?>" alt="" width="50"><br>
           <label><strong>Ürün Adı: </strong></label> 
         <input type="text" name="urun_ad" style="width: 200px;" class="input-form" value="<?php echo $urun->urun_adi; ?>"><br>
          <label><strong>Renk: </strong></label> 
          <input type="text" name="urun_renk" class="input-form" value="<?php echo $urun->renk; ?>"><br>
           <label><strong>Beden: </strong></label> 
          <input type="text" name="beden" class="item-count-input" value=""><br>
             <label><strong>Adet: </strong></label> 
          <input type="text" name="urun_adet" class="item-count-input" value="<?php echo $urun->count ?>"><br>
             <label><strong>Fiyat: </strong></label> 
          <input type="text" name="fiyat" class="item-count-input" value="<?php echo '₺'.$urun->fiyat; ?>"><br>
              <label><strong>Toplam Tutar: </strong></label> 
          <input type="text" name="toplam" class="item-count-input" value="<?php echo '₺'.$urun->toplam_tutar; ?>"><br>
        
           <button urun_id="<?php echo $urun->id; ?>" class="btn btn-danger btn-sm btn_sepetSil"> <span class="fas fa-times"></span> Sipariş İptal</button><br>
      
        <?php } ?>
       
        <!----------------------------------------------------------------------->
        
     <!--TESLİMAT BİLGİLERİ-->
 <div class="row">
      <label><h6><strong>TESLİMAT ADRESİ</strong></h6></label> 
    
  <div class="col-md-6">
   <label>Ad*</label>
  <input class="form-control form-control-sm" type="text" name="" required="">
  </div>

  <div class="col-md-6">
   <label>Soyad*</label>
  <input class="form-control form-control-sm" type="text" name="" required="">
  </div>

  <div class="col-md-12">
    <label>Adres*</label>
  <textarea class="form-control" required="" name="adres"></textarea>
  </div>

  <div class="col-md-4">
   <label>Ülke*</label>
  <input class="form-control form-control-sm" type="text" name="" required="" value="Türkiye">
  </div>

   <?php 
      $sehir=$db->prepare("SELECT * FROM tblsehir");
      $sehir->execute();
      $satirlar = $sehir->fetchALL(PDO::FETCH_ASSOC);
       ?>
       <div class="col-md-6">
      <label>Şehir*</label><br>
     <select  required="" class="form-control form-control-sm">
      <option selected="">Seçiniz</option>
        <?php foreach ($satirlar as $satir) {?>
          
           <option value="<?php echo $satir['sehirID']; ?>">
             <?php echo $satir['sehir_ad']; ?>
           </option>

         <?php  } ?>
    </select>
 </div>
 

  

  <div class="col-md-6">
   <label>GSM*</label>
    <input class="form-control form-control-sm" type="text" required="" name="" onkeypress="return event.charCode>=48 && event.charCode<=57">
  </div><br><br>


<div align="right">

      <button  type="submit" class="btn btn-lg text-center" style="background-color: #7b4746;color: white;position: relative; top: 10px;" name="btnsiparis">Siparişi Tamamla <i class="fas fa-check"></i></button>
    </div>
  
</form>



<?php }else { ?>
   <div class="alert alert-danger text-center">
     <strong>Siparişiniz bulunmamaktadır. Sipariş için <a href="index.php">tıklayınız</a></strong>
   </div>
<?php } ?>


  

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