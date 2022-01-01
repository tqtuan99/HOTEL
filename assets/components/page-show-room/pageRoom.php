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
            <form class="sidebar"  method="GET" action="#">
               <div class="search-room">
                  <div class="search__container--item ">
                     <div>
                        <label for="from">CHECK IN</label>
                     </div>
                     <input class="text-center rounded-2xl text-lg" type="text" id="from" name="checkin" placeholder="mm-dd-yyyy">
                  </div>
                  <div class="search__container--item">
                     <div>
                        <label for="to">CHECK OUT</label>
                     </div>
                     <input class="text-center rounded-2xl text-lg" type="text" id="to" name="checkout" placeholder="mm-dd-yyyy" >
                  </div>
                  <div class="search__container--item">
                     <div>
                        <span>ADULTS</span>
                     </div>
                     <input type="number" class="text-center w-full rounded-2xl text-lg" min="1" max="20" name="adults" id="" value="<?php echo isset($_GET['adults'])?$_GET['adults']:""; ?>"></input>
                  </div>
                  <div class="search__container--item">
                     <div>
                        <span>CHILDREN</span>
                     </div>
                     <input type="number" class="text-center w-full rounded-2xl text-lg" min="0" max="20" name="children" id="" value="<?php echo isset($_GET['children'])?$_GET['children']:""; ?>"> </input>
                  </div>
                  <div class="search__container--btn ani">
                     <button name="search" class="no-underline text-white animate-pulse">SEARCH</button>
                  </div>
               </div>
               <div class="option">
                  <div class="option-title">
                     Chọn Lọc Phổ Biến:
                  </div>
                  <div class="option-type">
                     <div class="">
                        <input name="vitri1" type="checkbox" class="chk-option" <?php if(isset($_GET['vitri1'])) echo 'checked'?>>
                        <label for="" class="lbl-option">Giáp Biển</label>
                     </div>

                     <div class="">
                        <input name="vitri2" type="checkbox" class="chk-option" <?php if(isset($_GET['vitri2'])) echo 'checked'?>>
                        <label for="" class="lbl-option">Giáp Mặt Phố</label>
                     </div>

                     <div class="">
                        <input name="sao" type="checkbox" class="chk-option" <?php if(isset($_GET['sao'])) echo 'checked'?>>
                        <label for="" class="lbl-option">5 Sao</label>
                     </div>

                     <div class="">
                        <input name="giuongdoi" type="checkbox" class="chk-option" <?php if(isset($_GET['giuongdoi'])) echo 'checked'?>>
                        <label for="" class="lbl-option">Giường Đôi</label>
                     </div>

                     <div class="">
                        <input name="nguoi" type="checkbox" class="chk-option" <?php if(isset($_GET['nguoi'])) echo 'checked'?>>
                        <label for="" class="lbl-option">Trên 5 người</label>
                     </div>
                     <div class="search__container--btn ani">
                        <button name="search1" class="no-underline text-white animate-pulse">SEARCH</button>
                     </div>
                  </div>
               </div>

               <div class="option">
                  <div class="option-title">
                     Chọn Lọc Theo Giá:
                  </div>
                  <div class="option-type">
                  <?php
                  $checked = "";
                   if(isset($_GET['price'])) 
                     $checked = $_GET['price'];
                   ?>
                      <div class="">
                        <input type="radio" name="price" class="chk-option" value="0" <?php if($checked==0) echo 'checked'?>>
                        <label for="" class="lbl-option"> All</label>
                     </div>
                     <div class="">
                        <input type="radio" name="price" class="chk-option" value="1" <?php if($checked==1) echo 'checked'?>>
                        <label for="" class="lbl-option"> Dưới 1000$</label>
                     </div>

                     <div class="">
                        <input type="radio" name="price" class="chk-option" <?php if($checked==2) echo 'checked'?> value="2">
                        <label for="" class="lbl-option">1000$ - 1500$</label>
                     </div>

                     <div class="">
                        <input type="radio" name="price" class="chk-option" <?php if($checked==3) echo 'checked'?> value="3">
                        <label for="" class="lbl-option">1500$ - 2000$</label>
                     </div>

                     <div class="">
                        <input type="radio" name="price" class="chk-option" <?php if($checked==4) echo 'checked'?> value="4">
                        <label for="" class="lbl-option">2000$ - 2500$</label>
                     </div>

                     <div class="">
                        <input type="radio" name="price" class="chk-option" <?php if($checked==5) echo 'checked'?> value="5">
                        <label for="" class="lbl-option">2500$ - 3000$</label>
                     </div>

                     <div class="">
                        <input type="radio" name="price" class="chk-option" <?php if($checked==6) echo 'checked'?> value="6" >
                        <label for="" class="lbl-option">Trên 3000$</label>
                     </div>

                     <div class="search__container--btn ani">
                        <button name="search2" class="no-underline text-white animate-pulse">SEARCH</button>
                     </div>
                     <br>

                  </div>
               </div>
            </form>
            <div class="row">
               <div class="type">
                  <form class="type-room" method="GET" action="#">
                     <?php
                     include('./getDBTypeRoom.php');
                     ?>
                  </form>
               </div>

               <?php
               include('./getDBRoom.php');
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