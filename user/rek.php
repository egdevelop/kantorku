<?php
session_start();
if(isset($_SESSION['id'])){

}else{
    header("location: ../index.php");
}
include "../admin/koneksi.php";

$rektype = $_POST['rektype'];
$no = $_POST['norekening'];

$update = mysqli_query($konek,"UPDATE user SET rekening = '$no' , rekimg = '$rektype' where id = '$_SESSION[id]'");

if($update){
    header("location:profilku.php?pesan=Berhasil&pesan2=Rekening berhasil di update");
    unset($_SESSION['rekening']);
    unset($_SESSION['rekimg']);
}else{
    header("location:profilku.php?pesan=Error&pesan2=Server Error");
}