<?php 
include("baglan.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekleme</title>
</head>
<body style="text-align:center;padding: top 50px;">
<div>
    <a href="index.php">Ekle</a> - <a href="liste.php">Listele</a>
</div>
    <form action="islem.php" method="POST">
    <b>Ad Soyad:</b> <br>
    <input type="text" name="adsoyad"> <br>
    <b>Telefon Numarası</b><br>
    <input type="text" name="telno"> <br><br>
    <button type="submit" name="ekle">Bilgileri Kaydet</button>

    </form>
</body>
</html>