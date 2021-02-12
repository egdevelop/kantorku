<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$pw = $_POST['pw'];
$nama = $_POST['nama'];
$bidang = $_POST['bidang'];
$gaji = $_POST['gaji'];
$foto = $_POST['foto'];

$data = mysqli_query($konek,"SELECT * FROM user WHERE username = '$username'");
$cek = mysqli_num_rows($data);

if($cek == 0){
        $simpan = mysqli_query($konek,"INSERT INTO user (username,password,type_user,nama,bidang,gaji,foto,verif)VALUES('$username','$pw',0,'$nama','$bidang','$gaji','$foto',1)");
        if($simpan){
            header("location:pekerja.php?pesan=Berhasil&pesan2=Berhasil memasukan data user");
        }else{
            //var_dump($username,$pw,$nama,$bidang,$gaji,$fotobaru);
        header("location:pekerja.php?pesan=Error&pesan2=Server Error ");
        }
}else{
    header("location:pekerja.php?pesan=Error&pesan2=Username telah di pakai");
}
