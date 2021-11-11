 <?php 
   require_once("baglantidb.php");

   // --------MÜŞTERİ EKLEME İŞLEMLERİNİN INSERT INTO SORGUSU İLE GERÇEKLEŞTİRİLMESİ----------//
    if(isset($_POST['btnmusteriekle']))
        {
            $musteri_adi=$_POST['musteri_ad'];
            $musteri_soyadi=$_POST['musteri_soyad'];
            $musteri_email=$_POST['musteri_email'];   //MÜŞTERİ BİLGİLERİ İLGİLİ İNPUTLARDAN POST EDİLİR
            $musteri_adres=$_POST['musteri_adres'];
            $musteri_tel=$_POST['musteri_tel'];
            $kullanici_adi=$_POST['kullanici_adi'];
            $musteri_sifre=$_POST['musteri_sifre'];

 if (!$musteri_adi || !$musteri_soyadi || !$musteri_email || !$musteri_adres || !$musteri_tel || !$kullanici_adi || !$musteri_sifre) {
     die("lütfen boş alan bırakmayınız.");
 }

    $eklemusteri = $db->prepare("INSERT INTO tblmusteri_hesaplari SET musteri_ad=:musteri_ad, musteri_soyad=:musteri_soyad, musteri_email=:musteri_email, musteri_adres=:musteri_adres, musteri_tel=:musteri_tel,  kullanici_adi=:kullanici_adi, musteri_sifre=:musteri_sifre");
   
    $eklemusteri->execute(array('musteri_ad' => $musteri_adi, 'musteri_soyad' => $musteri_soyadi, 'musteri_email'=> $musteri_email, 'musteri_adres' => $musteri_adres, 'musteri_tel' => $musteri_tel, 'kullanici_adi' => $kullanici_adi, 'musteri_sifre' => $musteri_sifre));

     if ($eklemusteri) {
       header("location:musteri_islemleri.php?durum=yes");
    }else {
        header("location:musteri_islemleri.php?durum=no");
        }
    }

    // --------PERSONEL EKLEME İŞLEMLERİNİN INSERT INTO SORGUSU İLE GERÇEKLEŞTİRİLMESİ----------//
    if(isset($_POST['btnpersonelekle']))
        {
            $admin_adi=$_POST['admin_ad'];
            $admin_soyadi=$_POST['admin_soyad'];
            $admin_eposta=$_POST['admin_eposta'];   //PERSONEL BİLGİLERİ İLGİLİ İNPUTLARDAN POST EDİLİR
            $admin_tel=$_POST['admin_tel'];
            $kullanici_adi=$_POST['kullanici_adi'];
            $admin_sifre=$_POST['admin_sifre'];

     if (!$admin_adi || !$admin_soyadi || !$admin_eposta || !$admin_tel || !$kullanici_adi || !$admin_sifre) {
     die("lütfen boş alan bırakmayınız.");
 }

    $ekleper = $db->prepare("INSERT INTO tbladmin SET admin_ad=:admin_ad, admin_soyad=:admin_soyad, admin_eposta=:admin_eposta, admin_tel=:admin_tel,  kullanici_adi=:kullanici_adi, admin_sifre=:admin_sifre");
   
    $ekleper->execute(array('admin_ad' => $admin_adi, 'admin_soyad' => $admin_soyadi, 'admin_eposta'=> $admin_eposta,'admin_tel' => $admin_tel, 'kullanici_adi' => $kullanici_adi, 'admin_sifre' => $admin_sifre));

        if ($ekleper) {
        echo "<h6>Kayıt Başarılı</h6>"; //SORGU BAŞARILI BİR ŞEKİLDE ÇALIŞTIĞINDA EKRANA "KAYIT BAŞARILI" MESAJI YAZAR
    }else {
        echo "Bir hata oluştu."; //ÇALIŞMAZSA "BİR HATA OLUŞTU" MESAJINI YAZAR
        }
      } 


      //---------ÜRÜN EKLEME İŞLEMLERİNİN INSERT INTO SORGUSU İLE GERÇEKLEŞTİRİLMESİ-----------//

      if (isset($_POST["btnurunekle"])) {
          
          $kaydet = $db->prepare("INSERT INTO tblurunler set urun_foto=:urunfoto_alias,urun_adi=:urunadi_alias, renk=:renk_alias, eski_fiyat=:eskifiyat_alias, fiyat=:fiyat_alias, kategoriID=:kategori_alias, cinsiyetID=:cinsiyet_alias");

          $insert = $kaydet->execute(array(
            'urunfoto_alias' => $_POST["urun_foto"],
            'urunadi_alias' => $_POST["urun_ad"],
            'renk_alias' => $_POST["urun_renk"],
            'eskifiyat_alias' => $_POST["eskifiyat"],           //ÜRÜN BİLGİLERİ İLGİLİ İNPUTLARDAN POST EDİLİR
            'fiyat_alias' => $_POST["urun_fiyat"],
            'kategori_alias' => $_POST["urun_kategori"],
            'cinsiyet_alias' => $_POST["urun_cinsiyet"]
        ));

          if ($insert) {
            header("location:urunislemleri.php?durum=yes"); 
           }else{
              header("location:urunislemleri.php?durum=no");
           }


      }

        // --------MÜŞTERİ GÜNCELLEME İŞLEMLERİNİN UPDATE SORGUSU İLE GERÇEKLEŞTİRİLMESİ----------//
      if (isset($_POST['btnmusteriguncelle'])) {
           
           $sorgu=$db->prepare("UPDATE tblmusteri_hesaplari set musteri_ad=:ad_alias, musteri_soyad=:soyad_alias, musteri_email=:email_alias, musteri_adres=:adres_alias, musteri_tel=:tel_alias, kullanici_adi=:kuladi_alias where id={$_POST['id']}");

           $guncelle=$sorgu->execute(array('ad_alias'=>$_POST["musteri_ad"],'soyad_alias'=>$_POST["musteri_soyad"],'email_alias'=>$_POST["musteri_email"],'adres_alias'=>$_POST["musteri_adres"],'tel_alias'=>$_POST["musteri_tel"],'kuladi_alias'=>$_POST["kullanici_adi"]));

           if ($guncelle) {
               header("location:musteri_islemleri.php?durum=yes");
           }else{
              header("location:musteri_islemleri.php?durum=no");
           }


      }


      
        // --------PERSONEL GÜNCELLEME İŞLEMLERİNİN UPDATE SORGUSU İLE GERÇEKLEŞTİRİLMESİ----------//
      if (isset($_POST['btnpersonelguncelle'])) {
           
           $guncelsorgu=$db->prepare("UPDATE tbladmin set admin_ad=:adminad_alias, admin_soyad=:adminsoyad_alias, admin_eposta=:eposta_alias, admin_tel=:admintel_alias,  kullanici_adi=:kuladi_alias where adminID={$_POST['adminID']}");

           $guncelleper=$guncelsorgu->execute(array('adminad_alias'=>$_POST["admin_ad"],'adminsoyad_alias'=>$_POST["admin_soyad"],'eposta_alias'=>$_POST["admin_eposta"],'admintel_alias'=>$_POST["admin_tel"],'kuladi_alias'=>$_POST["kullanici_adi"]));

           if ($guncelleper) {
               header("location:personel.php?durum=yes");
           }else{
              header("location:personel.php?durum=no");
           }


      }

       //---------ÜRÜN GÜNCELLEME İŞLEMLERİNİN UPDATE SORGUSU İLE GERÇEKLEŞTİRİLMESİ-----------//

      if (isset($_POST["btnurunguncelle"])) {
          
          $kaydet = $db->prepare("UPDATE tblurunler set 
            urun_foto=:urunfoto_alias,
            urun_adi=:urunadi_alias, 
            renk=:renk_alias, 
            eski_fiyat=:eskifiyat_alias, 
            fiyat=:fiyat_alias, 
            bedenID=:beden_alias, 
            kategoriID=:kategori_alias, 
            cinsiyetID=:cinsiyet_alias 
            where id={$_POST['id']}"
        );

          $insert = $kaydet->execute(array(
            'urunfoto_alias' => $_POST["urun_foto"],
            'urunadi_alias' => $_POST["urun_ad"],
            'renk_alias' => $_POST["urun_renk"],
            'eskifiyat_alias' => $_POST["eskifiyat"], //ÜRÜN BİLGİLERİ İLGİLİ İNPUTLARDAN POST EDİLİR
            'fiyat_alias' => $_POST["urun_fiyat"],
            'beden_alias' => $_POST["urun_beden"],
            'kategori_alias' => $_POST["urun_kategori"],
            'cinsiyet_alias' => $_POST["urun_cinsiyet"]
        ));

          if ($insert) {
            header("location:urunislemleri.php?durum=yes");
           }else{
              header("location:urunislemleri.php?durum=no");
           }


      }

     


 ?>