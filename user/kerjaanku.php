<?php
session_start();
if(isset($_SESSION['id'])){

}else{
    header("location: ../index.php");
}
include "../admin/koneksi.php";

$data = mysqli_query($konek,"SELECT * FROM kerjaanku where akun = '$_SESSION[id]'");
if(isset($_GET['id_k'])){
  $c_1 = "pop-act";
  $c_2 = "active";
  $c_3 = "menu-act";
}else {
  $c_1 = "";
  $c_2 = "";
  $c_3 = "";
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
  <body class="<?php echo $c_1 ?>">
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
      <h6>KerjaanKu</h6>
      <?php
        while($r = mysqli_fetch_array($data)){
          if($r['status'] == 0){
            $img = "belum";
            $warna = "red";
          }else{
            $img = "tuntas";
            $warna = "blue";
          }
          ?>
          <div class="garis-none">
            <a href="?id_k=<?php echo $r['id']; ?>">
              <div class="card-custom <?php echo $warna ?> kerjaan">
                <h3><?php echo $r['judul']; ?></h3>
                <h6>Deadline <?php echo $r['dedline']; ?></h6>
                <p class="kecil klik kecil-phone-k">*Klik untuk menggubah status dari pekerjaan anda</p>
                <img src="../assets/images/<?php echo $img?>.png" class="kerjaan-img" alt="" />
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
    <div class="popup-container <?php echo $c_2 ?>" id="kerjaanku">
      <div class="popup">
        <a href="?reload=true" class="float-right">&times;</a>
        <div class="head-pop">
          <h1>KerjaanKu</h1>
          <p class="kecil-phone">Jika kerjaan sudah beres harap update status kerjaan yaaa</p>
        </div>
        <div class="card-custom yellow mt-3">
          <?php
          $data2 = mysqli_query($konek,"SELECT * FROM kerjaanku WHERE id='$_GET[id_k]'");
          $d = mysqli_fetch_array($data2);
          ?>
          <div class="detail-kerjaan">
            <h3><?php echo $d['judul']; ?></h3>
            <h6>Deadline : <?php echo $d['dedline']; ?></h6>
            <p class="kecil-phone">
              Catatan : <?php echo $d['isi']; ?>
            </p>
          </div>
        </div>
        <form action="kerja.php" method="POST">
          <input
            type="text"
            name="nama"
            value="<?php echo $_SESSION['nama'] ?>"
            class="form-control mb-3"
          />
          <input
            type="text"
            name="id_k"
            value="<?php echo $_GET['id_k'] ?>"
            class="form-control mb-3"
            hidden
          />
          <select name="status" class="form-control mb-3" id="status">
            <option selected>Pilih Status ...</option>
            <option value="1">Tuntas</option>
            <option value="0">Belum Tuntas</option>
          </select>
                      <div class="d-grid gap-2">
            <button type="submit" class="btn btn-outline-success">S I M P A N</button>
            </div>
          <p class="txt-small mt-3">
            Dengan ini saya bertanggung jawab atas perubahan status kerja saya
          </p>
        </form>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <script>
const body = document.querySelector("body");
const kerjaanCard = document.getElementById("kerjaanku");
const floatMenu = document.getElementById("floatMenu");
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper.js -->
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"
      integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
