<?php
$queryRoom = "SELECT * FROM phong";
$conn = $db_handle->connectDB();
if(isset($_GET['search'])){
    $adults = $_GET['adults']==""?0:$_GET['adults'];
    $children = $_GET['children']==""?0:$_GET['children'];
    $checkin = $_GET['checkin'];
    $checkout = $_GET['checkout'];
    
    $queryRoom = "SELECT * FROM PHONG where songuoi >= ".$adults + $children ;
}

if(isset($_GET['search1'])){
   $vitri1 = null;
   $vitri2 = null;
   $sao = null;
   $giuongdoi = null;
   $nguoi = null;
   
   if(isset($_GET['vitri1']))
      $vitri1 = $_GET['vitri1']==""?"":'giáp biển';

   if(isset($_GET['vitri2']))
      $vitri2 = $_GET['vitri2']==""?"":'giáp mặt phố';

   if(isset($_GET['sao']))
      $sao = $_GET['sao']==""?0:5;

   if(isset($_GET['giuongdoi']))
      $giuongdoi = $_GET['giuongdoi']==""?0:1;

   if(isset($_GET['nguoi']))
      $nguoi = $_GET['nguoi']==""?0:5;

   if($sao != 0 ) {

      $idphong = '';
      $queryComment = "SELECT * FROM phanhoi";
      $conn = $db_handle->connectDB();
      $result = $conn->query($queryComment);
      if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()) {
            if ($row['sosao'] == '5') {
               $idphong = $row['idphong'];
            }
         }
   }
   if($idphong !='')
      $queryRoom = "SELECT * FROM PHONG where songuoi >= '$nguoi' or idphong = '$idphong' or mota like '%$vitri1%' or mota like '%$vitri2%' or sogiuong = '$giuongdoi'";
   else 
      $queryRoom = "SELECT * FROM PHONG where songuoi >= '$nguoi' or mota like '%$vitri1%' or mota like '%$vitri2%' or sogiuong = '$giuongdoi'";

   }
}

if(isset($_GET['search2'])){

   $price = $_GET['price'];
   
   switch($price) {
      case 1:
         $queryRoom = "SELECT * FROM PHONG where dongia <= 1000000" ;
         break;
      case 2:
         $queryRoom = "SELECT * FROM PHONG where dongia >= 1000000 and dongia <= 1500000" ;
         break;
      case 3:
         $queryRoom = "SELECT * FROM PHONG where dongia >= 1500000 and dongia <= 2000000" ;
         break;
      case 4:
         $queryRoom = "SELECT * FROM PHONG where dongia >= 2000000 and dongia <= 2500000" ;
         break;
      case 5:
         $queryRoom = "SELECT * FROM PHONG where dongia >= 2500000 and dongia <= 3000000" ;
         break;
      case 6:
         $queryRoom = "SELECT * FROM PHONG where dongia >= 3000000" ;
         break;
   }
}

if(isset($_GET['typeRoom'])){
   $typeRoom = $_GET['typeRoom'];
   $queryRoom = "SELECT * FROM PHONG where idloaiphong = ".$typeRoom ;
}

$result = $conn->query($queryRoom);
if ($result->num_rows > 0) {
   while ($row = $result->fetch_assoc()) {
      echo '
            <div class="row-content">
   <div class="image-room" style="background-image: url(../../image/destination-1.jpg);">
   </div>
   <div class="row-text">
      <div class="info">
         <div class="room-floor">
            <p class="room"> ' . $row['tenphong'] . '</p>
            <p class="floor"> tầng  ' . $row['tang'] . '</p>
         </div>
         <p class="view"> <i class="fas fa-umbrella-beach"></i>View beach beautiful</p>
         <ul>
            <li>
               <i class="fas fa-bed"></i>
               <p>
               ' . $row['sogiuong'] . ' giường
               </p>
            </li>
            <li>
               <i class="fas fa-bath"></i>
               <p>
               ' . $row['sobontam'] . ' bồn tắm
               </p>
            </li>
            <li>
               <i class="fas fa-street-view"></i>
               <p>
               ' . $row['songuoi'] . ' người
               </p>
            </li>
         </ul>
         <div class="text-sp">
            <p>
            ' . $row['mota'] . '
            </p>
         </div>
         <div class="price">
         ' . $row['dongia'] . ' VNĐ
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
            ';
   }
}