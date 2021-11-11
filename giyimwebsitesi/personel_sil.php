<?php 

require_once("baglantidb.php");
//PERSONEL SİLME İŞLEMLERİNİN DELETE SORGUSU İLE YAPILMASI
$sorgu=$db->prepare("DELETE FROM tbladmin WHERE adminID=:id_alias");

$sil=$sorgu->execute(array('id_alias'=>$_GET["adminID"]));

if($sil){
	header("location:personel.php?durum=yes");
}else{
	header("location:personel.php?durum=no");
}
 ?>