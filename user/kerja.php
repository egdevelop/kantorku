<?php
session_start();
if(isset($_SESSION['id'])){

}else{
    header("location: ../index.php");
}
include "../admin/koneksi.php";

$id_k = $_POST['id_k'];
$status = $_POST['status'];

$verif = mysqli_query($konek,"SELECT * FROM user WHERE id = '$_SESSION[id]'");
$v = mysqli_fetch_array($verif);
if($v['verif'] == 0){
    header("location:kerjaanku.php?pesan=Silahkan Verifikasi&pesan2=Data user kamu belum terverifikasi admin");
}else{
    $update = mysqli_query($konek,"UPDATE kerjaanku SET status = '$status' WHERE id = '$id_k'");

if($update){
    header("location:kerjaanku.php?pesan=Berhasil Update&pesan2=Status pekerjaan berhasil di update");
}else{
    header("location:kerjaanku.php?pesan=Error&pesan2=Server Error");

}
}

