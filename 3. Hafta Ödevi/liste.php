<?php 
include("baglan.php");
$sorgu=$baglan->query("select* from rehber");
$renbersayi=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="text-align:center;padding: top 50px;">
<div>
    <a href="index.php">Ekle</a> - <a href="liste.php">Listele</a>
</div>
<table width='100%' border='1'>
<tr>
         <td width='60%'>Adı Soyadı</td>
         <td width='20%'>Telefon Numarası</td>
         <td width='20%'>İşlem</td>
      </tr>
      <?php 
      
      while ($satir=$sorgu->fetch(PDO::FETCH_ASSOC)){
        $renbersayi++;
        echo "<tr>
        <td>$satir[Rehber_adsoyad]</td>
        <td>$satir[Rehber_no]</td>
        <td><a href='islem.php?id=$satir[Rehber_id]&kisisil=ok'><button>Sil</button></a></td>
        </tr>";
      }
      ?>
      </table>
      <?php 
       echo"<th><b>Sistemde Toplam $renbersayi  Kayit Var</b></th>"
      ?>
      
</body>
</html>