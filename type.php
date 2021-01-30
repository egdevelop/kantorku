<?php
session_start();
if(isset($_SESSION['type_user'])){
    $type = $_SESSION['type_user'];
    if($r['type_user'] == 1){
        header("location:admin/dashboard.php");
        }else{
            header("location:user/dashboard.php");
        }
}else{
    header("location:user/index.php");
}