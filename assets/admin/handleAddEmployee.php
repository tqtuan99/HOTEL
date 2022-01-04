<?php
require_once("../components/handle/dbcontroller.php");
require_once("../components/handle/configDB.php");

if (isset($_POST["add"])) {
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $position = $_POST["position"];
    $phone = $_POST["phone"];
    $id = $_POST["id"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $passwordMD5 = md5($phone);

    $errors= array();
    $file_name = $_FILES['avatar']['name'];
    $file_size = $_FILES['avatar']['size'];
    $file_tmp = $_FILES['avatar']['tmp_name'];
    $file_type = $_FILES['avatar']['type'];
    $file_parts =explode('.',$_FILES['avatar']['name']);
    $file_ext=strtolower(end($file_parts));
    $expensions= array("jpeg","jpg","png");
    if(in_array($file_ext,$expensions)=== false){
    $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
    }
    if($file_size > 2097152) {
    $errors[]='Kích thước file không được lớn hơn 2MB';
    }
    $avatar = $_FILES['avatar']['name']==''?'': $_FILES['avatar']['name'];
    $target = "../../assets/photo/avatar/".basename($avatar);
    move_uploaded_file($_FILES['avatar']['tmp_name'], $target);

    $sqlGetEmail = 'SELECT  * FROM taikhoan where tendangnhap = '.$email;
    $resultEmail = $conn->multi_query($sqlGetEmail);
    if ($resultEmail > 0) {
        echo '<script> alert("Account already exists!") </script>';
    }else {
        $idtaikhoan = null;
        $sql1 = "INSERT INTO taikhoan (tendangnhap,matkhau) VALUES ('$email', '$passwordMD5')";
        $sql2 = "SELECT idtaikhoan FROM taikhoan where tendangnhap = '" . $email . "'";
        $conn->multi_query($sql1);
        $result = $conn->query($sql2);
        if ($result->num_rows > 0) {
            // output data of each row
            $row = $result->fetch_assoc();
            $idtaikhoan = $row["idtaikhoan"];
        }
        
        $query = "INSERT INTO nhanvien(idtaikhoan, hotennv, gioitinh, chucvu, sodienthoai, socccd, ngaysinh, email, diachi, avatar) VALUES ('$idtaikhoan','$name', '$gender', '$position', '$phone', '$id', '$dob', '$email', '$address','$avatar') ";
    
        $result = $conn->multi_query($query);
        if ($result){
            echo '<script> alert("Add successfull!")</script>';
        }
        else {
            echo '<script> alert("Add failed!") </script>';
        }
    }
}


$conn->close();
