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
   $pass = $_POST["password"];


   $sql = "SELECT * FROM taikhoan";
   $result = $conn->query($sql);
   $check=0;

   if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
         if ($row["tendangnhap"] == $email && $row["matkhau"] == $pass) {
            if ($row["trangthai"] == 1) 
               header("Location: ../../../index.php?m=".md5($row["idtaikhoan"])."&id=".$row["idtaikhoan"]."&s=".sha1($row["idtaikhoan"])."");
            $check=1;
            break;
         }
      }
      if($check==0) {
         echo '<div style="color: red;">Tên đăng nhập hoặc mật khẩu không chính xác.</div>';
      }else
      {
         echo '<div style="color: red;">Tài khoản chưa xác nhận!</div>';
      }
   } else {
      echo '<div style="color: red;">Tài khoản không tồn tại. Vui lòng tạo tài khoản.</div>';
   }
}
$conn->close();
?>