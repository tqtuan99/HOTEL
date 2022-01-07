<?php
if (session_id() === "")
   session_start();

// if (isset($_SESSION['employee'])) {
// } else header('Location: ../../notFound.php');

if (isset($_SESSION['idUser']))
   $id = $_SESSION['idUser'];
else $id = "";

require_once("../components/handle/configDB.php");
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
   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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

         <div class="hidden w-full h-full bg-gray-800 bg-opacity-90 top-0 overflow-y-auto overflow-x-hidden fixed sticky-0 z-50" id="chec-div">
            <div class="w-full absolute z-10 right-0 h-full overflow-x-hidden transform translate-x-0 transition ease-in-out duration-700" id="notification">
               <div class="2xl:w-4/12 bg-gray-50 h-screen overflow-y-auto p-8 absolute right-0">
                  <div class="flex items-center justify-between">
                     <p tabindex="0" class="focus:outline-none text-2xl font-semibold leading-6 text-gray-800">Notifications</p>
                     <button role="button" aria-label="close modal" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 rounded-md cursor-pointer" onclick="notificationHandler(false)">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg1.svg" alt="icon" />
                     </button>
                  </div>
                  <?php
                  $time = '';
                  $queryRoom = 'SELECT Concat( khachhang.ho," ",khachhang.ten) as hoten, DATE_FORMAT( timediff(now(), ngaytao), "%H" ) as gio, DATE_FORMAT( timediff(now(), ngaytao), "%i" ) as phut, idhoadon, hoadon.trangthai, tenloaiphong, tenphong, ngaytao, ngaythanhtoan, dongia
                                       FROM (((hoadon 
                                                left JOIN khachhang on hoadon.idkh = khachhang.idkhachhang)
                                                left JOIN phong  on phong.idphong = hoadon.idphong)
                                                left JOIN loaiphong on loaiphong.idloaiphong = phong.idloaiphong)
                                       WHERE hoadon.trangthai = 2';
                  $result = $conn->query($queryRoom);
                  if ($result) {
                     while ($row = $result->fetch_assoc()) {
                        if ($row['gio'] <= 0) $time = $row['phut'] . ' minute ';
                        else $time = $row['gio'] . ' hours ';

                        echo '
                           <div class="w-full p-3 mt-8 bg-white rounded flex">
                     <div tabindex="0" aria-label="heart icon" role="img" class="focus:outline-none w-8 h-8 border rounded-full border-gray-200 flex items-center justify-center">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg2.svg" alt="icon" />

                     </div>
                     <div class="pl-3">
                        <p tabindex="0" class="focus:outline-none text-sm leading-none"><span class="text-indigo-700">' . $row['hoten'] . '</span> đã đặt phòng, vui lòng xác nhận <span class="text-indigo-700"><a href="?q=booking&name=' . $row['hoten'] . '">view</a></span></p>
                        <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">' . $time . ' ago</p>
                     </div>
                  </div>

                           ';
                     }
                  }
                  ?>
               </div>
            </div>
         </div>

         <?php
         $avatar = null;
         $name = null;
         $default = 'avtNull.png';
         if ($id) {
            $query = "SELECT * FROM nhanvien where idtaikhoan = '" . $id . "'";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
               // output data of each row
               $row = $result->fetch_assoc();
               $avatar = $row['avatar'] == "" ? $default : $row['avatar'];
               $name = $row["hotennv"];
            }
         }
         ?>
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
                     <a href="?q=detailRoom" class="js-show-data block py-1 md:py-3 lg:pl-3 align-middle text-white no-underline">
                        <i class="fas fa-tasks pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs lg:text-base text-white block md:inline-block font-bold lg:leading-loose">Room Detail</span>
                     </a>
                  </li>
                  <li class="flex-1 relative">
                     <a href="?q=customer" class="js-show-data block py-1 md:py-3 lg:pl-3 align-middle text-white no-underline">
                        <i class="fas fa-tasks pr-0 md:pr-3 text-white"></i><span class="pb-1 md:pb-0 text-xs lg:text-base text-white block md:inline-block font-bold lg:leading-loose">Info Customer</span>
                     </a>
                  </li>
                  <li class="flex-1 relative">
                     <a href="?q=payment" class="js-show-data block py-1 md:py-3 lg:pl-3 align-middle text-white no-underline">
                        <i class="fas fa-tasks pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs lg:text-base text-white block md:inline-block font-bold lg:leading-loose">Payment</span>
                     </a>
                  </li>
                  <li class="flex-1 relative">
                     <a href="?q=booking" class="js-show-data block py-1 md:py-3 lg:pl-3 align-middle text-white no-underline">
                        <i class="fas fa-tasks pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs lg:text-base text-white block md:inline-block font-bold lg:leading-loose">Booking</span>
                     </a>
                     <span style="margin-left: 6.3rem; margin-top: 0.15rem;" class="absolute inset-0 object-right-top w-4 h-4">
                        <div class="inline-flex items-center px-1.5 py-0.5 border-2 border-white rounded-full text-xs font-semibold leading-4 bg-red-500 text-white">
                           <?php
                           $query = 'SELECT COUNT(*) as soluong FROM hoadon where trangthai = 2';
                           $result = $conn->query($query);
                           if ($result) {
                              $row = $result->fetch_assoc();
                              echo $row['soluong'];
                           }
                           ?>
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
      <div class="js-show-payment payment lg:ml-52 w-full px-4 mt-4 overflow-hidden" data-aos="fade-left">
         <div class="rounded-tl-3xl rounded-tr-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white" data-aos="fade-down">
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
                                 Room Name
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
                                 Status
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Print
                              </th>
                           </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                           <?php
                           $status = '';
                           $queryRoom = 'SELECT Concat( khachhang.ho," ",khachhang.ten) as hoten, idhoadon, hoadon.trangthai, tenloaiphong, tenphong, ngaytao, ngaythanhtoan, dongia, ROUND(TIME_TO_SEC(timediff(ngaythanhtoan,ngaytao))*(phong.dongia/3600/24),2) as tongtien 
                                          FROM (((hoadon 
                                                   left JOIN khachhang on hoadon.idkh = khachhang.idkhachhang)
                                                   left JOIN phong  on phong.idphong = hoadon.idphong)
                                                   left JOIN loaiphong on loaiphong.idloaiphong = phong.idloaiphong)
                                          WHERE hoadon.trangthai <=1';
                           $result = $conn->query($queryRoom);
                           if ($result) {
                              while ($row = $result->fetch_assoc()) {
                                 if ($row['trangthai'] <= 2)
                                    $status = $row['trangthai'] == 1 ? 'Đã thanh toán' : 'Chưa thanh toán';
                                 else $status = 'Đã hủy';
                                 echo '
                                 <tr class="text-center whitespace-nowrap">
                                    <td class="w-28 px-6 py-4">
                                       <div class="text-sm text-gray-900 txt-over">' . $row['hoten'] . '</div>
                                    </td>
                                    <td class="w-28 px-6 py-4">
                                       <div class="text-sm text-gray-900">
                                       ' . $row['tenphong'] . '
                                       </div>
                                    </td>
                                    <td class="w-28 px-6 py-4">
                                       <div style="text-transform: capitalize;" class="text-sm text-gray-900">
                                       ' . $row['tenloaiphong'] . '
                                       </div>
                                    </td>
                                    <td class="w-28 px-6 py-4 text-sm text-gray-900">
                                       <div class="text-sm text-gray-900">
                                       ' . $row['ngaytao'] . '
                                       </div>
                                    </td>
                                     <td class="w-28 px-6 py-4 text-sm text-gray-900">
                                       <div class="text-sm text-gray-900">
                                       ' . $row['ngaythanhtoan'] . '
                                       </div>
                                    </td>
                                    <td class="w-28 px-6 py-4 text-sm text-gray-900">
                                       <div class="text-sm text-gray-900">
                                       ' . number_format($row['dongia']) . ' VNĐ/ngày
                                       </div>
                                    </td>
                                    <td class="w-28 px-6 py-4 text-sm text-gray-500">
                                       <div class="text-sm text-gray-900">
                                       ' . number_format($row['tongtien']) . ' VNĐ
                                       </div>
                                    </td>
                                    <td class="w-28 px-6 py-4 text-sm text-gray-500">
                                       <div class="text-sm text-gray-900">
                                       ' . $status . '
                                       </div>
                                    </td>
                                    <td class="w-28 px-6 py-4">
                                       <a href="./print.php?id=' . $row['idhoadon'] . '" target="_blank"  class="inline-block text-center px-6 bg-blue-500 rounded-lg">
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

      <!-- Start: Customer -->
      <div class="js-show-cus payment lg:ml-52 w-full px-4 mt-4 overflow-hidden" data-aos="fade-left">
         <div class="rounded-tl-3xl rounded-tr-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white" data-aos="fade-down">
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
                                 Full Name
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Avatar
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Gender
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Day of Birth
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 CIC
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Phone
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Email
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Nationality
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Edit
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Delete
                              </th>
                           </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                           <?php
                           $queryCus = 'SELECT Concat( khachhang.ho," ",khachhang.ten) as hoten, khachhang.* FROM khachhang';
                           $result = $conn->query($queryCus);
                           if ($result) {
                              while ($row = $result->fetch_assoc()) {
                                 $avatar = $row['avatar'] == '' ? 'avtNull.png' : $row['avatar'];
                                 echo '
                                 <tr class="text-center whitespace-nowrap">
                                    <td class="w-28 px-6 py-4">
                                       <div class="text-sm text-gray-900 txt-over">' . $row['hoten'] . '</div>
                                    </td>
                                    <td class="w-28 px-6 py-4">
                                       <div class="text-sm text-gray-900">
                                          <img class="h-10 w-10 m-auto" src="../photo/avatar/' . $avatar . '" alt="">
                                       </div>
                                    </td>
                                    <td class="w-28 px-6 py-4">
                                       <div style="text-transform: capitalize;" class="text-sm text-gray-900">
                                       ' . $row['gioitinh'] . '
                                       </div>
                                    </td>
                                    <td class="w-28 px-6 py-4 text-sm text-gray-900">
                                       <div class="text-sm text-gray-900">
                                       ' . $row['ngaysinh'] . '
                                       </div>
                                    </td>
                                     <td class="w-28 px-6 py-4 text-sm text-gray-900">
                                       <div class="text-sm text-gray-900">
                                       ' . $row['socccd'] . '
                                       </div>
                                    </td>
                                    <td class="w-28 px-6 py-4 text-sm text-gray-900">
                                       <div class="text-sm text-gray-900">
                                       ' . $row['sodienthoai'] . '
                                       </div>
                                    </td>
                                    <td class="w-28 px-6 py-4 text-sm text-gray-500">
                                       <div class="text-sm text-gray-900">
                                       ' . $row['email'] . '
                                       </div>
                                    </td>
                                    <td class="w-28 px-6 py-4 text-sm text-gray-500">
                                       <div class="text-sm text-gray-900">
                                       ' . $row['quoctich'] . '
                                       </div>
                                    </td>
                                    <td class="px-6 py-4">
                                    <a href="./handEditEmploy.php?idCustomer=' . $row['idkhachhang'] . '" class=" inline-block text-center">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                       </svg>
                                    </a>
                                 </td>
                                 <td class="px-6 py-4">
                                    <a href="#" class="open-modal inline-block text-center">
                                       <svg xmlns="http://www.w3.org/2000/svg" onclick="saveId(0, ' . $row['idkhachhang'] . ')" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
      <!-- End: Customer -->

      <!-- Start: Booking  -->
      <div class="js-show-booking payment lg:ml-52 w-full px-4 mt-4 overflow-hidden" data-aos="fade-left">
         <div class="rounded-tl-3xl rounded-tr-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white" data-aos="fade-down">
            <h3 class="font-bold pl-2">Booking</h3>
         </div>
         <div class="container mx-auto">
            <div class="flex flex-col">
               <div class="w-full">
                  <div class="p-2 lg:p-8 border-b border-gray-200 shadow">
                     <table class="dataTable divide-y divide-gray-300" id="dataTable">
                        <thead class="bg-black">
                           <tr>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Full Name
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Phone
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Email
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Name Room
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 CheckIn
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 CheckOut
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Agree
                              </th>
                              <th class="w-28 px-6 py-2 text-xs text-white">
                                 Disagree
                              </th>

                           </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                           <?php
                           $queryCus = 'SELECT Concat( khachhang.ho," ",khachhang.ten) as hoten, khachhang.*, hoadon.*, phong.* 
                                          FROM khachhang, phong, hoadon 
                                          WHERE khachhang.idkhachhang = hoadon.idkh and hoadon.idphong = phong.idphong and hoadon.trangthai=2';
                           $result = $conn->query($queryCus);
                           if ($result) {
                              while ($row = $result->fetch_assoc()) {
                                 echo '
                                 <tr class="text-center whitespace-nowrap">
                                    <td class="w-28 px-6 py-4">
                                       <div style="text-transform: capitalize;" class="text-sm text-gray-900 txt-over">' . $row['hoten'] . '</div>
                                    </td>
                                    <td class="w-28 px-6 py-4">
                                       <div class="text-sm text-gray-900">
                                          ' . $row['sodienthoai'] . '
                                       </div>
                                    </td>
                                    <td class="w-28 px-6 py-4">
                                       <div class="text-sm text-gray-900">
                                       ' . $row['email'] . '
                                       </div>
                                    </td>
                                    <td class="w-28 px-6 py-4 text-sm text-gray-900">
                                       <div class="text-sm text-gray-900">
                                       ' . $row['tenphong'] . '
                                       </div>
                                    </td>
                                     <td class="w-28 px-6 py-4 text-sm text-gray-900">
                                       <div class="text-sm text-gray-900">
                                       ' . $row['ngaytao'] . '
                                       </div>
                                    </td>
                                    <td class="w-28 px-6 py-4 text-sm text-gray-900">
                                       <div class="text-sm text-gray-900">
                                       ' . $row['ngaythanhtoan'] . '
                                       </div>
                                    </td>
                                    <td class="px-6 py-4">
                                    <a href="?q=booking&action=agree&id=' . $row['idhoadon'] . '&idr=' . $row['idphong'] . '" class=" inline-block text-center">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                       <path fill="none" d="M7.197,16.963H7.195c-0.204,0-0.399-0.083-0.544-0.227l-6.039-6.082c-0.3-0.302-0.297-0.788,0.003-1.087
                                                            C0.919,9.266,1.404,9.269,1.702,9.57l5.495,5.536L18.221,4.083c0.301-0.301,0.787-0.301,1.087,0c0.301,0.3,0.301,0.787,0,1.087
                                                            L7.741,16.738C7.596,16.882,7.401,16.963,7.197,16.963z"></path>
                                       </svg>
                                    </a>
                                 </td>
                                 <td class="px-6 py-4">
                                    <a href="?q=booking&action=disagree&id=' . $row['idhoadon'] . '" class="open-modal inline-block text-center">
                                       <svg xmlns="http://www.w3.org/2000/svg" onclick="return confirm("Are you sure you want to cancel this reservation?");" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
      <!-- End: Booking  -->
      <?php
      include('./actionAgree.php');
      ?>
      <!-- Start: ROOM DETAIL -->
      <div class="js-show-room-detail room-detail lg:ml-52 w-full px-4 mt-4 h-full overflow-hidden">
         <div class="flex flex-col gap-4">
            <?php
            $type = '';
            if (isset($_GET['typeRoom'])) $type = $_GET['typeRoom'];
            ?>
            <div data-aos="fade-down">
               <label for="" class="">Type Room</label>
               <div class="flex relative w-64">
                  <select form="detailRoom" name="typeRoom" class="appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                     <option value="standard" <?php if ($type == 'standard') echo 'selected' ?>><a href="">Standard</a></option>
                     <option value="superior" <?php if ($type == 'superior') echo 'selected' ?>>Superior</option>
                     <option value="deluxe" <?php if ($type == 'deluxe') echo 'selected' ?>>Deluxe</option>
                     <option value="suite" <?php if ($type == 'suite') echo 'selected' ?>>Suite</option>
                     <option value="all" <?php if ($type == 'all' || $type == '') echo 'selected' ?>>All</option>
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                     <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                     </svg>
                  </div>
               </div>
            </div>

            <form method="GET" action="#" class="flex flex-col" id="detailRoom">
               <input type="hidden" name="q" value="detailRoom">
               <label for="" data-aos="fade-right">Status Room </label>
               <div class="flex justify-between items-center gap-3 flex-wrap mt-4">
                  <button name="typeSubmit" value="0" class="relative bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" data-aos="fade-right">
                     All
                     <span class="absolute inset-0 object-right-top -mt-3 -mr-14">
                        <div class="inline-flex items-center px-1.5 py-0.5 border-2 border-white rounded-full text-xs font-semibold leading-4 bg-red-500 text-white">
                           <?php
                           $query = 'SELECT COUNT(*) as soluong FROM phong ';
                           $result = $conn->query($query);
                           if ($result) {
                              $row = $result->fetch_assoc();
                              echo $row['soluong'];
                           }

                           ?>
                        </div>
                     </span>
                  </button>
                  <button name="typeSubmit" value="1" class="relative bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" data-aos="fade-right">
                     Đã đặt
                     <span class="absolute inset-0 object-right-top -mt-3 -mr-20">
                        <div class="inline-flex items-center px-1.5 py-0.5 border-2 border-white rounded-full text-xs font-semibold leading-4 bg-red-500 text-white">
                           <?php
                           $query = 'SELECT COUNT(*) as soluong FROM phong where trangthai = 2';
                           $result = $conn->query($query);
                           if ($result) {
                              $row = $result->fetch_assoc();
                              echo $row['soluong'];
                           }
                           ?>
                        </div>
                     </span>
                  </button>
                  <button name="typeSubmit" value="2" class="relative bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" data-aos="fade-right">
                     Đang ở
                     <span class="absolute inset-0 object-right-top -mt-3 -mr-20">
                        <div class="inline-flex items-center px-1.5 py-0.5 border-2 border-white rounded-full text-xs font-semibold leading-4 bg-red-500 text-white">
                           <?php
                           $query = 'SELECT COUNT(*) as soluong FROM phong where trangthai = 1';
                           $result = $conn->query($query);
                           if ($result) {
                              $row = $result->fetch_assoc();
                              echo $row['soluong'];
                           }

                           ?>
                        </div>
                     </span>
                  </button>
                  <button name="typeSubmit" value="3" class="relative bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" data-aos="fade-left">
                     chuẩn bị rời
                     <span class="absolute inset-0 object-right-top -mt-3 -mr-32">
                        <div class="inline-flex items-center px-1.5 py-0.5 border-2 border-white rounded-full text-xs font-semibold leading-4 bg-red-500 text-white">
                           <?php
                           $query = 'SELECT DISTINCT COUNT(*) as soluong
                                       FROM `hoadon`, `ct_hoadon`, `phong` 
                                       WHERE hoadon.idhoadon = ct_hoadon.idhoadon and ct_hoadon.idphong = phong.idphong 
                                             and datediff(CURDATE(),ngaytao) <= 1';
                           $result = $conn->query($query);
                           if ($result) {
                              $row = $result->fetch_assoc();
                              echo $row['soluong'];
                           } else echo '0';

                           ?>
                        </div>
                     </span>
                  </button>
                  <button name="typeSubmit" value="4" class="relative bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" data-aos="fade-left">
                     phòng trống
                     <span class="absolute inset-0 object-right-top -mt-3 -mr-32">
                        <div class="inline-flex items-center px-1.5 py-0.5 border-2 border-white rounded-full text-xs font-semibold leading-4 bg-red-500 text-white">
                           <?php
                           $query = 'SELECT COUNT(*) as soluong FROM phong where trangthai = 0';
                           $result = $conn->query($query);
                           if ($result) {
                              $row = $result->fetch_assoc();
                              echo $row['soluong'];
                           }

                           ?>
                        </div>
                     </span>
                  </button>
                  <button name="typeSubmit" value="5" class="relative bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" data-aos="fade-left">
                     Phòng đang sữa
                     <span class="absolute inset-0 object-right-top -mt-3 -mr-40">
                        <div class="inline-flex items-center px-1.5 py-0.5 border-2 border-white rounded-full text-xs font-semibold leading-4 bg-red-500 text-white">
                           <?php
                           $query = 'SELECT COUNT(*) as soluong FROM phong where trangthai = 3';
                           $result = $conn->query($query);
                           if ($result) {
                              $row = $result->fetch_assoc();
                              echo $row['soluong'];
                           }

                           ?>
                        </div>
                     </span>
                  </button>
               </div>
            </form>
            <div class="flex gap-y-4 flex-wrap -ml-4" data-aos="fade-up">
               <?php
               include('./viewRoom.php');
               ?>
            </div>
         </div>
      </div>
      <!-- End: ROOM DETAIL -->
   </div>
   <script src="./employee.js"></script>
   <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

   <script>
      var elementShowDetailRoom = document.querySelector('.js-show-room-detail');
      var elementShowPayment = document.querySelector('.js-show-payment');
      var elementShowBooking = document.querySelector('.js-show-booking');
      var elementShowCus = document.querySelector('.js-show-cus');
      let list = document.querySelectorAll('.sidebar li');


      function showDetailRoom() {
         elementShowDetailRoom.style.display = 'block';
      }

      function showPayment() {
         elementShowPayment.style.display = 'block';
      }

      function showBooking() {
         elementShowBooking.style.display = 'block';
      }

      function showCustomer() {
         elementShowCus.style.display = 'block';
      }

      <?php
      if (isset($_GET['q'])) {
         if ($_GET['q'] == 'detailRoom')
            echo '
               list[0].classList.add("hovered");
               showDetailRoom();
               ';
         else if ($_GET['q'] == 'payment')
            echo '
               list[2].classList.add("hovered");
               showPayment();';
         else if ($_GET['q'] == 'booking')
            echo '
               list[3].classList.add("hovered");
               showBooking();';
         else if ($_GET['q'] == 'customer')
            echo '
               list[1].classList.add("hovered");
               showCustomer();';
         else
            echo '
               list[4].classList.add("hovered");
               showDetailRoom();';
      }

      ?>
   </script>

   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
   <script>
      AOS.init({
         duration: 1500
      });
   </script>
</body>

</html>