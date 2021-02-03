<?php
session_start();
if(isset($_SESSION['id'])){

}else{
    header("location: ../index.php");
}
include "koneksi.php";

$dataAnggota = mysqli_query($konek,"SELECT * FROM user WHERE verif = '0'");
if(isset($_GET['pesan'])){
  $pesan = $_GET['pesan'];
  $pesan2 = $_GET['pesan2'];
  $c_1 = "pop-act";
  $c_4 = "active";
  $c_3 = "menu-act";
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
            <li>
              <i class="fas fa-tasks"
                ><a href="verif.php">&emsp;Verif Data</a></i
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
      <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Bidang</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($r = mysqli_fetch_array($dataAnggota)){
              ?>
            <tr>
              <th scope="row"><?php echo $r['id'] ?></th>
              <td><?php echo $r['nama'] ?></td>
              <td><?php echo $r['bidang'] ?></td>
              <td><a href="pverif.php?id_p=<?php echo $r['id'] ?>">Verif</a></td>
            </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
                    <div class="float-menu fixed-bottom" id="floatMenu">
        <a href="dashboard.php"><i class="fas fa-home fa-2x"></i></a>
        <a href="pekerja.php"><i class="fas fa-id-badge fa-2x"></i></a>
        <a href="verif.php"><i class="fas fa-tasks fa-2x"></i></a>
        <a href="../logout.php"><i class="fas fa-power-off fa-2x"></i></a>
        </div>
      <div class="fot"></div>
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
