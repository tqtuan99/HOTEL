<?php
require_once("../handle/configDB.php");
$cookie_time = 30 * 24 * 60 * 60;


if (isset($_POST["submit"])) {
   $email = $_POST["email"];
   $pass = md5(trim($_POST["password"]));

   $check_remember = ((isset($_POST['chk-remember']) != 0) ? 1 : "");

   $sql = "SELECT * FROM taikhoan";
   $result = $conn->query($sql);
   $check = 0;

   if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
         if ($row["tendangnhap"] == $email) {
            if ($row['matkhau']== $pass) {

               $sqlSetStatus = 'UPDATE taikhoan set trangthai = 1 where idtaikhoan = '.$row['idtaikhoan'];
               $conn->multi_query($sqlSetStatus);

               //login successful

                  if ($check_remember) {
                     if(!isset($_COOKIE['password'])&& !isset($_COOKIE['password'])){
                        setcookie('password', $_POST["password"], time() + $cookie_time);
                        setcookie('username', $_POST["email"], time() + $cookie_time);
                     }
                  }else {
                     if(isset($_COOKIE['password'])){
                        setcookie('password', '');
                        setcookie('username', '');
                     }
                  }

                  $_SESSION['idUser'] = $row['idtaikhoan'];
                  $_SESSION['emailUser'] = $row['tendangnhap'];

                  $sql1 = "SELECT idtaikhoan, chucvu from nhanvien where idtaikhoan = ".$row['idtaikhoan'];
                  $kq = $conn->query($sql1);
                  if($kq->num_rows > 0){
                     $row1 = $kq->fetch_assoc();
                     if($row1['chuvu'] == 1){
                        $_SESSION['admin'] = 'yes';
                        header("Location: ../../admin/adminHome.php");
                     }
                     else {
                        $_SESSION['admin'] = 'yes';

                        $_SESSION['employee'] = 'yes';
                        header("Location: ../../admin/adminHome.php");
                     }

                  }
                  else
                     header("Location: ../../../index.php");
            }
            $check = 2;
         }
      }
      if ($check == 2) {
         echo '<div style="color: red;">Tên đăng nhập hoặc mật khẩu không chính xác.</div>';
      } else{
         echo '<div style="color: red;">Tài khoản không tồn tại. Vui lòng tạo tài khoản.</div>';
      } 
   }else{
      echo '<div style="color: red;">Tài khoản không tồn tại. Vui lòng tạo tài khoản.</div>';
   }
}
$conn->close();
