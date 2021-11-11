 <?php 
try {
        $db=new PDO("mysql:host=localhost;port=3306;dbname=dbgiyim_magaza;charset=utf8",'root','');
        //echo "Veritabanı Bağlantısı Başarılı";
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    if(isset($_POST['btnuye']))
        {
            $musteri_adi=$_POST['musteri_ad'];
            $musteri_soyadi=$_POST['musteri_soyad'];
            $musteri_email=$_POST['musteri_email'];
            $musteri_adres=$_POST['musteri_adres'];
            $musteri_tel=$_POST['musteri_tel'];
            $kullanici_adi=$_POST['kullanici_adi'];
            $musteri_sifre=$_POST['musteri_sifre'];

 if (!$musteri_adi || !$musteri_soyadi || !$musteri_email || !$musteri_adres || !$musteri_tel || !$kullanici_adi || !$musteri_sifre) {
     die("lütfen boş alan bırakmayınız.");
 }

    $uye = $db->prepare("INSERT INTO tblmusteri_hesaplari SET musteri_ad=:musteri_ad, musteri_soyad=:musteri_soyad, musteri_email=:musteri_email, musteri_adres=:musteri_adres, musteri_tel=:musteri_tel,  kullanici_adi=:kullanici_adi, musteri_sifre=:musteri_sifre");
   
    $uye->execute(array('musteri_ad' => $musteri_adi, 'musteri_soyad' => $musteri_soyadi, 'musteri_email'=> $musteri_email, 'musteri_adres' => $musteri_adres, 'musteri_tel' => $musteri_tel, 'kullanici_adi' => $kullanici_adi, 'musteri_sifre' => $musteri_sifre));

     if ($uye) {
        header("Location:giris.php");
    }else {
        echo "Bir hata oluştu.";
        }
    }
?>