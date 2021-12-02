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
   $pass = $_POST["pass"];


   $sql = "SELECT tendangnhap, matkhau FROM taikhoan";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
         if ($row["tendangnhap"] == $email && $row["matkhau"] == $pass) {
            echo "<div class='mesage'> Đăng nhập thành công </div>";
            break;
         }
      }
      // echo "<div class='mesage'>Tên đăng nhập hoặc mật khẩu không chính xác.";
   } else {
      echo "0 results";
   }
}
$conn->close();
?>