<?php
require_once("../components/handle/dbcontroller.php");
require_once("../components/handle/configDB.php");

if (isset($_POST["add"])) {
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $position = $_POST["position"];
    $phone = $_POST["phone"];
    $id = $_POST["id"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    
    $query = "INSERT INTO nhanvien(hotennv, gioitinh, chucvu, sodienthoai, socccd, ngaysinh, email, diachi) VALUES ('$name', '$gender', '$position', '$phone', '$id', '$dob', '$email', '$address') ";

    $result = $conn->multi_query($query);
    if ($result) echo '<script>alert("Add successfull!")</script>';
    else {
        echo '<script> alert("Add failed!") </script>';
    }
    
}


$conn->close();
