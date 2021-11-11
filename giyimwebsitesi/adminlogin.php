<?php 
 session_start();
 include("baglantidb.php"); 
//ADMİN LOGİN İŞLEMLERİ
    $kullanici_adi=$_POST['kullanici_adi'];//kullanici_adi name sahip inputtan veriyi post eder.
    $admin_sifre=$_POST['admin_sifre'];//admin_sifre name sahip inputtan veriyi post eder.

    if (!$kullanici_adi || !$admin_sifre) {//kullanici_adi ve şifre alanlarının boş olup olmadığını kontrol eder
        die("boş alan bırakmayınız!");
    }
    //tbladmin tablosunda kullanıcı adı ve şifresi post edilen verilerle eşit olan kaydı getirme
    $admin = $db->query("SELECT * FROM tbladmin WHERE kullanici_adi = '$kullanici_adi' AND admin_sifre = '$admin_sifre'")->fetch();

    if ($admin) {//$admin sorgusu true değer döndürürse oturum açılır ve adminpanel.php sayfasına yönlendirilir
        $_SESSION['admin'] = $admin;
        header("location:adminpanel.php");
    }else {//$admin sorgusu false değer döndürürse oturum açılmaz ve admin.php sayfasına yönlendirilir
     header("location:admin.php");
    }


?>




 
 
