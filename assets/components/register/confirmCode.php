<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./confirmRegister.css">
    <link rel="stylesheet" href="../../font/fontawesome-free-5.15.4-web/css/all.min.css">
    <title>Confirm Code</title>
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
                <input type="time" class="input pass confirmCode">
            </div>
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

            if (isset($_POST['btn-confirmCode'])) {

                $firstname = $_GET["f"];
                $lastname = $_GET["l"];
                $gender = $_GET["g"];
                $email = $_GET["e"];
                $db_handle = new DBController();

                if (md5($_POST['confirmCode']) == $_GET['q']) {

                    $query1 = "SELECT * FROM taikhoan where tendangnhap = '" . $email . "'";
                    $query2 = "UPDATE taikhoan set trangthai = '1'";
                    $idtaikhoan = null;
                    $conn = $db_handle->connectDB();
                    $result = $conn->query($query1);
                    $conn->query($query2);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        $row = $result->fetch_assoc();
                        $idtaikhoan = $row["idtaikhoan"];
                    }
                    $sql1 = "INSERT INTO khachhang (idtaikhoan,ho,ten,gioitinh,email)
        VALUES ('$idtaikhoan','$firstname','$lastname', '$gender','$email')";
                    if ($conn->multi_query($sql1) === true) {
                        echo '<script>
                        alert("Creat accout successful.");
                        setTimeout(function() { 
                            
                        }, 3000);
                         </script>';
                        header("Location: ../login/login.php?email=" . $_GET['e'] . "");
                    }
                } else {
                    echo '<div style="color: red;">Mã xác nhận không đúng!</div>';
                }
            }
            ?>
        </form>
    </div>
</body>

</html>