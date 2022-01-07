<?php
if (session_id() === "")
   session_start();

if (isset($_SESSION['idUser']))
   $id = $_SESSION['idUser'];
else $id = "";

$idRoom = '';
if (isset($_GET['idRoom']))
   $idRoom = $_GET['idRoom'];

require_once("../handle/dbcontroller.php");
require_once("../handle/configDB.php");
$db_handle = new DBController();


$query = 'SELECT Concat( khachhang.ho," ",khachhang.ten) as hoten, count(idcomment) as soluong, phong.*, phanhoi.*, khachhang.* FROM PHONG, PHANHOI, khachhang WHERE PHONG.idphong = phanhoi.idphong and khachhang.idkhachhang = phanhoi.idkhachhang and phong.idphong = ' . $idRoom;
$query5sao = 'SELECT count(idcomment) as sao5, phong.*, phanhoi.* FROM PHONG, PHANHOI WHERE PHONG.idphong = phanhoi.idphong and sosao = 5 and phong.idphong = ' . $idRoom;
$query4sao = 'SELECT count(idcomment) as sao4, phong.*, phanhoi.* FROM PHONG, PHANHOI WHERE PHONG.idphong = phanhoi.idphong and sosao = 4 and phong.idphong = ' . $idRoom;
$query3sao = 'SELECT count(idcomment) as sao3, phong.*, phanhoi.* FROM PHONG, PHANHOI WHERE PHONG.idphong = phanhoi.idphong and sosao = 3 and phong.idphong = ' . $idRoom;
$query2sao = 'SELECT count(idcomment) as sao2, phong.*, phanhoi.* FROM PHONG, PHANHOI WHERE PHONG.idphong = phanhoi.idphong and sosao = 2 and phong.idphong = ' . $idRoom;
$query1sao = 'SELECT count(idcomment) as sao1, phong.*, phanhoi.* FROM PHONG, PHANHOI WHERE PHONG.idphong = phanhoi.idphong and sosao = 1 and phong.idphong = ' . $idRoom;

$result = $conn->query($query);
if ($result)
   $rowR = $result->fetch_assoc();
$tongsao = $rowR['soluong'];

$result = $conn->query($query5sao);
$row5sao = $result->fetch_assoc();
$sao5 = $row5sao['sao5'];

$result = $conn->query($query4sao);
$row4sao = $result->fetch_assoc();
$sao4 = $row4sao['sao4'];


$result = $conn->query($query3sao);
$row3sao = $result->fetch_assoc();
$sao3 = $row3sao['sao3'];


$result = $conn->query($query2sao);
$row2sao = $result->fetch_assoc();
$sao2 = $row2sao['sao2'];


$result = $conn->query($query1sao);
$row1sao = $result->fetch_assoc();
$sao1 = $row1sao['sao1'];

$avgStar = number_format(((5 * $sao5 + 4 * $sao4 + 3 * $sao3 + 2 * $sao2 + 1 * $sao1) / $tongsao), 2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../../output.css">
   <link rel="stylesheet" href="../home/header/header.css">
   <link rel="stylesheet" href="../home/footer/footer.css">
   <link rel="stylesheet" href="./roomdetail.css">
   <link rel="stylesheet" href="../../font/fontawesome-free-5.15.4-web/css/all.min.css">
   <title>Document</title>
</head>

<body>
   <?php
   include('../home/header/header.php');
   ?>

   <div class="m-auto bg-gray-100 mt-7">
      <div class="flex flex-col max-w-screen-lg m-auto bg-white">
         <div class="flex flex-col m-10 p-4 gap-y-4 bg-white shadow-2xl rounded-b-full">
            <div class="flex justify-between items-start">
               <div>
                  <h3 class="text-3xl font-bold text-blue-600">ANGLE HOTEL</h3>
                  <span class="italic text-gray-300">
                     <i class="fas fa-map-marker-alt mr-1"></i>56 Nguyen Thuat, Cam Le, Da Nang
                  </span>
               </div>
               <svg class="w-10 h-10 -mt-2 text-red-600" viewBox="0 0 20 20">
                  <path d="M13.22,2.984c-1.125,0-2.504,0.377-3.53,1.182C8.756,3.441,7.502,2.984,6.28,2.984c-2.6,0-4.714,2.116-4.714,4.716c0,0.32,0.032,0.644,0.098,0.96c0.799,4.202,6.781,7.792,7.46,8.188c0.193,0.111,0.41,0.168,0.627,0.168c0.187,0,0.376-0.041,0.55-0.127c0.011-0.006,1.349-0.689,2.91-1.865c0.021-0.016,0.043-0.031,0.061-0.043c0.021-0.016,0.045-0.033,0.064-0.053c3.012-2.309,4.6-4.805,4.6-7.229C17.935,5.1,15.819,2.984,13.22,2.984z M12.544,13.966c-0.004,0.004-0.018,0.014-0.021,0.018s-0.018,0.012-0.023,0.016c-1.423,1.076-2.674,1.734-2.749,1.771c0,0-6.146-3.576-6.866-7.363C2.837,8.178,2.811,7.942,2.811,7.7c0-1.917,1.554-3.47,3.469-3.47c1.302,0,2.836,0.736,3.431,1.794c0.577-1.121,2.161-1.794,3.509-1.794c1.914,0,3.469,1.553,3.469,3.47C16.688,10.249,14.474,12.495,12.544,13.966z"></path>
               </svg>
            </div>
            <hr>
            <div class="w-full">
               <div class="text-xl font-bold text-yellow-400">
                  <?php
                  echo $rowR['tenphong']
                  ?>
                  <!-- <span>(in sao)</span> -->
               </div>
               <div class="detail-view rounded-2xl" style="background-image: url(../../photo/room/<?php echo $rowR['anh']; ?>); background-repeat: no-repeat; background-size: cover;">
               </div>
            </div>
            <form class="flex justify-between shadow py-4 rounded rounded-lg">
               <div class="flex my-auto">
                  <div class="flex">
                     <div class="flex flex-col mr-20">
                        <label for="" class="font-bold text-lg">Check In</label>
                        <input type="datetime-local" name="" id="" required class="rounded-md border bg-green-600 p-2">
                     </div>
                     <div class="flex flex-col">
                        <label for="" class="font-bold text-lg">Check Out</label>
                        <input type="datetime-local" name="" id="" required class="rounded-md border bg-green-600 p-2">
                     </div>
                  </div>
               </div>
               <div class="flex flex-col gap-y-2">
                  <p class="font-bold text-gray-600">Giá phòng mỗi đêm từ</p>
                  <span class="block text-3xl text-yellow-400 text-center"><?php echo number_format($rowR['dongia']); ?> VNĐ</span>
                  <input type="hidden" name="idRoom" value="<?php echo $idRoom ?>">
                  <button name="book" class="bg-blue-400 p-3 rounded-xl">ĐẶT NGAY</button>
               </div>
            </form>
         </div>

         <div class="m-10 p-4 bg-white shadow-2xl rounded-full">
            <h3 class="text-xl text-center border-blue-200 border-b-4 uppercase text-purple-500">Reviews of Angle Hotel from real guests</h3>
            <div class="flex justify-between gap-x-5 mt-5">
               <div class="flex-1 px-4 py-4 rounded-lg shadow">
                  <div class="px-4 py-4 mb-1 tracking-wide">
                     <h2 class="mt-1 font-semibold text-gray-800">500 Users reviews</h2>
                     <div class="px-8 pb-3 -mx-8 border-b">
                        <div class="flex items-center mt-1">
                           <div class="w-3/12 tracking-tighter text-gray-500">
                              <span>Cleanliness</span>
                           </div>
                           <div class="w-8/12">
                              <div class="w-full h-2 bg-gray-300 rounded-lg">
                                 <div class="w-7/12 h-2 bg-green-600 rounded-lg"></div>
                              </div>
                           </div>
                           <div class="w-1/12 pl-3 text-gray-700">
                              <span class="text-sm">51%</span>
                           </div>
                        </div>
                        <div class="flex items-center mt-1">
                           <div class="w-3/12 tracking-tighter text-gray-500">
                              <span>Location</span>
                           </div>
                           <div class="w-8/12">
                              <div class="w-full h-2 bg-gray-300 rounded-lg">
                                 <div class="w-1/5 h-2 bg-green-600 rounded-lg"></div>
                              </div>
                           </div>
                           <div class="w-1/12 pl-3 text-gray-700">
                              <span class="text-sm">17%</span>
                           </div>
                        </div>
                        <div class="flex items-center mt-1">
                           <div class="w-3/12 tracking-tighter text-gray-500">
                              <span>Service</span>
                           </div>
                           <div class="w-8/12">
                              <div class="w-full h-2 bg-gray-300 rounded-lg">
                                 <div class="w-3/12 h-2 bg-green-600 rounded-lg"></div>
                              </div>
                           </div>
                           <div class="w-1/12 pl-3 text-gray-700">
                              <span class="text-sm">19%</span>
                           </div>
                        </div>
                        <div class="flex items-center mt-1">
                           <div class="w-3/12 tracking-tighter text-gray-500">
                              <span>Facilities</span>
                           </div>
                           <div class="w-8/12">
                              <div class="w-full h-2 bg-gray-300 rounded-lg">
                                 <div class="w-1/5 h-2 bg-green-600 rounded-lg"></div>
                              </div>
                           </div>
                           <div class="w-1/12 pl-3 text-gray-700">
                              <span class="text-sm">8%</span>
                           </div>
                        </div>
                        <div class="flex items-center mt-1">
                           <div class="w-3/12 tracking-tighter text-gray-500">
                              <span>Value for money</span>
                           </div>
                           <div class="w-8/12">
                              <div class="w-full h-2 bg-gray-300 rounded-lg">
                                 <div class="w-2/12 h-2 bg-green-600 rounded-lg"></div>
                              </div>
                           </div>
                           <div class="w-1/12 pl-3 text-gray-700">
                              <span class="text-sm">5%</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>


               <div class="max-w-sm px-4 py-4 rounded-lg shadow">
                  <div class="px-4 py-4 mb-1 tracking-wide">
                     <h2 class="mt-1 font-semibold text-gray-800"><?php echo $rowR['soluong']; ?> Users reviews</h2>
                     <div class="px-8 pb-3 -mx-8 border-b">
                        <div class="flex items-center mt-1">
                           <div class="w-1/5 tracking-tighter text-gray-500">
                              <span>5 star</span>
                           </div>
                           <div class="w-3/5">
                              <div class="w-full h-2 bg-gray-300 rounded-lg">
                                 <div class="w-<?php echo number_format($sao5 / $tongsao * 12, 0) ?>/12 h-2 bg-yellow-600 rounded-lg"></div>
                              </div>
                           </div>
                           <div class="w-1/5 pl-3 text-gray-700">
                              <span class="text-sm"><?php echo number_format($sao5 / $tongsao * 100, 1) ?>%</span>
                           </div>
                        </div>
                        <div class="flex items-center mt-1">
                           <div class="w-1/5 tracking-tighter text-gray-500">
                              <span>4 star</span>
                           </div>
                           <div class="w-3/5">
                              <div class="w-full h-2 bg-gray-300 rounded-lg">
                                 <div class="w-<?php echo number_format($sao4 / $tongsao * 12, 0) ?>/12 h-2 bg-yellow-600 rounded-lg"></div>
                              </div>
                           </div>
                           <div class="w-1/5 pl-3 text-gray-700">
                              <span class="text-sm"><?php echo number_format($sao4 / $tongsao * 100, 1) ?>%</span>
                           </div>
                        </div>
                        <div class="flex items-center mt-1">
                           <div class="w-1/5 tracking-tighter text-gray-500">
                              <span>3 star</span>
                           </div>
                           <div class="w-3/5">
                              <div class="w-full h-2 bg-gray-300 rounded-lg">
                                 <div class="w-<?php echo number_format($sao3 / $tongsao * 12, 0) ?>/12 h-2 bg-yellow-600 rounded-lg"></div>
                              </div>
                           </div>
                           <div class="w-1/5 pl-3 text-gray-700">
                              <span class="text-sm"><?php echo number_format($sao3 / $tongsao * 100, 1) ?>%</span>
                           </div>
                        </div>
                        <div class="flex items-center mt-1">
                           <div class="w-1/5 tracking-tighter text-gray-500">
                              <span>2 star</span>
                           </div>
                           <div class="w-3/5">
                              <div class="w-full h-2 bg-gray-300 rounded-lg">
                                 <div class="w-<?php echo number_format($sao2 / $tongsao * 12, 0) ?>/12 h-2 bg-yellow-600 rounded-lg"></div>
                              </div>
                           </div>
                           <div class="w-1/5 pl-3 text-gray-700">
                              <span class="text-sm"><?php echo number_format($sao2 / $tongsao * 100, 1) ?>%</span>
                           </div>
                        </div>
                        <div class="flex items-center mt-1">
                           <div class="w-1/5 tracking-tighter text-gray-500">
                              <span>1 star</span>
                           </div>
                           <div class="w-3/5">
                              <div class="w-full h-2 bg-gray-300 rounded-lg">
                                 <div class="w-<?php echo number_format($sao1 / $tongsao * 12, 0) ?>/12 h-2 bg-yellow-600 rounded-lg"></div>
                              </div>
                           </div>
                           <div class="w-1/5 pl-3 text-gray-700">
                              <span class="text-sm"><?php echo number_format($sao1 / $tongsao * 100, 1) ?>%</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="w-full px-4">
                     <div class="rating-star">
                        <input onclick="return false;" id="star10" <?php echo $avgStar > 4.5 ? 'checked' : ''; ?> name="rating" type="radio" value="10" />
                        <label for="star10"></label>
                        <input onclick="return false;" id="star9" <?php echo ($avgStar > 4 && $avgStar <= 4.5) ? 'checked' : ''; ?> name="rating" type="radio" value="9" />
                        <label for="star9" class="half"></label>
                        <input onclick="return false;" id="star8" <?php echo ($avgStar > 3.5 && $avgStar <= 4) ? 'checked' : ''; ?> name="rating" type="radio" value="8" />
                        <label for="star8"></label>
                        <input onclick="return false;" id="star7" <?php echo ($avgStar > 3 && $avgStar <= 3.5) ? 'checked' : ''; ?> name="rating" type="radio" value="7" />
                        <label for="star7" class="half"></label>
                        <input onclick="return false;" id="star6" <?php echo ($avgStar > 2.5 && $avgStar <= 3) ? 'checked' : ''; ?> name="rating" type="radio" value="6" />
                        <label for="star6"></label>
                        <input onclick="return false;" id="star5" <?php echo ($avgStar > 2 && $avgStar <= 2.5) ? 'checked' : ''; ?> name="rating" type="radio" value="5" />
                        <label for="star5" class="half"></label>
                        <input onclick="return false;" id="star4" <?php echo ($avgStar > 1.5 && $avgStar <= 2) ? 'checked' : ''; ?> name="rating" type="radio" value="4" />
                        <label for="star4"></label>
                        <input onclick="return false;" id="star3" <?php echo ($avgStar > 1 && $avgStar <= 1.5) ? 'checked' : ''; ?> name="rating" type="radio" value="3" />
                        <label for="star3" class="half"></label>
                        <input onclick="return false;" id="star2" <?php echo ($avgStar > 0.5 && $avgStar <= 1) ? 'checked' : ''; ?> name="rating" type="radio" value="2" />
                        <label for="star2"></label>
                        <input onclick="return false;" id="star1" <?php echo $avgStar <= 0.5 ? 'checked' : ''; ?> name="rating" type="radio" value="1" />
                        <label for="star1" class="half"></label>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="m-10 p-4 bg-white shadow-2xl rounded-full">
            <h3 class="text-xl text-center border-blue-200 border-b-4 uppercase text-purple-500">Hotel Amenities</h3>
            <div class="flex mt-5">
               <ul class="inline-block w-full flex justify-between items-center shadow rounded-lg h-52">
                  <li class="inline-block w-2/12 text-center">
                     <i class="text-2xl p-4 text-green-500 fas fa-wifi"></i>
                     <p class="text-base">Free Wi-Fi!</p>
                  </li>
                  <li class="inline-block w-2/12 text-center">
                     <i class="text-2xl p-4 text-green-500 fas fa-broom"></i>
                     <p class="text-base">Daily housekeeping</p>
                  </li>
                  <li class="inline-block w-2/12 text-center">
                     <i class="text-2xl p-4 text-green-500 far fa-clock"></i>
                     <p class="text-base">Receptionist 24H</p>
                  </li>
                  <li class="inline-block w-2/12 text-center">
                     <i class="text-2xl p-4 text-green-500 fas fa-parking"></i>
                     <p class="text-base">Parking lot</p>
                  </li>
                  <li class="inline-block w-2/12 text-center">
                     <i class="text-2xl p-4 text-green-500 fas fa-person-booth"></i>
                     <p class="text-base">Elevator</p>
                  </li>
               </ul>
            </div>
         </div>

         <?php
         if (isset($_GET['comment'])) {
            if ($id == '') {
               echo "<script>alert('Bạn cần đăng nhập để thao tác!')</script>";
            } else {
               $contentComment = $_GET['content'];
               $rating = $_GET['rating'] / 2;
               $idRoom = $_GET['idRoom'];
               $idCus = $_GET['idCus'];

               $sqlComment = "INSERT INTO `phanhoi`(`idkhachhang`, `idphong`, `sosao`, `noidung`) VALUES ($idCus, $idRoom, $rating, '$contentComment')";
               $conn->query($sqlComment);
            }
         }
         ?>



         <form method="GET" action="#" class="flex flex-col m-10 p-4 gap-y-4 bg-white shadow-2xl rounded-t-full">
            <input type="hidden" name='idRoom' value="<?php echo $idRoom ?>">
            <input type="hidden" name='idCus' value="<?php echo $rowR['idkhachhang'] ?>">
            <h3 class="text-xl text-center border-blue-200 border-b-4 uppercase text-purple-500">
               Customer reviews and ratings for Angle Hotel</h3>
            <div class="flex flex-col">
               <h3 class="text-xl">Discussion (<?php echo $rowR['soluong'] ?>)</h3>
               <div class="w-full px-4">
                  <div class="rating-star-comment">
                     <input id="star10-cm" name="rating" type="radio" value="10" />
                     <label for="star10-cm"></label>
                     <input id="star9-cm" name="rating" type="radio" value="9" />
                     <label for="star9-cm" class="half"></label>
                     <input id="star8-cm" name="rating" type="radio" value="8" />
                     <label for="star8-cm"></label>
                     <input id="star7-cm" name="rating" type="radio" value="7" />
                     <label for="star7-cm" class="half"></label>
                     <input id="star6-cm" name="rating" type="radio" value="6" />
                     <label for="star6-cm"></label>
                     <input id="star5-cm" name="rating" type="radio" value="5" />
                     <label for="star5-cm" class="half"></label>
                     <input id="star4-cm" name="rating" type="radio" value="4" />
                     <label for="star4-cm"></label>
                     <input id="star3-cm" name="rating" type="radio" value="3" />
                     <label for="star3-cm" class="half"></label>
                     <input id="star2-cm" name="rating" type="radio" value="2" />
                     <label for="star2-cm"></label>
                     <input id="star1-cm" name="rating" type="radio" value="1" />
                     <label for="star1-cm" class="half"></label>

                  </div>
                  <label class="notification text-reb-600 inline-block" style="transform: translateY(-10px);" for="">Vui lòng chọn số sao</label>
               </div>
               <div class="flex flex-col px-10 py-5 mb-5">
                  <div class="flex-1 rounded-xl">
                     <textarea required name="content" id="content" placeholder="Add to the discussion" required class="bg-gray-100 rounded-xl w-full h-full p-3 border border-solid border-yellow-400"></textarea>
                  </div>
                  <button name="comment" class="mt-4 p-2 rounded-md border-2 bg-gray-400 w-20 h-10 ml-auto">Comment</button>
               </div>

               <?php
               $queryComment = 'SELECT Concat( khachhang.ho," ",khachhang.ten) as hoten, phong.*, phanhoi.*, khachhang.* 
                                    FROM PHONG, PHANHOI, khachhang 
                                    WHERE PHONG.idphong = phanhoi.idphong and khachhang.idkhachhang = phanhoi.idkhachhang and phong.idphong = ' . $idRoom;
               $resultComment = $conn->query($queryComment);
               while ($rowComment = $resultComment->fetch_assoc()) {
               ?>
                  <div class="flex flex-col">
                     <div class="flex px-10 py-5 gap-x-3">
                        <img src="../../photo/avatar/<?php echo $rowComment['avatar'] == '' ? 'avtNull.png' : $rowComment['avatar']; ?>" alt="" class="w-10 h-10 flex-shrink-0 object-cover rounded-2xl mt-2">
                        <div class="flex-1 border border-gray-400 rounded-xl">
                           <div class="flex items-center gap-x-2 px-5 pt-4">
                              <div class="font-semibold">
                                 <p><?php echo $rowComment['hoten']; ?></p>
                              </div>
                              <a href="" class="text-base text-gray-300">
                                 <time datetime="" title="" class="mr-2"><?php echo $rowComment['thoigian']; ?></time>
                                 • Edited
                              </a>
                              <svg class="ml-auto cursor-pointer text-white w-4 h-5" viewBox="0 0 20 20">
                                 <path d="M3.936,7.979c-1.116,0-2.021,0.905-2.021,2.021s0.905,2.021,2.021,2.021S5.957,11.116,5.957,10
                                 S5.052,7.979,3.936,7.979z M3.936,11.011c-0.558,0-1.011-0.452-1.011-1.011s0.453-1.011,1.011-1.011S4.946,9.441,4.946,10
                                 S4.494,11.011,3.936,11.011z M16.064,7.979c-1.116,0-2.021,0.905-2.021,2.021s0.905,2.021,2.021,2.021s2.021-0.905,2.021-2.021
                                 S17.181,7.979,16.064,7.979z M16.064,11.011c-0.559,0-1.011-0.452-1.011-1.011s0.452-1.011,1.011-1.011S17.075,9.441,17.075,10
                                 S16.623,11.011,16.064,11.011z M10,7.979c-1.116,0-2.021,0.905-2.021,2.021S8.884,12.021,10,12.021s2.021-0.905,2.021-2.021
                                 S11.116,7.979,10,7.979z M10,11.011c-0.558,0-1.011-0.452-1.011-1.011S9.442,8.989,10,8.989S11.011,9.441,11.011,10
                                 S10.558,11.011,10,11.011z"></path>
                              </svg>
                           </div>
                           <p class="px-5 py-4">
                              <?php echo $rowComment['noidung']; ?>
                           </p>
                        </div>
                     </div>
                     <div class="flex px-10 gap-x-10 ml-20 -mt-4 mb-5">
                        <div class="flex gap-x-1 text-gray-500">
                           <svg class="cursor-pointer text-white w-6 h-6" viewBox="0 0 20 20">
                              <path d="M13.22,2.984c-1.125,0-2.504,0.377-3.53,1.182C8.756,3.441,7.502,2.984,6.28,2.984c-2.6,0-4.714,2.116-4.714,4.716c0,0.32,0.032,0.644,0.098,0.96c0.799,4.202,6.781,7.792,7.46,8.188c0.193,0.111,0.41,0.168,0.627,0.168c0.187,0,0.376-0.041,0.55-0.127c0.011-0.006,1.349-0.689,2.91-1.865c0.021-0.016,0.043-0.031,0.061-0.043c0.021-0.016,0.045-0.033,0.064-0.053c3.012-2.309,4.6-4.805,4.6-7.229C17.935,5.1,15.819,2.984,13.22,2.984z M12.544,13.966c-0.004,0.004-0.018,0.014-0.021,0.018s-0.018,0.012-0.023,0.016c-1.423,1.076-2.674,1.734-2.749,1.771c0,0-6.146-3.576-6.866-7.363C2.837,8.178,2.811,7.942,2.811,7.7c0-1.917,1.554-3.47,3.469-3.47c1.302,0,2.836,0.736,3.431,1.794c0.577-1.121,2.161-1.794,3.509-1.794c1.914,0,3.469,1.553,3.469,3.47C16.688,10.249,14.474,12.495,12.544,13.966z">
                              </path>
                           </svg>
                           <span><?php echo $rowComment['thich']; ?></span>
                           <p>Like</p>
                        </div>

                        <div class="flex gap-x-1 text-gray-500">
                           <svg class="cursor-pointer text-white w-6 h-6" viewBox="0 0 20 20">
                              <path d="M10,2.262c-3.486,0-6.322,2.837-6.322,6.322c0,2.129,1.105,4.126,2.905,5.291l0.009,3.396c0.002,0.168,0.093,0.326,0.24,0.406c0.072,0.041,0.149,0.061,0.228,0.061c0.086,0,0.171-0.023,0.246-0.07l6.338-3.922c0.037-0.021,0.069-0.049,0.098-0.08c1.618-1.193,2.581-3.084,2.581-5.082C16.322,5.099,13.485,2.262,10,2.262z M13.109,12.969c-0.016,0.01-0.03,0.023-0.044,0.037l-5.542,3.426l-0.006-2.594c0.012-0.027,0.023-0.057,0.03-0.086c0.05-0.203-0.041-0.414-0.221-0.52c-1.675-0.963-2.715-2.746-2.715-4.648c0-2.971,2.417-5.387,5.388-5.387c2.971,0,5.387,2.417,5.387,5.387C15.387,10.316,14.536,11.955,13.109,12.969z">
                              </path>
                           </svg>
                           <p>Reply</p>
                        </div>
                     </div>
                  </div>
               <?php
               }
               ?>

            </div>
         </form>

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
      var comment = document.querySelector('.rating-star-comment');
      var notification = document.querySelector('.notification');

      comment.onclick = function() {
         notification.style.display = 'none';
      }
   </script>
   <script src="./roomdetail.js"></script>
</body>

</html>