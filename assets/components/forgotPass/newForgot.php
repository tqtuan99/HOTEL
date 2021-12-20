<?php
session_start();
$check = 0;
function updatePassword($email){
   require_once("../handle/dbcontroller.php");
   $db_handle = new DBController();
   if (isset($_POST['submit'])) {
      $pass = $_POST['password'];
      $Confirmpass = $_POST['confirmPassword'];
      if ($pass == $Confirmpass) {
         $newPassMD5 = md5($pass);
         $querry = "UPDATE taikhoan SET matkhau = '$newPassMD5' where tendangnhap = '$email'";
         if($db_handle->updateQuery($querry)){
            unset($_SESSION['tokenEmail']);
            return 1;
         }
      }
   }
}

if ((isset($_GET['q']) && isset($_SESSION['tokenEmail'])) || isset($_SESSION['idUser'])) {
   if ((isset($_GET['q']) && isset($_SESSION['tokenEmail']))){
      $email = $_SESSION['tokenEmail'];
      $emailMD5 = md5($_SESSION['tokenEmail']);
      if ($emailMD5 == $_GET['q'] || isset($_SESSION['idUser'])) {
        $check = updatePassword($email);
      } else {
         header('Location: ../../../notFound.php');
      }
   }

   if( isset($_SESSION['idUser'])){
      if( isset($_SESSION['emailUser'])){
      $check = updatePassword($_SESSION['emailUser'])==1?1:0;
      }
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
                  <?php 
                  if( isset($_SESSION['emailUser'])) $email = $_SESSION['emailUser'];
                  if (isset($_POST["submit"])) 
                     if ($check == 0) echo "Mã xác nhận không đúng!";
                     else echo "Mật khẩu thay đổi thành công. <br><br><a href='../login/login.php?email=$email'>Quay lại trang đăng nhập</a>"; 
                  ?>
               </div>
            </div>
         </div>
   </div>
   </form>
</body>

</html>