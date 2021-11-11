 <?php 
try {
        $db=new PDO("mysql:host=localhost;port=3306;dbname=dbgiyim_magaza;charset=utf8",'root','');
        //echo "Veritabanı Bağlantısı Başarılı";
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    if(isset($_POST['btnekle']))
        {
            $admin_adi=$_POST['admin_ad'];
            $admin_soyadi=$_POST['admin_soyad'];
            $admin_eposta=$_POST['admin_eposta'];
            $admin_tel=$_POST['admin_tel'];
            $kullanici_adi=$_POST['kullanici_adi'];
            $admin_sifre=$_POST['admin_sifre'];

 if (!$admin_adi || !$admin_soyadi || !$admin_eposta || !$admin_tel || !$kullanici_adi || !$admin_sifre) {
     die("lütfen boş alan bırakmayınız.");
 }

    $ekleper = $db->prepare("INSERT INTO tbladmin SET admin_ad=:admin_ad, admin_soyad=:admin_soyad, admin_eposta=:admin_eposta, admin_tel=:admin_tel,  kullanici_adi=:kullanici_adi, admin_sifre=:admin_sifre");
   
    $ekleper->execute(array('admin_ad' => $admin_adi, 'admin_soyad' => $admin_soyadi, 'admin_eposta'=> $admin_eposta,'admin_tel' => $admin_tel, 'kullanici_adi' => $kullanici_adi, 'admin_sifre' => $admin_sifre));

        if ($ekleper) {
        echo "Kayıt Başarılı";
    }else {
        echo "Bir hata oluştu.";
        }
      }

?>