<?php
session_start();
include "../admin/koneksi.php";

$id_k = $_POST['id_k'];
$status = $_POST['status'];

$update = mysqli_query($konek,"UPDATE kerjaanku SET status = '$status' WHERE id = '$id_k'");

if($update){
    header("location:kerjaanku.php?pesan=Berhasil Update&pesan2=Status pekerjaan berhasil di update");
}else{
    header("location:kerjaanku.php?pesan=Error&pesan2=Server Error");

}