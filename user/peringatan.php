<?php
session_start();
if(isset($_SESSION['id'])){

}else{
    header("location: ../index.php");
}
include "../admin/koneksi.php";
$id_p = $_GET['id_p'];
$status = '1';

$verif = mysqli_query($konek,"SELECT * FROM user WHERE id = '$_SESSION[id]'");
$v = mysqli_fetch_array($verif);
if($v['verif'] == 0){
    header("location:dashboard.php?pesan=Silahkan Verifikasi&pesan2=Data user kamu belum terverifikasi admin");
}else{
    $query = mysqli_query($konek,"UPDATE peringatan SET status = '$status' where id = '$id_p'");
    if($query){
        header("location:dashboard.php?pesan=Berhasil&pesan2=Peringatan sudah di tanggapi");
    }else {
        header("location:dashboard.php?pesan=Error&pesan2=Server Error");
    }
}


?>