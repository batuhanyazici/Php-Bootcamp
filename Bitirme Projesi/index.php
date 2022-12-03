<?php
session_start();
include "baglan.php";
$sorgu = $baglan->query("select * from tarih order by tarih asc");
?>

<!DOCTYPE html>
<html lang="en">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <body class="gradient-custom">
        <div id="login">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand">Online Rezervasyon Uygulaması</a>
                    <a href="giris.php" class="btn btn-outline-danger">Admin Panele Giriş Yap</a>
                </div>
            </nav>
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12 bg-dark">
                            <form id="login-form" class="form" action="" method="post">
                                <h3 class="text-center text-white">Rezervasyon Oluştur</h3>
                                <div class="form-group">
                                    <label class="text-white">Tarihler:</label><br>
                                    <select name="tarih" id="tarih" class="form-control">
                                        <option value="0">Tarih Seçiniz:</option>
                                        <?php
                                        while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                                            $tarih = $satir["tarih"];
                                            $yenitarih = date("d-m-Y", strtotime($tarih));
                                            echo "
                                                <option value='$satir[id]'>$yenitarih</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div id="saatalan" class="form-group">
                                    <label for="password" class="text-white">Saat:</label><br>
                                    <select name="saat" id="saat" class="form-control">
                                        <option value="0">Saat Seçiniz:</option>
                                    </select>
                                </div>
                                <div class="form-group" id="adsoyad">
                                    <label class="text-white">Ad Soyad:</label><br>
                                    <input type="text" name="adsoyad" class="form-control">
                                </div>
                                <div class="form-group" id="mail">
                                    <label class="text-white">Mail:</label><br>
                                    <input type="text" name="mail" class="form-control">
                                </div>
                                <div class="form-group" id="telefon">
                                    <label class="text-white">Telefon:</label><br>
                                    <input type="text" name="telefon" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" id="randevuekle" class="btn btn-info btn-md" value="Oluştur">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $("#saatalan").hide();
        $("#adsoyad").hide();
        $("#mail").hide();
        $("#telefon").hide();
        $("#tarih").change(function() {
            var tarihid = $(this).val();
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    "tarihid": tarihid
                },
                success: function(e) {
                    $("#saatalan").show();
                    $("#saat").html(e);
                }
            });
        })
        $("#saat").change(function() {
            $("#adsoyad").show();
            $("#mail").show();
            $("#telefon").show();
        })
        $("#randevuekle").click(function() {
            var tarih = $("select[name=tarih]").val();
            var saat = $("select[name=saat]").val();
            var adsoyad = $("input[name=adsoyad]").val();
            var mail = $("input[name=mail]").val();
            var telefon = $("input[name=telefon]").val();
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    "tarih": tarih,
                    "saat": saat,
                    "adsoyad": adsoyad,
                    "mail": mail,
                    "telefon": telefon
                },
                success: function(result) {
                    alert(result);
                }
            });
        });
    });
</script>

<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
    }

    #login .container #login-row #login-column #login-box {
        margin-top: 120px;
        max-width: 600px;
        border: 1px solid #9C9C9C;
        background-color: #EAEAEA;
    }

    #login .container #login-row #login-column #login-box #login-form {
        padding: 20px;
    }

    #login .container #login-row #login-column #login-box #login-form #register-link {
        margin-top: -85px;
    }
</style>
<style>
    .gradient-custom {
        /* fallback for old browsers */
        background: #24243e;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(15, 12, 41, 1), rgba(36, 36, 62, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(15, 12, 41, 1), rgba(36, 36, 62, 1));
    }
</style>