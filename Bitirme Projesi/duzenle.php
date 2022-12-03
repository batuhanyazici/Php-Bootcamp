<?php
session_start();
include "baglan.php";
$kullaniciid = $_GET["id"];
$sorgu3 = $baglan->query("select * from tarih");
$sorgu1 = $baglan->query("select * from tarih order by tarih asc");
$sorgu = $baglan->query("select * from kullanici where id=$kullaniciid");
$satir = $sorgu->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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



    <!-- Main wrapper - style you can find in pages.scss -->

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <!-- Topbar header - style you can find in pages.scss -->

        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">

                    <!-- Logo -->


                    <!-- End Logo -->


                    <!-- toggle and nav items -->

                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>

                <!-- End Logo -->

                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">


                    <!-- Right side toggle and nav items -->

                    <ul class="navbar-nav ms-auto d-flex align-items-center">


                        <!-- Search -->


                        <!-- User profile and search -->

                        <li>
                            <a class="profile-pic" href="#">
                                <img src="https://www.kindpng.com/picc/m/475-4750705_school-administrator-icon-png-transparent-png.png" alt="user-img" width="36" class="img-circle"><span class="text-white font-medium">Steave</span></a>
                        </li>

                        <!-- User profile and search -->

                    </ul>
                </div>
            </nav>
        </header>

        <!-- End Topbar header -->


        <!-- Left Sidebar - style you can find in sidebar.scss  -->

        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
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
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <!-- End Left Sidebar - style you can find in sidebar.scss  -->


        <!-- Page wrapper  -->

        <div class="page-wrapper">



            <div class="container-fluid">

                <div class="col-lg-12 col-xlg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="islem.php" method="POST" class="form-horizontal form-material">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Ad Soyad</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" name="adsoyad" value="<?php echo $satir["adsoyad"] ?>" class="form-control p-0 border-0">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="example-email" class="col-md-12 p-0">Email</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" name="mail" value="<?php echo $satir["email"] ?>" class="form-control p-0 border-0" name="example-email" id="example-email">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Telefon</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" name="telefon" value="<?php echo $satir["telefon"] ?>" class="form-control p-0 border-0">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Tarih</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <select name="tarih" id="tarih" class="form-select shadow-none p-0 border-0 form-control-line">
                                            <option value="0">Tarih Seçiniz:</option>
                                            <?php
                                            while ($satir = $sorgu3->fetch(PDO::FETCH_ASSOC)) {
                                                $tarih = $satir["tarih"];
                                                $yenitarih = date("d-m-Y", strtotime($tarih));
                                                echo "
                                                <option value='$satir[id]'>$yenitarih</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-sm-12">Saat</label>
                                    <div class="col-sm-12 border-bottom " id="saatalan">
                                        <select name="saat" id="saat" class="form-select shadow-none p-0 border-0 form-control-line">
                                            <option value="0">Saat Seçiniz:</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="uyeid" value="<?php echo $kullaniciid ?>">
                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        <input type="submit" name="guncelle" class="btn btn-success" value="Güncelle">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

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
    <script type="text/javascript">
        $(document).ready(function() {
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
        });
    </script>

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