<?php
session_start();
if(isset($_SESSION['id'])){

}else{
    header("location: ../index.php");
}
include "../admin/koneksi.php";
$id = $_SESSION['id'];
$reason = $_POST['reason'];

$verif = mysqli_query($konek,"SELECT * FROM user WHERE id = '$id'");
$v = mysqli_fetch_array($verif);
if($v['verif'] == 0){
    header("location:dashboard.php?pesan=Silahkan Verifikasi&pesan2=Data user kamu belum terverifikasi admin");
}else {
    $query = mysqli_query($konek,"INSERT INTO absen (akun,type,tanggal,jam_masuk,jam_pulang,reason) VALUE ('$id',2,'$tanggal','$jam','$jam','$reason')");
if($query){
    header("location:dashboard.php?pesan=Berhasil Izin&pesan2=Semoga apapun yang kamu lakukan selama izin dapat di manfaatkan yaa");
}else{
    var_dump($id,$type,$tanggal,$reason);
    //header("location:dashboard.php?pesan=Error&pesan2=Server error ya");
}
}

?>