<!DOCTYPE html>
<html lang="en">

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
                        <a href="/../HOTEL/index.php" class="text-white hover:text-pink-300 hover:bg-gray-600 px-3 py-2 rounded-md">
                           Home
                        </a>
                        <ul class="subnav">

                        </ul>
                     </li>

                     <li class="relative">
                        <a href="#" class="text-white hover:text-pink-300 hover:bg-gray-600 px-3 py-2 rounded-md">
                           View Room
                        </a>
                        <ul class="subnav ">
                           <div class="subnav-item flex">
                              <li><a href="/../HOTEL/assets/components/page-show-room/pageRoom.php" target="blank">All Rooms</a></li>
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

                  <!-- Profile dropdown -->
                  <div class="js-show-user ml-3 relative">
                     <div id="js-user" class="lg:hidden flex">
                        <div class="text-white px-3 py-2 rounded-md ">
                           <?php
                           $avatar = null;
                           $default = 'avtNull.png';
                           if ($id) {
                              $query = "SELECT * FROM khachhang where idtaikhoan = '" . $id . "'";
                              $conn = $db_handle->connectDB();
                              $result = $conn->query($query);
                              if ($result->num_rows > 0) {
                                 // output data of each row
                                 $row = $result->fetch_assoc();
                                 $avatar = $row['avatar']==""?$default:$row['avatar'];
                                 echo $row["ten"];
                              }
                           }
                           ?>
                        </div>
                        <button type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                           <span class="sr-only">Open user menu</span>
                           <img class="h-10 w-10 rounded-full" src='/./HOTEL/assets/photo/avatar/<?php echo $avatar ?>' alt="">
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
                        <a href="/./HOTEL/logout.php" class="hover:text-pink-300 block px-4 py-2 text-sm text-gray-700" onclick="return confirm('Are you sure?')" role="menuitem" tabindex="-1" id="user-menu-item-1">Log Out</a>

                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!-- Mobile menu, show/hide based on menu state. -->
         <div class="js-items-menu hidden" id="mobile-menu">
            <div class="nav list-none px-2 pb-3 block sm:hidden">
               <li class="relative">
                  <a href="./index.php" class="text-white hover:text-pink-300 hover:bg-gray-600 px-3 py-2 rounded-md">
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
   </nav>
</body>

</html>