<?php 
session_start();
include("baglan.php");

if(isset($_POST["musteribilgi"])){
    $_SESSION["musteriad"] = $_POST["ad"];
    $_SESSION["musterisoyad"] = $_POST["soyad"];

    echo"<script>
    alert('Müşteri Kayıt Edildi');
    window.location.href= 'index.php';
    </script>";
}

if(isset($_POST["satinal"])){
    
    $_SESSION["cevher"] = $_POST["cevher"];
    $_SESSION["tane"] = $_POST["tane"];
    $_SESSION["temiz"] = $_POST["temiz"];
    $_SESSION["miktar"] = $_POST["miktar"];

    $sorgu = $baglan->query("select * from tane where id=$_SESSION[tane]");
    $satir = $sorgu->fetch(PDO::FETCH_ASSOC);
    $_SESSION["fiyataetkisi"]= $satir["fiyatEtki"];

    echo"<script>
    alert('Satın Alındı');
    window.location.href= 'index.php';
    </script>";
}
?>