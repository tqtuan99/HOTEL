<?php
if (session_id() === "")
   session_start();

if (isset($_SESSION['idUser']))
   $id = $_SESSION['idUser'];
else $id = "";

$idRoom = '';
if (isset($_GET['idRoom']))
   $idRoom = $_GET['idRoom'];

require_once("../handle/dbcontroller.php");
require_once("../handle/configDB.php");
$db_handle = new DBController();
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
                           <input type="text" name="" id="" class="p-2 bg-gray-100 w-full rounded-xl" placeholder="Tran Van A">
                        </div>
                        <h4 class="text-gray-300 text-sm italic">*Nhập tên như trên CMND/ hộ chiếu(không dấu)</h4>
                     </div>
                     <div class="flex gap-x-5">
                        <div class="w-1/2">
                           <h3>Số điện thoại</h3>
                           <input type="tel" class="p-2 bg-gray-100 w-full rounded-xl" placeholder="123456789">
                        </div>
                        <div class="w-1/2">
                           <h3>Email</h3>
                           <input type="email" class="p-2 bg-gray-100 w-full rounded-xl" placeholder="user@gmail.com">
                        </div>
                     </div>
                     <form class="flex justify-between px-8 py-3">
                        <div>
                           <input type="radio" name="" id="">
                           <label for="">Tôi là khách lưu trú</label>
                        </div>
                        <div>
                           <input type="radio" name="" id="">
                           <label for="">Tôi đặt cho người khác</label>
                        </div>
                     </form>
                  </div>

                  <h3 class="font-bold text-xl">Chính sách huỷ phòng</h3>
                  <div class="flex flex-col gap-y-3 shadow-xl flex-1 p-4 -mt-10">
                     <p>Chính sách huỷ đặt phòng</p>
                     <div>
                        <i class="fas fa-exclamation text-red-600 mr-2"></i>
                        <p class="inline-block">Đặt phòng này không được hoàn tiền</p>
                     </div>
                  </div>

                  <h3 class="font-bold text-xl">Chi tiết giá</h3>
                  <div class="flex flex-col gap-y-3 shadow-xl flex-1 p-4 -mt-10">
                     <div class="flex justify-between">
                        <p>Tổng tiền</p> <span class="font-bold text-yellow-500">40$</span>
                     </div>
                     <div class="flex justify-between">
                        <span>
                           <p class="inline-block">Phòng LUXURY(lấy tên phòng)</p> (1 đêm)
                        </span>
                        <span class="font-bold text-yellow-500">40$</span>
                     </div>
                     <div class="flex justify-between">
                        <p>Thuê và phí</p><span class="font-bold text-yellow-500">2$</span>
                     </div>
                  </div>

                  <div class="flex justify-between">
                     <div class="flex items-center w-2/3 gap-x-2">
                        <input type="checkbox" name="" id="">
                        <p>Khi nhấn vào nút này bạn
                           công nhận mình đã đọc và
                           đồng ý với các <a href="" class="text-blue-300 italic">
                              Điều khoản & Điều kiện và
                              Chính sách quyền riêng tư
                           </a> của Angle Hotel</p>
                     </div>
                     <button class="px-10 h-10 my-auto bg-blue-400 rounded-xl">BOOK</button>
                  </div>
               </div>

               <div class="flex flex-col shadow w-1/2 p-2 gap-y-5 bg-green-100 rounded-xl">
                  <h3 class="text-3xl font-bold text-blue-600 text-center">ANGLE HOTEL</h3>
                  <span class="italic text-gray-300 -mt-4">
                     <i class="fas fa-map-marker-alt mr-1"></i>56 Nguyen Thuat, Cam Le, Da Nang
                  </span>

                  <div class="bg-gray-100 -mx-2">
                     <div class="flex flex-col px-4">
                        <p class="font-bold">Check in:</p> <time datetime="" class="text-gray-500 italic">Fri, 7 Jan
                           2022, Từ 14:00
                        </time>
                     </div>
                     <div class="flex flex-col mt-3 px-4">
                        <p class="font-bold">Check out:</p> <time datetime="" class="text-gray-500 italic">Fri, 8 Jan
                           2022, Từ 14:00
                        </time>
                     </div>
                  </div>

                  <h2 class="font-bold">LYXURY ROOM</h2>
                  <div>
                     <div class="flex justify-between -mt-4">
                        <img src="../../image/slider-room/room-1.jpg" alt="" class="h-20 w-30 rounded-xl my-auto">
                        <div class="flex flex-col">
                           <p>4 người</p>
                           <p>Loại giường</p>
                           <p>View</p>
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

</body>

</html>