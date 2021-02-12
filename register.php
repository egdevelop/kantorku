<?php
session_start();
if(isset($_SESSION['id'])){
  header("location: type.php");
}
if(isset($_GET['pesan'])){
  $pesan = $_GET['pesan'];
  $pesan2 = $_GET['pesan2'];
  $c_1 = "pop-act";
  $c_4 = "active";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/responsive.css" />
    <script
      src="https://kit.fontawesome.com/d8ab9fc50e.js"
      crossorigin="anonymous"
    ></script>
    <link rel="shortcut icon" href="assets/images/logo.png">
    <title>Kantorku</title>
  </head>
  <body class="<?php $c_1 ?>">
    <main class="login">
      <div class="row">
        <div class="col">
          <div class="card-login">
            <div class="noner">
              <a href="index.php"
                ><i class="fas fa-arrow-left back-login">&emsp;Kembali</i></a
              >
            </div>
            <div class="ml-login">
              <div class="brand-login">
                <img src="assets/images/logo.png" alt="" />
                <div class="brand-text">KantorKu</div>
              </div>
              <div class="login-head">
                <h5 class="title-login">Daftarkan Identitas Anda</h5>
                <p class="p-hp">
                  Pastikan data anda benar
                  !!
                </p>
              </div>
              <form action="regis.php" method="POST" class="login-form" enctype="multipart/form-data">
                <input
                  class="form-control m-0 mb-2"
                  type="email"
                  name="username"
                  id="username"
                  placeholder="example@company.com (usernmae)"
                  required
                />
                <input
                  class="form-control m-0 mb-2"
                  placeholder="Password"
                  type="password"
                  name="pw"
                  id="pw"
                  required
                />
                <input
                  class="form-control m-0 mb-2"
                  placeholder="Nama"
                  type="text"
                  name="nama"
                  id="pw"
                  required
                />
                <input
                  class="form-control m-0 mb-2"
                  placeholder="Bidang Ex : Frontend , Marketing , etc"
                  type="text"
                  name="bidang"
                  id="pw"
                  required
                />
                <input
                  class="form-control m-0 mb-2"
                  type="text"
                  name="foto"
                  value="default.png"
                  hidden
                />
                <button type="submit" class="btn btn-custom full">Daftar</button>
              </form>
              <a href="login.php" class="mt-3 kecil lupa">Punya Akun? Klik disini</a>
              <br>
              <br>
              <div class="nonez">
              <div class="flex mt-1vw">
              <div class="garis-bawah">
              </div>
              <h6>Mari Hubungi</h6>
              <div class="garis-bawah">
              </div>
            </div>
            <div class="flex mt-1vw">
                <i class="fab fa-linkedin fa-2x"></i>
                <i class="fab fa-google fa-2x"></i>
                <i class="fab fa-facebook fa-2x"></i>
                <i class="fab fa-instagram fa-2x"></i>
            </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col login-img-wrapper">
          <img src="assets/images/login-img.png" alt="login" />
        </div>
      </div>
      <div class="popup-container <?php echo $c_4 ?>">
         <div class="popup">
         <div class="popup-head">
          <a class="float-right" href="?reload=true">&times;</a>
         </div>
              <div class="center">
                <img src="assets/images/alert.gif" alt="gif">
                <h6><?php echo $pesan ?></h6>
                <p class="kecil-phone"><?php echo $pesan2 ?></p>
                <div class="d-grid gap-2">
                  <a href="?reload=true" class="btn btn-outline-danger">O K</a>
                </div>
              </div>
         </div>
         </div>
    </main>
    <!-- Optional JavaScript -->
    <!-- Option 1: Bootstrap Bundle with Popper.js -->
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"
      integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
