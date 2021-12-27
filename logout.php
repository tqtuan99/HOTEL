<?php
session_start();

if(isset($_SESSION["idUser"]))
    unset($_SESSION["idUser"]);

if(isset($_SESSION["emailUser"]))
    unset($_SESSION['emailUser']);

if(isset($_SESSION["admin"]))
    unset($_SESSION['admin']);

if(isset($_SESSION["employee"]))
    unset($_SESSION['employee']);

header("Location: index.php");
