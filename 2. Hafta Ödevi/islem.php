<?php
  session_start();

  $islem = $_GET["hareket"];
  $adet = $_POST["adet"]; 
  $urun = $_POST["urun"]; 
  $urunno = $_GET["urunno"]; 

  if ($islem == "ekle") {
    if ($adet > 0) {
      if (isset($_SESSION["sepet"][$urun])) {
        $_SESSION["sepet"][$urun] += $adet; 
      } else {
        $_SESSION["sepet"][$urun] = $adet; 
      }
    }
    header("Location:index.php");
  }

  else if ($islem == "sil") {
    if (isset($_SESSION["sepet"][$urunno])) {
      unset($_SESSION["sepet"][$urunno]);
    }
    header("Location:index.php");
  }

  else if ($islem == "bosalt") {
    if (isset($_SESSION["sepet"])) {
      unset($_SESSION["sepet"]);
    }
    header("Location:index.php");
  }
  
  else {
    header("Location:index.php");
  }
  

?>
