<?php 
session_start();
if(isset($_SESSION['id'])){

}else{
    header("location: ../index.php");
}
include "koneksi.php";
$idp = $_GET['id_p'];
$dataAkun = mysqli_query($konek,"SELECT * FROM user WHERE id = '$idp'");
$d = mysqli_fetch_array($dataAkun);
$dataCat = mysqli_query($konek,"SELECT * FROM catatan WHERE akun = '$idp'");
$dataMasuk = mysqli_query($konek,"SElECT * FROM absen WHERE akun = '$idp' AND type = 0 ORDER BY id DESC");
$dataTidak = mysqli_query($konek,"SElECT * FROM absen WHERE akun = '$idp' AND type = 1 ORDER BY id DESC");
$dataIzin = mysqli_query($konek,"SElECT * FROM absen WHERE akun = '$idp' AND type = 2 ORDER BY id DESC");

if($d['rekimg'] == 0){
  $rekimg = "duit";
}elseif($d['rekimg'] == 1){
  $rekimg = "gopay";
}elseif($d['rekimg'] == 2){
  $rekimg = "bca";
}else {
  $rekimg = "mandiri";
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
      <div class="card-custom white shadow">
        <div class="identitas">
          <img
            src="../assets/images/<?php echo $d['foto'] ?>"
            alt=""
            class="profilku-img"
          />
          <p class="m-0"><?php echo $d['nama'] ?></p>

          <img
            src="https://i.stack.imgur.com/FxCHC.png"
            class="barcode"
            alt=""
          />
          <p class="m-0"><?php echo $d['bidang'] ?></p>
        </div>
      </div>
      <div class="row">
          <div class="col">
              <div class="card-custom yellow shadow" id="btnKerjaan">
                <h6>Beri Dia Kerjaan</h6>
              </div>
              <div class="card-custom blue shadow" id="btnMas">
                <h6>Cek Data Hadir</h6>
              </div>
              <div class="card-custom red shadow" id="btnTi">
                <h6>Cek Data tidak masuk</h6>
              </div>
              <div class="card-custom yellow shadow" id="btnIz">
                <h6>Cek Data Izin</h6>
              </div>
              <div class="card-custom red shadow" id="btnPer">
                <h6>Beri dia peringatan</h6>
              </div>
          </div>
          <div class="col">
              <div class="card-custom blue shadow" id="btnCat">
                <h6>Cek Catatan Dia</h6>
              </div>
              <div class="card-custom yellow shadow" id="btnGaji">
                <h6>Edit Gaji</h6>
              </div>
              <div class="card-custom red shadow" id="btnRek">
                <h6>Cek Rekening dia</h6>
              </div>
              <div class="card-custom blue shadow" id="btnProf">
                <h6>Edit Profil</h6>
              </div>
          </div>
      </div>
      <div class="float-menu fixed-bottom" id="floatMenu">
        <a href="dashboard.php"><i class="fas fa-home fa-2x"></i></a>
        <a href="pekerja.php"><i class="fas fa-id-badge fa-2x"></i></a>
        <a href="../logout.php"><i class="fas fa-power-off fa-2x"></i></a>
        </div>
     <div class="fot"></div>
    <div class="popup-container" id="cardKerjaan">
     <div class="popup">
        <div class="popup-head">
        <a class="float-right" href="?id_p=<?php echo $idp ?>">&times;</a>
          <h6>Panel Kerjaan</h6>
          <p class="kecil-phone-k">Silahkan isi dengan jelas ya pa hehe : )</p>
        </div>
        <div class="card-custom white shadow">
        <div class="identitas">
          <img
            src="../assets/images/<?php echo $d['foto'] ?>"
            alt=""
            class="profilku-img"
          />
          <p class="m-0"><?php echo $d['nama'] ?></p>

          <img
            src="https://i.stack.imgur.com/FxCHC.png"
            class="barcode"
            alt=""
          />
          <p class="m-0"><?php echo $d['bidang'] ?></p>
        </div>
      </div>
          <form action="kerja.php" method="POST">
            <input type="text" class="form-control mb-3" name="judul" placeholder="Judul kerjaa..">
            <input type="date" class="form-control mb-3" name="dedline" placeholder="Deadline Kerjaan">
            <input type="text" class="form-control mb-3" name="id" value="<?php echo $idp ?>" hidden>
            <textarea type="text" class="form-control mb-3" name="isi" placeholder="Detail Kerjaan ... "></textarea>
            <div class="d-grid gap-2">
            <button type="submit" class="btn btn-outline-success">S U B M I T</button>
            </div>
          </form>
      </div>
     </div>
    <div class="popup-container" id="cardGaji">
     <div class="popup">
        <div class="popup-head">
        <a class="float-right" href="?id_p=<?php echo $idp ?>">&times;</a>
          <h6>Panel Edit Gaji</h6>
          <p class="kecil-phone-k">Silahkan isi dengan jelas ya pa hehe : )</p>
        </div>
        <div class="card-custom white shadow">
        <div class="identitas">
          <img
            src="../assets/images/<?php echo $d['foto'] ?>"
            alt=""
            class="profilku-img"
          />
          <p class="m-0"><?php echo $d['nama'] ?></p>

          <img
            src="https://i.stack.imgur.com/FxCHC.png"
            class="barcode"
            alt=""
          />
          <p class="m-0"><?php echo $d['bidang'] ?></p>
        </div>
      </div>
          <form action="gaji.php" method="POST">
            <input type="text" class="form-control mb-3" name="gaji" placeholder="Masukan Jumlah Gaji...">
            <input type="text" class="form-control mb-3" name="id" value="<?php echo $idp ?>" hidden>
            <div class="d-grid gap-2">
            <button type="submit" class="btn btn-outline-success">S U B M I T</button>
            </div>
          </form>
      </div>
     </div>
    <div class="popup-container" id="cardPer">
     <div class="popup">
        <div class="popup-head">
        <a class="float-right" href="?id_p=<?php echo $idp ?>">&times;</a>
          <h6>Panel Peringatan</h6>
          <p class="kecil-phone-k">Silahkan isi dengan jelas ya pa hehe : )</p>
        </div>
        <div class="card-custom white shadow">
        <div class="identitas">
          <img
            src="../assets/images/<?php echo $d['foto'] ?>"
            alt=""
            class="profilku-img"
          />
          <p class="m-0"><?php echo $d['nama'] ?></p>

          <img
            src="https://i.stack.imgur.com/FxCHC.png"
            class="barcode"
            alt=""
          />
          <p class="m-0"><?php echo $d['bidang'] ?></p>
        </div>
      </div>
          <form action="peringatan.php" method="POST">
            <input type="text" class="form-control mb-3" name="judul" placeholder="Judul...">
            <input type="text" class="form-control mb-3" name="isi" placeholder="Isi Peringatan..">
            <input type="text" class="form-control mb-3" name="id" value="<?php echo $idp ?>" hidden>
            <div class="d-grid gap-2">
            <button type="submit" class="btn btn-outline-success">S U B M I T</button>
            </div>
          </form>
      </div>
     </div>
    <div class="popup-container" id="cardProf">
     <div class="popup">
        <div class="popup-head">
        <a class="float-right" href="?id_p=<?php echo $idp ?>">&times;</a>
          <h6>Panel Edit Profil</h6>
          <p class="kecil-phone-k">Silahkan isi dengan jelas ya pa hehe : )</p>
        </div>
        <div class="card-custom white shadow">
        <div class="identitas">
          <img
            src="../assets/images/<?php echo $d['foto'] ?>"
            alt=""
            class="profilku-img"
          />
          <p class="m-0"><?php echo $d['nama'] ?></p>

          <img
            src="https://i.stack.imgur.com/FxCHC.png"
            class="barcode"
            alt=""
          />
          <p class="m-0"><?php echo $d['bidang'] ?></p>
        </div>
      </div>
          <form action="edit.php" method="POST">
            <input type="text" class="form-control mb-3" name="nama" placeholder="Nama...">
            <input type="text" class="form-control mb-3" name="bidang" placeholder="Bidang...">
            <input type="text" class="form-control mb-3" name="id" value="<?php echo $idp ?>" hidden>
            <div class="d-grid gap-2">
            <button type="submit" class="btn btn-outline-success">S U B M I T</button>
            </div>
          </form>
      </div>
     </div>
    <div class="popup-container" id="cardCat">
     <div class="popup">
        <div class="popup-head">
        <a class="float-right" href="?id_p=<?php echo $idp ?>">&times;</a>
          <h6>Panel Catatan</h6>
          <p class="kecil-phone-k">Ini dia catatan dari pekerjamu satu ini</p>
        </div>
        <div class="card-custom white shadow">
        <div class="identitas">
          <img
            src="../assets/images/<?php echo $d['foto'] ?>"
            alt=""
            class="profilku-img"
          />
          <p class="m-0"><?php echo $d['nama'] ?></p>

          <img
            src="https://i.stack.imgur.com/FxCHC.png"
            class="barcode"
            alt=""
          />
          <p class="m-0"><?php echo $d['bidang'] ?></p>
        </div>
      </div>
        <?php
          while($r = mysqli_fetch_array($dataCat)){
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
     </div>
    <div class="popup-container" id="cardMas">
     <div class="popup">
        <div class="popup-head">
        <a class="float-right" href="?id_p=<?php echo $idp ?>">&times;</a>
          <h6>Panel Data Masuk</h6>
          <p class="kecil-phone-k">Ini dia Data Masuk dari pekerjamu satu ini</p>
        </div>
        <div class="card-custom white shadow">
        <div class="identitas">
          <img
            src="../assets/images/<?php echo $d['foto'] ?>"
            alt=""
            class="profilku-img"
          />
          <p class="m-0"><?php echo $d['nama'] ?></p>

          <img
            src="https://i.stack.imgur.com/FxCHC.png"
            class="barcode"
            alt=""
          />
          <p class="m-0"><?php echo $d['bidang'] ?></p>
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
    <div class="popup-container" id="cardTi">
     <div class="popup">
        <div class="popup-head">
        <a class="float-right" href="?id_p=<?php echo $idp ?>">&times;</a>
          <h6>Panel Data Masuk</h6>
          <p class="kecil-phone-k">Ini dia Data Masuk dari pekerjamu satu ini</p>
        </div>
        <div class="card-custom white shadow">
        <div class="identitas">
          <img
            src="../assets/images/<?php echo $d['foto'] ?>"
            alt=""
            class="profilku-img"
          />
          <p class="m-0"><?php echo $d['nama'] ?></p>

          <img
            src="https://i.stack.imgur.com/FxCHC.png"
            class="barcode"
            alt=""
          />
          <p class="m-0"><?php echo $d['bidang'] ?></p>
        </div>
      </div>
        <?php
              while($r = mysqli_fetch_array($dataTidak)){
                ?>
                <li class="card-custom red"><?php echo $r['tanggal']  ?> <?php echo $r['jam_masuk']  ?> <?php echo $r['jam_pulang']  ?> <?php echo $r['reason']  ?></li>
                <?php
              }
            ?> 
      </div>
     </div>
    <div class="popup-container" id="cardIz">
     <div class="popup">
        <div class="popup-head">
        <a class="float-right" href="?id_p=<?php echo $idp ?>">&times;</a>
          <h6>Panel Data Masuk</h6>
          <p class="kecil-phone-k">Ini dia Data Masuk dari pekerjamu satu ini</p>
        </div>
        <div class="card-custom white shadow">
        <div class="identitas">
          <img
            src="../assets/images/<?php echo $d['foto'] ?>"
            alt=""
            class="profilku-img"
          />
          <p class="m-0"><?php echo $d['nama'] ?></p>

          <img
            src="https://i.stack.imgur.com/FxCHC.png"
            class="barcode"
            alt=""
          />
          <p class="m-0"><?php echo $d['bidang'] ?></p>
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
    <div class="popup-container" id="cardRek">
     <div class="popup">
        <div class="popup-head">
        <a class="float-right" href="?id_p=<?php echo $idp ?>">&times;</a>
          <h6>Panel Rekening</h6>
          <p class="kecil-phone-k">Ini dia Data Rekening dari pekerjamu satu ini</p>
        </div>
        <div class="card-custom white shadow">
        <div class="identitas">
          <img
            src="../assets/images/<?php echo $d['foto'] ?>"
            alt=""
            class="profilku-img"
          />
          <p class="m-0"><?php echo $d['nama'] ?></p>

          <img
            src="https://i.stack.imgur.com/FxCHC.png"
            class="barcode"
            alt=""
          />
          <p class="m-0"><?php echo $d['bidang'] ?></p>
        </div>
      </div>
        <div class="row">
        <div class="col">
          <div class="card-custom profilku darkblue" id="card-rekening">
            <div class="logo-card">
              <img
                src="../assets/images/<?php echo $rekimg ?>.png"
                alt=""
              />
            </div>
            <a class="tombol-atur">
              <i class="fas fa-cog"></i>&ensp;Atur
            </a>
            <h6>Rekening</h6>
            <p><?php echo $d['rekening'] ?></p>
          </div>
        </div>
        <div class="col">
          <div class="card-custom profilku darkblue" id="card-gaji">
            <div class="logo-card-2">
              <img
                src="../assets/images/duit.png"
                alt=""
              />
            </div>
            <a class="tombol-atur">
              <i class="fas fa-cog"></i>&ensp;Atur
            </a>
            <h6>Gaji</h6>
            <p>Rp.<?php echo $d['gaji'] ?></p>
          </div>
        </div>
      </div>
      </div>
     </div>
    </main>
    <!-- Optional JavaScript -->
    <script>
      const body = document.querySelector("body");
      const cardKerjaan = document.getElementById("cardKerjaan");
      const btnKerjaan = document.getElementById("btnKerjaan");
      const cardCat = document.getElementById("cardCat");
      const btnCat = document.getElementById("btnCat");
      const cardMas = document.getElementById("cardMas");
      const btnMas = document.getElementById("btnMas");
      const cardTi = document.getElementById("cardTi");
      const btnTi = document.getElementById("btnTi");
      const cardIz = document.getElementById("cardIz");
      const btnIz = document.getElementById("btnIz");
      const cardRek = document.getElementById("cardRek");
      const btnRek = document.getElementById("btnRek");
      const cardGaji = document.getElementById("cardGaji");
      const btnGaji = document.getElementById("btnGaji");
      const cardPer = document.getElementById("cardPer");
      const btnPer = document.getElementById("btnPer");
      const cardProf = document.getElementById("cardProf");
      const btnProf = document.getElementById("btnProf");
      const floatMenu = document.getElementById("floatMenu")

      btnKerjaan.addEventListener("click", ()=>{
        cardKerjaan.classList.add("active");
        body.classList.add("pop-act");
        floatMenu.classList.add("menu-act");
      });
      btnCat.addEventListener("click", ()=>{
        cardCat.classList.add("active");
        body.classList.add("pop-act");
        floatMenu.classList.add("menu-act");
      });
      btnMas.addEventListener("click", ()=>{
        cardMas.classList.add("active");
        body.classList.add("pop-act");
        floatMenu.classList.add("menu-act");
      });
      btnTi.addEventListener("click", ()=>{
        cardTi.classList.add("active");
        body.classList.add("pop-act");
        floatMenu.classList.add("menu-act");
      });
      btnIz.addEventListener("click", ()=>{
        cardIz.classList.add("active");
        body.classList.add("pop-act");
        floatMenu.classList.add("menu-act");
      });
      btnRek.addEventListener("click", ()=>{
        cardRek.classList.add("active");
        body.classList.add("pop-act");
        floatMenu.classList.add("menu-act");
      });
      btnGaji.addEventListener("click", ()=>{
        cardGaji.classList.add("active");
        body.classList.add("pop-act");
        floatMenu.classList.add("menu-act");
      });
      btnPer.addEventListener("click", ()=>{
        cardPer.classList.add("active");
        body.classList.add("pop-act");
        floatMenu.classList.add("menu-act");
      });
      btnProf.addEventListener("click", ()=>{
        cardProf.classList.add("active");
        body.classList.add("pop-act");
        floatMenu.classList.add("menu-act");
      });


    </script>
    <!-- Option 1: Bootstrap Bundle with Popper.js -->
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"
      integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
