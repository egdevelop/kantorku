<?php
session_start();
if(isset($_SESSION['id'])){

}else{
    header("location: ../index.php");
}
include "koneksi.php";
$id = $_POST['id'];
$judul = $_POST['judul'];
$dedline = $_POST['dedline'];
$isi = $_POST['isi'];

$query = mysqli_query($konek,"INSERT INTO kerjaanku (akun,judul,dedline,isi) VALUE ('$id','$judul','$dedline','$isi')");
if($query){
    header("location:detail.php?id_p=$id&pesan=Berhasil&pesan2=Anda berhasil memberi tugas");
}else{
    var_dump($id,$judul,$dedline,$isi);
    //header("location:detail.php?pesan=Error&pesan2=Server Error");
}
?>