<?php
session_start();
include "koneksi.php";

$id = $_GET['id'];

$update = mysqli_query($konek,"UPDATE user SET verif = '1'");

if($update){
    header("location:verif.php?pesan=Berhasil&pesan2=Berhasil verifikasi data");
}else{
    header("location:verif.php?pesan=Error&pesan2=Error");
}