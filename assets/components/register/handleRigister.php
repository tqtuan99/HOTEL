<?php


require_once("../handle/dbcontroller.php");

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

    $verification = random_int(100000, 999999);


    if ($pass != $retypepassword) echo "Mật khẩu xác nhận không đúng.";
    else {
        $db_handle = new DBController();
        $query = "SELECT * FROM khachhang where email = '" . $email . "'";

        $count = $db_handle->numRows($query);
        if ($count != 0) echo "Email đã tồn tại.";
        else {
            $sql = "INSERT INTO taikhoan (tendangnhap,matkhau)
        VALUES ('$email', '$pass')";

            $conn->multi_query($sql);

            include("../../../gmail-email/sendmail.php");
            sendmail($email,$firstname.$lastname,$verification);

            header("Location: ./confirmCode.php?q=".md5($verification)."&e=".$email."&f=".$firstname."&l=".$lastname."&g=".$gender."");
        }
    }
}


$conn->close();
