<?php
$queryRoom = "SELECT * FROM phong where songuoi >= 0 ";
$conn = $db_handle->connectDB();
if (isset($_GET['search'])) {
   $adults = $_GET['adults'] == "" ? 0 : $_GET['adults'];
   $children = $_GET['children'] == "" ? 0 : $_GET['children'];
   $checkin = $_GET['checkin'];
   $checkout = $_GET['checkout'];

   $queryRoom .= "and songuoi >= " . $adults + $children;
}

if (isset($_GET['search1'])) {
   if (isset($_GET['vitri1']))
      $queryRoom .= " and vitri like '%biển%'";

   if (isset($_GET['vitri2']))
      $queryRoom .= " and vitri like '%phố%'";

   if (isset($_GET['sao'])) {
      $queryComment = "SELECT * FROM phanhoi";
      $conn = $db_handle->connectDB();
      $result2 = $conn->query($queryComment);
      if ($result2->num_rows > 0) {
         while ($row = $result2->fetch_assoc()) {
            if ($row['sosao'] == '5') {
               $queryRoom .= " and idphong = " . $row['idphong'];
            }
         }
      }
   }

   if (isset($_GET['giuongdoi']))
      $queryRoom .= " and sogiuong = 1";

   if (isset($_GET['nguoi']))
      $queryRoom .= " and songuoi >=5";
}

if (isset($_GET['search2'])) {
   $price = '';
   if (isset($_GET['price']))
      $price = $_GET['price'];

   switch ($price) {
      case 1:
         $queryRoom .= " and dongia <= 1000000";
         break;
      case 2:
         $queryRoom .= " and dongia >= 1000000 and dongia <= 1500000";
         break;
      case 3:
         $queryRoom .= " and dongia >= 1500000 and dongia <= 2000000";
         break;
      case 4:
         $queryRoom .= " and dongia >= 2000000 and dongia <= 2500000";
         break;
      case 5:
         $queryRoom .= " and dongia >= 2500000 and dongia <= 3000000";
         break;
      case 6:
         $queryRoom .= " and dongia >= 3000000";
         break;
   }
}

if (isset($_GET['typeRoom'])) {
   $typeRoom = $_GET['typeRoom'];
   if ($typeRoom != 'all')
      $queryRoom .= "and idloaiphong = " . $typeRoom;
   else
      $queryRoom .= "and idloaiphong > 0";
}

$star = '';
$ngayden = '';
$result = $conn->query($queryRoom);
if ($result)
   if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
         $queryAvg = 'SELECT avg(phanhoi.sosao) as avg from phong, phanhoi WHERE phong.idphong = phanhoi.idphong and phong.idphong = '.$row['idphong'];
         $queryHoaDon = 'SELECT * from phong, hoadon WHERE phong.idphong = hoadon.idphong and hoadon.trangthai = 2 and phong.idphong = '.$row['idphong'];
         $resultHD = $conn->query($queryHoaDon);
         if($resultHD){
            if($rowHD = $resultHD->fetch_assoc()){
               $ngayden = '';
               $ngayden .= ' <p class="text-red-600 text-sm mt-2">';
               $ngayden .= gmdate("d/m ", strtotime($rowHD['ngaytao']));
               $ngayden .= ' - ';
               $ngayden .= gmdate("d/m ", strtotime($rowHD['ngaythanhtoan']));
               $ngayden .= 'hết phòng</p>';
            }
            else $ngayden = '';
         }else $ngayden = '';


         $resultAvg = $conn->query($queryAvg);
         $rowStar = $resultAvg->fetch_assoc();
         $avgStar = number_format($rowStar['avg'],0);
         $avgCore = number_format($rowStar['avg']*2,2);

         if($avgStar== 1) {
            $star = '<i class="fas star fa-star"></i>
            <i class="fas nostar fa-star"></i>
            <i class="fas nostar fa-star"></i>
            <i class="fas nostar fa-star"></i>
            <i class="fas nostar fa-star"></i>';
         }else if($avgStar== 2 ){
            $star = '<i class="fas star fa-star"></i>
            <i class="fas star fa-star"></i>
            <i class="fas nostar fa-star"></i>
            <i class="fas nostar fa-star"></i>
            <i class="fas nostar fa-star"></i>';
         }else if($avgStar== 3){
            $star = '<i class="fas star fa-star"></i>
            <i class="fas star fa-star"></i>
            <i class="fas star fa-star"></i>
            <i class="fas nostar fa-star"></i>
            <i class="fas nostar fa-star"></i>';
         }else if($avgStar== 4){
            $star = '<i class="fas star fa-star"></i>
            <i class="fas star fa-star"></i>
            <i class="fas star fa-star"></i>
            <i class="fas star fa-star"></i>
            <i class="fas nostar fa-star"></i>';
         }else{
            $star = '<i class="fas star fa-star"></i>
            <i class="fas star fa-star"></i>
            <i class="fas star fa-star"></i>
            <i class="fas star fa-star"></i>
            <i class="fas star fa-star"></i>';

         }

         echo '
               <div class="row-content">
      <div class="image-room" style="background-image: url(../../photo/room/' . $row['anh'] . ');">
      </div>
      <div class="row-text">
         <div class="info">
            <div class="room-floor">
               <p class="room"> ' . $row['tenphong'] . '</p>
               <p class="floor"> tầng  ' . $row['tang'] . '</p>
            </div>
            <p class="view"> <i class="fas fa-umbrella-beach"></i>' . $row['vitri'] . '</p>
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
            ' . number_format($row['dongia']) . ' VNĐ
            </div>
         </div>
         <div class="justify-end eval">
            <div class="flex flex-col">
               <div>
                  <div class="flex justify-end">
                     '.$star.'
                  </div>
               </div>
               '.$ngayden.'
            </div>
            <a href="../room-detail/roomdetail.php?idRoom='.$row['idphong'].'">View More</a>
         </div>
      </div>
   </div>                          
               ';
      }
   }
