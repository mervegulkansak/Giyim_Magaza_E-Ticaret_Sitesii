<?php 

require_once("baglantidb.php");

//ÜRÜN SİLME İŞLEMLERİNİN DELETE SORGUSU İLE YAPILMASI
$sorgu=$db->prepare("DELETE FROM tblurunler WHERE id=:id_alias");

$sil=$sorgu->execute(array('id_alias'=>$_GET["id"]));

if($sil){
	header("location:urunislemleri.php?durum=yes");
}else{
	header("location:urunislemleri.php?durum=no");
}
 ?>