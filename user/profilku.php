<?php
session_start();
include "../admin/koneksi.php";

$data = mysqli_query($konek,"SELECT * FROM user where id = '$_SESSION[id]'");
$d = mysqli_fetch_array($data);

$_SESSION['rekening'] = $d['rekening'];
$_SESSION['rekimg'] = $d['rekimg'];

if($_SESSION['rekimg'] == 0){
  $rekimg = "duit";
}elseif($_SESSION['rekimg'] == 1){
  $rekimg = "gopay";
}elseif($_SESSION['rekimg'] == 2){
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
            <p><?php echo $_SESSION['rekening'] ?></p>
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
            <p>Rp.<?php echo $_SESSION['gaji'] ?></p>
          </div>
        </div>
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
      <div class="float-menu fixed-bottom" id="floatMenu">
        <a href="dashboard.php"><i class="fas fa-home"></i></a>
        <a href="kerjaanku.php"><i class="fas fa-tasks"></i></a>
        <a href="catatanku.php"><i class="far fa-calendar"></i></a>
        <a href="profilku.php"><i class="fas fa-id-badge"></i></a>
        <a href="../logout.php"><i class="fas fa-power-off"></i></a>
                </div>
    </main>

    <div class="popup-container" id="action-rekening">
      <div class="popup">
        <a href="#" id="btn-closer" class="float-right">&times;</a>
        <div class="head-pop">
          <h1>RekeningKu</h1>
          <p>Ini detail dari data Rekening kamu</p>
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
        <form action="rek.php" method="POST">
          <select name="rektype" class="form-control mb-3" id="status">
            <option value="1" selected>Gopay</option>
            <option value="3">Mandiri</option>
            <option value="2">BCA</option>
          </select>
          <input type="number" name="norekening" id="#" placeholder="Masukan Nomer Rekening Anda" class="mb-3 form-control">
                      <div class="d-grid gap-2">
            <button type="submit" class="btn btn-outline-success">S I M P A N</button>
            </div>
          <p class="txt-small mt-3">
            Dengan ini saya bertanggung jawab atas perubahan status kerja saya
          </p>
        </form>
        
      </div>
    </div>
    <div class="popup-container" id="action-gaji">
      <div class="popup">
        <a href="#" id="btn-closeg" class="float-right">&times;</a>
        <div class="head-pop">
          <h1>GajiKu</h1>
          <p>Ini detail dari data gaji kamu</p>
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
       <div class="card-custom yellow tengah">
        <h5>GajiKu Saat Ini</h5>
        <h3>Rp. 700.000</h3>
        <p class="kecil">Di Update Pada Tanggal 20 Maret 2020</p>
       </div>

       <button class="btn btn-outline-danger" id="btn-closeg-2">C L O S E</button>
        
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
      const cardRekening = document.getElementById("card-rekening") ;
      const actionRekening = document.getElementById("action-rekening") ;
      const body = document.querySelector("body");
      const btnCloseR = document.getElementById("btn-closer");
      const btnCloseG = document.getElementById("btn-closeg");
      const btnCloseG2 = document.getElementById("btn-closeg-2");
      const cardGaji = document.getElementById("card-gaji");
      const actionGaji = document.getElementById("action-gaji");
      const floatMenu = document.getElementById("floatMenu");

      cardRekening.addEventListener("click", ()=>{
        actionRekening.classList.add("active");
        body.classList.add("pop-act");
        floatMenu.classList.add("menu-act");
      });

      btnCloseR.addEventListener("click",()=>{
        actionRekening.classList.remove("active");
        body.classList.remove("pop-act");
        floatMenu.classList.remove("menu-act");
      });
      cardGaji.addEventListener("click", ()=>{
        actionGaji.classList.add("active");
        body.classList.add("pop-act");
        floatMenu.classList.add("menu-act");
      });

      btnCloseG.addEventListener("click",()=>{
        actionGaji.classList.remove("active");
        body.classList.remove("pop-act");
        floatMenu.classList.remove("menu-act");
      });

      btnCloseG2.addEventListener("click",()=>{
        actionGaji.classList.remove("active");
        body.classList.remove("pop-act");
        floatMenu.classList.remove("menu-act");
      });
      
    </script>
  </body>
</html>
