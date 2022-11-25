<?php 
error_reporting(0);
$baglan= new PDO("mysql:host=localhost;dbname=maden;charset=utf8","batuhan","1234");

if($baglan->connect_errno){
    echo "Hata";
}
else{
    //echo"Hata yok";
}
?>