<?php
session_start();
include "koneksi.php";
$id = $_POST['id'];
$nama = $_POST['nama'];
$bidang = $_POST['bidang'];

$query = mysqli_query($konek,"UPDATE user set nama = '$nama', bidang = '$bidang'  WHERE id = '$id'");
if($query){
    header("location:detail.php?id_p=$id&pesan=Berhasil&pesan2=Anda berhasil mengupdate Profil");
}else{
    var_dump($id,$judul,$dedline,$isi);
    //header("location:detail.php?pesan=Error&pesan2=Server Error");
}
?>