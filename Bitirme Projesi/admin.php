<?php
session_start();
include "baglan.php";
if ($_SESSION["giris"]!=true){
    echo "<script>
    alert('Lütfen Giriş Yapın');
    window.location.href= 'giris.php';
    </script>";
}
$sorgu = $baglan->query("select * from kullanici");
$sorgu1 = $baglan->query("select * from tarih order by tarih asc");
$sorgu3 = $baglan->query("select * from saat where musait=0");

function tarihad($id)
{
    include("baglan.php");
    $sorgu1 = $baglan->query("select * from tarih where id=$id");
    $satir = $sorgu1->fetch(PDO::FETCH_ASSOC);
    $sorgu1->closeCursor();
    unset($sorgu1);
    $tarih = $satir["tarih"];
    $yenitarih = date("d-m-Y", strtotime($tarih));
    return $yenitarih;
}
function saatad($id)
{
    include("baglan.php");
    $sorgu2 = $baglan->query("select * from saat where id=$id");
    $satir = $sorgu2->fetch(PDO::FETCH_ASSOC);
    $sorgu2->closeCursor();
    unset($sorgu2);
    return $satir["saat"];
}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <title>Yönetim Paneli</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body>

    <!-- Preloader - style you can find in spinners.css -->

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <!-- Main wrapper - style you can find in pages.scss -->

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <!-- Topbar header - style you can find in pages.scss -->

        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle profile-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://www.kindpng.com/picc/m/475-4750705_school-administrator-icon-png-transparent-png.png" alt="user-img" width="36" class="img-circle"><span class="text-white font-medium"><?php echo $_SESSION["kullaniciad"]; ?></span></a>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item " href="islem.php?cikis=ok"><button class="btn btn-outline-danger"> Çıkış Yap</button></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin.php" aria-expanded="false">
                                <i class="fas fa-home" aria-hidden="true"></i>
                                <span class="hide-menu">Ana Sayfa</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" data-bs-toggle="modal" data-bs-target="#tarihmodal" aria-expanded="false">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <span class="hide-menu">Tarih Ekle</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" data-bs-toggle="modal" data-bs-target="#saatmodal" aria-expanded="false">
                                <i class="fa fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Saat Ekle</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Toplam Kullanıcı Sayısı</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-success"><?php echo $sorgu->rowCount(); ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Kalan Rezervasyon Alınabilecek Saat Sayısı</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-purple"><?php echo $sorgu3->rowCount(); ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- PRODUCTS YEARLY SALES -->


                <!-- RECENT SALES -->

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Rezervasyonlar</h3>
                                <form action="islem.php" method="POST" class="ms-auto">
                                    <input type="submit" name="csv" class="btn btn-success ms-auto" value="Csv Olarak İndir">
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Ad Soyad</th>
                                            <th class="border-top-0">Telefon Numarası</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Tarih</th>
                                            <th class="border-top-0">Saat</th>
                                            <th class="border-top-0">Güncelle</th>
                                            <th class="border-top-0">Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $satir["id"]; ?></td>
                                                <td><?php echo $satir["adsoyad"]; ?></td>
                                                <td><?php echo $satir["telefon"]; ?></td>
                                                <td><?php echo $satir["email"]; ?></td>
                                                <td><?php echo tarihad($satir["tarih_id"]); ?></td>
                                                <td><?php echo saatad($satir["saat_id"]); ?></td>
                                                <td><a href="duzenle.php?id=<?php echo $satir['id'] ?>" class="btn btn-warning">Güncelle</a></td>
                                                <td><a href='islem.php?id=<?php echo $satir['id']; ?>&kisisil=ok&saatid=<?php echo $satir['saat_id']; ?>' class="btn btn-danger">Sil</a></td>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="tarihmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tarih Ekle</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="islem.php" method="POST">
                                    <label class="col-md-12 p-0">Tarih Ekle</label>
                                    <input type="date" name="tarih" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                                <input type="submit" name="tarihekle" class="btn btn-success" value="Kaydet">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="saatmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Saat Ekle</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="islem.php" method="POST">
                                    <label class="col-md-12 p-0">Tarih Seçiniz:</label>
                                    <select name="tarih" id="tarih" class="form-control">
                                        <?php
                                        while ($satir = $sorgu1->fetch(PDO::FETCH_ASSOC)) {
                                            $tarih = $satir["tarih"];
                                            $yenitarih = date("d-m-Y", strtotime($tarih));
                                            echo "
                                                <option value='$satir[id]'>$yenitarih</option>";
                                        }
                                        ?>
                                    </select><br>
                                    <label class="col-md-12 p-0">Saat Ekle</label>
                                    <input type="text" name="saat" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                                <input type="submit" name="saatekle" class="btn btn-success" value="Kaydet">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- End Page wrapper  -->

    </div>

    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>
</body>

</html>