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
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $retypepassword = $_POST["retypepassword"];
    if ($pass != $retypepassword) echo "Mật khẩu xác nhận không đúng.";
    else {
        require_once("../handle/dbcontroller.php");
        $db_handle = new DBController();
        $query = "SELECT * FROM khachhang where email = '" . $email . "'";
        $count = $db_handle->numRows($query);
        if ($count != 0) echo "Email đã tồn tại.";
        else {
            $sql = "INSERT INTO taikhoan (tendangnhap,matkhau)
    VALUES ('$email', '$pass')";
            $sql1 = "INSERT INTO khachhang (ho,ten,gioitinh,email)
    VALUES ('$firstname','$lastname', '$gender','$email')";

            if ($conn->multi_query($sql) === TRUE && $conn->multi_query($sql1)) {
                header("Location: ../login/login.php?email=".$email."");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
$conn->close();
?>