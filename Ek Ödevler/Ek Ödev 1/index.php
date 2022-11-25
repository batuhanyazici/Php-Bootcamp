<?php
session_start();
include("baglan.php");
$sorgu = $baglan->query("select * from aktar");
if (isset($_SESSION["satinalinanot"])) {
    $islemtutar = otBirimFiyat($_SESSION["satinalinanot"]) * $_SESSION["miktar"];
    $tazeliketki = tazelikEtkisi($_SESSION["satinalinanot"], $_SESSION["tazemi"], otBirimFiyat($_SESSION["satinalinanot"]));
    $sontutar = $islemtutar - $tazeliketki;
    $kdv = $sontutar * 18 / 100;
    $geneltoplam = $sontutar + $kdv;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>** Ot Master v1.0 ***</h1>
    <form action="islem.php" method="POST">
        <h2>Kg başı ot fiyatları giriniz:</h2>
        <b>Kekik</b> <br>
        <input type="text" name="kekik"> <br><br>
        <b>Nane</b><br>
        <input type="text" name="nane"> <br><br>
        <b>Fesleğen</b><br>
        <input type="text" name="feslegen"> <br><br>
        <b>Reyhan</b><br>
        <input type="text" name="reyhan"> <br><br>
        <button type="submit" name="fiyatgir">Bilgileri Kaydet</button>
    </form>
    <h2>Satın Al</h2>
    <form action="islem.php" method="POST">
        <select name="ot">
            <?php
            while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                echo "
                    <option value='$satir[id]'>$satir[ot]</option>";
                }
            ?>
        </select><br><br>
        <b>Miktar (kg)</b><br><br>
        <input type="text" name="miktar"><br><br>
        <b>Taze mi?(1=taze):</b><br><br>
        <input type="text" name="taze"><br><br>
        <button type="submit" name="satinal">Kaydet</button>
    </form><br>
    <b>İşlem Tutarı: <?php echo $islemtutar . "TL" ?></b><br>
    <b>Tazelik Etkisi: <?php echo "-" . $tazeliketki ?></b><br>
    <b>Tutar: <?php echo $sontutar . "TL" ?></b><br>
    <b>KDV(%18):<?php echo round($kdv) . "TL" ?> </b><br><br>
    <b>Fatura:</b><br><br>
    <b> OT A.Ş.</b><br><br>
    <b><?php echo otad($_SESSION["satinalinanot"]) . ": " . $_SESSION["miktar"] . " X " . otBirimFiyat($_SESSION["satinalinanot"]) ?></b><br><br>
    <b> <?php if ($_SESSION["tazemi"] == 0) {
            echo "Taze Değil";
        } else {
            echo "Taze";
        } ?></b><br><br>
    <b>KDV(%18):<?php echo round($kdv) . "TL" ?></b><br>
    <b>Genel Toplam:<?php echo $geneltoplam . "TL" ?></b><br>
    <?php   ?>
</body>

</html>
<?php
function otBirimFiyat($id)
{
    include("baglan.php");
    $sorgu = $baglan->query("select * from aktar where id=$id");
    $satir = $sorgu->fetch(PDO::FETCH_ASSOC);
    return $satir["fiyat"];
}
function tazelikEtkisi($id, $durum, $fiyat)
{
    include("baglan.php");
    $sorgu = $baglan->query("select * from aktar where id=$id");
    $satir = $sorgu->fetch(PDO::FETCH_ASSOC);
    if ($durum == 0) {
        $toplam = $fiyat * $_SESSION["miktar"];
        $sonfiyat = ($toplam / 100) * $satir["fiyat_etki"];
        return $sonfiyat;
    } else {
        $sonfiyat = 0;
        return $sonfiyat;
    }
}
function otad($id)
{
    include("baglan.php");
    $sorgu = $baglan->query("select * from aktar where id=$id");
    $satir = $sorgu->fetch(PDO::FETCH_ASSOC);
    return $satir["ot"];
}
?>