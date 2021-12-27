<?php
if (session_id() === "")
   session_start();

if (isset($_SESSION['admin'])) {
} else header('Location: ../../notFound.php');

if (isset($_SESSION['idUser']))
   $id = $_SESSION['idUser'];
else $id = "";

require_once("../components/handle/dbcontroller.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>ADMIN</title>
   <meta name="author" content="name">
   <meta name="description" content="description here">
   <meta name="keywords" content="keywords,here">

   <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"> -->
   <!-- <link rel="stylesheet" href="/assets/css/main.css"> -->
   <link rel="stylesheet" href="/../HOTEL/assets/font/fontawesome-free-5.15.4-web/css/all.min.css">
   <link rel="stylesheet" href="/../HOTEL/output.css">
   <link rel="stylesheet" href="./styleAdmin.css">

   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js">
   </script>
   <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
   <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

</head>


<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">

   <!--Nav-->
   <nav class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

      <div class="flex items-center">
         <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
            <a href="#">
               <span class="text-3xl pl-2 text-green-600 font-extrabold">
                  <span class="">ANGLE HOTEL</span>
                  <!-- <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
                  <lord-icon src="https://cdn.lordicon.com/hpxruznz.json" trigger="loop"
                     colors="primary:#16c72e,secondary:#08a88a" scale="31" axis-y="17" style="width:100px;height:100px">
                  </lord-icon> -->
               </span>
            </a>
         </div>

         <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2">
            <span class="relative w-9/12 md:w-full">
               <input type="search" placeholder="Search" class="w-full bg-gray-900 text-white transition border border-transparent focus:outline-none focus:border-gray-400 rounded py-3 px-2 pl-10 appearance-none leading-normal">
               <div class="absolute search-icon" style="top: 1rem; left: .8rem;">
                  <svg class="fill-current pointer-events-none text-white w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                     <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z">
                     </path>
                  </svg>
               </div>
            </span>
         </div>

         <?php
         $avatar = null;
         $name = null;
         $default = 'avtNull.png';
         if ($id) {
            $query = "SELECT * FROM nhanvien where idtaikhoan = '" . $id . "'";
            $conn = $db_handle->connectDB();
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
               // output data of each row
               $row = $result->fetch_assoc();
               $avatar = $row['avatar'] == "" ? $default : $row['avatar'];
               $name = $row["hotennv"];
            }
         }
         ?>

         <div class="flex flex-shrink content-center justify-between md:w-1/3 md:justify-end">
            <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
               <li class="flex-1 md:flex-none md:mr-3">
                  <div class="relative inline-block">
                     <button onclick="toggleDD('myDropdown')" class="drop-button text-white focus:outline-none"> <span class="pr-2"><img src="../photo/avatar/<?php echo $avatar ?>" class="em img-radius"></img></span><?php echo $name ?><svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                           <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg></button>
                     <div id="myDropdown" class="dropdownlist absolute bg-gray-800 text-white right-0 mt-3 p-3 overflow-auto z-30 invisible">
                        <input type="text" class="drop-search p-2 text-gray-600" placeholder="Search.." id="myInput" onkeyup="filterDD('myDropdown','myInput')">
                        <a href="#" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fa fa-user fa-fw"></i> Profile</a>
                        <a href="#" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fa fa-cog fa-fw"></i> Settings</a>
                        <div class="border border-gray-800"></div>
                        <a href="../../logout.php" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
      </div>

   </nav>


   <div class="flex flex-col lg:flex-row mx-4">

      <div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 mt-12 lg:h-screen z-10 w-full lg:w-60 left-0">
         <div class="lg:mt-12 lg:w-60 lg:fixed lg:left-0 lg:top-0 content-center lg:content-start text-left justify-between">
            <ul class="list-reset flex flex-row lg:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
               <li class="mr-3 flex-1">
                  <a href="#" class="js-show-data block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500 focus:ring-4 focus:ring-blue-300 focus:text-white">
                     <i class="fas fa-tasks pr-0 md:pr-3 text-yellow-500"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block hover:text-white focus:text-white">Account
                        Management</span>
                  </a>
               </li>
               <li class="mr-3 flex-1">
                  <a href="#" class="js-show-data block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500 focus:ring-4 focus:ring-blue-300 focus:text-white">
                     <i class="fas fa-tasks pr-0 md:pr-3 text-yellow-500"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block hover:text-white focus:text-white">Employ
                        Management</span>
                  </a>
               </li>
               <li class="mr-3 flex-1">
                  <a href="#" class="js-show-data block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-green-500 focus:ring-4 focus:ring-blue-300 focus:text-white">
                     <i class="fas fa-tasks pr-0 md:pr-3 text-yellow-500"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block hover:text-white focus:text-white">Room
                        Management</span>
                  </a>
               </li>
               <li class="mr-3 flex-1">
                  <a href="#" class="js-show-data block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-blue-600 focus:ring-4 focus:ring-blue-300 focus:text-white">
                     <i class="fas fa-chart-area pr-0 md:pr-3 text-yellow-500"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block hover:text-white focus:text-white">Statistical</span>
                  </a>
               </li>
               <li class="mr-3 flex-1">
                  <a href="#" class="js-show-data block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-red-500 focus:ring-4 focus:ring-blue-300 focus:text-white">
                     <i class="fa fa-wallet pr-0 md:pr-3 text-yellow-500"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block hover:text-white focus:text-white">Log
                        Out</span>
                  </a>
               </li>
            </ul>
         </div>
      </div>

      <!-- *MAIN -->
      <div id="main-contend" class="lg:ml-60 px-4">

         <div class="my-modal hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto overflow-x-hidden fixed z-50 justify-center items-center h-modal sm:h-full" id="">
            <div class="relative px-4 w-full max-w-md md:h-auto">
               <!-- Modal content -->
               <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                  <!-- Modal header -->
                  <div class="flex justify-end p-2">
                     <button type="button" class="close-modal text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                     </button>
                  </div>
                  <!-- Modal body -->
                  <div class="p-6 pt-0 text-center">
                     <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                     </svg>
                     <form action="" method="POST">
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                           Are you sure you want to delete this account?</h3>
                        <button data-modal-toggle="popup-modal" name="yes" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                           Yes, I am sure
                        </button>
                        <button data-modal-toggle="popup-modal" name="no" type="button" class="close-modal text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">No,
                           cancel</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>

         <?php
         $queryRoom = "SELECT * FROM PHONG";
         $conn = $db_handle->connectDB();
         $result = $conn->query($queryRoom);
         if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
               echo '';
            }
         }
         ?>

         <!-- ? START: ACCOUNT MANAGEMENT -->
         <div class="js-show-account account-management bg-gray-100 mt-12 md:mt-2">
            <div class="bg-gray-800 pt-3">
               <div class="rounded-tl-3xl rounded-tr-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                  <h3 class="font-bold pl-2">Account Management</h3>
               </div>
            </div>

            <div class="container mx-auto">
               <div class="flex flex-col">
                  <div class="w-full">
                     <div class="p-8 border-b border-gray-200 shadow">
                        <table class="dataTable divide-y divide-gray-300" id="dataTable">
                           <thead class="bg-black">
                              <tr>
                                 <th class="px-6 py-2 text-xs text-white">
                                    ID Account
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Name
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Email
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Status
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Edit
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Delete
                                 </th>
                              </tr>
                           </thead>
                           <tbody class="bg-white divide-y divide-gray-300">
                              <?php
                              $status = null;
                              $queryRoom = "SELECT * FROM taikhoan";
                              $conn = $db_handle->connectDB();
                              $result = $conn->query($queryRoom);
                              if ($result->num_rows > 0) {
                                 while ($row = $result->fetch_assoc()) {
                                    if ($row['trangthai'] == 1) $status == 'online';
                                    else $status = 'offline';
                                    echo '
                                    <tr class="text-center whitespace-nowrap">
                                 <td class="px-6 py-4 text-sm text-gray-500">
                                    ' . $row['idtaikhoan'] . '
                                 </td>
                                 <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                    ' . $row['tendangnhap'] . '
                                    </div>
                                 </td>
                                 <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500">' . $row['tendangnhap'] . '</div>
                                 </td>
                                 <td class="px-6 py-4 text-sm text-gray-500">
                                 ' . $status . '
                                 </td>
                                 <td class="px-6 py-4">
                                    <a href="#" class="inline-block text-center">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                       </svg>
                                    </a>
                                 </td>
                                 <td class="px-6 py-4">
                                    <a href="#" class="open-modal inline-block text-center">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                       </svg>
                                    </a>                                  
                                 </td>
                                 </tr>
                                 ';
                                 }
                              }
                              ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- ? END: ACCOUNT MANAGEMENT-->

         <!-- ? EMPLOY MANAGEMENT -->
         <div class="js-show-employ employ-management bg-gray-100 mt-12 md:mt-2">
            <div class="bg-gray-800 flex justify-between items-center pt-3">
               <div class="rounded-tl-3xl rounded-tr-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                  <h3 class="font-bold pl-2">Employ Management</h3>
               </div>
               <button class="open-modal-employ block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xl px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 rounded-tr-3xl rounded-bl-3xl" type="button" data-modal-toggle="authentication-modal">
                  ADD EMPLOY
               </button>
            </div>

            <!-- Main modal -->
            <div aria-hidden="true" class="my-modal-employ hidden overflow-y-auto overflow-x-hidden fixed z-50 justify-center items-center h-modal md:h-full inset-0 bg-gray-600 bg-opacity-50">
               <div class="relative w-full max-w-lg md:h-auto">
                  <!-- Modal content -->
                  <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                     <div class="flex justify-end">
                        <button type="button" class="close-modal-employ text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                           <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                           </svg>
                        </button>
                     </div>
                     <form class="px-6 pb-2 space-y-6 lg:px-8 " action="#" method="POST">
                        <h3 class="text-4xl text-center font-medium text-gray-900 dark:text-white">Add Employee</h3>
                        <div>
                           <label for="name" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Full name</label>
                           <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Nguyen Van A" required>
                        </div>
                        <div style="display: flex; align-items: center; margin-top: 12px;">
                           <label class="block text-sm font-medium text-gray-900 dark:text-gray-300">Gender:</label>

                           <input type="radio" name="gender" value="male" id="gender" class="bg-gray-50 border w-40 -mr-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                           <label class="block text-sm text-gray-900 dark:text-gray-300">Male</label>

                           <input type="radio" name="gender" value="female" id="gender" class="bg-gray-50 border w-40 -mr-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                           <label class="block text-sm text-gray-900 dark:text-gray-300">Female</label>

                           <input type="radio" name="gender" value="other" id="gender" class="bg-gray-50 border w-40 -mr-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                           <label class="block text-sm text-gray-900 dark:text-gray-300">Other</label>
                        </div>
                        <script>
                           alert("Add successfull!");
                        </script>
                        <div style="display: flex; align-items: center; margin-top: 12px;">
                           <label class="block text-sm font-medium text-gray-900 dark:text-gray-300">Position:</label>

                           <input type="radio" name="position" value="1" id="position" class="bg-gray-50 border w-40 -mr-12 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                           <label class="block text-sm text-gray-900 dark:text-gray-300">Admin</label>

                           <input type="radio" name="position" value="0" id="position" class="bg-gray-50 border w-40 -mr-12 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                           <label class="block text-sm text-gray-900 dark:text-gray-300">Employee</label>

                        </div>
                        <div style="margin-top: 8px !important">
                           <label for="phone" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Phone</label>
                           <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="033456789" required>
                        </div>
                        <div style="margin-top: 8px !important">
                           <label for="id" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">ID</label>
                           <input type="text" name="id" id="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="0123456789" required>
                        </div>
                        <div style="margin-top: 8px !important">
                           <label for="dob" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Day of birth</label>
                           <input type="date" name="dob" id="dob" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="01-01-2000" required>
                        </div>
                        <div style="margin-top: 8px !important">
                           <label for="email" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                           <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                        </div>
                        <div style="margin-top: 8px !important">
                           <label for="address" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Address</label>
                           <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                        </div>

                        <div style="display: flex; margin-bottom: 8px !important;">
                           <div type="submit" name="cancel" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Employ</div>
                           <button type="submit" name="add" onclick="return confirm('Are you sure?');" class="close-modal-employ w-full ml-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <?php
            include('./handleAddEmployee.php');
            ?>
            <div class="container mx-auto">
               <div class="flex flex-col">
                  <div class="w-full">
                     <div class="p-8 border-b border-gray-200 shadow">
                        <table class="dataTable divide-y divide-gray-300" id="dataTable">
                           <thead class="bg-black">
                              <tr>
                                 <th class="px-6 py-2 text-xs text-white">
                                    ID Employ
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Name
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    DoB
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Phone
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    ID
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Email
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Position
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Address
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Edit
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Delete
                                 </th>
                              </tr>
                           </thead>
                           <tbody class="bg-white divide-y divide-gray-300">
                              <?php
                              $chucvu = null;
                              $queryRoom = "SELECT * FROM nhanvien";
                              $conn = $db_handle->connectDB();
                              $result = $conn->query($queryRoom);
                              if ($result->num_rows > 0) {
                                 while ($row = $result->fetch_assoc()) {
                                    if ($row['chucvu'] == '1') $chucvu = 'Quản lý';
                                    else $chucvu = 'Nhân viên';
                                    echo '
                              <tr class="text-center whitespace-nowrap">
                                 <td class="px-6 py-4 text-sm text-gray-500">
                                    ' . $row['idnhanvien'] . '
                                 </td>
                                 <td class="px-6 py-4">
                                    <div style="text-transform: capitalize; class="text-capitalize text-sm text-gray-900">
                                    ' . $row['hotennv'] . '
                                    </div>
                                 </td>
                                 <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                 ' . $row['ngaysinh'] . '
                                    </div>
                                 </td>
                                 <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                    ' . $row['sodienthoai'] . '
                                    </div>
                                 </td>
                                 <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                    ' . $row['socccd'] . '
                                    </div>
                                 </td>
                                 <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500">' . $row['email'] . '</div>
                                 </td>
                                 <td class="px-6 py-4 text-sm text-gray-500">
                                 ' . $chucvu . '
                                 </td>
                                 <td class="px-6 py-4 text-sm text-gray-500">
                                 ' . $row['diachi'] . '
                                 </td>
                                 <td class="px-6 py-4">
                                    <a href="#" class="inline-block text-center">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                       </svg>
                                    </a>
                                 </td>
                                 <td class="px-6 py-4">
                                    <a href="#" class="open-modal inline-block text-center">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                       </svg>
                                    </a>
                                 </td>
                              </tr>
                              ';
                                 }
                              }
                              ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!-- ? Statistical  -->
         <div class="js-show-statis statistical bg-gray-100 mt-12 md:mt-2 pb-12">
            <div class="bg-gray-800 pt-3">
               <div class="rounded-tl-3xl rounded-tr-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                  <h3 class="font-bold pl-2">Statistical</h3>
               </div>
            </div>
            <div class="flex flex-wrap justify-center">
               <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                  <!--Metric Card-->
                  <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                     <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                           <div class="rounded-full p-5 bg-green-600"><i class="fa fa-wallet fa-2x fa-inverse"></i>
                           </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                           <h5 class="font-bold uppercase text-gray-600">Total Revenue</h5>
                           <h3 class="font-bold text-3xl">$3249 <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                        </div>
                     </div>
                  </div>
                  <!--/Metric Card-->
               </div>
               <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                  <!--Metric Card-->
                  <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                     <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                           <div class="rounded-full p-5 bg-pink-600"><i class="fas fa-users fa-2x fa-inverse"></i>
                           </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                           <h5 class="font-bold uppercase text-gray-600">Total Users</h5>
                           <h3 class="font-bold text-3xl">249 <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span></h3>
                        </div>
                     </div>
                  </div>
                  <!--/Metric Card-->
               </div>
               <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                  <!--Metric Card-->
                  <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                     <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                           <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-user-plus fa-2x fa-inverse"></i>
                           </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                           <h5 class="font-bold uppercase text-gray-600">New Users</h5>
                           <h3 class="font-bold text-3xl">2 <span class="text-yellow-600"><i class="fas fa-caret-up"></i></span></h3>
                        </div>
                     </div>
                  </div>
                  <!--/Metric Card-->
               </div>
            </div>
            <div class="flex flex-row flex-wrap flex-grow mt-2">
               <div class="w-full p-6">
                  <!--Graph Card-->
                  <div class="bg-white border-transparent rounded-lg shadow-xl">
                     <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                        <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                     </div>
                     <div class="p-5">
                        <canvas id="chartjs-7" class="chartjs" width="undefined" height="undefined"></canvas>
                        <script>
                           new Chart(document.getElementById("chartjs-7"), {
                              "type": "bar",
                              "data": {
                                 "labels": ["January", "February", "March", "April", "May", "June", "July",
                                    "August",
                                    "September", "October", "November", "December"
                                 ],
                                 "datasets": [{
                                    "label": "Page Impressions",
                                    "data": [10, 20, 30, 40, 50, 40, 60, 80, 30, 40, 20, 30],
                                    "borderColor": "rgb(255, 99, 132)",
                                    "backgroundColor": "rgba(255, 99, 132, 0.2)"
                                 }, {
                                    "label": "Adsense Clicks",
                                    "data": [5, 15, 10, 30, 50, 60, 30, 20, 10, 10, 15, 10],
                                    "type": "line",
                                    "fill": false,
                                    "borderColor": "rgb(54, 162, 235)"
                                 }]
                              },
                              "options": {
                                 "scales": {
                                    "yAxes": [{
                                       "ticks": {
                                          "beginAtZero": true
                                       }
                                    }]
                                 }
                              }
                           });
                        </script>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>

   <!--Datatables -->
   <script src="./adminHome.js"></script>
   <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
</body>

</html>