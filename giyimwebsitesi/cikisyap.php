

<?php
//OTURUMLARDAN ÇIKIŞ YAPMA İŞLEMLERİNDE KULLANILAN KOD BLOĞU
session_start();

session_destroy();

header("location:index.php");
?>