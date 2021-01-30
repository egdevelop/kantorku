<?php
session_start();
if(isset($_SESSION['id'])){
  header("location: type.php");
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
    <title>Kantorku</title>
  </head>
  <body class="home-100">
    <div class="container fixed-top">
      <header class="main-header">
        <a href="index.php" class="brand-logo">
          <img src="assets/images/logo.png" alt="logo-nav" />
          <div class="nav-text">Kantorku</div>
        </a>
        <nav class="nav-main">
          <ul>
            <li><a class="large" href="index.php">Home</a></li>
            <li><a href="#">About</a></li>
          </ul>
        </nav>
      </header>
    </div>

    <main>
      <div class="container home-wrapper">
        <div class="home-flex">
          <div class="text-home">
            <h1>Perfect Attendance</h1>
            <h5>Make Everyone Happy</h5>
            <p class="text-blue">Absen harus pake kertas? Ngasih kerjaan harus nge wa dulu? Ngabarin selesai harus ke ruangan bos? Pakai kantorku dan buat pengalaman kerjamu jadi lebih baik</p>
            <a href="login.php" class="btn btn-custom sembilan5">Log In</a>
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
          <div class="img-wrapper">
            <img src="assets/images/landing-eg.png" alt="Home" />
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
