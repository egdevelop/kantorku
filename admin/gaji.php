<?php
session_start();
if(isset($_SESSION['id'])){

}else{
    header("location: ../index.php");
}
include "koneksi.php";
$id = $_POST['id'];
$gaji = $_POST['gaji'];

$query = mysqli_query($konek,"UPDATE user set gaji = '$gaji' WHERE id = '$id'");
if($query){
    header("location:detail.php?id_p=$id&pesan=Berhasil&pesan2=Anda berhasil mengupdate gaji");
}else{
    var_dump($id,$judul,$dedline,$isi);
    //header("location:detail.php?pesan=Error&pesan2=Server Error");
}
?>