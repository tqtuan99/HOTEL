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
   <link rel="stylesheet" href="./assets/css/main.css">
   <link rel="stylesheet" href="./pageshowroom.css">
   <link rel="stylesheet" href="../home/header/header.css">
   <link rel="stylesheet" href="../../font/fontawesome-free-5.15.4-web/css/all.min.css">
</head>

<body>
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
                        <a href="../../../index.php" class="text-white hover:text-pink-300 hover:bg-gray-600 px-3 py-2 rounded-md ">
                           Home
                        </a>
                        <ul class="subnav">

                        </ul>
                     </li>

                     <li class="relative">
                        <a href="#" class="text-white hover:text-pink-300 hover:bg-gray-600 px-3 py-2 rounded-md ">
                           View Room
                        </a>
                        <ul class="subnav ">
                           <div class="subnav-item flex">
                              <li><a href="./assets/components/page-show-room/pageRoom.php" target="blank">All Rooms</a></li>
                              <li><a href="#">VIP Rooms A</a></li>
                              <li><a href="#">VIP Rooms B</a></li>
                              <li><a href="#">Normal Room</a></li>
                           </div>
                        </ul>
                     </li>

                     <li class="relative">
                        <a href="#" class="text-white hover:text-pink-300 hover:bg-gray-600 px-3 py-2 rounded-md ">
                           Apartments
                        </a>
                        <ul class="subnav">
                           <div class="subnav-item flex">
                              <li><a href="#">Example 1</a></li>
                              <li><a href="#">Example 2</a></li>
                           </div>
                        </ul>
                     </li>

                     <li class="relative">
                        <a href="#" class="text-white hover:text-pink-300 hover:bg-gray-600 px-3 py-2 rounded-md ">
                           About us
                        </a>
                        <ul class="subnav">
                           <div class="subnav-item flex">
                              <li><a href="#">Example 1</a></li>
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
                     <a href="../../../../../HOTEL/assets/components/login/login.php" target="blank" class="text-white hover:text-pink-300">Sign in</a>
                     <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
                     <a href="../../../../../hotel/assets/components/register/register.php" target="blank" class="text-white hover:text-pink-300">Create account</a>
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

                  <!-- Profile dropdown -->
                  <div class="js-show-user ml-3 relative">
                     <div id="js-user" class="lg:hidden flex">
                        <div class="text-white px-3 py-2 rounded-md ">
                           <!-- <?php
                                 if ($id) {
                                    $query = "SELECT * FROM khachhang where idtaikhoan = '" . $id . "'";
                                    $conn = $db_handle->connectDB();
                                    $result = $conn->query($query);
                                    if ($result->num_rows > 0) {
                                       // output data of each row
                                       $row = $result->fetch_assoc();
                                       echo $row["ten"];
                                    }
                                 }
                                 ?> -->
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
                        <a href="./logout.php" class="hover:text-pink-300 block px-4 py-2 text-sm text-gray-700" onclick="return confirm('Are you sure?')" role="menuitem" tabindex="-1" id="user-menu-item-1">Log Out</a>

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
                     <a>
                        VIP 1
                     </a>
                     <a>
                        VIP2
                     </a>
                     <a>
                        VIP3
                     </a>
                  </div>
               </div>
               <div class="row-content">
                  <div class="image-room" style="background-image: url(../../image/destination-1.jpg);">
                  </div>
                  <div class="row-text">
                     <div class="info">
                        <p class="room"> VIP 1</p>
                        <p class="view"> <i class="fas fa-umbrella-beach"></i>View beach beautiful</p>
                        <ul>
                           <li>
                              <i class="fas fa-bed"></i>
                              <p>
                                 2 giường đôi lớn
                              </p>
                           </li>
                           <li>
                              <i class="fas fa-bath"></i>
                              <p>
                                 2 bồn tắm message
                              </p>
                           </li>
                           <li>
                              <i class="fas fa-street-view"></i>
                              <p>
                                 Ở lên đến 7 người
                              </p>
                           </li>
                        </ul>
                        <div class="text-sp">
                           <p>
                              Đặc tả theo yêu cầu ADMIN (VD:Bạn có thể hủy sau, nên hãy đặt ngay hôm nay để có giá tốt.
                              Bạn có thể hủy sau, nên hãy đặt ngay hôm nay để có giá tốt.)
                           </p>
                        </div>
                        <div class="price">
                           1000$
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

               <div class="row-content">
                  <div class="image-room" style="background-image: url(../../image/destination-1.jpg);">
                  </div>
                  <div class="row-text">
                     <div class="info">
                        <p class="room"> VIP 1</p>
                        <p class="view"> <i class="fas fa-umbrella-beach"></i>View beach beautiful</p>
                        <ul>
                           <li>
                              <i class="fas fa-bed"></i>
                              <p>
                                 2 giường đôi lớn
                              </p>
                           </li>
                           <li>
                              <i class="fas fa-bath"></i>
                              <p>
                                 2 bồn tắm message
                              </p>
                           </li>
                           <li>
                              <i class="fas fa-street-view"></i>
                              <p>
                                 Ở lên đến 7 người
                              </p>
                           </li>
                        </ul>
                        <div class="text-sp">
                           <p>
                              Đặc tả theo yêu cầu ADMIN (VD:Bạn có thể hủy sau, nên hãy đặt ngay hôm nay để có giá tốt.
                              Bạn có thể hủy sau, nên hãy đặt ngay hôm nay để có giá tốt.)
                           </p>
                        </div>
                        <div class="price">
                           1000$
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

            </div>
         </div>
      </div>
   </div>

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