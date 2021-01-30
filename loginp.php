<?php
session_start();
if(isset($_SESSION['id'])){
  header("location: type.php");
}
include "admin/koneksi.php";
$username = $_POST['username'];
$pw = $_POST['pw'];

$query = mysqli_query($konek,"SELECT * FROM user where username = '$username' and password = '$pw'");
$cek = mysqli_num_rows($query);
if($cek > 0){
$r = mysqli_fetch_array($query);
    $_SESSION['nama'] = $r['nama'];
    $_SESSION['bidang'] = $r['bidang'];
    $_SESSION['gaji'] = $r['gaji'];
    $_SESSION['foto'] = $r['foto'];
    $_SESSION['id'] = $r['id'];
    $_SESSION['rekening'] = $r['rekening'];
    $_SESSION['rekimg'] = $r['rekimg'];
    $_SESSION['type_user'] = $r['type_user'];
    $_SESSION['username'] = $username;
    $_SESSION['pw'] = $pw;
    if($r['type_user'] == 1){
    header("location:admin/dashboard.php");
    }else{
        header("location:user/dashboard.php");
    }
}else {
    header("location:login.php?status=333");
}

?>