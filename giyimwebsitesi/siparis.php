<?php 
try {
        $db=new PDO("mysql:host=localhost;port=3306;dbname=dbgiyim_magaza;charset=utf8",'root','');
        //echo "Veritabanı Bağlantısı Başarılı";
    } catch (Exception $e) {
        echo $e->getMessage();
    }
session_start();

if (isset($_POST['btnsiparis'])) {
 
  $id1= $_SESSION['kullanici']['id'];
  $id2= $_SESSION['sepetim']['id'];
  $renk=$_POST['urun_renk'];            //İLGİLİ ALANLARDAN VERİLER POST EDİLİR
  $adet_alias = $_POST['urun_adet'];
  $adres_alias=$_POST['adres'];
  $odeme=$_POST['toplam'];

  //INSERT INTO SORGUSU İLE Tblalisverisgecmisi SAYFASINA BİLGİLER KAYDEDİLİR
    $siparis = $db->prepare("INSERT INTO tblalisverisgecmisi SET musteriID=:id1, urunID=:id2, renk =:renk_alias, adet=
      :adet_alias, adres=:adres_alias, toplam_tutar=:odeme");

    $siparis->execute(array('id1'=>$id1, 'id2'=>$id2, 'renk_alias'=>$renk, 'adet_alias'=> $adet_alias, 'adres'=>$adres_alias, 'odeme'=>$odeme));

    if ($siparis) {
      header("Location:alisverisler.php");
    }else{
      echo "Alışveriş Hata!";
    }
}
 ?>