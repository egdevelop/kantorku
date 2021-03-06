<?php
session_start();
if(isset($_SESSION['id'])){

}else{
    header("location: ../index.php");
}
include "../admin/koneksi.php";

$dataMasuk = mysqli_query($konek,"SElECT * FROM absen WHERE tanggal = '$tanggal' AND akun = '$_SESSION[id]'");
$r = mysqli_fetch_array($dataMasuk);

if($r['type'] == 0){
  $img = "cek";
}elseif($r['type'] == 2){
  $img = "izin";
}else {
  $img = "X";
}
if(isset($_GET['pesan'])){
  $pesan = $_GET['pesan'];
  $pesan2 = $_GET['pesan2'];
  $c_1 = "pop-act";
  $c_4 = "active";
  $c_3 = "menu-act";
}
if($_SESSION['verif'] == 0){
  $notif = "<div class = 'verif'> <p>Akun anda belum di verifikasi silahkan untuk memperifikasi terlebih dahulu ke admin</p> </div>";
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
    <link rel="stylesheet" href="../assets/css/styles.css" />
    <link rel="stylesheet" href="../assets/css/responsive.css" />
    <script
      src="https://kit.fontawesome.com/d8ab9fc50e.js"
      crossorigin="anonymous"
    ></script>
    <link rel="shortcut icon" href="../assets/images/logo.png">    <title>Kantorku</title>
  </head>
  <body>
  <?php echo $notif ?>
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
              <i class="fas fa-tasks"
                ><a href="kerjaanku.php">&emsp;KerjaanKu</a></i
              >
            </li>
            <li>
<i class="far fa-calendar"
                ><a href="catatanku.php">&emsp;CatatanKu</a></i
              >
            </li>
            <li>
              <i class="fas fa-id-badge"
                ><a href="profilku.php">&emsp; ProfilKu</a></i
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
Salam dari kami kantorku , semoga hari ini menjadi hari terbaik
        </div>
        <img src="../assets/images/welcome-img.png" alt="" />
      </div>
      <div class="head-dash">
        <ul>
          <li><a href="dashboard.php">Home</a></li>
          <li><a class="active" href="dashboard1.html">Harian</a></li>
          <li><a href="dashboard2.php">Semua</a></li>
        </ul>
      </div>
      <div class="card-custom absen blue">
        <div class="profil">
          <img
            src="../assets/images/<?php echo $_SESSION['foto'] ?>"
            alt=""
            class="profil-foto"
          />
          <div class="identitas-wrapper">
            <p><?php echo $_SESSION['nama'] ?></p>
            <p><?php echo $_SESSION['bidang'] ?></p>
            <p>F5JSGGAGS</p>
          </div>
        </div>
        <div class="absen-type">
          <h4>Masuk</h4>
          <p><?php echo $r['tanggal'] ?> <?php echo $r['jam_masuk'] ?></p>
        </div>
        <img class="ceklis-absen" src="../assets/images/<?php echo $img ?>.png" alt="" />
      </div>
      <div class="card-custom absen red">
        <div class="profil">
          <img
            src="../assets/images/<?php echo $_SESSION['foto'] ?>"
            alt=""
            class="profil-foto"
          />
          <div class="identitas-wrapper">
          <p><?php echo $_SESSION['nama'] ?></p>
            <p><?php echo $_SESSION['bidang'] ?></p>
            <p>F5JSGGAGS</p>
          </div>
        </div>
        <div class="absen-type">
          <h4>Pulang</h4>
          <p><?php echo $r['tanggal'] ?> <?php echo $r['jam_pulang'] ?></p>
        </div>
        <img class="ceklis-absen" src="../assets/images/<?php echo $img ?>.png" alt="" />
      </div>
      <div class="float-menu fixed-bottom" id="floatMenu">
        <a href="dashboard.php"><i class="fas fa-home"></i></a>
        <a href="kerjaanku.php"><i class="fas fa-tasks"></i></a>
        <a href="catatanku.php"><i class="far fa-calendar"></i></a>
        <a href="profilku.php"><i class="fas fa-id-badge"></i></a>
        <a href="../logout.php"><i class="fas fa-power-off"></i></a>
                </div>
                <div class="popup-container <?php echo $c_4 ?>">
         <div class="popup">
         <div class="popup-head">
          <a class="float-right" href="?reload=true">&times;</a>
         </div>
              <div class="center">
                <img src="../assets/images/success.gif" alt="gif">
                <h6><?php echo $pesan ?></h6>
                <p class="kecil-phone"><?php echo $pesan2 ?></p>
                <div class="d-grid gap-2">
                  <a href="?reload=true" class="btn btn-outline-success">O K</a>
                </div>
              </div>
         </div>
         </div>
                <div class="fot"></div>
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
