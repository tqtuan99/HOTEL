<?php

$queryRoom = "SELECT * FROM PHONG";

if(isset($_GET['search'])){

    $adults = $_GET['adults'];
    $children = $_GET['children'];
    $checkin = $_GET['checkin'];
    $checkout = $_GET['checkout'];
    
    $queryRoom = "SELECT * FROM PHONG where songuoi >= ".$adults + $children ;
}
    $conn = $db_handle->connectDB();

    $result = $conn->query($queryRoom);
    if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {
          $imgRoom = $row['anh'] == "" ? 'room1.jpg' : $row['anh'];
          echo '
             <div class="row-content">
             <div class="overflow-hidden">
                <div class="image-room" data-aos="zoom-in-up" data-aos-duration="3000" style="background-image: url(./assets/photo/room/' . $imgRoom . ');">
                </div>
             </div>
             <div class="row-text" data-aos="slide-up" data-aos-duration="2500">
                <span class="price">' . number_format($row['dongia']) . ' VNĐ</span>
                <p class="room"> ' . $row['tenphong'] . '</p>
                <p class="view"> <i class="txt-over fas fa-umbrella-beach"></i>' . $row['vitri'] . '</p>
                <ul>
                   <li>
                      <span class="fas fa-bath"></span>' . $row['sobontam'] . ' bồn tắm
                   </li>
                   <li>
                      <span class="fas fa-bed"></span>' . $row['sogiuong'] . ' giường
                   </li>
                   <li>
                      <span class="fas fa-street-view"></span>' . $row['songuoi'] . ' người
                   </li>
                </ul>
                <a href="">View More</a>
             </div>
          </div>
             ';
       }
    }

?>