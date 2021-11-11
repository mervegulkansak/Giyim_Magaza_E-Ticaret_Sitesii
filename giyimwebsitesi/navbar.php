<?php 
//NAVBAR DA BULUNAN SEPET İKONUNDA SEPET ADETİNİ GÖSTERİLMESİ İÇİN TOPLAM TUTAR VE ADET HESAPLAMA
if(isset($_SESSION["sepetim"])){

  $sepetim = $_SESSION["sepetim"];

  $toplam_adet = $sepetim["summary"]["toplam_adet"];
  $toplam_tutar = $sepetim["summary"]["toplam_tutar"];
  $alınan_urunler = $sepetim["urunler"];
}else{
  $toplam_adet = 0;
  $toplam_tutar = 0.0;
}
?>
<!--DROPDOWN-->
<style type="text/css">
  .acilir-menu  {
    display: none;
    position: absolute;
    background-color: #2d2929;
    min-width: 200px;
    height: 180px;
    color: white;
    border-radius: 5px;
    text-align: left;
}

.acilir-menu a {
    display: block;
    text-align: left;
    margin-left: 30px;
    text-decoration: none;
    color: white;
}
.acilir-menu button {
  margin-top: 10px;
  width: 150px;
}

.acilir-menu a:hover {
    color: #c21b21;
}

.menu:hover .acilir-menu {
    display: block;
}

.aktif {
    background-color: #1A3680;
    color: red;
}
</style>
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
}
      ?>

<table class="table">
        <thead>
          <tr>
           <th scope="col"><span style="font-size:30px; font-family:helvetica; color:black;  cursor:pointer" onclick="openNav()"> &#9776;  <a class="linkver" href="index.php"><b>MGK FASHION</b><i class="fa fa-tag fa-1x"></i> </a></span></th>
           <th scope="col">
            <form action="search.php" method="GET"><input type="text" class="search input-field" placeholder="Search" name="arama"/><i class="fa fa-search search-icon icon"></i> 
             <input type="submit" class="btn btn-outline-dark btn-sm" value="Search"/>
             </form>
           </th>

            <td align="right">
              <div class="menu">
  <span class="menu"><a class="linkver" href="profil.php" ><i class="fa fa-user fa-2x"></i></a>
    <div class="acilir-menu">
      <?php //SESSION DA TUTULAN MUSTERİ BİLGİLERİNİN AÇILIR MENÜDE GÖSTERİLMESİ
    if (isset($_SESSION['kullanici'])) {
        echo $_SESSION['kullanici']['musteri_ad'];
        echo "  ".$_SESSION['kullanici']['musteri_soyad'];
        echo "  "."(".$_SESSION['kullanici']['kullanici_adi'].")";
    }else {
        echo "<a href='giris.php'> <button class='btn btn-outline-success'>GİRİŞ YAP</button></a><a href='uyeol.php'> <button class='btn btn-outline-danger'>ÜYE OL</button></a>";
    }?>
      <a href="profil.php">>Profil</a>
      <a href="alisverisler.php">>Alışveriş Geçmişi</a>
      <a href="cikisyap.php">>Çıkış Yap</a>
    </div>
  </span>

             <a class="linkver" href="favoriler.php"><i class="fa fa-heart fa-2x"></i></a>
             <a class="linkver" href="sepetim.php"><span><i class="fa fa-shopping-bag fa-2x"></i></span><span class="badge rounded-pill bg-danger cart-count"><?php echo $toplam_adet; ?></span></a>
             
           </td>
           <td align="right">
            <span class="menu"><a class="linkver" href="profil.php" >
           <a class="linkver" href="admin.php"><i class="fa fa-users-cog fa-2x"></i></a>
           <div class="acilir-menu">
      <?php //SESSION DA TUTULAN ADMİN BİLGİLERİNİN AÇILIR MENÜDE GÖSTERİLMESİ
    if (isset($_SESSION['admin'])) {
        echo $_SESSION['admin']['admin_ad'];
        echo "  ".$_SESSION['admin']['admin_soyad'];
        echo "  "."(".$_SESSION['admin']['kullanici_adi'].")";
    }else {
        echo "<a href='admin.php'> <button class='btn btn-outline-success'>GİRİŞ YAP</button></a>";
    }?>
      <a href="urunislemleri.php">>Ürün İşlemleri</a>
      <a href="musteri_islemleri.php">>Müşteri İşlemleri</a>
      <a href="siparisler.php">>Siparişler</a>
      <a href="cikisyap.php">>Çıkış Yap</a>
    </div>
  </span>


         </td>
          </tr>
       </thead>
      </table>
      