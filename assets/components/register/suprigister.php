<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlks";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $retype_pass = $_POST["retype-pass"];

    $sql = "INSERT INTO taikhoan (tendangnhap,matkhau)
VALUES ('$email', '$pass')";
    if ($conn->multi_query($sql) === TRUE) {
        echo "Đăng kí thành công.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>