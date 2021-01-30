<?php
session_start();
if(isset($_SESSION['id'])){

}else{
    header("location: ../index.php");
}
include "koneksi.php";
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
    <link rel="stylesheet" href="../assets/css/styles.css" />
    <link rel="stylesheet" href="../assets/css/responsive.css" />
    <script
      src="https://kit.fontawesome.com/d8ab9fc50e.js"
      crossorigin="anonymous"
    ></script>
    <title>Kantorku</title>
  </head>
  <body>
    <div class="sidebar">
      <div class="m-side">
        <div class="brand-side">
          <img src="../assets/images/logo.png" alt="" />
          <div class="side-text">KantorKu</div>
        </div>
        <div class="side-main">
           <ul>
            <li>
              <i class="fas fa-home"
                ><a href="dashboard.php">&emsp;Dashboard</a></i
              >
            </li>
            <li>
              <i class="fas fa-id-badge"
                ><a href="pekerja.php">&emsp;Tambah Pekerja</a></i
              >
            </li>
          </ul>
        </div>
        <a
          href="../logout.php"
          class="btn btn-block btn-outline-danger fixed-bottom logout"
          >Logout</a
        >
      </div>
    </div>

    <main class="konten">
        <h6>Dashboard</h6>
      <div class="card-custom welcome yellow">
        <h5>Selamat Datang <?php echo $_SESSION['nama'] ?></h5>
        <p>
Semoga hari mu menyenangkan! Ini adalah data-data dari absensi abc putra yang akan terus terupdate!
        </p>
        <div class="foot">
          Baca <a href="#">cara penggunaan</a> jika kamu kebingunan mengunakan
          nya ya!
        </div>
        <img src="../assets/images/welcome-img.png" alt="" />
      </div>
     <h6>Tambah Data Pekerja</h6>
     <form action="ppekerja.php" method="POST" enctype="multipart/form-data">
        <input type="email" name="username" id="username" class="form-control mb-3"  placeholder="Username" require>
        <input type="password" name="pw" id="pw" class="form-control mb-3" placeholder="Password" require>
        <input type="text" name="nama" id="nama" class="form-control mb-3" placeholder="Nama" require>
        <input type="text" name="bidang" id="bidang" class="form-control mb-3" placeholder="Bidang" require>
        <input type="num" name="gaji" id="gaji" class="form-control mb-3" placeholder="Gaji" require>
        <input type="file" name="foto" id="foto" class="form-control mb-3" placeholder="Foto" require>
        <div class="d-grid gap-2">
        <button type="submit" class="btn btn-outline-success"> S U B M I T</button>
        </div>
     </form>
      <div class="fot"></div>
      <div class="float-menu fixed-bottom" id="floatMenu">
        <a href="dashboard.php"><i class="fas fa-home fa-2x"></i></a>
        <a href="pekerja.php"><i class="fas fa-id-badge fa-2x"></i></a>
        <a href="../logout.php"><i class="fas fa-power-off fa-2x"></i></a>
        </div>
    </main>
    <!-- Optional JavaScript -->
    <script>

    </script>
    <!-- Option 1: Bootstrap Bundle with Popper.js -->
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"
      integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
