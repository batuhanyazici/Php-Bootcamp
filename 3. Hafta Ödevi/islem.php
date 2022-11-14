<?php 
include("baglan.php");
$rehberno=$_GET["id"];

if(isset($_POST["ekle"])){
$sorgu=$baglan->prepare("insert into rehber values(?,?,?)");
$ekle=$sorgu->execute(array(NULL,$_POST["adsoyad"],$_POST["telno"]));
}
if($ekle){
    echo"<script>
    alert('Kayıt Eklendi');
    window.location.href= 'index.php';
    </script>";
}

if ($_GET['kisisil'] == "ok") {
    $sorgu=$baglan->prepare("delete from rehber where Rehber_id=?");
    $sil=$sorgu->execute(array($rehberno));
    if($sil){
        echo"<script>
    alert('Kişi Rehberden Silindi');
    window.location.href= 'liste.php';
    </script>";
    }
    else{
        echo"<script>
    alert('Kişi Rehberden Silinemedi');
    window.location.href= 'liste.php';
    </script>";
    }
}
?>