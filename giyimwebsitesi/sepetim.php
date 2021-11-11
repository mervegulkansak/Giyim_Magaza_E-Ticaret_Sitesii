<!DOCTYPE html>
<html lang="tr">
<head>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.6.0.min.js"></script>

  <title>SEPETİM</title>
  
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
<?php session_start(); ?>
      <!---------------YAN MENU------------------>
<?php include("yanmenu.php"); ?>
     
<div id="main" class="container">
      <!-----------NAVBAR-------------->
    <?php include ("navbar.php"); ?>


      <!-------------------SAYFA İÇERİĞİ------------------------->
      <div class="row">
      <div  class="col-md-4" id="yazi"><i class="fa fa-chevron-right"></i>SEPETİM</div>
      </div>


<div class="container">
  <?php if($toplam_adet > 0){ ?>
  <h2 class="text-center">Sepetinizde <strong class="color-danger"><?php echo $toplam_adet ?></strong> adet ürün bulunmaktadır</h2>

<div class="row">
  <div class="col-md-12 col-md-offset-2">
    <table class="table table-hover table-bordered table-striped" id="table">
      
      <thead>
        <th class="text-center">Ürün Resmi</th>
        <th class="text-center">Ürün Adı</th>
        <th class="text-center">Renk</th>
        <th class="text-center">Beden</th>
        <th class="text-center">Adet</th>
        <th class="text-center">Fiyat</th>
        <th class="text-center">Toplam</th>
        <th class="text-center">Sepetten Çıkar</th>
      </thead>
      <tbody>
        <?php foreach ($alınan_urunler as $urun) { ?>
           <tr>
          <td class="text-center" width="120">
            <img src="<?php echo $urun->urun_foto; ?>" alt="" width="50">
          </td>
          <td class="text-center"><?php echo $urun->urun_adi; ?></td>
          <td class="text-center"><input type="text" name="" class="input-form" value="<?php echo $urun->renk; ?>"> </td>
          <td class="text-center"><input type="text" name="" class="item-count-input" value=""></td>

         <!--ÜRÜN ARTTIR AZALT -->
         <td class="text-center">

           <a href="sepetdb.php?p=arttır&urun_id=<?php echo $urun->id; ?>" class="text-center"><button class="btnsuccess">
            <span class="fas fa-plus"></span></button>
           </a>

           <input type="text" name="" class="item-count-input" value="<?php echo $urun->count ?>">

           <a href="sepetdb.php?p=azalt&urun_id=<?php echo $urun->id; ?>" class="text-center"><button class="btndanger">
            <span class="fas fa-minus"></span></button>
          </a>

         </td>
         <!--/ÜRÜN ARTTIR AZALT -->

          <td class="text-center"><strong>₺<?php echo $urun->fiyat; ?></strong></td>
         <td class="text-center"><strong>₺<?php echo $urun->toplam_tutar; ?></strong></td>
         <td class="text-center">
           <button urun_id="<?php echo $urun->id; ?>" class="btn btn-danger btn-sm btn_sepetSil"> <span class="fas fa-times"></span> Sepetten Çıkar</button>
         </td>
        </tr>
        <?php } ?>
       
        <!----------------------------------------------------------------------->
        
      </tbody>
      <tfoot>
        <th colspan="4" class="text-right">
          Toplam Ürün : <span style="color: #d9534f"> <?php echo $toplam_adet ?></span>
        </th>

        <th colspan="4" class="text-end">
          Toplam Tutar : <span style="color: #d9534f"> <strong>₺<?php echo $toplam_tutar ?></strong><span>
        </th>
      </tfoot>
    </table>
    <div align="right"><a href="siparisonay.php"><button  class="btn btn-lg text-center" style="background-color: #7b4746;color: white;position: relative; top: 10px;" >Sepeti Onayla</button></a></div>
  </div>
</div>
<?php }else { ?>
   <div class="alert alert-danger text-center" style="margin-top: 100px;">
     <strong>Sepetinizde ürün bulunmamaktadır. Alışveriş yapmak için <a href="index.php">tıklayınız</a></strong>
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