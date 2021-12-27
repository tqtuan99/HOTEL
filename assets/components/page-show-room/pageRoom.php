<?php
if (session_id() === "")
   session_start();

if (isset($_SESSION['idUser']))
   $id = $_SESSION['idUser'];
else $id = "";

require_once("../../../assets/components/handle/dbcontroller.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
   <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
   <link rel="stylesheet" href="../../../output.css">
   <link rel="stylesheet" href="../home/footer/footer.css">
   <link rel="stylesheet" href="../../css/main.css">
   <link rel="stylesheet" href="./pageshowroom.css">
   <link rel="stylesheet" href="../home/header/header.css">
   <link rel="stylesheet" href="../../font/fontawesome-free-5.15.4-web/css/all.min.css">
</head>

<body>
   <!-- START: Header -->
   <?php
   include('../home/header/header.php')
   ?>
   <!-- END: Header -->

   <div class="web-room">
      <div class="container">
         <div class="show-room">
            <div class="sidebar">
               <div class="search-room">
                  <div class="search__container--item ">
                     <div>
                        <label for="from">CHECK IN</label>
                     </div>
                     <input class="rounded-2xl text-lg" type="text" id="from" name="from" placeholder="mm-dd-yyyy">
                  </div>
                  <div class="search__container--item">
                     <div>
                        <label for="to">CHECK OUT</label>
                     </div>
                     <input class="rounded-2xl text-lg" type="text" id="to" name="to" placeholder="mm-dd-yyyy">
                  </div>
                  <div class="search__container--item">
                     <div>
                        <span>ADULTS</span>
                     </div>
                     <select class="w-full rounded-2xl text-lg" name="" id="">
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                     </select>
                  </div>
                  <div class="search__container--item">
                     <div>
                        <span>CHILDREN</span>
                     </div>
                     <select class="w-full rounded-2xl text-lg" name="" id="">
                        <option>0</option>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                     </select>
                  </div>
                  <div class="search__container--btn ani">
                     <a class="no-underline text-white animate-pulse" href="#">SEARCH</a>
                  </div>
               </div>
               <div class="option">
                  <div class="option-title">
                     Chọn Lọc Phổ Biến:
                  </div>
                  <div class="option-type">
                     <div class="">
                        <input type="checkbox" class="chk-option">
                        <label for="" class="lbl-option">Giáp Biển</label>
                     </div>

                     <div class="">
                        <input type="checkbox" class="chk-option">
                        <label for="" class="lbl-option">Giáp Mặt Phố</label>
                     </div>

                     <div class="">
                        <input type="checkbox" class="chk-option">
                        <label for="" class="lbl-option">5 Sao</label>
                     </div>

                     <div class="">
                        <input type="checkbox" class="chk-option">
                        <label for="" class="lbl-option">2 Giường Đôi</label>
                     </div>

                     <div class="">
                        <input type="checkbox" class="chk-option">
                        <label for="" class="lbl-option">Trên 5 người</label>
                     </div>
                  </div>
               </div>

               <div class="option">
                  <div class="option-title">
                     Chọn Lọc Theo Giá:
                  </div>
                  <div class="option-type">
                     <div class="">
                        <input type="checkbox" class="chk-option">
                        <label for="" class="lbl-option"> Dưới 1000$</label>
                     </div>

                     <div class="">
                        <input type="checkbox" class="chk-option">
                        <label for="" class="lbl-option">1000$ - 1500$</label>
                     </div>

                     <div class="">
                        <input type="checkbox" class="chk-option">
                        <label for="" class="lbl-option">1500$ - 2000$</label>
                     </div>

                     <div class="">
                        <input type="checkbox" class="chk-option">
                        <label for="" class="lbl-option">2000$ - 2500$</label>
                     </div>

                     <div class="">
                        <input type="checkbox" class="chk-option">
                        <label for="" class="lbl-option">2500$ - 3000$</label>
                     </div>

                     <div class="">
                        <input type="checkbox" class="chk-option">
                        <label for="" class="lbl-option">Trên 3000$</label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="type">
                  <div class="type-room">
                     <?php
                     $queryComment = "SELECT * FROM loaiphong";
                     $conn = $db_handle->connectDB();
                     $result = $conn->query($queryComment);
                     if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                           echo '<a class="type-name">' . $row['tenloaiphong'] . '</a>';
                        }
                     }
                     ?>
                  </div>
               </div>

               <?php
               $queryComment = "SELECT * FROM phong";
               $conn = $db_handle->connectDB();
               $result = $conn->query($queryComment);
               if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                     echo '
                           <div class="row-content">
                  <div class="image-room" style="background-image: url(../../image/destination-1.jpg);">
                  </div>
                  <div class="row-text">
                     <div class="info">
                        <div class="room-floor">
                           <p class="room"> ' . $row['tenphong'] . '</p>
                           <p class="floor"> ' . $row['tang'] . '</p>
                        </div>
                        <p class="view"> <i class="fas fa-umbrella-beach"></i>View beach beautiful</p>
                        <ul>
                           <li>
                              <i class="fas fa-bed"></i>
                              <p>
                              ' . $row['sogiuong'] . '
                              </p>
                           </li>
                           <li>
                              <i class="fas fa-bath"></i>
                              <p>
                              ' . $row['sobontam'] . '
                              </p>
                           </li>
                           <li>
                              <i class="fas fa-street-view"></i>
                              <p>
                              ' . $row['songuoi'] . '
                              </p>
                           </li>
                        </ul>
                        <div class="text-sp">
                           <p>
                           ' . $row['mota'] . '
                           </p>
                        </div>
                        <div class="price">
                        ' . $row['dongia'] . '
                        </div>
                     </div>
                     <div class="eval">
                        <div>
                           <p>Lấy Ra Sao</p>
                           <p>Tính Trung binh điểm</p>
                        </div>
                        <a href="">BOOK</a>
                     </div>
                  </div>
               </div>                          
                           ';
                  }
               }
               ?>
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
      var showMenu = document.querySelector(".js-menu");
      var itemsMenu = document.querySelector(".js-items-menu");
      showMenu.onclick = function() {
         if (itemsMenu.style.display == "none") {
            itemsMenu.style.display = "block";
         } else {
            itemsMenu.style.display = "none";
         }
      }
   </script>
</body>
<script src="./pageRoom.js"></script>

</html>