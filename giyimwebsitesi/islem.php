 <?php  
 require_once("baglantidb.php");
 // --------PROFİL GÜNCELLEME----------//
      if (isset($_POST['btnprofilguncelle'])) {
           
           $updatesorgu=$db->prepare("UPDATE tblmusteri_hesaplari set musteri_ad=:ad_alias, musteri_soyad=:soyad_alias, musteri_email=:email_alias, musteri_adres=:adres_alias, musteri_tel=:tel_alias, kullanici_adi=:kuladi_alias musteri_sifre=:sifre_alias where id={$_POST['id']}");

           $guncelprofil=$updatesorgu->execute(array('ad_alias'=>$_POST["musteri_ad"],'soyad_alias'=>$_POST["musteri_soyad"],'email_alias'=>$_POST["musteri_email"],'adres_alias'=>$_POST["musteri_adres"],'tel_alias'=>$_POST["musteri_tel"],'kuladi_alias'=>$_POST["kullanici_adi"],'sifre_alias'=>$_POST["musteri_sifre"]));

           if ($guncelprofil) {
               header("location:profil.php?durum=yes");
           }else{
              header("location:profil.php?durum=no");
           }


      }
      ?>
