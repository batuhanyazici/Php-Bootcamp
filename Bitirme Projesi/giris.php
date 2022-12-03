<!DOCTYPE html>
<html lang="tr">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Giriş</title>
</head>
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

<body class="gradient-custom">
  <section class="vh-100 ">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-uppercase">Admin Giriş</h2>
                <p class="text-white-50 mb-5">Lütfen Kullanıcı Adınızı Ve Şifrenizi Giriniz</p>
                <form action="islem.php" method="POST">
                  <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typeEmailX">Kullanıcı Adı</label>
                    <input type="text" name="ad" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typePasswordX">Şifre</label>
                    <input type="password" name="sifre" class="form-control form-control-lg" />
                  </div>
                  <button class="btn btn-outline-light btn-lg px-5" name="giris" type="submit">Giriş Yap</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>