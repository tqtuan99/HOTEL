<?php
require_once("../handle/dbcontroller.php");
include('../handle/configDB.php');
$check = 0;
if (isset($_POST["submit"])) {
    $email = $_POST["email"];;
    $newPass = random_int(10000000, 99999999);
    $newPassMD5 = md5($newPass);

    $db_handle = new DBController();
    $query = "SELECT * FROM khachhang";
    $result = $conn->query($query);

    while ($row = $result->fetch_assoc())
        if ($row['email'] == $email) {
            $querry = "UPDATE taikhoan SET matkhau = '$newPassMD5'";
            $db_handle->updateQuery($querry);
            $_SESSION['tokenEmail'] = md5($email);
            include("../../../gmail-email/sendmail.php");
            sendmail($email, '', $newPass, 0 , $email);
            $check = 1;
        }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../register/confirmRegister.css">

    <title>Forgot Password</title>
</head>

<body>
    <div class="cont-confirm">
        <form action="" method="POST">
            <div class="bg-confirm">
                <div class="confirm-text" style="margin-top: 50px;">
                    <label for="" class="lbl-pass-center" style="font-size: 25px;">Nhập email của bạn</label>
                    <input type="text" class="input pass confirmCode" name="email" placeholder="user@gmail.com" required>
                    <button type="submit" style="margin-top: 50px;" class="btn signin btn-confirmCode" name="submit">SEND</button>
                    <div>
                        <?php if (isset($_POST["submit"])) if ($check == 0) echo "Email không tồn tại. <br><a href='../register/register.php?email=$email'>Quay lại trang đăng kí</a>";
                        else echo "Chúng tôi đã gửi mật khẩu mới vào email: $email <br><a href='../login/login.php?email=$email'>Quay lại trang đăng nhập</a>"; ?>
                    </div>
                </div>
            </div>
    </div>
    </form>
</body>

</html>