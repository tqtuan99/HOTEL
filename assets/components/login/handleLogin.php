<?php
require_once("../handle/configDB.php");


if (isset($_POST["submit"])) {
   $email = $_POST["email"];
   $pass = $_POST["password"];


   $sql = "SELECT * FROM taikhoan";
   $result = $conn->query($sql);
   $check = 0;

   if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
         if ($row["tendangnhap"] == $email){
            if ($row['matkhau'] == $pass){
               if ($row['trangthai'] ==1 ) {
                  $_SESSION['idUser'] = $row['idtaikhoan'];
                  header("Location: ../../../index.php");
               }
               $check =1;
            }
            $check =2;
         }
      }
      if ($check == 2) {
         echo '<div style="color: red;">Tên đăng nhập hoặc mật khẩu không chính xác.</div>';
      }else
      if ($check == 0) {
         echo '<div style="color: red;">Tài khoản không tồn tại. Vui lòng tạo tài khoản.</div>';
      } else {
         echo '<div style="color: red;">Tài khoản chưa xác nhận!</div>';
      }
   }
}
$conn->close();
