<?php
session_start();
if(isset($_SESSION['id'])){

}else{
    header("location: ../index.php");
}
include "../admin/koneksi.php";

$dataMasuk = mysqli_query($konek,"SElECT * FROM absen WHERE akun = '$_SESSION[id]' ORDER BY id DESC");

if(isset($_GET['id_a'])){
  $c_1 = "pop-act";
  $c_2 = "active";
  $c_3 = "menu act";
}else {
  $c_1 = "";
  $c_2 = "";
  $c_3 = "";
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
    <title>Kantorku</title>
  </head>
  <body class="<?php echo $c_1 ?>">
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
          Baca <a href="#">cara penggunaan</a> jika kamu kebingunan mengunakan
          nya ya!
        </div>
        <img src="../assets/images/welcome-img.png" alt="" />
      </div>
      <div class="head-dash">
        <ul>
          <li><a href="dashboard.php">Home</a></li>
          <li><a href="dashboard1.php">Harian</a></li>
          <li><a class="active" href="dashboard2.php">Semua</a></li>
        </ul>
      </div>
      <?php
        while($d = mysqli_fetch_array($dataMasuk)){

if($d['type'] == 0){
  $img = "cek";
  $warna = "blue";
}elseif($d['type'] == 2){
  $img = "izin";
  $warna = "yellow";
}else {
  $img = "X";
  $warna = "red";
}
?>
          <div class="garis-none">
            <a href="?id_a=<?php echo $d['id'] ?>">
              <div class="card-custom <?php echo $warna ?>">
               <h3><?php echo $d['tanggal'] ?></h3>
               <img src="../assets/images/<?php echo $img ?>.png" class="absen-mingguan-img" alt="" />
             </div>
          </a>
          </div>
          <?php
        }
      ?>

      <div class="float-menu fixed-bottom <?php echo $c_3 ?>" id="floatMenu">
        <a href="dashboard.php"><i class="fas fa-home"></i></a>
        <a href="kerjaanku.php"><i class="fas fa-tasks"></i></a>
        <a href="catatanku.php"><i class="far fa-calendar"></i></a>
        <a href="profilku.php"><i class="fas fa-id-badge"></i></a>
        <a href="../logout.php"><i class="fas fa-power-off"></i></a>
                </div>
                <div class="fot"></div>
    </main>
    <div class="popup-container <?php echo $c_2 ?>" id="detail-absen">
      <div class="popup">
        <a href="?reload=true" class="float-right">&times;</a>
        <div class="head-pop">
          <h1>AbsenKu</h1>
          <p>Ini detail dari data absen kamu</p>
        </div>
        <div class="card-custom white shadow">
          <div class="identitas">
            <img
              src="../assets/images/<?php echo $_SESSION['foto'] ?>"
              alt=""
              class="profilku-img"
            />
            <p class="m-0"><?php echo $_SESSION['nama'] ?></p>

            <img
              src="https://i.stack.imgur.com/FxCHC.png"
              class="barcode"
              alt=""
            />
            <p class="m-0"><?php echo $_SESSION['bidang']?></p>
          </div>
        </div>
        <div class="card-custom yellow mt-3">
          <div class="detail-kerjaan">
            <?php
                $data = mysqli_query($konek,"SELECT * FROM absen where id = '$_GET[id_a]'");
                $a = mysqli_fetch_array($data);
            ?>
            <h4>Detail Absen</h4>
            <p class="m-0">Tanggal : <?php echo $a['tanggal'] ?></p>
            <p class="m-0">
              Masuk : <?php echo $a['jam_masuk'] ?>
            </p>
            <p class="m-0">Pulang : <?php echo $a['jam_pulang'] ?> </p>
            <p>Alasan : <?php echo $a['reason'] ?> </p>
          </div>
        </div>
        <div class="d-grid gap-2">
        <a href="?reload=true" id="btn-close2" class="btn btn-block btn-outline-danger">C L O S E</a>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- Option 1: Bootstrap Bundle with Popper.js -->
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"
      integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD"
      crossorigin="anonymous"
    ></script>
    <script>
      const body = document.querySelector("body");
      const detailCardAbsen = document.getElementById("detail-absen");
      const floatMenu = document.getElementById("floatMenu");
    </script>
  </body>
</html>
