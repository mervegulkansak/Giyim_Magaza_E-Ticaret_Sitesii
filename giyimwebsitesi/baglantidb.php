<?php
	
	try {
		$db=new PDO("mysql:host=localhost;port=3306;dbname=dbgiyim_magaza;charset=utf8",'root','');
		//echo "Veritabanı Bağlantısı Başarılı";
	} catch (Exception $e) {
		echo $e->getMessage();
	}
?>