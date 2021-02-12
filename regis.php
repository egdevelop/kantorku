<?php
session_start();
include "admin/koneksi.php";

$username = $_POST['username'];
$pw = $_POST['pw'];
$nama = $_POST['nama'];
$bidang = $_POST['bidang'];
$foto = $_POST['foto'];

$data = mysqli_query($konek,"SELECT * FROM user WHERE username = '$username'");
$cek = mysqli_num_rows($data);

if($cek == 0){
        $simpan = mysqli_query($konek,"INSERT INTO user (username,password,type_user,nama,bidang,foto)VALUES('$username','$pw',0,'$nama','$bidang','$foto')");
        if($simpan){
            header("location:login.php?pesan=Berhasil&pesan2=Silahkan verifikasi akun terlebih dahulu keadmin (*para penilai re-cloud silahkan login ke akun admin yang saya cantumkan di submission saya)");
        }else{
            //var_dump($username,$pw,$nama,$bidang,$gaji,$fotobaru);
        header("location:register.php?pesan=Error&pesan2=Server Error ");
        }
}else{
    header("location:register.php?pesan=Error&pesan2=Username telah di pakai");
}
