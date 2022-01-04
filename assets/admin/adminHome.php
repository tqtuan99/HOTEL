<?php
if (session_id() === "")
   session_start();

if (isset($_SESSION['admin'])) {
} else header('Location: ../../notFound.php');

if (isset($_SESSION['idUser']))
   $id = $_SESSION['idUser'];
else $id = "";

function mysubstr($str, $limit = 100)
{
   if (strlen($str) <= $limit) return $str;
   return mb_substr($str, 0, $limit - 3, 'UTF-8') . '...';
}

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
                  <span class="">ANGLE</span>
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
                        <a href="../../logout.php" onclick="return confirm('Are you sure you want to exit?');" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a>
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
            <ul class="list-reset flex flex-row lg:flex-col py-0 lg:py-4 px-1 md:px-2 text-center lg:text-left">
               <li class="mr-3 flex-1">
                  <a href="?q=account" class="js-show-data block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500 focus:ring-4 focus:ring-blue-300 focus:text-white">
                     <i class="fas fa-tasks pr-0 md:pr-3 text-yellow-500"></i><span class="pb-1 md:pb-0 text-xs lg:text-base text-gray-600 md:text-gray-400 block md:inline-block font-bold lg:leading-loose hover:text-white focus:text-white">Account
                        Management</span>
                  </a>
               </li>
               <li class="mr-3 flex-1">
                  <a href="?q=employ" class="js-show-data block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500 focus:ring-4 focus:ring-blue-300 focus:text-white">
                     <i class="fas fa-tasks pr-0 md:pr-3 text-yellow-500"></i><span class="pb-1 md:pb-0 text-xs lg:text-base text-gray-600 md:text-gray-400 block md:inline-block font-bold lg:leading-loose hover:text-white focus:text-white">Employ
                        Management</span>
                  </a>
               </li>
               <li class="mr-3 flex-1">
                  <a href="?q=room" class="js-show-data block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-green-500 focus:ring-4 focus:ring-blue-300 focus:text-white">
                     <i class="fas fa-tasks pr-0 md:pr-3 text-yellow-500"></i><span class="pb-1 md:pb-0 text-xs lg:text-base text-gray-600 md:text-gray-400 block md:inline-block font-bold lg:leading-loose hover:text-white focus:text-white">Room
                        Management</span>
                  </a>
               </li>
               <li class="mr-3 flex-1">
                  <a href="?q=statistical" class="js-show-data block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-blue-600 focus:ring-4 focus:ring-blue-300 focus:text-white">
                     <i class="fas fa-chart-area pr-0 md:pr-3 text-yellow-500"></i><span class="pb-1 md:pb-0 text-xs lg:text-base text-gray-600 md:text-gray-400 block md:inline-block font-bold lg:leading-loose hover:text-white focus:text-white">Statistical</span>
                  </a>
               </li>
               <li class="mr-3 flex-1">
                  <a href="../../logout.php" onclick="return confirm('Are you sure you want to exit?');" class="js-show-data block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-red-500 focus:ring-4 focus:ring-blue-300 focus:text-white">
                     <i class="fa fa-wallet pr-0 md:pr-3 text-yellow-500"></i><span class="pb-1 md:pb-0 text-xs lg:text-base text-gray-600 md:text-gray-400 block md:inline-block font-bold lg:leading-loose hover:text-white focus:text-white">Log
                        Out</span>
                  </a>
               </li>
            </ul>
         </div>
      </div>

      <!-- *MAIN -->
      <div id="main-contend" class="lg:ml-60 lg:px-4">

         <div class="my-modal hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto overflow-x-hidden fixed z-50 justify-center items-center h-modal sm:h-full" id="">
            <div class="relative px-4 w-full max-w-md md:h-auto">
               <!-- Modal content -->
               <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                  <!-- Modal header -->
                  <div class="flex justify-end p-2">
                     <button type="button" class="close-modal text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293as 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                     </button>
                  </div>
                  <!-- Modal body -->
                  <div class="p-6 pt-0 text-center">
                     <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                     </svg>
                     <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                        Are you sure you want to delete?
                     </h3>
                     <a href="#">
                        <button data-modal-toggle="popup-modal" onclick="deleteId(); getLocation()" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                           Yes, I am sure
                        </button>
                     </a>
                     <button data-modal-toggle="popup-modal" type="button" class="close-modal text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">No,
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
                                    User Name
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Account Type
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Date created
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Status
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Delete
                                 </th>
                              </tr>
                           </thead>
                           <tbody class="bg-white divide-y divide-gray-300">
                              <?php
                              $typeAccount = '';
                              $color = '';
                              $status = '';
                              $queryRoom = "SELECT * FROM taikhoan";
                              $conn = $db_handle->connectDB();
                              $result = $conn->query($queryRoom);
                              if ($result->num_rows > 0) {
                                 while ($row = $result->fetch_assoc()) {
                                    $sql = "SELECT * FROM nhanvien where idtaikhoan = " . $row['idtaikhoan'];
                                    $kq = $conn->query($sql);
                                    $rowkq = $kq->fetch_assoc();
                                    if ($rowkq)
                                       if ($rowkq['chucvu'] == 1)
                                          $typeAccount = 'Quản lý';
                                       else $typeAccount = $rowkq['chucvu'] == 0 ? 'Nhân viên' : 'Khách hàng';

                                    $status = $row['trangthai'] == 1 ? 'online' : 'offline';
                                    $color = $row['trangthai'] == 1 ? 'text-red-900' : 'text-gray-900';

                                    echo '
                                    <tr class="text-center whitespace-nowrap">
                                 <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">' . $row['tendangnhap'] . '</div>
                                 </td>
                                 <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                    ' . $typeAccount . '
                                    </div>
                                 </td>
                                 <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                    ' . $row['ngaytao'] . '
                                    </div>
                                 </td>
                                 <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm font-bold ' . $color . '">
                                    ' . $status . '
                                    </div>
                                 </td>
                                 <td class="px-6 py-4">
                                    <a href="#"  class="open-modal inline-block text-center">
                                       <svg xmlns="http://www.w3.org/2000/svg" onclick="saveId(1, ' . $row['idtaikhoan'] . ')" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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

            <!-- Main modal add employ -->
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
                           <button type="submit" name="add" id="" onclick="return confirm('Are you sure you want to add this employee?'); getLocation2(1)" class=" w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Employ</button>
                           <div type="submit" name="cancel" class="close-modal-employ cursor-pointer w-full text-white ml-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel</div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <?php
            include('./handleAddEmployee.php');
            ?>

            <!--begin modal edit employ -->
            <div aria-hidden="true" class="my-modal-edit-employ hidden overflow-y-auto overflow-x-hidden fixed z-50 justify-center items-center h-modal md:h-full inset-0 bg-gray-600 bg-opacity-50">
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
                        <h3 class="text-4xl text-center font-medium text-gray-900 dark:text-white">Edit Employee</h3>
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
                           <button type="submit" name="editEmploy" id="" onclick="return confirm('Are you sure you want to update this employee?'); getLocation2(1)" class=" w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Employ</button>
                           <div type="submit" name="cancel" class="close-modal-employ cursor-pointer w-full text-white ml-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel</div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <!-- end modal edit employ -->

            <div class="container mx-auto">
               <div class="flex flex-col">
                  <div class="w-full">
                     <div class="p-8 border-b border-gray-200 shadow">
                        <table class="dataTable divide-y divide-gray-300" id="dataTable">
                           <thead class="bg-black">
                              <tr>
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
                                    CIC
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
                              $queryEmploy = "SELECT * FROM nhanvien";
                              $conn = $db_handle->connectDB();
                              $result = $conn->query($queryEmploy);
                              if ($result->num_rows > 0) {
                                 while ($row = $result->fetch_assoc()) {
                                    if ($row['chucvu'] == '1') $chucvu = 'Quản lý';
                                    else $chucvu = 'Nhân viên';
                                    echo '
                              <tr class="text-center whitespace-nowrap">
                                 <td class="px-6 py-4">
                                    <div class="text-capitalize text-sm text-gray-900">
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
                                    <div class="text-sm text-gray-900">' . $row['email'] . '</div>
                                 </td>
                                 <td class="px-6 py-4 text-sm text-gray-900">
                                 ' . $chucvu . '
                                 </td>
                                 <td class="px-6 py-4 text-sm text-gray-900">
                                 ' . $row['diachi'] . '
                                 </td>
                                 <td class="px-6 py-4">
                                    <a href="#" class="open-modal-edit-employ inline-block text-center">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                       </svg>
                                    </a>
                                 </td>
                                 <td class="px-6 py-4">
                                    <a href="#" class="open-modal inline-block text-center">
                                       <svg xmlns="http://www.w3.org/2000/svg" onclick="saveId(0, ' . $row['idtaikhoan'] . ')" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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

         <!-- ROOM MANAGEMENT -->
         <div class="js-show-room room-management bg-gray-100 mt-12 md:mt-2">
            <div class="bg-gray-800 flex justify-between items-center pt-3">
               <div class="rounded-tl-3xl rounded-tr-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                  <h3 class="font-bold pl-2">Room Management</h3>
               </div>
               <button class="open-modal-room block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xl px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 rounded-tr-3xl rounded-bl-3xl" type="button" data-modal-toggle="authentication-modal">
                  ADD ROOM
               </button>
            </div>

            <!-- Main modal add room-->
            <div aria-hidden="true" class="my-modal-room hidden overflow-y-auto overflow-x-hidden fixed z-50 justify-center items-center h-modal md:h-full inset-0 bg-gray-600 bg-opacity-50">
               <div class="relative w-full max-w-lg md:h-auto">
                  <!-- Modal content -->
                  <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                     <div class="flex justify-end">
                        <button type="button" class="close-modal-room text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                           <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                           </svg>
                        </button>
                     </div>
                     <form class="px-6 pb-2 space-y-6 lg:px-8 " action="#" method="POST" enctype="multipart/form-data">
                        <h3 class="text-4xl text-center font-medium text-gray-900 dark:text-white">Add Room</h3>
                        <div>
                           <label for="roomName" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Room Name</label>
                           <input type="text" name="roomName" id="roomName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="NORMAL PH101" required>
                        </div>
                        <div style="display: flex; align-items: center; margin-top: 12px;">
                           <label class="block text-sm font-medium text-gray-900 dark:text-gray-300">Type:</label>
                           <?php
                           $queryTypeRoom = "SELECT * FROM loaiphong";
                           $conn = $db_handle->connectDB();
                           $result = $conn->query($queryTypeRoom);
                           if ($result)
                              if ($result->num_rows > 0) {
                                 while ($row = $result->fetch_assoc()) {
                                    echo '
                                          <input type="radio"  name="typeRoom" value="' . $row['idloaiphong'] . '" id="' . $row['tenloaiphong'] . '" 
                                          class="bg-gray-50 border w-40 -mr-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                                <label for="' . $row['tenloaiphong'] . '" class="block text-sm text-gray-900 dark:text-gray-300">' . $row['tenloaiphong'] . '</label>
                                          ';
                                 }
                              }
                           ?>
                        </div>
                        <div style="display: flex; align-items: center; margin-top: 12px;">
                           <div style="margin: 10px; width: 100px;">

                              <label for="floor" class="text-center block text-sm font-medium text-gray-900 dark:text-gray-300">Floor</label>
                              <input type="number" name="floor" id="floor" min="1" max="20" class="text-center bg-gray-50 border w-40 -mr-12 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                           </div>

                           <div style="margin: 10px; width: 100px;">
                              <label for="people" class="text-center block text-sm font-medium text-gray-900 dark:text-gray-300">People</label>
                              <input type="number" name="people" id="people" min="1" max="20" class="text-center bg-gray-50 border w-40 -mr-12 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                           </div>

                           <div style="margin: 10px; width: 100px;">
                              <label for="bed" class="text-center block text-sm font-medium text-gray-900 dark:text-gray-300">Bed</label>
                              <input type="number" name="bed" id="bed" min="1" max="20" class="text-center bg-gray-50 border w-40 -mr-12 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                           </div>

                           <div style="margin: 10px; width: 100px;">
                              <label for="bathtub" class="text-center block text-sm font-medium text-gray-900 dark:text-gray-300">Bathtub</label>
                              <input type="number" name="bathtub" id="bathtub" min="1" max="20" class="text-center bg-gray-50 border w-40 -mr-12 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                           </div>
                        </div>
                        <div style="margin-top: 8px !important">
                           <label for="location" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Location</label>
                           <input type="text" name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Sea ​​views..." required>
                        </div>
                        <div style="margin-top: 8px !important">
                           <label for="description" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                           <textarea cols="40" rows="5" type="text" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Luxury bedroom..." required></textarea>
                        </div>
                        <div style="margin-top: 8px !important">
                           <label for="price" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Unit price</label>
                           <input type="number" min="100000" step="100000" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="1.000.000" required>
                        </div>
                        <div style="margin-top: 8px !important">
                           <span for="image" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Choose room photo</span>
                           <input type="hidden" name="size" value="1000000">
                           <input id="image" name="image" type="file" class="block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                 " />
                        </div>
                        <div style="display: flex; margin-bottom: 8px !important;">
                           <button name="addRoom" onclick="return confirm('Are you sure you want to add this room?')" class=" w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Room</button>
                           <div name="cancel" class="cursor-pointer close-modal-room w-full ml-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel</div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <?php
            include('./handleAddRoom.php');
            ?>
            <div class="container mx-auto">
               <div class="flex flex-col">
                  <div class="w-full">
                     <div class="p-8 border-b border-gray-200 shadow">
                        <table class="dataTable divide-y divide-gray-300" id="dataTable">
                           <thead class="bg-black">
                              <tr>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Name
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Type
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Floor
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Location
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Description
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Status
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Number Bed
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Number People
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Number Bathtub
                                 </th>
                                 <th class="px-6 py-2 text-xs text-white">
                                    Image
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

                              $trangthai = null;
                              $queryRoom = "SELECT * FROM phong, loaiphong where phong.idloaiphong = loaiphong.idloaiphong";
                              $conn = $db_handle->connectDB();
                              $result = $conn->query($queryRoom);
                              if ($result->num_rows > 0) {
                                 while ($row = $result->fetch_assoc()) {
                                    if ($row['trangthai'] == '2') $trangthai = 'Đã thuê';
                                    else if ($row['trangthai'] == '1') $trangthai = 'Đã đặt';
                                    else $trangthai = 'Trống';
                                    echo '
                              <tr class="text-center whitespace-nowrap">
                                 <td class="px-6 py-4 text-sm text-gray-500">
                                 <div class="text-sm text-gray-900">
                                 ' . $row['tenphong'] . '
                                    </div>
                                 </td>
                                 <td class="px-6 py-4">
                                    <div class="text-capitalize text-sm text-gray-900">
                                    ' . $row['tenloaiphong'] . '
                                    </div>
                                 </td>
                                 <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                 ' . $row['tang'] . '
                                    </div>
                                 </td>
                                 <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 txt-over">
                                    ' . $row['vitri'] . '
                                    </div>
                                 </td>
                                 <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 txt-over">
                                    ' . $row['mota'] . '
                                    </div>
                                 </td>
                                 <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">' . $trangthai . '</div>
                                 </td>
                                 <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                    ' .  $row['sogiuong'] . '
                                    </div>
                                 </td>
                                 <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                       ' . $row['songuoi'] . '
                                    </div>
                                 </td>
                                 <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                       ' . $row['sobontam'] . '
                                    </div>
                                 </td>
                                 <td class="px-6 py-4 text-sm text-gray-500">
                                    <img style="height: 39px;" src="../photo/room/' . $row['anh'] . '" alt="">
                                 </td>
                                 <td class="px-6 py-4">
                                    <a href="./handleEditRoom.php?idRoom=' . $row['idphong'] . '" class="open-modal-edit-room inline-block text-center">
                                       <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                       </svg>
                                    </a>
                                 </td>
                                 <td class="px-6 py-4">
                                    <a href="#" class="open-modal inline-block text-center">
                                       <svg xmlns="http://www.w3.org/2000/svg" onclick="saveId(2, ' . $row['idphong'] . ')" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
         <!-- END MANAGEMENT -->
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

                  <div style="display: flex;">
                              <div class="search-statistical js-search-statistical active">Total</div>
                              <div class="search-statistical js-search-statistical">moth</div>
                              <div class="search-statistical js-search-statistical">week</div>
                              <div class="search-statistical js-search-statistical">day</div>
                     </div>

                  <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                     <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                           <div class="rounded-full p-5 bg-green-600"><i class="fa fa-wallet fa-2x fa-inverse"></i>
                           </div>
                        </div>
                        <!-- show 1 -->
                        <div class="js-show-statistical flex-1 text-right md:text-center">
                           <h5 class="font-bold uppercase text-gray-600">Total Revenue</h5>
                           <h3 class="font-bold text-2xl">
                              <?php 
                              $queryTotal = 'SELECT sum(ROUND(TIME_TO_SEC(timediff(ngaythanhtoan,ngaytao))*(phong.dongia/3600/24),2)) as tong FROM `hoadon`, `ct_hoadon`, `phong` WHERE hoadon.idhoadon = ct_hoadon.idhoadon and ct_hoadon.idphong = phong.idphong';
                              $result = $conn->query($queryTotal);
                              $row = $result -> fetch_assoc();
                              echo number_format($row['tong']);
                              ?>
                              VNĐ
                              <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                        </div>

                        <!-- show 2 -->
                        <div class="js-show-statistical hidden flex-1 text-right md:text-center">
                           <h5 class="font-bold uppercase text-gray-600">Total Month</h5>
                           <h3 class="font-bold text-2xl">
                           <?php 
                              $queryTotal = 'SELECT sum(ROUND(TIME_TO_SEC(timediff(ngaythanhtoan,ngaytao))*(phong.dongia/3600/24),2)) as tong FROM `hoadon`, `ct_hoadon`, `phong` WHERE hoadon.idhoadon = ct_hoadon.idhoadon and ct_hoadon.idphong = phong.idphong and datediff(CURDATE(),ngaythanhtoan) < 30';
                              $result = $conn->query($queryTotal);
                              $row = $result -> fetch_assoc();
                              echo number_format($row['tong']);
                              ?>
                              VNĐ
                              <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                        </div>

                        <!-- show 3 -->
                        <div class="js-show-statistical hidden flex-1 text-right md:text-center">
                           <h5 class="font-bold uppercase text-gray-600">Total Week</h5>
                           <h3 class="font-bold text-2xl">
                           <?php 
                              $queryTotal = 'SELECT sum(ROUND(TIME_TO_SEC(timediff(ngaythanhtoan,ngaytao))*(phong.dongia/3600/24),2)) as tong FROM `hoadon`, `ct_hoadon`, `phong` WHERE hoadon.idhoadon = ct_hoadon.idhoadon and ct_hoadon.idphong = phong.idphong and datediff(CURDATE(),ngaythanhtoan) < 7';
                              $result = $conn->query($queryTotal);
                              $row = $result -> fetch_assoc();
                              echo number_format($row['tong']);
                              ?>
                              VNĐ
                              <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                        </div>
                        <!-- show 4 -->
                        <div class="js-show-statistical hidden flex-1 text-right md:text-center">
                           <h5 class="font-bold uppercase text-gray-600">Total Day</h5>
                           <h3 class="font-bold text-2xl">
                           <?php 
                              $queryTotal = 'SELECT sum(ROUND(TIME_TO_SEC(timediff(ngaythanhtoan,ngaytao))*(phong.dongia/3600/24),2)) as tong FROM `hoadon`, `ct_hoadon`, `phong` WHERE hoadon.idhoadon = ct_hoadon.idhoadon and ct_hoadon.idphong = phong.idphong and datediff(CURDATE(),ngaythanhtoan) < 1';
                              $result = $conn->query($queryTotal);
                              $row = $result -> fetch_assoc();
                              echo number_format($row['tong']);
                              ?>
                              VNĐ 
                              <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                        </div>
                     </div>
                  </div>
                  <!--/Metric Card-->
               </div>
               <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                  <!--Metric Card-->

                  <div style="display: flex;">
                              <div class="search-statistical js-search-statistical active">Total</div>
                              <div class="search-statistical js-search-statistical">Moth</div>
                              <div class="search-statistical js-search-statistical">Week</div>
                              <div class="search-statistical js-search-statistical">Day</div>
                     </div>

                  <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                     <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                           <div class="rounded-full p-5 bg-pink-600"><i class="fas fa-users fa-2x fa-inverse"></i>
                           </div>
                        </div>

                        <!-- show 5 -->
                        <div class="js-show-statistical flex-1 text-right md:text-center">
                           <h5 class="font-bold uppercase text-gray-600">Total Users</h5>
                           <h3 class="font-bold text-3xl">
                              <?php 
                              $query = $conn->query('SELECT * FROM taikhoan;');
                              echo mysqli_num_rows($query);
                              ?>
                           <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span></h3>
                        </div>

                        <!-- show 6 -->
                        <div class="js-show-statistical hidden flex-1 text-right md:text-center">
                           <h5 class="font-bold uppercase text-gray-600">Month Users</h5>
                           <h3 class="font-bold text-3xl">
                              <?php 
                              $query = $conn->query('SELECT * FROM `taikhoan` WHERE datediff(CURDATE(),ngaytao) < 30;');
                              echo mysqli_num_rows($query);
                              ?>
                           <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span></h3>
                        </div>

                        <!-- show 7 -->
                        <div class="js-show-statistical hidden flex-1 text-right md:text-center">
                           <h5 class="font-bold uppercase text-gray-600">Week Users</h5>
                           <h3 class="font-bold text-3xl">
                              <?php 
                              $query = $conn->query('SELECT * FROM `taikhoan` WHERE datediff(CURDATE(),ngaytao) < 7;');
                              echo mysqli_num_rows($query);
                              ?>
                           <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span></h3>
                        </div>

                        <!-- show 8 -->
                        <div class="js-show-statistical hidden flex-1 text-right md:text-center">
                           <h5 class="font-bold uppercase text-gray-600">Day Users</h5>
                           <h3 class="font-bold text-3xl">
                              <?php 
                              $query = $conn->query('SELECT * FROM `taikhoan` WHERE datediff(CURDATE(),ngaytao) < 1;');
                              echo mysqli_num_rows($query);
                              ?>
                           <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span></h3>
                        </div>
                     </div>
                  </div>
                  <!--/Metric Card-->
               </div>
               <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                  <!--Metric Card-->
                  <form action="" class="search-statistical" style="display: flex; background-color: #f3f4f6;" method="GET">
                        <!-- <input type="hidden" name="q" id="" value="statistical">
                        <input name="searchStatisRoom" class="search-statistical" style="width:300px ;" placeholder="search room"></input>
                        <button class="search-statistical" name="search">Search</button> -->
                  </form>

                  <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                     <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                           <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-user-plus fa-2x fa-inverse"></i>
                           </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                           
                           <h5 class="font-bold uppercase text-gray-600">Total Room</h5>
                           <h3 class="font-bold text-3xl"> 
                           <?php 
                              $query = $conn->query('SELECT * FROM phong ;');
                              echo mysqli_num_rows($query);
                           ?>
                           <span class="text-yellow-600"></span></h3>
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

                     <!-- thống kê theo tháng trong năm -->
                     <div class="p-5">
                        <canvas id="chartjs-7" class="chartjs" width="undefined" height="undefined"></canvas>
                        <?php
                        $arrayThang = '';
                        $arrayDanhthu ='';
                        $typeStatis='';
                        $queryStatis = 'SELECT DISTINCT DATE_FORMAT(ngaythanhtoan, "%Y") as thang, sum(ROUND(TIME_TO_SEC(timediff(ngaythanhtoan,ngaytao))*(phong.dongia/3600/24),2)) as danhthu 
                                          FROM `hoadon`, `ct_hoadon`, `phong` 
                                          WHERE hoadon.idhoadon = ct_hoadon.idhoadon and ct_hoadon.idphong = phong.idphong 
                                          GROUP by DATE_FORMAT(ngaythanhtoan, "%Y")
                                          ORDER BY ngaythanhtoan ASC';

                        if (isset($_GET['typeStatis'])){
                           $typeStatis=$_GET['typeStatis'];

                           if($typeStatis == 2)
                              $queryStatis = 'SELECT DISTINCT DATE_FORMAT(ngaythanhtoan, "%m/%Y") as thang, sum(ROUND(TIME_TO_SEC(timediff(ngaythanhtoan,ngaytao))*(phong.dongia/3600/24),2)) as danhthu 
                                             FROM `hoadon`, `ct_hoadon`, `phong` 
                                             WHERE hoadon.idhoadon = ct_hoadon.idhoadon and ct_hoadon.idphong = phong.idphong 
                                             GROUP by DATE_FORMAT(ngaythanhtoan, "%m/%Y")
                                             ORDER BY ngaythanhtoan ASC';
                           if($typeStatis == 3)
                              $queryStatis = 'SELECT DISTINCT DATE_FORMAT(ngaythanhtoan, "%d/%m/%Y") as thang, ROUND(TIME_TO_SEC(timediff(ngaythanhtoan,ngaytao))*(phong.dongia/3600/24),2) as danhthu 
                                             FROM `hoadon`, `ct_hoadon`, `phong` 
                                             WHERE hoadon.idhoadon = ct_hoadon.idhoadon and ct_hoadon.idphong = phong.idphong 
                                             GROUP by DATE_FORMAT(ngaythanhtoan, "%d/%m/%Y")
                                             ORDER BY ngaythanhtoan ASC';
                        } 
                        $result = $conn->query($queryStatis);
                        if($result)
                           while($row = $result->fetch_assoc()){
                              $arrayThang.= '"' .$row['thang'].'",' ;
                              $arrayDanhthu .= '"'.$row['danhthu'].'",' ;
                           }
                        ?>
                        <script>
                           new Chart(document.getElementById("chartjs-7"), {
                              "type": "bar",
                              "data": {
                                 "labels": [ <?php echo $arrayThang ?>],
                                 "datasets": [{
                                    "label": "Page Impressions",
                                    "data": [ <?php echo $arrayDanhthu  ?>],
                                    "borderColor": "rgb(255, 99, 132)",
                                    "backgroundColor": "rgba(255, 99, 132, 0.2)"
                                 }, {
                                    "label": "Adsense Clicks",
                                    "data": [<?php echo $arrayDanhthu  ?>],
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

                     <form action="" method="GET">
                        <input type="hidden" name="q" id="" value="statistical">

                        <label for="">Select item statistics: </label>
                        <input type="radio" name="typeStatis" id="5year" value="1" <?php echo $typeStatis==1?'checked':""; ?>>
                        <label for="5year">Year </label>

                        <input type="radio" name="typeStatis" id="12month" value="2" <?php echo $typeStatis==2?'checked':""; ?>>
                        <label for="12month">Month </label>

                        <input type="radio" name="typeStatis" id="30day" value="3" <?php echo $typeStatis==3?'checked':""; ?>>
                        <label for="30day">Day</label>

                        <input class="search-statistical" type="submit" name="statis" value="Statistical" id="">
                     </form>

                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
   <script type="text/javascript">
      var selectId = '';
      var action = '';

      function saveId(check, id) {
         if (check == 1) action = 'deleteAcount';
         else if (check == 2) action = 'deleteRoom';
         else action = 'deleteEmployee';
         selectId = id;
      }

      function deleteId() {
         $.post('../components/handle/delete.php', {
            'action': action,
            'id': selectId
         }, function(data) {
            location.reload()
         })
      }

      function saveIdEdit(check, id) {
         if (check == 1) action = 'editAcount';
         else if (check == 2) action = 'editRoom';
         else action = 'editEmployee';
         sessionStorage.setItem('idRoom' , id );
         location.reload();
      }



      function getLocation() {
         switch (action) {
            case 'deleteAcount':
               window.location.href = '../admin/adminHome.php?q=account';
               break;
            case 'deleteEmployee':
               window.location.href = '../admin/adminHome.php?q=employ';
               break;
            case 'deleteRoom':
               window.location.href = '../admin/adminHome.php?q=room';
               break;
         }
      }
   </script>

   <script>
      // *SHOW DATA BUTTON FROM SIDEBAR
      let buttonShowAccount = document.querySelector('.js-show-account')
      let buttonShowEmploy = document.querySelector('.js-show-employ')
      let buttonShowRoom = document.querySelector('.js-show-room')
      let buttonShowStatis = document.querySelector('.js-show-statis')

      function showDataAccount() {
         buttonShowAccount.classList.add('open')
      }

      function showDataEmploy() {
         buttonShowEmploy.classList.add('open')
      }

      function showDataRoom() {
         buttonShowRoom.classList.add('open')
      }

      function showDataStatis() {
         buttonShowStatis.classList.add('open')
      }

      function hideData() {
         buttonShowAccount.classList.remove('open')
         buttonShowStatis.classList.remove('open')
         buttonShowEmploy.classList.remove('open')
         buttonShowRoom.classList.remove('open')
      }

      <?php
      if (isset($_GET['q']) && !empty($_GET['q'])) {
         echo 'hideData();';
         if ($_GET['q'] == 'account') {
            echo 'showDataAccount();';
         } else
         if ($_GET['q'] == 'employ') {
            echo 'showDataEmploy();';
         } else
         if ($_GET['q'] == 'room') {
            echo 'showDataRoom();';
         } else {
            echo 'showDataStatis();';
         }
      }
      ?>
   </script>

   <script>
      if (window.history.replaceState) {
         window.history.replaceState(null, null, window.location.href);
      }
   </script>

   <!--Datatables -->
   <script src="./adminHome.js"></script>
   <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
</body>

</html>