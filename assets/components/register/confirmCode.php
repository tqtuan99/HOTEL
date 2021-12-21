<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['verification'])) {
} else {
    header('Location: ../../../notFound.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./confirmRegister.css">
    <link rel="stylesheet" href="../../font/fontawesome-free-5.15.4-web/css/all.min.css">
    <title>Confirm Code</title>
    <style>
        span {
            border: solid 1px #ACACAC;
            padding: 2px;
        }
    </style>
</head>

<body>
    <div class="cont-confirm">
        <form action="" method="POST">
            <div class="back">
                <a href="./register.php" class="fas fa-long-arrow-alt-left"></a>
            </div>
            <div class="bg-confirm">
                <div class="confirm-text">
                    <label for="" class="lbl-pass center">Confirm code</label>
                    <div class="cont-pass ">
                        <input type="text" class="input pass confirmCode" name="confirmCode" placeholder="confirm code" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn signin btn-confirmCode" name="btn-confirmCode">CONFIRM</button>
            <div>
                <!-- <input type="time" class="input pass confirmCode"> -->
                Effective time <span id="m">Phút</span> : <span id="s">Giây</span>
            </div>
            <?php
            require_once("../handle/configDB.php");

            if (isset($_POST['btn-confirmCode'])) {

                $firstname = $_GET["f"];
                $lastname = $_GET["l"];
                $gender = $_GET["g"];
                $code = trim($_POST['confirmCode']);
                $email = $_SESSION['username'];
                $passwordMD5 = $_SESSION['password'];
                $verification = $_SESSION['verification'];

                if (md5($code) == $verification) {

                    $idtaikhoan = null;
                    $sql1 = "INSERT INTO taikhoan (tendangnhap,matkhau) VALUES ('$email', '$passwordMD5')";
                    $sql2 = "SELECT idtaikhoan FROM taikhoan where tendangnhap = '" . $email . "'";
                    $conn->multi_query($sql1);
                    $result = $conn->query($sql2);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        $row = $result->fetch_assoc();
                        $idtaikhoan = $row["idtaikhoan"];
                    }
                    $sql3 = "INSERT INTO khachhang (idtaikhoan,ho,ten,gioitinh,email)
        VALUES ('$idtaikhoan','$firstname','$lastname', '$gender','$email')";
                    if ($conn->multi_query($sql3) === true) {
                        unset($_SESSION['username']);
                        unset($_SESSION['password']);
                        unset($_SESSION['verification']);
                        header("Location: ../login/login.php?email=" . $email . "");
                    }
                } else {
                    echo '<div style="color: red;">Mã xác nhận không đúng!</div>';
                }
            }
            $conn->close();

            ?>
        </form>
    </div>

    <script language="javascript">
        var h = null; // Giờ
        var m = null; // Phút
        var s = null; // Giây

        var timeout = null; // Timeout

        function start() {
            // Code
            /*BƯỚC 1: THIẾT LẬP GIÁ TRỊ BAN ĐẦU*/
            if (h === null) {
                h = 0;
                m = 2;
                s = 0;
            }
            /*BƯỚC 1: CHUYỂN ĐỔI DỮ LIỆU*/
            // Nếu số giây = -1 tức là đã chạy ngược hết số giây, lúc này:
            //  - giảm số phút xuống 1 đơn vị
            //  - thiết lập số giây lại 59
            if (s === -1) {
                m -= 1;
                s = 59;
            }

            // Nếu số phút = -1 tức là đã chạy ngược hết số phút, lúc này:
            //  - giảm số giờ xuống 1 đơn vị
            //  - thiết lập số phút lại 59
            if (m === -1) {
                h -= 1;
                m = 59;
            }

            // Nếu số giờ = -1 tức là đã hết giờ, lúc này:
            //  - Dừng chương trình
            if (h == -1) {
                clearTimeout(timeout);
                alert('Mã xác nhận hết hiệu lực. Vui lòng đăng kí lại.');
                window.location.href = './register.php';
                return false;
            }

            /*BƯỚC 1: HIỂN THỊ ĐỒNG HỒ*/
            // document.getElementById('h').innerText = h.toString();
            document.getElementById('m').innerText = m.toString();
            document.getElementById('s').innerText = s.toString();

            /*BƯỚC 1: GIẢM PHÚT XUỐNG 1 GIÂY VÀ GỌI LẠI SAU 1 GIÂY */
            timeout = setTimeout(function() {
                s--;
                start();
            }, 1000);
        }

        // function stop() {
        //     clearTimeout(timeout);
        // }
        start();
    </script>
</body>

</html>