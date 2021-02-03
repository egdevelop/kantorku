<?php
session_start();
if(isset($_SESSION['id'])){

}else{
    header("location: ../index.php");
}
include "../admin/koneksi.php";

$isi = $_POST['catatan'];


$verif = mysqli_query($konek,"SELECT * FROM user WHERE id = '$_SESSION[id]'");
$v = mysqli_fetch_array($verif);
if($v['verif'] == 0){
    header("location:catatanku.php?pesan=Silahkan Verifikasi&pesan2=Data user kamu belum terverifikasi admin");
}else{
$query = mysqli_query($konek,"INSERT INTO catatan (akun,tanggal,isi)VALUES('$_SESSION[id]','$tanggal','$isi')");
    if($query){
        header("location:catatanku.php?pesan=Berhasil&pesan2=Yess berhasil menambahkan catatan keep in spirit");
    }else {
        header("location:catatanku.php?pesan=Error Server&pesan2=Server Error bos");
    }
}

