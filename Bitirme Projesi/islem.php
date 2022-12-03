<?php
session_start();
include "baglan.php";

if (isset($_POST["giris"])) {
    if (!empty($_POST['ad']) && !empty($_POST['sifre'])) {
        $sorgu = $baglan->query("select * from admin");
        $satir = $sorgu->fetch(PDO::FETCH_ASSOC);
        if ($satir["ad"] == $_POST['ad'] && $satir["sifre"] == $_POST['sifre']) {
            $_SESSION["giris"] = "true";
            $_SESSION["kullaniciad"] = $satir["ad"];
            echo "<script>
        alert('Başarıyla Giriş Yaptınız');
        window.location.href= 'admin.php';
        </script>";
        } else {
            echo "<script>
        alert('Kullanıcı Adı veya şifre yanlış');
        window.location.href= 'giris.php';
        </script>";
        }
    } else {
        echo "<script>
        alert('Kullanıcı Adı Ya da Şifre Boş Bırakılamaz');
        window.location.href= 'giris.php';
        </script>";
    }
}
$kullaniciid = $_GET["id"];
$saatid = $_GET["saatid"];
if ($_GET['kisisil'] == "ok") {
    $sorgu = $baglan->prepare("delete from kullanici where id=?");
    $sil = $sorgu->execute(array($kullaniciid));
    $sorgu->closeCursor();
    unset($sorgu);
    if ($sil) {
        $sorgu2 = $baglan->prepare("UPDATE `saat` SET `kullanıcı_id` = ?, `musait` = ? WHERE `saat`.`id` = ?");
        $guncelle = $sorgu2->execute(array(0, 0, $saatid));
        $sorgu2->closeCursor();
        unset($sorgu2);
        echo "<script>
        alert('Kullanıcı Başarıyla Silindi');
        window.location.href= 'admin.php';
        </script>";
    } else {
        echo "<script>
        alert('Kullanıcı Silinemedi');
        window.location.href= 'admin.php';
        </script>";
    }
}

if (isset($_POST["guncelle"])) {
    $tarih = $_POST["tarih"];
    $saat = $_POST["saat"];
    $adsoyad = $_POST["adsoyad"];
    $mail = $_POST["mail"];
    $telefon = $_POST["telefon"];
    $uyeid = $_POST["uyeid"];
    if ($saat == 0) {
        echo "<script>
        alert('Boş Randevu Saati Yoktur');
        window.location.href= 'admin.php';
        </script>";
    } else {
        $sorgu4 = $baglan->prepare("UPDATE saat SET kullanıcı_id=? , musait=? WHERE `kullanıcı_id`=?");
        $guncelle1 = $sorgu4->execute(array(0, 0, $uyeid));
        $sorgu4->closeCursor();
        unset($sorgu4);
        $sorgu3 = $baglan->prepare("UPDATE kullanici SET adsoyad=? , email=? , telefon=? , tarih_id=? , saat_id=? WHERE id=?");
        $guncelle2 = $sorgu3->execute(array($adsoyad, $mail, $telefon, $tarih, $saat, $uyeid));
        $sorgu3->closeCursor();
        unset($sorgu3);
        $sorgu5 = $baglan->prepare("UPDATE `saat` SET `kullanıcı_id` = ?, `musait` = ? WHERE `saat`.`id` = ?");
        $guncelle3 = $sorgu5->execute(array($uyeid, 1, $saat));
        echo "<script>
        alert('Başarıyla Güncellendi');
        window.location.href= 'admin.php';
        </script>";
    }
}

if (isset($_POST["tarihekle"])) {
    $tarih = $_POST["tarih"];
    if (strtotime($tarih) < strtotime(date('Y-m-d'))) {
        echo "<script>
        alert('Geçmişte Bir Tarih Girilemez');
        window.location.href= 'admin.php';
        </script>";
    } else {
        $sorgu = $baglan->prepare("insert into tarih values(?,?)");
        $ekle = $sorgu->execute(array(NULL, $tarih));
        $sorgu->closeCursor();
        unset($sorgu);
        if ($ekle) {
            echo "<script>
        alert('Başarıyla Kayıt Edildi');
        window.location.href= 'admin.php';
        </script>";
        }
    }
}
if (isset($_POST["saatekle"])) {
    $saat = $_POST["saat"];
    $tarih = $_POST["tarih"];
    $sorgu6 = $baglan->prepare("insert into saat values(?,?,?,?,?)");
    $ekle = $sorgu6->execute(array(NULL, $saat, $tarih, 0, 0));
    $sorgu6->closeCursor();
    unset($sorgu6);
    if ($ekle) {
        echo "<script>
    alert('Başarıyla Kayıt Edildi');
    window.location.href= 'admin.php';
    </script>";
    } else {
        echo "<script>
        alert('Kayıt Edilemedi');
        window.location.href= 'admin.php';
        </script>";
    }
}
if (isset($_POST["csv"])) {
    $sorgu = $baglan->query("select * from kullanici");
    $ayrac=";";
    $dosya = fopen("tablo.csv", "w");
    $alanlar= array('ID','Ad Soyad','Email','Telefon','Tarih Id','Saat Id');
    fputcsv($dosya,$alanlar,$ayrac);
    while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) {
        $bilgi= array($satir["id"],$satir["adsoyad"],$satir["email"],$satir["telefon"],$satir["tarih_id"],$satir["saat_id"]);
        fputcsv($dosya,$bilgi,$ayrac);
    }

    if ((file_exists("tablo.csv"))) {
        header("Content-length: " . filesize("tablo.csv"));
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . "tablo.csv" . '"');
        readfile("tablo.csv");
    }
}

if ($_GET['cikis'] == "ok") {
    unset($_SESSION["giris"]);
    unset($_SESSION["kullaniciad"]);
    echo "<script>
    alert('Çıkış Yapıldı');
    window.location.href= 'index.php';
    </script>";
}
