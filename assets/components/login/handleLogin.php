<?php
require_once("../handle/configDB.php");
$cookie_time = 30 * 24 * 60 * 60;


if (isset($_POST["submit"])) {
   $email = $_POST["email"];
   // if(isset($_COOKIE['password']))
   //    $pass = md5($_COOKIE['password']);
   // else
   $pass = md5($_POST["password"]);

   $check_remember = ((isset($_POST['chk-remember']) != 0) ? 1 : "");

   $sql = "SELECT * FROM taikhoan";
   $result = $conn->query($sql);
   $check = 0;

   if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
         if ($row["tendangnhap"] == $email) {
            if ($row['matkhau']== $pass) {
               if ($row['trangthai'] == 1) {
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
                  header("Location: ../../../index.php");
               }
               $check = 1;
            }
            $check = 2;
         }
      }
      if ($check == 2) {
         echo '<div style="color: red;">Tên đăng nhập hoặc mật khẩu không chính xác.</div>';
      } else
      if ($check == 0) {
         echo '<div style="color: red;">Tài khoản không tồn tại. Vui lòng tạo tài khoản.</div>';
      } else {
         echo '<div style="color: red;">Tài khoản chưa xác nhận!</div>';
      }
   }else{
      echo '<div style="color: red;">Tài khoản không tồn tại. Vui lòng tạo tài khoản.</div>';
   }
}
$conn->close();
