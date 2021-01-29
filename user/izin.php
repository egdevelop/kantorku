<?php
session_start();
include "../admin/koneksi.php";
$id = $_SESSION['id'];
$reason = $_POST['reason'];

$query = mysqli_query($konek,"INSERT INTO absen (akun,type,tanggal,jam_masuk,jam_pulang,reason) VALUE ('$id',2,'$tanggal','$jam','$jam','$reason')");
if($query){
    header("location:dashboard.php?pesan=Berhasil Izin&pesan2=Semoga apapun yang kamu lakukan selama izin dapat di manfaatkan yaa");
}else{
    var_dump($id,$type,$tanggal,$reason);
    //header("location:dashboard.php?pesan=Error&pesan2=Server error ya");
}

?>