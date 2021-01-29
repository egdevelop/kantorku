<?php
session_start();
include "../admin/koneksi.php";
$sekarang = strtotime($jam);
$pagi = strtotime('07:00:00');
$sore = strtotime('16:30:00');
$reason = "GOOD";

$id = $_GET['id'];


if($pagi < $sekarang && $sekarang < $sore){
    $cek = mysqli_query($konek,"SELECT * FROM absen where tanggal = '$tanggal'");
    $hitung = mysqli_num_rows($cek);
    if ($hitung == 0){
        $query = mysqli_query($konek,"INSERT INTO absen (akun,type,tanggal,jam_masuk) VALUES ('$id',0,'$tanggal','$jam')");
        header("location:dashboard.php?pesan=Berhasil Masuk&pesan2=Selamat Bekerja ya teman teman :)");
    }else {
        header("location:dashboard.php?pesan=Kamu sudah absen hari ini&pesan2=Jangan berulang kali absen yaa");
    }
}elseif($sore < $sekarang){
    $query = mysqli_query($konek,"UPDATE absen SET jam_pulang = '$jam' , reason = '$reason' where tanggal = '$tanggal'");
    header("location:dashboard.php?pesan=Berhasil Pulang&pesan2=Selamat Istirahat ya teman teman :)");
}else{
    header("location:dashboard.php?pesan=Belum Saatnya&pesan2=Sabar ya belum waktunya Masuk");
}