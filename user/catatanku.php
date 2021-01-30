<?php
session_start();
if(isset($_SESSION['id'])){

}else{
    header("location: ../index.php");
}
include "../admin/koneksi.php";

$data = mysqli_query($konek,"SELECT * FROM catatan WHERE akun = '$_SESSION[id]'");
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
      <div class="action-btn">
          <button class="btn-act" id="btn-act"><i class="fas fa-plus-circle"></i>&ensp;Tambahkan</button>
      </div>
      
      <div class="catatan">
        <?php
          while($r = mysqli_fetch_array($data)){
            ?>
          <div class="card-catatan white shadow left-ngambang">
              <h6><?php echo $r['tanggal'] ?></h6>
              <p class="huruf-abu">
              <?php echo $r['isi'] ?>
              </p>
          </div>
            <?php
          }
        ?>
      </div>
      <div class="popup-container" id="tambahkan">
          <div class="popup">
            <a href="#" id="btn-close" class="float-right">&times;</a>
            <div class="head-pop">
                <h6>Input Catatan Pekerjaan</h6>
            </div>
            <form action="catatan.php" method="post">
                <textarea class="textarea-custom mb-3" placeholder="Ayo catat pekerjaanmu hari ini.." name="catatan"></textarea>
                <div class="d-grid gap-2">
                <button type="submit" class="btn btn-outline-success">S U B M I T</button>
                </div>
            </form>
          </div>
      </div>
      
    </main>
    <div class="float-menu fixed-bottom" id="floatMenu">
        <a href="dashboard.php"><i class="fas fa-home"></i></a>
        <a href="kerjaanku.php"><i class="fas fa-tasks"></i></a>
        <a href="catatanku.php"><i class="far fa-calendar"></i></a>
        <a href="profilku.php"><i class="fas fa-id-badge"></i></a>
        <a href="../logout.php"><i class="fas fa-power-off"></i></a>
                </div>
    <!-- Optional JavaScript -->
    <!-- Option 1: Bootstrap Bundle with Popper.js -->
    <script>
        const cardCatatan = document.getElementById("tambahkan");
        const btnClose = document.getElementById("btn-close");
        const btnTrigger = document.getElementById("btn-act");
        const floatMenu = document.getElementById("floatMenu");
        const body = document.querySelector("body");

        btnTrigger.addEventListener("click", ()=>{
            cardCatatan.classList.add("active");
            body.classList.add("pop-act");
            floatMenu.classList.add("menu-act");
        });

        btnClose.addEventListener("click", ()=>{
            cardCatatan.classList.remove("active");
            body.classList.remove("pop-act");
            floatMenu.classList.remove("menu-act");
        })
    </script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"
      integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
