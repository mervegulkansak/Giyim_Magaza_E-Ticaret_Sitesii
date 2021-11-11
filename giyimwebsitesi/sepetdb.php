<?php 
 include ("baglantidb.php");
 session_start();

function sepeteEkle($urun_item){
	//SESSION
		if(isset($_SESSION["sepetim"])){
			$sepetim = $_SESSION["sepetim"];
			$urunler = $sepetim["urunler"];

		}else{
			$urunler = array();
			
		}

		//adet kontrolü
		if(array_key_exists($urun_item->id, $urunler)){
			$urunler[$urun_item->id]->count++;
		}else{
			$urunler[$urun_item->id] = $urun_item;
		}
		//Sepetin Hesaplanması
			$toplam_tutar = 0.0;
			$toplam_adet = 0;
			foreach ($urunler as $urun) {
				$urun->toplam_tutar = $urun->count * $urun->fiyat;
				$toplam_tutar = $toplam_tutar + $urun->toplam_tutar;
				$toplam_adet += $urun->count;
			}

			

			$summary["toplam_tutar"] = $toplam_tutar;
			$summary["toplam_adet"] = $toplam_adet;

			$_SESSION["sepetim"]["urunler"] = $urunler;
			$_SESSION["sepetim"]["summary"] = $summary;
			
			return $toplam_adet;

}

function sepetSil($urun_id){

	if(isset($_SESSION["sepetim"])){
			$sepetim = $_SESSION["sepetim"];
			$urunler = $sepetim["urunler"];

			//Ürünü sepet listesinden çıkar
			  settype($urun_id,"integer");
 
			if (array_key_exists($urun_id, $urunler)) {
				unset($urunler[$urun_id]);
			}
			//Sepetin Yeni Durumunu Hesapla

			$toplam_tutar = 0.0;
			$toplam_adet = 0;
			foreach ($urunler as $urun) {
				$urun->toplam_tutar = $urun->count * $urun->fiyat;
				$toplam_tutar = $toplam_tutar + $urun->toplam_tutar;
				$toplam_adet += $urun->count;
			}

			

			$summary["toplam_tutar"] = $toplam_tutar;
			$summary["toplam_adet"] = $toplam_adet;

			$_SESSION["sepetim"]["urunler"] = $urunler;
			$_SESSION["sepetim"]["summary"] = $summary;
			
			return true;
		}

}

function arttır($urun_id){
	if(isset($_SESSION["sepetim"])){
			$sepetim = $_SESSION["sepetim"];
			$urunler = $sepetim["urunler"];

		//adet kontrolü
		if(array_key_exists($urun_id, $urunler)){
			$urunler[$urun_id]->count++;
		}else{
			$urunler[$urun_item->id] = $urun_item;
		}
		//Sepetin Hesaplanması
			$toplam_tutar = 0.0;
			$toplam_adet = 0;
			foreach ($urunler as $urun) {
				$urun->toplam_tutar = $urun->count * $urun->fiyat;
				$toplam_tutar = $toplam_tutar + $urun->toplam_tutar;
				$toplam_adet += $urun->count;
			}

			

			$summary["toplam_tutar"] = $toplam_tutar;
			$summary["toplam_adet"] = $toplam_adet;

			$_SESSION["sepetim"]["urunler"] = $urunler;
			$_SESSION["sepetim"]["summary"] = $summary;
			
			return true;
		}

		

}
function azalt($urun_id){
if(isset($_SESSION["sepetim"])){
			$sepetim = $_SESSION["sepetim"];
			$urunler = $sepetim["urunler"];

		//adet kontrolü
		if(array_key_exists($urun_id, $urunler)){
			$urunler[$urun_id]->count--;
			if($urunler[$urun_id]->count == 0){
				unset($urunler[$urun_id]);
			}
		}else{
			$urunler[$urun_item->id] = $urun_item;
		}
		//Sepetin Hesaplanması
			$toplam_tutar = 0.0;
			$toplam_adet = 0;
			foreach ($urunler as $urun) {
				$urun->toplam_tutar = $urun->count * $urun->fiyat;
				$toplam_tutar = $toplam_tutar + $urun->toplam_tutar;
				$toplam_adet += $urun->count;
			}

			

			$summary["toplam_tutar"] = $toplam_tutar;
			$summary["toplam_adet"] = $toplam_adet;

			$_SESSION["sepetim"]["urunler"] = $urunler;
			$_SESSION["sepetim"]["summary"] = $summary;
			
			return true;
		}

}

if (isset ($_POST["p"])) {
	//SEPETE EKLENEN ÜRÜNLERİN LİSTELENMESİ SORGUSU
	$islem = $_POST["p"];
	if ($islem =="sepeteEkle") {
		
		$id = $_POST["urun_id"];

		$urun = $db->query("SELECT * FROM tblurunler WHERE id={$id}",PDO::FETCH_OBJ)->fetch();
		$urun->count = 1;


		echo sepeteEkle($urun);



	}else if ($islem == "sepetSil"){

		$id = $_POST["urun_id"];
		echo sepetSil($id);

	}

}
if (isset ($_GET["p"])) {
	
	$islem = $_GET["p"];
	if ($islem =="arttır") {
		
		$id = $_GET["urun_id"];
	if (arttır($id)) {
	header("Location:http://localhost/giyimwebsitesi/sepetim.php");
	}

	}else if ($islem == "azalt"){

		$id = $_GET["urun_id"];
		if (azalt($id)) {
		header("Location:http://localhost/giyimwebsitesi/sepetim.php");
		}

	}
}




 ?>
