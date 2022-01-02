<?php
require_once("../components/handle/dbcontroller.php");
require_once("../components/handle/configDB.php");

if (isset($_POST["addRoom"])) {
    $roomName = $_POST["roomName"];
    $typeRoom = $_POST["typeRoom"];
    $floor = $_POST["floor"];
    $people = $_POST["people"];
    $bed = $_POST["bed"];
    $bathtub = $_POST["bathtub"];
    $location = $_POST["location"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    // $file = $_POST["file"];

    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_parts =explode('.',$_FILES['image']['name']);
    $file_ext=strtolower(end($file_parts));
    $expensions= array("jpeg","jpg","png");
    if(in_array($file_ext,$expensions)=== false){
    $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
    }
    if($file_size > 2097152) {
    $errors[]='Kích thước file không được lớn hơn 2MB';
    }
    $image = $_FILES['image']['name']==''?'': $_FILES['image']['name'];
    $target = "../../assets/photo/room/".basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

        $sql1 = "INSERT INTO `phong`(`idloaiphong`, `tenphong`, `tang`, `vitri`, `mota`, `dongia`, `sogiuong`, `anh`, `songuoi`, `sobontam`) 
                VALUES ('$typeRoom','$roomName','$floor','$location','$description','$price','$bed','$image','$people','$bathtub')";
        $result = $conn->multi_query($sql1);
        if ($result){
            echo '<script> alert("Add successfull!")</script>';
        }
        else {
            echo '<script> alert("Add failed! '.$errors.'") </script>';
        }   
}


$conn->close();
