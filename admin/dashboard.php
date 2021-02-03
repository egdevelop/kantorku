<?php
session_start();
if(isset($_SESSION['id'])){

}else{
    header("location: ../index.php");
}
include "koneksi.php";

$dataAnggota = mysqli_query($konek,"SELECT * FROM user");
$dataHadir = mysqli_query($konek ,"SELECT * FROM absen where tanggal = '$tanggal' AND type = '0'");
$dataIzin = mysqli_query($konek ,"SELECT * FROM absen where tanggal = '$tanggal' AND type = '2' OR type = '1'");

$julahHadir =  mysqli_num_rows($dataHadir);
$jumlahIzin =  mysqli_num_rows($dataIzin);
$jumlahAnggota = mysqli_num_rows($dataAnggota);

if(isset($_GET['cari'])){
  $dataAnggota = mysqli_query($konek,"SELECT * FROM user where nama LIkE '%$_GET[cari]%' OR bidang LIkE '%$_GET[cari]%'");
}
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
      <div class="row">
        <div class="col">
          <div class="card-custom blue">
            <h6>Jumlah Pekerja</h6>
            <h2><?php echo $jumlahAnggota ?> Orang</h2>
          </div>
        </div>
        <div class="col">
          <div class="card-custom red">
            <div class="tidak-masuk">
              <ul>
                  <li id="btnTidak"><i class="fas fa-plus-circle"></i>&ensp;Lihat data</li>
              </ul>
            </div>
            <h6>Hadir hari ini</h6>
            <h2><?php echo $julahHadir ?> Orang</h2>
          </div>
        </div>
        <div class="col">
          <div class="card-custom yellow">
            <div class="izin">
              <ul>
                  <li id="btnIzin"><i class="fas fa-plus-circle"></i>&ensp;Lihat data</li>
              </ul>
            </div>
            <h6>Izin & Tdk Hadir</h6>
            <h2><?php echo $jumlahIzin ?> Orang</h2>
          </div>
        </div>
      </div>
      <div class="peringatan">
        <h6>Pekerjaku</h6>
        <p class="kecil kecil-phone-k red-huruf">*Klik detail pekerja untuk mengakses tools lainnya</p>
        <div class="cari-widget">
          <form action="dashboard.php" method="get">
            <div class="input-icon">
              <input type="text" name="cari" id="cari" class="cari-input" placeholder="Cari Pekerjaa..">
              <i class="fas fa-search"></i>
            </div>
          </form>
        </div>
        <br>
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
              <td><a href="detail.php?id_p=<?php echo $r['id'] ?>">Detail</a></td>
            </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
      <div class="float-menu fixed-bottom" id="floatMenu">
        <a href="dashboard.php"><i class="fas fa-home fa-2x"></i></a>
        <a href="pekerja.php"><i class="fas fa-id-badge fa-2x"></i></a>
        <a href="../logout.php"><i class="fas fa-power-off fa-2x"></i></a>
        </div>
      </div>

      <div class="popup-container" id="cardAlasan">
        <div class="popup">
          <a id="btn-close" class="float-right">&times;</a>
          <div class="popup-head">
            <h6>Tambahkan Catatan Izin</h6>
            <p class="kecil-phone">Jangan lupa untuk memberikan alasan yang jelas yaaa</p>
          </div>
          <form>
            <input type="text" class="form-control mb-3" name="nama" id="nama" value="Febrian" disabled>
            <input type="date" name="tanggal" id="tanggal" class="form-control mb-3">
            <textarea placeholder="Ketikan Sesuatu" name="reason" class="form-control mb-3" id="" cols="30" rows="10"></textarea>
            <button class="btn btn-outline-success">S U B M I T</button>
          </form>
        </div>
      </div>
      <div class="popup-container" id="cardMasuk">
        <div class="popup">
          <a href="#" id="btn-closem" class="float-right">&times;</a>
          <div class="popup-head">
            <h6>Data Masuk Kerja</h6>
            <p class="kecil-phone">Hehe ini dia bosKu untuk catatan masuk kamu</p>
          </div>
          <div class="container-scroll">
          <?php 
                while($d = mysqli_fetch_array($dataHadir)){
                  ?>
                    <li class="card-custom blue"><?php echo $f['tanggal'] ?> <?php echo $f['jam_masuk'] ?> <?php echo $f['jam_pulang'] ?> <?php echo $f['reason'] ?></li>
                  <?php
                }
            ?>
          </div>
        </div>
      </div>
      <div class="popup-container" id="cardIzin">
        <div class="popup">
          <a href="#" id="btn-closei" class="float-right">&times;</a>
          <div class="popup-head">
            <h6>Data Izin Kerja</h6>
            <p class="kecil-phone">Hehe ini dia bosKu untuk catatan izin kamu</p>
          </div>
          <div class="container-scroll">
          <?php 
                while($f = mysqli_fetch_array($dataIzin)){
                  ?>
                    <li class="card-custom yellow"><?php echo $f['tanggal'] ?> <?php echo $f['jam_masuk'] ?> <?php echo $f['jam_pulang'] ?> <?php echo $f['reason'] ?></li>
                  <?php
                }
            ?>
          </div>
        </div>
      </div>
      <div class="popup-container" id="cardTidak">
        <div class="popup">
          <a href="#" id="btn-closet" class="float-right">&times;</a>
          <div class="popup-head">
            <h6>Data Izin Kerja</h6>
            <p class="kecil-phone">Hehe ini dia bosKu untuk catatan izin kamu</p>
          </div>
          <div class="container-scroll">
          <?php 
                while($d = mysqli_fetch_array($dataHadir)){
                  ?>
                    <li class="card-custom blue"><?php echo $f['tanggal'] ?> <?php echo $f['jam_masuk'] ?> <?php echo $f['jam_pulang'] ?> <?php echo $f['reason'] ?></li>
                  <?php
                }
            ?>
          </div>
        </div>
      </div>
      <div class="popup-container" id="cardPeringatan">
        <div class="popup">
          <a href="#" onclick=" cardPeringatan.classList.remove('active');body.classList.remove('pop-act');floatMenu.classList.remove('menu-act')"  class="float-right">&times;</a>
          <div class="popup-head">
            <h6>Tanggapi Peringatan</h6>
          </div>
          <div class="card-custom red">
            <h6>Deadline Pekerjaan Kamu udah kelewat nih</h6>
            <p class="p-hp">Coba Kamu Selesaikan tugas kamu ya</p> 
          </div>
          <form>
            <input
              type="text"
              name="nama"
              value="Febrian"
              class="form-control mb-3"
            />
            <input
              type="text"
              name="nama"
              value="Sudah"
              class="form-control mb-3"
              disabled
            />
                        <div class="d-grid gap-2">
            <button class="btn btn-outline-success">S I M P A N</button>
            </div>
            <p class="txt-small mt-3">
              Dengan ini saya bertanggung jawab atas perubahan status kerja saya
            </p>
          </form>
        </div>
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
    <script>
      const cardIzin = document.getElementById("cardIzin");
      const cardPeringatan = document.getElementById("cardPeringatan");
      const cardTidak = document.getElementById("cardTidak");
      const btnClose = document.getElementById("btn-close");
      const btnCloseM = document.getElementById("btn-closem");
      const btnCloseI = document.getElementById("btn-closei");
      const btnCloseT = document.getElementById("btn-closet");
      const btnIzin = document.getElementById("btnIzin");
      const btnTidak = document.getElementById("btnTidak");
      const btnMasuk = document.getElementById("masuk-card");
      const cardMasuk = document.getElementById("cardMasuk");
      const floatMenu = document.getElementById("floatMenu");
      const body = document.querySelector("body");

      btnIzin.addEventListener("click", ()=>{
        cardIzin.classList.add("active");
        body.classList.add("pop-act");
        floatMenu.classList.add("menu-act");
      });
      btnTidak.addEventListener("click", ()=>{
        cardTidak.classList.add("active");
        body.classList.add("pop-act");
        floatMenu.classList.add("menu-act");
      });
      btnClose.addEventListener("click" ,()=>{
        cardAlasan.classList.remove("active");
        body.classList.remove("pop-act");
        floatMenu.classList.remove("menu-act");
      })
      btnCloseM.addEventListener("click" ,()=>{
        cardMasuk.classList.remove("active");
        body.classList.remove("pop-act");
        floatMenu.classList.remove("menu-act");
      })
      btnCloseT.addEventListener("click" ,()=>{
        cardTidak.classList.remove("active");
        body.classList.remove("pop-act");
        floatMenu.classList.remove("menu-act");
      })
      btnCloseI.addEventListener("click" ,()=>{
        cardIzin.classList.remove("active");
        body.classList.remove("pop-act");
        floatMenu.classList.remove("menu-act");
      })
      btnMasuk.addEventListener("click",()=>{
        cardMasuk.classList.add("active");
        body.classList.add("pop-act");
        floatMenu.classList.add("menu-act");
      })
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper.js -->
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"
      integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
