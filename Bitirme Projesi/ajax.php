<?php
session_start();
include "baglan.php";
$tarihid=$_POST["tarihid"];
$mesaj= "Saat Seçiniz:";
if (isset($_POST["tarihid"])) {
    $sorgu = $baglan->query("select * from saat where tarih_id=$tarihid and musait=0");
    if ($sorgu->rowCount()<1){
        $mesaj = "Bu Tarihe Ait Randevu Kalmamıştır";
    }
    echo "<option value='0'>$mesaj</option>";
    while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='$satir[id]'>$satir[saat]</option>";
    }
}
$tarih=$_POST["tarih"];
$saat=$_POST["saat"];
$adsoyad=$_POST["adsoyad"];
$mail=$_POST["mail"];
$telefon=$_POST["telefon"];

if (isset($_POST["tarih"])) {
    $sorgu = $baglan->prepare("insert into kullanici values(?,?,?,?,?,?)");
    $ekle = $sorgu->execute(array(NULL, $adsoyad, $mail, $telefon, $tarih, $saat));
    $kullaniciid = $baglan->lastInsertId();
    $sorgu->closeCursor();
     unset($sorgu);
     if ($ekle) {
         $sorgu2 = $baglan->prepare("UPDATE `saat` SET `kullanıcı_id` = ?, `musait` = ? WHERE `saat`.`id` = ?");
         $guncelle = $sorgu2->execute(array($kullaniciid,1,$saat));
         $sorgu2->execute(array(NULL,));
         $sorgu2->closeCursor();
         unset($sorgu2);
         echo "Başarılı: Bilgiler Kaydedildi!";
     } else {
         echo "Hata: Bilgiler Kaydedilemedi!";
     }
}
?>