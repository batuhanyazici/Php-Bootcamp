<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
$urun=array(
array("urunad"=>"Ülker Çikolatalı Gofret","urunfiyat"=>"10"),
array("urunad"=>"Eti Damak Kare Çikolata","urunfiyat"=>"20"),
array("urunad"=>"Nestle Bitter Çikolata","urunfiyat"=>"20")
);
?>
</style>
<form method="post">
<table>
  <tr>
    <th>Ürün Adı</th>
    <th>Ürün Fiyatı</th>
    <th>Adet</th>
  </tr>
    <?php
    foreach($urun as $item) {?>
    <tr>
        <td><?php echo $item["urunad"] ?></td>
        <td><?php echo $item["urunfiyat"] ?></td>
        <td><input type="text" name="ekle"></td>
    </tr>
    <?php
    }
    ?>
</table>
<button type="submit">Ürünü Sepete Ekle</button>
</form>
<?php
if($_POST){
    $_SESSION["UrunAdet"]=$_POST["ekle"];
    if($_SESSION["UrunAdet"]>=1){
      echo $_SESSION["UrunAdet"];
    }
}
?>

<style>
table, th, td {
  border:1px solid black;
}