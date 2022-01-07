<?php
if (session_id() === "")
session_start();

require_once("../handle/dbcontroller.php");
require_once("../handle/configDB.php");
$db_handle = new DBController();

if (isset($_SESSION['idUser']) )
   $id = $_SESSION['idUser'];
else header('location: ../login/login.php');

$idRoom = '';
$checkin = '';
$checkout = '';

if (isset($_GET['book'])){
   $idRoom = $_GET['idRoom'];
   $checkin = $_GET['checkin'];
   $checkout = $_GET['checkout'];
}


$query = 'SELECT Concat( khachhang.ho," ",khachhang.ten) as hoten, khachhang.* FROM khachhang where idtaikhoan = '.$id;
$result = $conn->query($query);
$rowCus = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../../output.css">
   <link rel="stylesheet" href="../home/header/header.css">
   <link rel="stylesheet" href="../home/footer/footer.css">
   <link rel="stylesheet" href="../../font/fontawesome-free-5.15.4-web/css/all.min.css">
   <title>Document</title>
</head>

<body>

   <?php
   include('../home/header/header.php');
   ?>

   <div class="m-auto bg-gray-100 mt-7">
      <div class="flex flex-col max-w-screen-lg m-auto bg-white">
         <div class="flex flex-col m-10 p-4 gap-y-4 bg-white shadow-2xl rounded-b-full">
            <h2 class="text-center text-3xl uppercase font-bold">Đặt phòng khách sạn</h2>
            <p class="text-center text-2xl -mt-3">Điền thông tin người liên lạc và khách bên dưới</p>

            <div class="flex gap-5">
               <div class="flex flex-col gap-y-10">
                  <h3 class="font-bold text-xl">Thông tin của bạn</h3>
                  <div class="flex flex-col gap-y-3 shadow-xl flex-1 p-4 -mt-10">
                     <div class="flex flex-col">
                        <h3>Tên người liên hệ</h3>
                        <div>
                           <input style="text-transform: capitalize;" value="<?php echo $rowCus['hoten'] ?>" type="text" name="" id="" class="p-2 bg-gray-100 w-full rounded-xl" placeholder="Tran Van A">
                        </div>
                        <h4 class="text-gray-300 text-sm italic">*Nhập tên như trên CMND/ hộ chiếu(không dấu)</h4>
                     </div>
                     <div class="flex gap-x-5">
                        <div class="w-1/2">
                           <h3>Số điện thoại</h3>
                           <input value="<?php echo $rowCus['sodienthoai'] ?>" type="tel" class="p-2 bg-gray-100 w-full rounded-xl" placeholder="123456789">
                        </div>
                        <div class="w-1/2">
                           <h3>Email</h3>
                           <input value="<?php echo $rowCus['email'] ?>" type="email" class="p-2 bg-gray-100 w-full rounded-xl" placeholder="user@gmail.com">
                        </div>
                     </div>
                     <div class="flex justify-between px-8 py-3">
                        <div>
                           <input type="radio" name="cus" id="cus1">
                           <label for="cus1">Tôi là khách lưu trú</label>
                        </div>
                        <div>
                           <input type="radio" name="cus" id="cus2">
                           <label for="cus2">Tôi đặt cho người khác</label>
                        </div>
                     </div>
                  </div>

                  <h3 class="font-bold text-xl">Chính sách huỷ phòng</h3>
                  <div class="flex flex-col gap-y-3 shadow-xl flex-1 p-4 -mt-10">
                     <p>Chính sách huỷ đặt phòng</p>
                     <div>
                        <i class="fas fa-exclamation text-red-600 mr-2"></i>
                        <p class="inline-block">Đặt phòng này không được hoàn tiền</p>
                     </div>
                  </div>


                  <?php
                     $query = "SELECT phong.*, timediff('$checkout','$checkin') as ngayo, ROUND(TIME_TO_SEC(timediff('$checkout','$checkin'))*(phong.dongia/3600/24),2) as tongtien 
                              FROM phong 
                              WHERE phong.idphong =  ".$idRoom;
                     $result = $conn->query($query);
                     $rowRoom = $result->fetch_assoc();
                  ?>

                  <h3 class="font-bold text-xl">Chi tiết giá</h3>
                  <div class="flex flex-col gap-y-3 shadow-xl flex-1 p-4 -mt-10">
                     <div class="flex justify-between">
                        <p>Tổng tiền</p> <span class="font-bold text-yellow-500"><?php echo number_format($rowRoom['tongtien']) ?> VNĐ</span>
                     </div>
                     <div class="flex justify-between">
                        <span>
                           <p class="inline-block">Phòng LUXURY(<?php echo $rowRoom['tenphong'] ?>)</p> (thời gian lưu trú: <?php echo $rowRoom['ngayo']; ?>)
                        </span>
                        <span class="font-bold text-yellow-500"><?php echo number_format($rowRoom['dongia']) ?> VNĐ/ngày</span>
                     </div>
                     <div class="flex justify-between">
                        <p>Thuê và phí</p><span class="font-bold text-yellow-500"><?php echo number_format($rowRoom['dongia']*1/100) ?> VNĐ</span>
                     </div>
                  </div>

                  <form method="post" class="flex justify-between">
                     <input type="hidden" name="checkin" value="<?php echo $checkin ?>">
                     <input type="hidden" name="checkout" value="<?php echo $checkout ?>">
                     <input type="hidden" name="id" value="<?php echo $rowCus['idkhachhang'] ?>">
                     <input type="hidden" name="idRoom" value="<?php echo $idRoom ?>">

                     <div class="flex items-center w-2/3 gap-x-2">
                        <input type="checkbox" name="" id="" required>
                        <p>Khi nhấn vào nút này bạn
                           công nhận mình đã đọc và
                           đồng ý với các <a href="" class="text-blue-300 italic">
                              Điều khoản & Điều kiện và
                              Chính sách quyền riêng tư
                           </a> của Angle Hotel</p>
                     </div>
                     <button name="booking" class="px-10 h-10 my-auto bg-blue-400 rounded-xl">BOOK</button>
                  </form>
               </div>

               <div class="flex flex-col shadow w-1/2 p-2 gap-y-5 bg-green-100 rounded-xl">
                  <h3 class="text-3xl font-bold text-blue-600 text-center">ANGLE HOTEL</h3>
                  <span class="italic text-gray-300 -mt-4">
                     <i class="fas fa-map-marker-alt mr-1"></i>56 Nguyen Thuat, Cam Le, Da Nang
                  </span>

                  <div class="bg-gray-100 -mx-2">
                     <div class="flex flex-col px-4">
                        <p class="font-bold">Check in:</p> <time datetime="" class="text-gray-500 italic"><?php echo gmdate("H:i d/m/Y ", strtotime($checkin));?> 
                        </time>
                     </div>
                     <div class="flex flex-col mt-3 px-4">
                        <p class="font-bold">Check out:</p> <time datetime="" class="text-gray-500 italic"><?php echo gmdate("H:i d/m/Y ", strtotime($checkout));?>
                        </time>
                     </div>
                  </div>

                  

                  <h2 class="font-bold">LYXURY ROOM</h2>
                  <div>
                     <div class="flex justify-between -mt-4">
                        <img src="../../photo/room/<?php echo $rowRoom['anh'] ?>" alt="" class="h-20 w-30 rounded-xl my-auto">
                        <div class="flex flex-col">
                           <p><?php echo $rowRoom['songuoi'] ?> người</p>
                           <p><?php echo $rowRoom['sogiuong'] ?> giường</p>
                           <p><?php echo $rowRoom['vitri'] ?></p>
                           <div class="flex items-center text-green-400">
                              <i class="fas fa-wifi mr-1"></i>
                              <p>Wifi Free</p>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="border-t-2 border-gray-600 mt-3">
                     <span>
                        <i class="fas fa-exclamation text-red-600 mr-2"></i>
                        <p class="inline-block italic">Không hoàn tiền</p>
                     </span>
                     <div>
                        <i class="fas fa-exclamation text-red-600 mr-2"></i>
                        <p class="inline-block italic">Không áp dụng đổi lịch</p>
                     </div>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </div>

   <?php
   include('../home/footer/footer.php');

   if(isset($_POST['booking'])){
      $checkin = $_POST['checkin'];
      $checkout = $_POST['checkout'];
      $id = $_POST['id'];
      $idRoom = $_POST['idRoom'];

      $queryCheck = "SELECT * FROM HOADON where hoadon.trangthai = 2 and datediff('$checkin',ngaythanhtoan) > 0 and idphong = $idRoom";
      $resultCheck = $conn->query($queryCheck);
      if($resultCheck->num_rows >= 0){
         $queryBook = "INSERT INTO `hoadon`(`idkh`, `idphong`, `ngaytao`, `ngaythanhtoan`, `trangthai`) 
                        VALUES ($id, $idRoom, '$checkin', '$checkout',2)";
         $resultBook = $conn->query($queryBook);
         if($resultBook){
            echo "<script>alert('Book room successful!');
                  window.location.href = '../page-show-room/pageRoom.php';
                  </script>";
         } 
         else echo '<script>alert("Book room failed!");</script>';
      }
      else {
         echo '<script>alert("The calendar you selected has been duplicated, please choose another one!");</script>';
      }
   }
   ?>
   <?php
   if ($id) {
      $query = "SELECT * FROM khachhang where idtaikhoan = '" . $id . "'";
      $count = $db_handle->numRows($query);
      if ($count != 0) {
         echo '<script>
      var changeCurrency = document.querySelector(".js-change-currency");
      changeCurrency.classList.remove("lg:flex");
      changeCurrency.classList.add("lg:hidden");

        var elementSigin = document.getElementById("js-login-logout")
        elementSigin.classList.remove("lg:flex");
        elementSigin.classList.add("lg:hidden");

        var elementUser = document.getElementById("js-user");
        elementUser.classList.remove("lg:hidden");
        elementUser.classList.add("lg:flex");
     </script>';
      }
   }
   ?>
   <script>
      var showUser = document.querySelector(".js-show-user");
      var proFileUser = document.querySelector(".js-profile-user");
      showUser.onclick = function() {
         if (proFileUser.style.display == "none") {
            proFileUser.style.display = "block";
         } else {
            proFileUser.style.display = "none";
         }
      }
   </script>

   <script>
      var comment = document.querySelector('.rating-star-comment');
      var notification = document.querySelector('.notification');

      comment.onclick = function() {
         notification.style.display = 'none';
      }
   </script>

<script>
      if (window.history.replaceState) {
         window.history.replaceState(null, null, window.location.href);
      }
   </script>

</body>

</html>