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
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../output.css">
   <link rel="stylesheet" href="./employee.css">
   <link rel="stylesheet" href="/../HOTEL/assets/font/fontawesome-free-5.15.4-web/css/all.min.css">
   <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">

   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js">
   </script>
   <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
   <title>Document</title>
</head>

<body>
   <!--Nav-->
   <nav class="contents bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">
      <div class="flex items-end justify-between">
         <div class="flex flex-shrink md:w-1/2 justify-center md:justify-start text-white">
            <a href="#">
               <span class="text-3xl pl-2 text-green-600 font-extrabold">
                  <span class="">ANGLE</span>
               </span>
            </a>
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

         <div class="hidden w-full h-full bg-gray-800 bg-opacity-90 top-0 overflow-y-auto overflow-x-hidden fixed sticky-0 z-50" id="chec-div">
            <div class="w-full absolute z-10 right-0 h-full overflow-x-hidden transform translate-x-0 transition ease-in-out duration-700" id="notification">
               <div class="2xl:w-4/12 bg-gray-50 h-screen overflow-y-auto p-8 absolute right-0">
                  <div class="flex items-center justify-between">
                     <p tabindex="0" class="focus:outline-none text-2xl font-semibold leading-6 text-gray-800">Notifications</p>
                     <button role="button" aria-label="close modal" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 rounded-md cursor-pointer" onclick="notificationHandler(false)">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg1.svg" alt="icon" />
                     </button>
                  </div>

                  <div class="w-full p-3 mt-8 bg-white rounded flex">
                     <div tabindex="0" aria-label="heart icon" role="img" class="focus:outline-none w-8 h-8 border rounded-full border-gray-200 flex items-center justify-center">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg2.svg" alt="icon" />

                     </div>
                     <div class="pl-3">
                        <p tabindex="0" class="focus:outline-none text-sm leading-none"><span class="text-indigo-700">James Doe</span> đã đặt phòng, vui lòng xác nhận <span class="text-indigo-700">view</span></p>
                        <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">2 hours ago</p>
                     </div>
                  </div>
                  <div class="w-full p-3 mt-4 bg-white rounded shadow flex flex-shrink-0">
                     <div tabindex="0" aria-label="group icon" role="img" class="focus:outline-none w-8 h-8 border rounded-full border-gray-200 flex flex-shrink-0 items-center justify-center">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg3.svg" alt="icon" />
                     </div>
                     <div class="pl-3 w-full">
                        <div class="flex items-center justify-between w-full">
                           <p tabindex="0" class="focus:outline-none text-sm leading-none"><span class="text-indigo-700">Sash</span> added you to the group: <span class="text-indigo-700">UX Designers</span></p>
                           <div tabindex="0" aria-label="close icon" role="button" class="focus:outline-none cursor-pointer">
                              <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg4.svg" alt="icon" />

                           </div>
                        </div>
                        <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">2 hours ago</p>
                     </div>
                  </div>
                  <div class="w-full p-3 mt-4 bg-white rounded flex">
                     <div tabindex="0" aria-label="loading icon" role="img" class="focus:outline-none w-8 h-8 border rounded-full border-gray-200 flex items-center justify-center">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg7.svg" alt="icon" />

                     </div>
                     <div class="pl-3">
                        <p tabindex="0" class="focus:outline-none text-sm leading-none">Shipmet delayed for order<span class="text-indigo-700"> #25551</span></p>
                        <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">2 hours ago</p>
                     </div>
                  </div>
                  <h2 tabindex="0" class="focus:outline-none text-sm leading-normal pt-8 border-b pb-2 border-gray-300 text-gray-600">YESTERDAY</h2>
                  <div class="w-full p-3 mt-6 bg-white rounded flex">
                     <div tabindex="0" aria-label="post icon" role="img" class="focus:outline-none w-8 h-8 border rounded-full border-gray-200 flex items-center justify-center">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg8.svg" alt="icon" />

                     </div>
                     <div class="pl-3">
                        <p tabindex="0" class="focus:outline-none text-sm leading-none"><span class="text-indigo-700">Sarah</span> đã bình luận về phòng</p>
                        <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">2 hours ago</p>
                     </div>
                  </div>
                  <div class="w-full p-3 mt-4 bg-white rounded flex">
                     <div tabindex="0" aria-label="loading icon" role="img" class="focus:outline-none w-8 h-8 border rounded-full border-gray-200 flex items-center justify-center">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg9.svg" alt="icon" />

                     </div>
                     <div class="pl-3">
                        <p tabindex="0" class="focus:outline-none text-sm leading-none">Shipmet delayed for order<span class="text-indigo-700"> #25551</span></p>
                        <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">2 hours ago</p>
                     </div>
                  </div>
                  <div class="w-full p-3 mt-4 bg-white rounded flex">
                     <div tabindex="0" aria-label="heart icon" role="img" class="focus:outline-none w-8 h-8 border rounded-full border-gray-200 flex items-center justify-center">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg10.svg" alt="icon" />

                     </div>
                     <div class="pl-3">
                        <p tabindex="0" class="focus:outline-none text-sm leading-none"><span class="text-indigo-700">James Doe</span> đã đánh giá phòng <span class="text-indigo-700">view</span></p>
                        <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">2 hours ago</p>
                     </div>
                  </div>
                  <div class="w-full p-3 mt-8 bg-green-100 rounded flex items-center">
                     <div tabindex="0" aria-label="success icon" role="img" class="focus:outline-none w-8 h-8 border rounded-full border-green-200 flex flex-shrink-0 items-center justify-center">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg11.svg" alt="icon" />
                     </div>
                     <div class="pl-3 w-full">
                        <div class="flex items-center justify-between">
                           <p tabindex="0" class="focus:outline-none text-sm leading-none text-green-700">Design sprint completed</p>
                           <p tabindex="0" class="focus:outline-none focus:text-indigo-600 text-xs leading-3 underline cursor-pointer text-green-700">View</p>
                        </div>
                     </div>
                  </div>
                  <div class="flex items-center justiyf-between">
                     <hr class="w-full">
                     <p tabindex="0" class="focus:outline-none text-sm flex flex-shrink-0 leading-normal px-3 py-16 text-gray-500">Thats it for now :)</p>
                     <hr class="w-full">
                  </div>
               </div>
            </div>
         </div>

         <div class="flex gap-4">
            <div>
               <div class="relative cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800" onclick="notificationHandler(false)">
                  <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/header-1-svg2.svg" alt="chat" />
                  <div class="animate-ping w-1.5 h-1.5 bg-indigo-700 rounded-full absolute -top-1 -right-1 m-auto duration-200"></div>
                  <div class=" w-1.5 h-1.5 bg-indigo-700 rounded-full absolute -top-1 -right-1 m-auto shadow-lg"></div>
               </div>
            </div>
            <div class="">
               <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                  <li class="flex-1 md:flex-none md:mr-3">
                     <div class="relative inline-block">
                        <button onclick="toggleDD('myDropdown')" class="drop-button text-black focus:outline-none"> <span class="pr-2"><img src="../photo/avatar/<?php echo $avatar ?>" class="em rounded-xl"></img></span> <?php echo $name ?><svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                              <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                           </svg>
                        </button>
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
      </div>
   </nav>
   <!-- END: NAV -->

   <!-- Start: SIDEBAR -->
   <div class="block lg:flex">
      <div class="sidebar flex flex-col lg:flex-row mx-4">
         <div class="sidebar-content z-50 shadow-xl h-16 fixed bottom-0 mt-12 lg:h-screen z-10 w-full lg:w-60 left-0">
            <a href="#" class="hidden lg:block mt-2  ml-5">
               <span class="text-3xl text-white font-extrabold">
                  <span class="">ANGLE</span>
               </span>
            </a>
            <div class="lg:mt-12 lg:w-60 lg:fixed lg:left-0 lg:top-0 content-center lg:content-start text-left justify-between">
               <ul class="list-reset lg:pt-7 flex flex-row lg:flex-col py-0 lg:py-4 md:pl-2 text-center lg:text-left overflow-hidden">
                  <li class="flex-1 relative">
                     <a href="?q=room" class="js-show-data block py-1 md:py-3 lg:pl-3 align-middle text-white no-underline">
                        <i class="fas fa-tasks pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs lg:text-base text-white block md:inline-block font-bold lg:leading-loose">Room Detail</span>
                     </a>
                  </li>
                  <li class="flex-1 relative">
                     <a href="?q=account" class="js-show-data block py-1 md:py-3 lg:pl-3 align-middle text-white no-underline">
                        <i class="fas fa-tasks pr-0 md:pr-3 text-white"></i><span class="pb-1 md:pb-0 text-xs lg:text-base text-white block md:inline-block font-bold lg:leading-loose">Info Customer</span>
                     </a>
                  </li>
                  <li class="flex-1 relative">
                     <a href="?q=room" class="js-show-data block py-1 md:py-3 lg:pl-3 align-middle text-white no-underline">
                        <i class="fas fa-tasks pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs lg:text-base text-white block md:inline-block font-bold lg:leading-loose">Payment</span>
                     </a>
                  </li>
                  <li class="flex-1 relative">
                     <a href="?q=room" class="js-show-data block py-1 md:py-3 lg:pl-3 align-middle text-white no-underline">
                        <i class="fas fa-tasks pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs lg:text-base text-white block md:inline-block font-bold lg:leading-loose">Booking</span>
                     </a>
                     <span  style="margin-left: 6.3rem; margin-top: 0.15rem;" class="absolute inset-0 object-right-top">
                        <div class="inline-flex items-center px-1.5 py-0.5 border-2 border-white rounded-full text-xs font-semibold leading-4 bg-red-500 text-white">
                           9
                        </div>
                     </span>
                  </li>
                  <li class="flex-1 relative">
                     <a href="../../logout.php" class="js-show-data block py-1 md:py-3 pl-0 lg:pl-3 align-middle text-white no-underline">
                        <i class="fa fa-wallet pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs lg:text-base text-white block md:inline-block font-bold lg:leading-loose">Log Out</span>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <!-- End: SIDEBAR -->

      <!-- Start: PAYMENT -->
      <div class="js-show-payment payment lg:ml-52 w-full px-4 mt-4 overflow-hidden">
         <div class="rounded-tl-3xl rounded-tr-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2">Payment Details</h3>
         </div>
         <div class="container mx-auto">
            <div class="flex flex-col">
               <div class="w-full">
                  <div class="p-2 lg:p-8 border-b border-gray-200 shadow">
                     <table class="dataTable divide-y divide-gray-300" id="dataTable">
                        <thead class="bg-black">
                           <tr>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Name
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Room Type
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Bed Type
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Check In
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Check Out
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Room Rent
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Gr.Total
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Print
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
                                    <td class="w-28 px-6 py-4">
                                       <div class="text-sm text-gray-900 txt-over">' . $row['tendangnhap'] . '</div>
                                    </td>
                                    <td class="w-28 px-6 py-4">
                                       <div class="text-sm text-gray-900">
                                       ' . $typeAccount . '
                                       </div>
                                    </td>
                                    <td class="w-28 px-6 py-4">
                                       <div class="text-sm text-gray-900">
                                       ' . $row['ngaytao'] . '
                                       </div>
                                    </td>
                                    <td class="w-28 px-6 py-4 text-sm text-gray-500">
                                       <div class="text-sm font-bold ' . $color . '">
                                       ' . $status . '
                                       </div>
                                    </td>
                                     <td class="w-28 px-6 py-4 text-sm text-gray-500">
                                       <div class="text-sm font-bold ' . $color . '">
                                       ' . $status . '
                                       </div>
                                    </td>
                                    <td class="w-28 px-6 py-4 text-sm text-gray-500">
                                       <div class="text-sm font-bold ' . $color . '">
                                       ' . $status . '
                                       </div>
                                    </td>
                                    <td class="w-28 px-6 py-4 text-sm text-gray-500">
                                       <div class="text-sm font-bold ' . $color . '">
                                       ' . $status . '
                                       </div>
                                    </td>
                                    <td class="w-28 px-6 py-4">
                                       <a href="#"  class="inline-block text-center px-6 bg-blue-500 rounded-lg">
                                          <i class="fas fa-print">Print</i>
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
      <!-- End: PAYMENT -->

      <!-- Start: ROOM DETAIL -->
      <div class="js-show-room-detail room-detail lg:ml-52 w-full px-4 mt-4 overflow-hidden">
         <div class="flex flex-col gap-4">
            <div>
               <label for="" class="">Type Room</label>
               <div class="relative w-64">
                  <select class="appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                     <option value="standard">Standard</option>
                     <option value="superior">Superior</option>
                     <option value="deluxe">Deluxe</option>
                     <option value="suite">Suite</option>
                     <option value="all" selected>All</option>
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                     <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                     </svg>
                  </div>
               </div>
            </div>

            <div class="flex flex-col">
               <label for="">Status Room </label>
               <div class="flex justify-between items-center gap-3 flex-wrap mt-4">
                  <button class="relative bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                     All
                     <span class="absolute inset-0 object-right-top -mt-3 -mr-14">
                        <div class="inline-flex items-center px-1.5 py-0.5 border-2 border-white rounded-full text-xs font-semibold leading-4 bg-red-500 text-white">
                           6
                        </div>
                     </span>
                  </button>
                  <button class="relative bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                     Chuẩn bị đến
                     <span class="absolute inset-0 object-right-top -mt-3 -mr-32">
                        <div class="inline-flex items-center px-1.5 py-0.5 border-2 border-white rounded-full text-xs font-semibold leading-4 bg-red-500 text-white">
                           7
                        </div>
                     </span>
                  </button>
                  <button class="relative bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                     Đang ở
                     <span class="absolute inset-0 object-right-top -mt-3 -mr-20">
                        <div class="inline-flex items-center px-1.5 py-0.5 border-2 border-white rounded-full text-xs font-semibold leading-4 bg-red-500 text-white">
                           8
                        </div>
                     </span>
                  </button>
                  <button class="relative bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                     chuẩn bị rời
                     <span class="absolute inset-0 object-right-top -mt-3 -mr-32">
                        <div class="inline-flex items-center px-1.5 py-0.5 border-2 border-white rounded-full text-xs font-semibold leading-4 bg-red-500 text-white">
                           9
                        </div>
                     </span>
                  </button>
                  <button class="relative bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                     phòng trống
                     <span class="absolute inset-0 object-right-top -mt-3 -mr-32">
                        <div class="inline-flex items-center px-1.5 py-0.5 border-2 border-white rounded-full text-xs font-semibold leading-4 bg-red-500 text-white">
                           10
                        </div>
                     </span>
                  </button>
                  <button class="relative bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                     Phòng đang sữa
                     <span class="absolute inset-0 object-right-top -mt-3 -mr-40">
                        <div class="inline-flex items-center px-1.5 py-0.5 border-2 border-white rounded-full text-xs font-semibold leading-4 bg-red-500 text-white">
                           11
                        </div>
                     </span>
                  </button>
               </div>
            </div>
            <div class="flex gap-y-4 flex-wrap -ml-4">
               <div class="room bg-blue-400 px-5 flex flex-col justify-between">
                  <img src="../image/hotel-room.png" alt="">
                  <h3 class="text-center p-4">VIP</h3>
               </div>
               <div class="room bg-blue-400 px-5 flex flex-col justify-between">
                  <img src="../image/hotel-room.png" alt="">
                  <h3 class="text-center p-4">VIP</h3>
               </div>
               <div class="room bg-blue-400 px-5 flex flex-col justify-between">
                  <img src="../image/hotel-room.png" alt="">
                  <h3 class="text-center p-4">VIP</h3>
               </div>
               <div class="room bg-blue-400 px-5 flex flex-col justify-between">
                  <img src="../image/hotel-room.png" alt="">
                  <h3 class="text-center p-4">VIP</h3>
               </div>
               <div class="room bg-blue-400 px-5 flex flex-col justify-between">
                  <img src="../image/hotel-room.png" alt="">
                  <h3 class="text-center p-4">VIP</h3>
               </div>
               <div class="room bg-blue-400 px-5 flex flex-col justify-between">
                  <img src="../image/hotel-room.png" alt="">
                  <h3 class="text-center p-4">VIP</h3>
               </div>
            </div>
         </div>
      </div>
      <!-- End: ROOM DETAIL -->
   </div>
   <script src="./employee.js"></script>
   <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
</body>

</html>