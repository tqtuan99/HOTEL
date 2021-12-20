<?php
session_start();

unset($_SESSION["idUser"]);
unset($_SESSION['emailUser']);

header("Location: index.php");
