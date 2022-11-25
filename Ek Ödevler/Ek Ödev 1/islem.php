<?php
session_start(); 
include("baglan.php");
$id=1;

if(isset($_POST["fiyatgir"])){
    foreach ($_POST as $item) {
        $sorgu = $baglan->prepare("update aktar set fiyat=? where id=?");
        $guncelle = $sorgu->execute(array("$item","$id"));
        $id++;
    }
}
if($guncelle){
    echo"<script>
    alert('Fiyatlar Eklendi');
    window.location.href= 'index.php';
    </script>";
}
if(isset($_POST["satinal"])){
    $_SESSION["satinalinanot"] = $_POST["ot"];
    $_SESSION["miktar"] = $_POST["miktar"];
    $_SESSION["tazemi"] = $_POST["taze"];
    
    echo"<script>
    alert('Satın Alındı');
    window.location.href= 'index.php';
    </script>";
}
?>