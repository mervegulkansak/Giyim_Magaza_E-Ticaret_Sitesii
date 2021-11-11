<?php 

require_once("baglantidb.php");

//MÜŞTERİ SİLME İŞLEMLERİNİN DELETE SORGUSU İLE YAPILMASI
$sorgu=$db->prepare("DELETE  from tblmusteri_hesaplari where id=:id_alias");

$sil=$sorgu->execute(array('id_alias'=>$_GET["id"]));

if($sil){
	header("location:musteri_islemleri.php?durum=yes");
}else{
		header("location:musteri_islemleri.php?durum=no");
	}
 ?>