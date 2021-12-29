<?php
include_once('./assets/components/handle/configDB.php');
session_start();

if(isset($_SESSION["idUser"])){
    $sqlSetStatus = 'UPDATE taikhoan set trangthai = 0 where idtaikhoan = '.$_SESSION["idUser"];
    $conn->multi_query($sqlSetStatus);
    unset($_SESSION["idUser"]);
}


if(isset($_SESSION["emailUser"]))
    unset($_SESSION['emailUser']);

if(isset($_SESSION["admin"]))
    unset($_SESSION['admin']);

if(isset($_SESSION["employee"]))
    unset($_SESSION['employee']);

header("Location: index.php");
