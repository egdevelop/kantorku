<?php
session_start();
include "../admin/koneksi.php";
$sekarang = strtotime($jam);
$pagi = strtotime('07:00:00');
$sore = strtotime('16:30:00');
$dataAbsen = mysqli_query($konek,"SElECT * FROM absen WHERE tanggal ='$tanggal' ");
$cekAbsen = mysqli_num_rows($dataAbsen);
$dataPulang = mysqli_query($konek,"SElECT * FROM absen WHERE reason = '-' ");
$cekPluang = mysqli_num_rows($dataPulang);

if($pagi < $sekarang && $sekarang < $sore){
  $btnAbsen = "Masuk";
  if($cekAbsen == 0){
    $classAbsen = "";
  }else {
    $classAbsen = "none";
  }
}else{
  if($cekPluang == 1){
    $classAbsen = "";
  }else{
    $classAbsen = "none";
  }
  $btnAbsen = "Pulang";
}

if($cekAbsen == 0){
  $classIzin = "";
}else{
  $classIzin = "none";
}

$dataMasuk = mysqli_query($konek,"SElECT * FROM absen WHERE type = 0 ORDER BY id DESC");
$dataIzin = mysqli_query($konek,"SElECT * FROM absen WHERE type = 2 ORDER BY id DESC");
$dataTidak = mysqli_query($konek,"SElECT * FROM absen WHERE type = 1 ORDER BY id DESC");
$dataPeringatan = mysqli_query($konek,"SElECT * FROM peringatan WHERE akun = '$_SESSION[id]' AND status = '0' ORDER BY id DESC");
$jumlahMasuk = mysqli_num_rows($dataMasuk);
$jumlahIzin = mysqli_num_rows($dataIzin);
$jumlahTidak = mysqli_num_rows($dataTidak);
if(isset($_GET['id_p'])){
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
          Semoga hari mu menyenangkan ini dia data data dari absensi abc putra
          data ini akan terus terupdate tenang saja!
        </p>
        <div class="foot">
          Baca <a href="#">Cara Pengunaan</a> jika kamu kebingunan mengunakan
          nya ya!
        </div>
        <img src="../assets/images/welcome-img.png" alt="" />
      </div>
      <div class="head-dash">
        <ul>
          <li><a class="active" href="dashboard.php">Home</a></li>
          <li><a href="dashboard1.php">Harian</a></li>
          <li><a href="dashboard2.php">Semua</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col">
          <div class="card-custom blue">
            <div class="masuk-btn">
              <ul>
                <li class="<?php echo $classAbsen ?>"><a href="absen.php?id=<?php echo $_SESSION['id']; ?>"><i class="fas fa-plus-circle"></i>&ensp;<?php echo $btnAbsen ?></a></li>
                <li id="masuk-card"><i class="fas fa-plus-circle"></i>&ensp;Lihat data</li>
              </ul>
            </div>
            <h6>Masuk</h6>
            <h1><?php echo $jumlahMasuk ?> Hari</h1>
          </div>
        </div>
        <div class="col">
          <div class="card-custom red">
            <div class="tidak-masuk">
              <ul>
                  <li id="btnTidak"><i class="fas fa-plus-circle"></i>&ensp;Lihat data</li>
              </ul>
            </div>
            <h6>Tidak Masuk</h6>
            <h1><?php echo $jumlahTidak ?> Hari</h1>
          </div>
        </div>
        <div class="col">
          <div class="card-custom yellow">
            <div class="izin">
              <ul>
                <li class="<?php echo $classIzin ?>" id="btnAlasan"><i class="fas fa-plus-circle"></i>&ensp;Tambah Izin</li>
                  <li id="btnIzin"><i class="fas fa-plus-circle"></i>&ensp;Lihat data</li>
              </ul>
            </div>
            <h6>Izin</h6>
            <h1><?php echo $jumlahIzin ?> Hari</h1>
          </div>
        </div>
      </div>
      <div class="peringatan">
        <h6>Peringatan Buat Kamu</h6>
<?php
while($d =mysqli_fetch_array($dataPeringatan)){
  ?>
  <div class="garis-none">
  <a href="dashboard.php?id_p=<?php echo $d['id'] ?>">
  <div class="card-custom red peringatans">
          <div class="text-card">
          <h5><?php echo $d['judul']; ?></h5>
          <p class="kecil-phone">Cek yu selesaiin peringatannya supaya kamu aman !</p>
          </div>
          <img src="../assets/images/peringatan.png" class="peringatan-img" alt="" />
        </div>
        </a>
        </div>
  <?php
}
?>
        
      </div>
      <div class="float-menu <?php echo $c_3; ?> fixed-bottom" id="floatMenu">
<a href="dashboard.php"><i class="fas fa-home fa-1x"></i></a>
        <a href="kerjaanku.php"><i class="fas fa-tasks fa-1x"></i></a>
        <a href="catatanku.php"><i class="far fa-calendar fa-1x"></i></a>
        <a href="profilku.php"><i class="fas fa-id-badge fa-1x"></i></a>
        <a href="../logout.php"><i class="fas fa-power-off fa-1x"></i></a>
        </div>
      </div>

      <div class="popup-container" id="cardAlasan">
        <div class="popup">
          <a id="btn-close" class="float-right">&times;</a>
          <div class="popup-head">
            <h6>Tambahkan Catatan Izin</h6>
            <p class="kecil-phone">Jangan lupa untuk memberikan alasan yang jelas yaaa</p>
          </div>
          <form action="izin.php" method="POST">
            <input type="text" class="form-control mb-3" name="nama" id="nama" value="Febrian" disabled>
            <textarea placeholder="Ketikan Sesuatu" name="reason" class="form-control mb-3" id="" cols="30" rows="10"></textarea>
            <div class="d-grid gap-2">
            <button type="submit" class="btn btn-outline-success">S U B M I T</button>
            </div>
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
              <p class="m-0"><?php echo $_SESSION['bidang'] ?></p>
            </div>
          </div>
            <?php
              while($r = mysqli_fetch_array($dataMasuk)){
                ?>
                <li class="card-custom blue"><?php echo $r['tanggal']  ?> <?php echo $r['jam_masuk']  ?> <?php echo $r['jam_pulang']  ?> <?php echo $r['reason']  ?></li>
                <?php
              }
            ?> 
        </div>
      </div>
      <div class="popup-container" id="cardIzin">
        <div class="popup">
          <a href="#" id="btn-closei" class="float-right">&times;</a>
          <div class="popup-head">
            <h6>Data Izin Kerja</h6>
            <p class="kecil-phone">Hehe ini dia bosKu untuk catatan izin kamu</p>
          </div>
          <div class="card-custom white shadow">
            <div class="identitas">
              <img
                src="../assets/images/<?php echo $_SESSION['foto'] ?>"
                alt=""
                class="profilku-img"
              />
              <p class="m-0">Jhon Smiller</p>
  
              <img
                src="https://i.stack.imgur.com/FxCHC.png"
                class="barcode"
                alt=""
              />
              <p class="m-0">Backend Developer</p>
            </div>
          </div>
          <?php
              while($r = mysqli_fetch_array($dataIzin)){
                ?>
                <li class="card-custom yellow"><?php echo $r['tanggal']  ?> <?php echo $r['jam_masuk']  ?> <?php echo $r['jam_pulang']  ?> <?php echo $r['reason']  ?></li>
                <?php
              }
            ?> 
        </div>
      </div>
      <div class="popup-container" id="cardTidak">
        <div class="popup">
          <a href="#" id="btn-closet" class="float-right">&times;</a>
          <div class="popup-head">
            <h6>Data Tidak Masuk Kerja</h6>
            <p class="kecil-phone">Hehe ini dia bosKu untuk catatan Tidak Masuk kamu</p>
          </div>
          <div class="card-custom white shadow">
            <div class="identitas">
              <img
                src="../assets/images/<?php echo $_SESSION['foto'] ?>"
                alt=""
                class="profilku-img"
              />
              <p class="m-0">Jhon Smiller</p>
  
              <img
                src="https://i.stack.imgur.com/FxCHC.png"
                class="barcode"
                alt=""
              />
              <p class="m-0">Backend Developer</p>
            </div>
          </div>
          <div class="container-scroll">
          <?php
              while($r = mysqli_fetch_array($dataTidak)){
                ?>
                <li class="card-custom red"><?php echo $r['tanggal']  ?> <?php echo $r['jam_masuk']  ?> <?php echo $r['jam_pulang']  ?> <?php echo $r['reason']  ?></li>
                <?php
              }
            ?> 
          </div>
        </div>
      </div>
      <div class="popup-container <?php echo $c_2 ?>" id="cardPeringatan">
        <div class="popup">
        <div>
          <a class="float-right" href="?reload=true">&times;</a>
        </div>
          <div class="popup-head">
            <h6>Tanggapi Peringatan</h6>
          </div>
          <?php
            $caridata = mysqli_query($konek,"SELECT * FROM peringatan where id = '$_GET[id_p]'");
            $t = mysqli_fetch_array($caridata);
          ?>
          <div class="card-custom red">
            <h6><?php echo $t['judul'] ?></h6>
            <p class="p-hp"><?php echo $t['isi'] ?></p> 
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
            <a href="peringatan.php?id_p=<?php echo $_GET['id_p']; ?>" class="btn btn-outline-success">S I M P A N</a>
            </div>
            <p class="txt-small mt-3">
              Dengan ini saya bertanggung jawab atas perubahan status kerja saya
            </p>
          </form>
        </div>
      </div>
      <div class="fot"></div>
    </main>
    <!-- Optional JavaScript -->
    <script>
      const cardAlasan = document.getElementById("cardAlasan");
      const cardIzin = document.getElementById("cardIzin");
      const cardPeringatan = document.getElementById("cardPeringatan");
      const cardTidak = document.getElementById("cardTidak");
      const btnClose = document.getElementById("btn-close");
      const btnCloseM = document.getElementById("btn-closem");
      const btnCloseI = document.getElementById("btn-closei");
      const btnCloseT = document.getElementById("btn-closet");
      const btnAlasan = document.getElementById("btnAlasan");
      const btnIzin = document.getElementById("btnIzin");
      const btnTidak = document.getElementById("btnTidak");
      const btnMasuk = document.getElementById("masuk-card");
      const cardMasuk = document.getElementById("cardMasuk");
      const floatMenu = document.getElementById("floatMenu");
      const body = document.querySelector("body");


      btnAlasan.addEventListener("click", ()=>{
        cardAlasan.classList.add("active");
        body.classList.add("pop-act");
        floatMenu.classList.add("menu-act");
      });
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
