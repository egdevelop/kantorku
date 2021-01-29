<?php
session_start();
include "koneksi.php";
$id = $_POST['id'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];

$query = mysqli_query($konek,"INSERT INTO peringatan (akun,judul,isi) VALUES ('$id','$judul','$isi')");
if($query){
    header("location:detail.php?id_p=$id&pesan=Berhasil&pesan2=Anda berhasil memberi peringatan");
}else{
    var_dump($id,$judul,$isi);
    //header("location:detail.php?pesan=Error&pesan2=Server Error");
}
?>