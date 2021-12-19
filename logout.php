<?php
session_start();
unset($_SESSION["idUser"]);
setcookie('username', $row["tendangnhap"], time() - 6000);
setcookie('password', $row["matkhau"], time() - 6000);
setcookie('idUser', $row["idtaikhoan"], time() - 6000);
header("Location: index.php");
