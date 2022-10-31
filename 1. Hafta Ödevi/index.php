<?php
$agil =array();
$agil[0]=array("agilsayi"=>9,"kapasite"=>"40","toplamkoyun"=>"300");
$kapasite=$agil[0] ["agilsayi"]*$agil[0] ["kapasite"];
$toplam=$agil[0] ["toplamkoyun"];;
echo "Toplam Ağıl: ".$agil[0] ["agilsayi"];echo "<br>";
echo "Toplam Kapasite: ".$kapasite;echo "<br>";
echo "Toplam Koyun ".$agil[0] ["toplamkoyun"];echo "<br> <br>";
for ($i = $agil[0] ["agilsayi"]; $i >= 1; $i--) {
    if($toplam>$agil[0] ["kapasite"]){
    echo "$i. Ağıl: ".$agil[0] ["kapasite"];echo "<br>";
    $toplam-=$agil[0] ["kapasite"];
    //echo $toplam;echo "<br>";
    if($i==1&&$toplam>0){
            echo "Dışarıda Kalan Koyun: ".$toplam;
    }
    }
    elseif($toplam<$agil[0] ["kapasite"]){
        echo "$i. Ağıl: ".$toplam;echo "<br>";
        $toplam-=$toplam;
    }
}
?>