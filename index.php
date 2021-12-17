<?php
if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $m = $_GET['m'];
   $s = $_GET['s'];
   require_once("./assets/components/handle/dbcontroller.php");
   $db_handle = new DBController();
}
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
   <title>Document</title>
</head>

<body>
   <!-- START: Header -->
   <nav class="header fixed top-0 right-0 bg-gray-800 left-0 z-50" data-aos="fade-down">
      <div class="w-full mx-auto px-2 sm:px-6 lg:px-8">
         <div class="relative flex items-center justify-between h-16">
            <div class="js-menu absolute inset-y-0 left-0 flex items-center sm:hidden" data-aos="fade-right">
               <!-- Mobile menu button-->
               <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white text-4xl" aria-controls="mobile-menu" aria-expanded="false">
                  <i class="fas fa-bars"></i>
               </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start" data-aos="fade-right">
               <div class="flex-shrink-0 flex items-start mt-8 -ml-5">
                  <div class="block md:hidden h-20 w-auto">
                     <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
                     <lord-icon src="https://cdn.lordicon.com/hpxruznz.json" trigger="loop" colors="primary:#16c72e,secondary:#08a88a" scale="31" axis-y="17" style="width:100px;height:100px">
                     </lord-icon>
                  </div>
                  <div class="hidden lg:block h-8 w-auto">
                     <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
                     <lord-icon src="https://cdn.lordicon.com/hpxruznz.json" trigger="loop" colors="primary:#16c72e,secondary:#08a88a" scale="31" axis-y="17" style="width:100px;height:100px">
                     </lord-icon>
                  </div>
               </div>

               <div class="flex-1 hidden sm:block ">
                  <div class="nav lg:m-5 flex justify-start space-x-4 text-center list-none">
                     <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                     <li class="relative">
                        <a href="#" class="text-white hover:text-pink-300 hover:bg-gray-600 px-3 py-2 rounded-md ">
                           Home
                        </a>
                        <ul class="subnav">

                        </ul>
                     </li>

                     <li class="relative">
                        <a href="#" class="text-white hover:text-pink-300 hover:bg-gray-600 px-3 py-2 rounded-md ">
                           About Us
                        </a>
                        <ul class="subnav ">
                           <div class="subnav-item flex">
                              <li><a href="#">example</a></li>
                              <li><a href="#">Example 2</a></li>
                              <li><a href="#">Example 3</a></li>
                              <li><a href="#">Example 4</a></li>
                           </div>
                        </ul>
                     </li>

                     <li class="relative">
                        <a href="#" class="text-white hover:text-pink-300 hover:bg-gray-600 px-3 py-2 rounded-md ">
                           Offers
                        </a>
                        <ul class="subnav">
                           <div class="subnav-item flex">
                              <li><a href="#">example</a></li>
                              <li><a href="#">Example 2</a></li>
                              <li><a href="#">Example 3</a></li>
                              <li><a href="#">Example 4</a></li>
                              <li><a href="#">Example 5</a></li>
                              <li><a href="#">Example 6</a></li>
                              <li><a href="#">Example 7</a></li>
                           </div>
                        </ul>
                     </li>

                     <li class="relative">
                        <a href="#" class="text-white hover:text-pink-300 hover:bg-gray-600 px-3 py-2 rounded-md ">
                           News
                        </a>
                        <ul class="subnav">
                           <div class="subnav-item flex">
                              <li><a href="#">example</a></li>
                              <li><a href="#">Example 2</a></li>
                              <li><a href="#">Example 3</a></li>
                           </div>
                        </ul>
                     </li>
                  </div>
               </div>
            </div>

            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0" data-aos="fade-left">
               <div class="ml-auto flex items-center">
                  <div id="js-login-logout" class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                     <a href="../../../../../HOTEL/assets/components/login/login.php" class="text-white hover:text-pink-300">Sign in</a>
                     <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
                     <a href="../../../../../hotel/assets/components/register/register.php" class="text-white hover:text-pink-300">Create account</a>
                  </div>

                  <div class="js-change-currency hidden lg:ml-8 lg:flex">
                     <a href="#" class="text-white hover:text-pink-300 flex items-center">
                        <img src="https://tailwindui.com/img/flags/flag-canada.svg" alt="" class="w-5 h-auto block flex-shrink-0">
                        <span class="ml-3 block text-sm font-medium">
                           CAD
                        </span>
                        <span class="sr-only">, change currency</span>
                     </a>
                  </div>

                  <!-- Search -->
                  <div class="flex lg:ml-6 md:flex hidden">
                     <a href="#" class="pl-2 text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Search</span>
                        <!-- Heroicon name: outline/search -->
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                     </a>
                  </div>



                  <!-- Profile dropdown -->
                  <div class="js-show-user ml-3 relative">
                     <div id="js-user" class="lg:hidden flex">
                        <div class="text-white px-3 py-2 rounded-md ">
                           <?php
                           if (md5($id) == $m && sha1($id) == $s) {
                              $query = "SELECT * FROM khachhang where idtaikhoan = '" .$id. "'";
                              $conn = $db_handle->connectDB();
                              $result = $conn->query($query);
                              if ($result->num_rows > 0) {
                                 // output data of each row
                                 $row = $result->fetch_assoc();
                                 echo $row["ten"];
                              }
                           }
                           ?>
                        </div>
                        <button type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                           <span class="sr-only">Open user menu</span>
                           <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </button>
                     </div>

                     <div class="js-profile-user hidden origin-top-right absolute right-4 mt-3 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        <!-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Sing in</a>
                     <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Create account</a>
                        -->
                        <a href="#" class="inline-block px-4 py-2 text-sm text-gray-700">
                           <img src="https://tailwindui.com/img/flags/flag-canada.svg" alt="" class="w-5 h-auto inline-block flex-shrink-0">
                           CAD
                           <span class="sr-only">, change currency</span>
                        </a>
                        <a href="#" class="hover:text-pink-300 block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Personal Information</a>
                        <a href="./index.php" class="hover:text-pink-300 block px-4 py-2 text-sm text-gray-700" onclick="return confirm('Are you sure?')" role="menuitem" tabindex="-1" id="user-menu-item-1">Log Out</a>

                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!-- Mobile menu, show/hide based on menu state. -->
         <div class="js-items-menu hidden" id="mobile-menu">
            <div class="nav list-none px-2 pb-3 block sm:hidden">
               <li class="relative">
                  <a href="#" class="text-white hover:text-pink-300 hover:bg-gray-600 px-3 py-2 rounded-md ">
                     Home
                  </a>
                  <ul class="subnav">

                  </ul>
               </li>

               <li class="relative">
                  <a href="#" class="text-white hover:text-pink-300 hover:bg-gray-600 px-3 py-2 rounded-md ">
                     About Us
                  </a>
                  <ul class="subnav ">
                     <div class="subnav-item flex">
                        <li><a href="#">example</a></li>
                        <li><a href="#">Example 2</a></li>
                        <li><a href="#">Example 3</a></li>
                        <li><a href="#">Example 4</a></li>
                     </div>
                  </ul>
               </li>

               <li class="relative">
                  <a href="#" class="text-white hover:text-pink-300 hover:bg-gray-600 px-3 py-2 rounded-md ">
                     Offers
                  </a>
                  <ul class="subnav">
                     <div class="subnav-item flex">
                        <li><a href="#">example</a></li>
                        <li><a href="#">Example 2</a></li>
                        <li><a href="#">Example 3</a></li>
                        <li><a href="#">Example 4</a></li>
                        <li><a href="#">Example 5</a></li>
                        <li><a href="#">Example 6</a></li>
                        <li><a href="#">Example 7</a></li>
                     </div>
                  </ul>
               </li>

               <li class="relative">
                  <a href="#" class="text-white hover:text-pink-300 hover:bg-gray-600 px-3 py-2 rounded-md ">
                     News
                  </a>
                  <ul class="subnav">
                     <div class="subnav-item flex">
                        <li><a href="#">example</a></li>
                        <li><a href="#">Example 2</a></li>
                        <li><a href="#">Example 3</a></li>
                     </div>
                  </ul>
               </li>
            </div>
         </div>
   </nav>
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

   <!-- Start: Information -->
   <div class="bg-image">
      <div class="info">
         <div class="special ">
            <div class="activities" data-aos="fade-right">
               <div>
                  <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
                  <lord-icon src="https://cdn.lordicon.com/jvucoldz.json" trigger="loop-on-hover" colors="primary:#121331,secondary:#08a88a" style="width:100px;height:100px">
                  </lord-icon>
               </div>
               <h3>Activities 1</h3>
               <p>A small river named Duden flows by their place and supplies it with the necessary</p>
            </div>

            <div class="travel" data-aos="fade-left">
               <div>
                  <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
                  <lord-icon src="https://cdn.lordicon.com/jvucoldz.json" trigger="loop-on-hover" colors="primary:#121331,secondary:#08a88a" style="width:100px;height:100px">
                  </lord-icon>
               </div>
               <h3>Activities 2</h3>
               <p>A small river named Duden flows by their place and supplies it with the necessary</p>
            </div>

            <div class="private" data-aos="fade-right">
               <div>
                  <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
                  <lord-icon src="https://cdn.lordicon.com/jvucoldz.json" trigger="loop-on-hover" colors="primary:#121331,secondary:#08a88a" style="width:100px;height:100px">
                  </lord-icon>
               </div>
               <h3>Activities 3</h3>
               <p>A small river named Duden flows by their place and supplies it with the necessary</p>
            </div>

            <div class="location" data-aos="fade-left">
               <div>
                  <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
                  <lord-icon src="https://cdn.lordicon.com/jvucoldz.json" trigger="loop-on-hover" colors="primary:#121331,secondary:#08a88a" style="width:100px;height:100px">
                  </lord-icon>
               </div>
               <h3>Activities 4</h3>
               <p>A small river named Duden flows by their place and supplies it with the necessary</p>
            </div>
         </div>

         <div class="detail" data-aos="fade-up">
            <h1>It's time to start your adventure</h1>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a
               paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
               blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language
               ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
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
      <div class="text-center mt-6 ">
         <h2 class="font-bold text-4xl text-gray-800 mb-3" data-aos="fade-right">We have the best rooms
         </h2>
         <p class="italic text-2xl text-gray-400 mb-6" data-aos="fade-left">We have the most luxurious rooms with stunning views that make every visitor delight and don't want to leave.
         </p>
      </div>
      <div class="image-slider" data-aos="fade-up">
         <div class="image-item">
            <div class="image">
               <img src="./assets/image/slider-room/room-1.jpg" alt="" />
               <div class="item__content">
                  <div class="item_center">
                     <h1>VIP 001</h1>
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

         <div class="image-item">
            <div class="image">
               <img src="./assets/image/slider-room/room-2.jpg" alt="" />
               <div class="item__content">
                  <div class="item_center">
                     <h1>VIP 002</h1>
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

         <div class="image-item">
            <div class="image">
               <img src="./assets/image/slider-room/room-3.jpg" alt="" />
               <div class="item__content">
                  <div class="item_center">
                     <h1>VIP 003</h1>
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

         <div class="image-item">
            <div class="image">
               <img src="./assets/image/slider-room/room-4.jpg" alt="" />
               <div class="item__content">
                  <div class="item_center">
                     <h1>VIP 004</h1>
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

         <div class="image-item">
            <div class="image">
               <img src="./assets/image/slider-room/room-5.jpg" alt="" />
               <div class="item__content">
                  <div class="item_center">
                     <h1>VIP 005</h1>
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

         <div class="image-item">
            <div class="image">
               <img src="./assets/image/slider-room/room-6.jpg" alt="" />
               <div class="item__content">
                  <div class="item_center">
                     <h1>VIP 006</h1>
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

         <div class="image-item">
            <div class="image">
               <img src="./assets/image/slider-room/room-7.jpg" alt="" />
               <div class="item__content">
                  <div class="item_center">
                     <h1>VIP 007</h1>
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

         <div class="image-item">
            <div class="image">
               <img src="./assets/image/slider-room/room-8.jpg" alt="" />
               <div class="item__content">
                  <div class="item_center">
                     <h1>VIP 008</h1>
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


   <!-- START: Calender Book-->
   <div class="search search__container" data-aos="fade-up">
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

   <!-- Start: Slider Comment -->
   <div class="main-comment" data-aos="fade-right">
      <div class="bg-comment" data-aos="fade-up">
         <div class="slider-comment" data-aos="fade-left">
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
               <img class="avatar" src="./assets/image/Model.png" alt="">
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
               <img class="avatar" src="./assets/image/Model.png" alt="">
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
               <img class="avatar" src="./assets/image/Model.png" alt="">
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

   <!-- START: Footer -->
   <div class="footer">
      <div class="w-full header-curve bg-main-footer" data-aos="fade-up">
         <div class="flex flex-wrap text-center text-white">
            <div class="w-full md:w-1/3 p-5 border-r-2 border-opacity-30" data-aos="fade-right">
               <div class="animate-bounce my-6 text-xl font-semibold">ABOUT US</div>
               <p class="p-3 text-gray-200 text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean
                  ac est massa.
                  Donec eget elementum sapien, tincidunt tempor nunc. Cras sodales id ipsum at convallis.</p>
               <p class="p-3 text-gray-200 text-justify">Morbi tristique massa nec massa auctor, at scelerisque felis
                  consectetur. Morbi
                  tempus et odio sit amet feugiat. Maecenas dignissim a turpis in molestie. Fusce tincidunt vestibulum
                  iaculis.</p>
            </div>


            <div class="w-full md:w-1/3 p-5 border-r-2 border-opacity-30" data-aos="fade-up">
               <div class="animate-bounce my-6 text-xl font-semibold">CONTACT US</div>
               <p class="p-3 text-gray-200">
                  56 Nguyen Thuat Street <br>
                  Hoa An, Cam Le, Da Nang<br>
                  Viet Nam <br>
                  <strong>Phone:</strong> <a class="text-blue-200 hover:underline hover:text-blue-400" href="tel:+84 385 555 555">+84 385 555 555</a> <br>
                  <strong>Email:</strong> <a class="text-blue-200 hover:underline hover:text-blue-400" href="mailto:infohotel@gmail.com">infohotel@gmail.com</a>
               </p>

               <div class="relative w-20 h-20 mx-auto my-12 bg-blue-300 rotate-45">
                  <div class="flex justify-center items-center absolute left-0 top-0 w-10 h-10 hover: hover:-mt-1 bg-blue-800 cursor-pointer">
                     <i class="fab fa-facebook-f fa-lg text-blue-500 -rotate-45"></i>
                  </div>
                  <div class="flex justify-center items-center absolute top-0 right-0 w-10 h-10 hover:-mt-1 hover:-mr-1 bg-blue-800 cursor-pointer">
                     <i class="fab fa-twitter fa-lg text-blue-500 -rotate-45"></i>
                  </div>
                  <div class="flex justify-center items-center absolute right-0 bottom-0 w-10 h-10 hover:-mr-1 hover:-mb-1 bg-blue-800 cursor-pointer">
                     <i class="fab fa-google-plus-g fa-lg text-blue-500 -rotate-45"></i>
                  </div>
                  <div class="flex justify-center items-center absolute bottom-0 left-0 w-10 h-10 hover:-mb-1 hover:-ml-1 bg-blue-800 cursor-pointer">
                     <i class="fab fa-linkedin-in fa-lg text-blue-500 -rotate-45"></i>
                  </div>
               </div>
            </div>


            <div class="w-full md:w-1/3 p-5" data-aos="fade-left">
               <div class="animate-bounce mt-6 text-xl font-semibold">SAY HELLO!</div>
               <form class="p-3 w-4/5 mx-auto mt-2 px-6 pt-6 pb-4 rounded">
                  <div class="flex items-center mb-4">
                     <input class="w-full h-10 p-2 border-blue-200 bg-white text-gray-800 rounded-xl" type="email" placeholder="example@gmail.com" required>
                  </div>
                  <div class="flex items-center mb-4">
                     <input class="w-full h-10 p-2 border-blue-200 bg-white text-gray-800 rounded-xl" type="password" placeholder="password" required>
                  </div>
                  <div class="mb-6">
                     <textarea class="w-full h-24 px-2 pt-2 border-blue-200 bg-white text-gray-800 rounded-xl" placeholder="Message" required></textarea>
                  </div>
                  <div class="flex justify-between items-center bg-btn rounded-tl-3xl rounded-br-3xl">
                     <button class="animate-pulse bg-btn w-full py-2 px-4 text-white font-bold rounded-tl-3xl rounded-br-3xl" type="submit">SEND</button>
                  </div>
               </form>
            </div>

         </div>
      </div>
   </div>
   <!-- END: Footer -->

   </div>
   <a id="to-top" class="hidden md:block" href="#">
      <i class="fas fa-angle-double-up animate-pulse"></i>
   </a>
</body>

<?php
if (md5($id) == $m && sha1($id) == $s) {
   $query = "SELECT * FROM khachhang where idtaikhoan = '" . $id. "'";
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
      offset: 250,
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