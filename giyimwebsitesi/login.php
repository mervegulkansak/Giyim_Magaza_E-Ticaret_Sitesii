<?php 
//MÜŞTERİ LOGİN İŞLEMLERİ
 session_start();
 include("baglantidb.php"); 

    $kullanici_adi=$_POST['kullanici_adi'];//kullanici_adi name sahip inputtan veriyi post eder.
    $musteri_sifre=$_POST['musteri_sifre'];//musteri_sifre name sahip inputtan veriyi post eder.

    //kullanici_adi ve şifre alanlarının boş olup olmadığını kontrol eder
    if (!$kullanici_adi || !$musteri_sifre) {
        die("boş alan bırakmayınız!");
    }
    //tblmusteri_hesaplari tablosunda kullanıcı adı ve şifresi post edilen verilerle eşit olan kaydı getirme
    $kullanici = $db->query("SELECT * FROM tblmusteri_hesaplari WHERE kullanici_adi = '$kullanici_adi' AND musteri_sifre = '$musteri_sifre'")->fetch();

    //$kullanici sorgusu true değer döndürürse oturum açılır ve index.php sayfasına yönlendirilir
    if ($kullanici) {
        $_SESSION['kullanici'] = $kullanici;
        header("location:index.php?durum=yes");
    }else {//$kullanici sorgusu false değer döndürürse oturum açılmaz ve giris.php sayfasına yönlendirilir
        header("location:giris.php?durum=no");
       
    }




?>