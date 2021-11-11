<?php 
//TOPLAM TUTAR VE ADET HESAPLAMA
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

<table class="table">
        <thead>
          <tr>
           <th scope="col"><span style="font-size:30px; font-family:helvetica; color:black;  cursor:pointer" onclick="openNav()"> &#9776;  <a class="linkver" href="adminpanel.php"><b>MGK FASHION</b><i class="fa fa-tag fa-1x"></i> </a></span></th>
           <th scope="col">
           <form action="adminsearch.php" method="GET"><input type="text" class="search input-field" placeholder="Search" name="adminarama"/><i class="fa fa-search search-icon icon"></i> 
             <input type="submit" class="btn btn-outline-dark btn-sm" value="Search"/>
            </form>
           </th>

           
              
           <td align="right">
            <span class="menu"><a class="linkver" href="profil.php" >
           <a class="linkver" href="adminpanel.php"><i class="fa fa-users-cog fa-2x"></i></a>
           <div class="acilir-menu">
      <?php 
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
      <a href="personel.php">>Personel Ekle</a>
      <a href="cikisyap.php">>Çıkış Yap</a>
    </div>
  </span>


         </td>
          </tr>
       </thead>
      </table>
      