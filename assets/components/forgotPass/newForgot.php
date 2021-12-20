<?php
session_start();
$check = 0;

if (isset($_GET['q']) && isset($_SESSION['tokenEmail'])) {
   if ($_SESSION['tokenEmail'] == $_GET['q']) {
      require_once("../handle/dbcontroller.php");
      $db_handle = new DBController();
      if (isset($_POST['submit'])) {
         $pass = $_POST['password'];
         $Confirmpass = $_POST['confirmPassword'];
         if ($pass == $Confirmpass) {
            $querry = "UPDATE taikhoan SET matkhau = '$newPassMD5'";
            $db_handle->updateQuery($querry);
            unset($_SESSION['tokenEmail']);
            $check = 1;
         }
      }
   } else {
      header('Location: ../../../notFound.php');
   }
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
   <link rel="stylesheet" href="../register/confirmRegister.css">
   <title>Document</title>
</head>

<body>
   <div class="cont-confirm">
      <form action="" method="POST">
         <div class="bg-confirm">
            <div class="confirm-text" style="margin-top: 50px;">
               <label for="" class="lbl-pass-center" style="font-size: 25px;">Change Password</label>
               <input type="password" class="input pass confirmCode" name="password" placeholder="New Password" required>
               <input type="password" class="input pass confirmCode" name="confirmPassword" placeholder="Confirm password" required>
               <button type="submit" style="margin-top: 50px;" class="btn signin btn-confirmCode" name="submit">DONE</button>
               <div style="font-size: 15px;margin: 28px; font-weight: 100;color: red;">
                  <?php if (isset($_POST["submit"])) if ($check == 0) echo "Mã xác nhận không đúng!";
                  else echo "Mật khẩu thay đổi thành công. <br><br><a href='../login/login.php?email=$email'>Quay lại trang đăng nhập</a>"; ?>
               </div>
            </div>
         </div>
   </div>
   </form>
</body>

</html>