<?php
session_start();
include("baglan.php");
$sorgu = $baglan->query("select * from cevher");
$sorgu2 = $baglan->query("select * from tane");
if (isset($_SESSION["cevher"])) {
    $tneetki = taneEtkisi($_SESSION["tane"]);
    $temizliketki = temizlikEtkisi($tneetki, $_SESSION["temiz"]);
    $indirim = $temizliketki - $tneetki;
    $sontutar = $temizliketki * $_SESSION["miktar"];
    $kdv = $sontutar * 8 / 100;
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
    <h1>** Cevher v1.0 ***</h1>
    <form action="islem.php" method="POST">
        <h2>Müşteri’nin:</h2>
        <b>Adı</b> <br>
        <input type="text" name="ad"> <br><br>
        <b>Soyadı</b><br>
        <input type="text" name="soyad"> <br><br>
        <button type="submit" name="musteribilgi">Bilgileri Kaydet</button>
    </form><br>
    <form action="islem.php" method="POST">
        <h2>Cevherin</h2>
        <select name="cevher">
            <?php
            while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                echo "
                    <option value='$satir[id]'>$satir[cevher]</option>";
            }
            ?>
        </select><br><br>
        <b>Tane büyüklüğü:</b><br><br>
        <select name="tane">
            <?php
            while ($satir = $sorgu2->fetch(PDO::FETCH_ASSOC)) {
                echo "
                    <option value='$satir[id]'>$satir[kod]</option>";
            }
            ?>
        </select><br><br>
        <b>Temizlik oranı:</b><br><br>
        <input type="text" name="temiz"><br><br>
        <b>Miktar (ton):</b><br><br>
        <input type="text" name="miktar"><br><br>
        <button type="submit" name="satinal">Kaydet</button>
    </form><br><br>
    <h2>********Fatura********</h2><br>
    <b>Alıcı: <?php echo $_SESSION["musteriad"] . " " . $_SESSION["musterisoyad"] ?></b><br><br>
    <b>Cevher türü: <?php echo cevherad($_SESSION["cevher"]) ?></b><br><br>
    <b>Normal Birim Fiyat: <?php echo cevherFiyat($_SESSION["cevher"]) . " TON/TL " ?></b><br><br>
    <b>Tane: <?php echo tanead($_SESSION["tane"]) . " -" . $_SESSION["fiyataetkisi"] ?></b><br><br>
    <b><?php echo tanead($_SESSION["tane"]) . " Fiyat: " . $tneetki . " TON/TL " ?></b><br><br>
    <b>Temizlik: %<?php echo $_SESSION["temiz"] . ", Etkisi: " . $indirim ?></b>
    <h3>Temizlik Etkisi Sonrası</h3>
    <b> Birim Fiyat: <?php echo $temizliketki . " TON/TL " ?></b><br><br>
    <b>Toplam: <?php echo $sontutar . "TL" ?></b><br><br>
    <b>KDV(%8):<?php echo round($kdv) . "TL" ?> </b><br><br>
    <b>Genel Toplam:<?php echo $geneltoplam . "TL" ?> </b><br><br><br>
    <h2>Mega Madencilik, 2016</h2>
</body>

</html>
<?php
function cevherFiyat($id)
{
    include("baglan.php");
    $sorgu = $baglan->query("select * from cevher where id=$id");
    $satir = $sorgu->fetch(PDO::FETCH_ASSOC);
    return $satir["fiyat"];
}
function taneEtkisi($id)
{
    include("baglan.php");
    $sorgu = $baglan->query("select * from tane where id=$id");
    $satir = $sorgu->fetch(PDO::FETCH_ASSOC);
    $etki = cevherFiyat($_SESSION["cevher"]) * $satir["fiyatEtki"] / 100;
    $taneetki = cevherFiyat($_SESSION["cevher"]) - $etki;
    return $taneetki;
}
function cevherad($id)
{
    include("baglan.php");
    $sorgu = $baglan->query("select * from cevher where id=$id");
    $satir = $sorgu->fetch(PDO::FETCH_ASSOC);
    return $satir["cevher"];
}
function tanead($id)
{
    include("baglan.php");
    $sorgu = $baglan->query("select * from tane where id=$id");
    $satir = $sorgu->fetch(PDO::FETCH_ASSOC);
    return $satir["tane"];
}
function temizlikEtkisi($taneetki, $temizlik)
{
    $etki = $taneetki * $temizlik / 100;
    return $etki;
}
?>