<?php
if (session_id() === "")
   session_start();

if (isset($_SESSION['idUser']))
   $id = $_SESSION['idUser'];
else $id = "";

require_once("./assets/components/handle/dbcontroller.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <link rel="stylesheet" href="./assets/font/fontawesome-free-5.15.4-web/css/all.min.css">
   <link rel="stylesheet" href="./output.css">

   <link rel="stylesheet" href="./assets/components/slider/slider.css">
   <link rel="stylesheet" href="./style.css">

   <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="./assets/components/home/calendar/calendar.css">

   <link rel="stylesheet" href="./assets/components/home/header/header.css">


   <link rel="stylesheet" href="./assets/components/image-scrolling/imgScrolling.css">

   <link rel="stylesheet" href="./assets/components/comment/comment.css">

   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
   <link rel="stylesheet" href="./assets/css/main.css">
   <link rel="stylesheet" href="./assets/components/home/footer/footer.css">
   <title>KLT Hotel</title>
</head>

<body>
   <!-- START: Header -->
   <?php
   include ('./assets/components/home/header/header.php')
   ?>
   <!-- END: Header -->

   <div>
      <section data-aos="fade-down">
         <img src="./assets/image/bg-main.webp" id="bg" alt="bg">
         <img src="./assets/image/bg-color.png" id="moon" alt="the moon">
         <img src="./assets/image/bg-color.png" id="mountain" alt="mountain">
         <img src="./assets/image/parallax-scrolling/road.png" id="road" alt="road">
         <h2 id="text">Angel Hotel</h2>
      </section>
      <script type="text/javascript">
         var bg = document.getElementById("bg");
         var moon = document.getElementById("moon");
         var mountain = document.getElementById("mountain");
         var road = document.getElementById("road");
         var text = document.getElementById("text");

         window.addEventListener('scroll', function() {
            var value = window.scrollY;
            bg.style.top = value * 0.4 + 'px';
            moon.style.left = -value * 0.4 + 'px';
            mountain.style.top = -value * 0.4 + 'px';
            road.style.bottom = value * 0.25 + 'px';
            text.style.top = value * 0.4 + 'px';
         })
      </script>
   </div>

   <!-- START: Calender Book-->
   <div class="margin-auto search search__container" data-aos="fade-up">
      <div class="flex flex-wrap justify-center items-center h-full">
         <div class="search__container--item calendar-check-in" data-aos="fade-right">
            <div>
               <label for="from">CHECK IN</label>
            </div>
            <input class="rounded-2xl text-lg text-center" type="text" id="from" name="from" placeholder="MM-DD-YYYY">
         </div>
         <div class="search__container--item calendar-check-out" data-aos="fade-right">
            <div>
               <label for="to">CHECK OUT</label>
            </div>
            <input class="rounded-2xl text-lg text-center" type="text" id="to" name="to" placeholder="MM-DD-YYYY">
         </div>
         <div class="search__container--item calendar-adults" data-aos="fade-left">
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
         <div class="search__container--item calendar-children" data-aos="fade-left">
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
         <div class="search__container--btn ani calendar-search" data-aos="fade-left">
            <a class="no-underline text-white animate-pulse" href="#">SEARCH</a>
            <span></span>
            <span></span>
            <span></span>
         </div>
      </div>
   </div>
   <!-- END: Calender Book-->


   <!-- Start: Information -->
   <div class="bg-image">
      <div class="margin-auto info">
         <div class="special ">
            <div class="activities" data-aos="fade-right">
               <div>
                  <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
                  <lord-icon src="https://cdn.lordicon.com/vlupvdhl.json" trigger="loop-on-hover" colors="primary:#121331,secondary:#08a88a" style="width:100px;height:100px">
                  </lord-icon>
               </div>
               <h3>LUXURY</h3>
               <p>A small river named Duden flows by their place and supplies it with the necessary</p>
            </div>

            <div class="travel" data-aos="fade-left">
               <div>
                  <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
                  <lord-icon src="https://cdn.lordicon.com/qhviklyi.json" trigger="loop-on-hover" colors="primary:#121331,secondary:#08a88a" style="width:100px;height:100px">
                  </lord-icon>
               </div>
               <h3>GREAT SERVICES</h3>
               <p>A small river named Duden flows by their place and supplies it with the necessary</p>
            </div>

            <div class="private" data-aos="fade-right">
               <div>
                  <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
                  <lord-icon src="https://cdn.lordicon.com/tfosrbcn.json" trigger="loop-on-hover" colors="primary:#121331,secondary:#08a88a" style="width:100px;height:100px">
                  </lord-icon>
               </div>
               <h3>ROOFTOP POOL</h3>
               <p>A small river named Duden flows by their place and supplies it with the necessary</p>
            </div>

            <div class="location" data-aos="fade-left">
               <div>
                  <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
                  <lord-icon src="https://cdn.lordicon.com/jvucoldz.json" trigger="loop-on-hover" colors="primary:#121331,secondary:#08a88a" style="width:100px;height:100px">
                  </lord-icon>
               </div>
               <h3>ONLINE RESERVATION</h3>
               <p>A small river named Duden flows by their place and supplies it with the necessary</p>
            </div>
         </div>

         <div class="detail" data-aos="fade-up">
            <h1>Overview of angle hotel</h1>
            <p>Angel Hotel is located in the west of Da Nang. Angle Hotel is a wonderful destination and gives you the most enjoyable experience when you come to us. Coming to Hotel Angle, you will be immersed in fresh nature, participate in recreational activities, relax to take away the sadness and chaos of life.</p>
            <p>Angle Hotel with fully equipped rooms and villas, the interior space is decorated in a luxurious style blending modern Vietnamese and Western traditions. We have a well-trained, professional and professional staff, dedicated service.</p>
            <p>
               <a href=""></a>
            </p>
         </div>
      </div>
   </div>
   <!-- End: Information -->

   <!-- This example requires Tailwind CSS v2.0+ -->
   <!--START: Slider -->
   <div id="slider">
      <div class="text-center mt-6 mx-9">
         <h2 class="font-bold text-4xl text-gray-800 mb-3" data-aos="fade-right">We Have The Best Rooms
         </h2>
         <p class="italic text-2xl text-gray-400 mb-6" data-aos="fade-left">We have the most luxurious rooms with stunning views that make every visitor delight and don't want to leave.
         </p>
      </div>
      <div class="image-slider" data-aos="fade-up">

         <!-- show room in DB -->
         <?php
         $queryRoom = "SELECT * FROM PHONG";
         $conn = $db_handle->connectDB();
         $result = $conn->query($queryRoom);
         if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
               if ($row['tenphong'] == 'vip 1' || $row['tenphong'] == 'Vip 1' || $row['tenphong'] == 'VIP 1')
                  echo '
                  <div class="image-item">
                  <div class="image">
                     <img src="./assets/image/slider-room/room-1.jpg" alt="" />
                     <div class="item__content">
                        <div class="item_center">
                           <h1>' . $row['tenphong'] . '</h1>
                           <div class="item_price">' . $row['dongia'] . '</div>
                           <div class="item_rating">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                           </div>
                           <div class="tour__item--btn">
                              <div class="tour__btn__bgc"></div>
                              <a href="#">Book now
                                 <span></span>
                                 <span></span>
                                 <span></span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
                  ';
            }
         }
         ?>
         <div class="image-item">
            <div class="image">
               <img src="./assets/image/slider-room/room-9.jpg" alt="" />
               <div class="item__content">
                  <div class="item_center">
                     <h1>VIP 009</h1>
                     <div class="item_price">From $1450</div>
                     <div class="item_rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                     </div>
                     <div class="tour__item--btn">
                        <div class="tour__btn__bgc"></div>
                        <a href="#">Book now
                           <span></span>
                           <span></span>
                           <span></span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--END: Slider -->

   <!-- Start: ShowRoomRow -->
   <div class="best-room">
      <div class="container">
         <div class="text-center mt-6 mx-9">
            <h2 class="font-bold text-4xl text-gray-800 mb-3" data-aos="fade-right">
               The Premium Rooms Satisfy Every Traveler
            </h2>
            <p class="italic text-2xl text-gray-400 mb-6" data-aos="fade-left">With a unique design along with beautiful sea views, the rooms of the Angel hotel can satisfy the most discerning travelers.
            </p>
         </div>
         <div class="row">

            <!-- show room in DB -->
            <?php
            $queryRoom = "SELECT * FROM PHONG";
            $conn = $db_handle->connectDB();
            $result = $conn->query($queryRoom);
            if ($result->num_rows > 0) {
               while ($row = $result->fetch_assoc()) {
                  echo '
                     <div class="row-content">
                     <div class="image-room" data-aos="fade-right" style="background-image: url(./assets/image/destination-1.jpg);">
                     </div>
                     <div class="row-text" data-aos="fade-right">
                        <span class="price">' . $row['dongia'] . '</span>
                        <p class="room"> ' . $row['tenphong'] . '</p>
                        <p class="view"> <i class="fas fa-umbrella-beach"></i>' . $row['mota'] . '</p>
                        <ul>
                           <li>
                              <span class="fas fa-bath"></span>' . $row['sobontam'] . '
                           </li>
                           <li>
                              <span class="fas fa-bed"></span>' . $row['sogiuong'] . '
                           </li>
                           <li>
                              <span class="fas fa-street-view"></span>' . $row['songuoi'] . '
                           </li>
                        </ul>
                        <a href="">BOOK</a>
                     </div>
                  </div>
                     ';
               }
            }
            ?>
            <div class="row-content">
               <div class="image-room" data-aos="fade-up" style="background-image: url(./assets/image/destination-1.jpg);">
               </div>
               <div class="row-text" data-aos="fade-up">
                  <span class="price">1000$</span>
                  <p class="room"> VIP 1</p>
                  <p class="view"> <i class="fas fa-umbrella-beach"></i>View beach beautiful</p>
                  <ul>
                     <li>
                        <span class="fas fa-bath"></span>2
                     </li>
                     <li>
                        <span class="fas fa-bed"></span>2
                     </li>
                     <li>
                        <span class="fas fa-street-view"></span>5
                     </li>
                  </ul>
                  <a href="">BOOK</a>
               </div>
            </div>

         </div>
      </div>
   </div>
   <!-- End: ShowRoomRow -->

   <!-- Start: Slider Comment -->
   <div class="main-comment" data-aos="fade-right">
      <div class="bg-comment" data-aos="fade-up">
         <div class="text-center mt-6">
            <h2 class="font-bold text-4xl text-gray-800 mb-3" data-aos="fade-right">
               What Other Visitors Experienced
            </h2>
            <p class="italic text-2xl text-gray-400 mb-6" data-aos="fade-left">Angel Hotel! The #1 choice of every traveler.
            </p>
         </div>
         <div class="slider-comment" data-aos="fade-left">

            <?php
            $queryComment = "SELECT * FROM phanhoi";
            $conn = $db_handle->connectDB();
            $result = $conn->query($queryComment);
            if ($result->num_rows > 0) {
               while ($row = $result->fetch_assoc()) {
                  if ($row['sosao'] == '5' || $row['sosao'] == '4')
                     echo '
                  
                  <div class="comment-row">
                  <img src="./assets/image/Model.png" class="avatar" alt="">
                  <div class="comment-text">
                     <b class="title">“' . $row['tieude'] . '”</b>
                     <p class="sub-title">“' . $row['noidung'] . '”</p>
                     <p class="name"> -- ' . $row['ten'] . ' -- </p>
                  </div>
               </div>
                  ';
               }
            }
            ?>
            <div class="comment-row">
               <img src="./assets/image/Model.png" class="avatar" alt="">
               <div class="comment-text">
                  <b class="title">“One thing very special about being Fresher in KMS is the challenging Fresher
                     Bootcamp.”</b>
                  <p class="sub-title">“Here, I learned something profound, not only the works. On Bootcamp Day, I
                     recalled
                     that I got a task to help aunties sell lottery, which she was first trying to sell us. What a hard
                     and
                     meaningful feeling to describe when we gave back to her the money from selling tickets.”</p>
                  <p class="name"> -- Q. Tuan -- </p>
               </div>
            </div>
            <div class="comment-row">
               <img src="./assets/image/Model.png" class="avatar" alt="">
               <div class="comment-text">
                  <b class="title">“One thing very special about being Fresher in KMS is the challenging Fresher
                     Bootcamp.”</b>
                  <p class="sub-title">“Here, I learned something profound, not only the works. On Bootcamp Day, I
                     recalled
                     that I got a task to help aunties sell lottery, which she was first trying to sell us. What a hard
                     and
                     meaningful feeling to describe when we gave back to her the money from selling tickets.”</p>
                  <p class="name"> -- Q. Tuan -- </p>
               </div>
            </div>

         </div>
      </div>
   </div>
   <!-- End: Slider Comment -->

   <!-- Map -->
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5870.662980119421!2d108.1783270358089!3d16.053123188931465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219119525d8b5%3A0x8ebdaf5cd4660271!2zNTYtNTggTmd1eeG7hW4gVGh14bqtdCwgSG_DoCBBbiwgQ-G6qW0gTOG7hywgxJDDoCBO4bq1bmcgNTUwMDAwLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1640067333708!5m2!1sen!2s" width="100%" height="500" style="border:0; max-width: 1200px; margin:auto; border: 2px solid aqua;" allowfullscreen="" loading="lazy" data-aos="fade-up"></iframe>
   <!-- End: Map -->

   <!-- START: Footer -->
   <?php
   include('./assets/components/home/footer/footer.php');
   ?>
   <!-- END: Footer -->

   </div>
   <a id="to-top" class="hidden md:block" href="#">
      <i class="fas fa-angle-double-up animate-pulse"></i>
   </a>
</body>

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
<script>
   var e = document.getElementById("to-top");
   window.onscroll = function() {
         if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            e.style.display = "block";
         } else {
            e.style.display = "none";
         }
      },
      e.click(function() {
         return $("html, body").animate({
            scrollTop: 0
         }, 'slow')
      })
</script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
   AOS.init({
      offset: 200,
      duration: 1000
   });
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="./assets/components/comment/comment.js"></script>
<script src="./assets/components/slider/slider.js"></script>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="./assets/components/home/calendar/calendar.js"></script>

</html>