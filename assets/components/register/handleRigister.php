<?php
require_once("../handle/dbcontroller.php");
require_once("../handle/configDB.php");

if (isset($_POST["submit"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $retypepassword = $_POST["retypepassword"];

    $verification = random_int(100000, 999999);

    if(strlen($pass) < 8) echo '<div style="color: red;">Mật khẩu tối thiểu 8 kí tự!</div>';
    else
        if ($pass != $retypepassword) echo '<div style="color: red;">Mật khẩu xác nhận không đúng.</div>';
    else {
        $db_handle = new DBController();
        $query = "SELECT * FROM khachhang where email = '" . $email . "'";

        $count = $db_handle->numRows($query);
        if ($count != 0) echo '<div style="color: red;">Email đã tồn tại.</div>';
        else {
            $sql = "INSERT INTO taikhoan (tendangnhap,matkhau)
        VALUES ('$email', '$pass')";

            $conn->multi_query($sql);

            include("../../../gmail-email/sendmail.php");
            sendmail($email,$firstname." ".$lastname,$verification,1);

            header("Location: ./confirmCode.php?q=".md5($verification)."&e=".$email."&f=".$firstname."&l=".$lastname."&g=".$gender."");
        }
    }
}


$conn->close();
