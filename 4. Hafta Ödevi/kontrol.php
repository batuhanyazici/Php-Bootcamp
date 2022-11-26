<?php 
include_once "kimlik.php";

if (@$_POST["kontrol"] != "1") {
    @header("Location:index.php");
  }
  
$adsoyad = $_POST["adsoyad"];
$tckimlik = $_POST["tc"];

$tckontrol = new tcKimlik($adsoyad,$tckimlik);
$dogrula = $tckontrol->dogrula();
$kayet = $tckontrol->kaydet();

if ($dogrula==true){
    echo "TC Kimlik Numarası Doğrulandı";
} else {
    echo $tckontrol->mesaj();
}

if ($kayet==true){
    echo "Kayıt Yapıldı";
} else {
    echo "Kayıt Yapılamadı";
}

?>