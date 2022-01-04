<?php

if (isset($_POST['editRoom'])) {
    $idR = $_POST['idR'];
    $nameR = $_POST['nameR'];
    $typeR = $_POST['typeR'];
    $Flo = $_POST['Flo'];
    $Peo = $_POST['Peo'];
    $Ba = $_POST['Ba'];
    $Lo = $_POST['Lo'];
    $Des = $_POST['Des'];
    $Pri = $_POST['Pri'];
    $Bed = $_POST['Bed'];
    $supImg = $_POST['supImg'];
	
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
    $image = $_FILES['image']['name']==''?$supImg: $_FILES['image']['name'];
    $target = "../../assets/photo/room/".basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

	$sql1 = "UPDATE `phong` SET `idloaiphong`= '$typeR' ,`tenphong`= '$nameR' ,`tang`= '$Flo' ,`vitri`= '$Lo',`mota`= '$Des',`dongia`= $Pri ,`sogiuong`= $Bed ,`anh`='$image',`songuoi`= $Peo,`sobontam`= $Ba WHERE idphong = $idR";
	if($conn->query($sql1)){
		echo 'alert("Update Successful!");';
	}else 
		echo 'alert("Update failed! '.$conn->error.'") ';
}

if (isset($_POST['editEmploy'])) {
	$action =  $_POST['action'];
    $idR = $_POST['idR'];
    $nameR = $_POST['nameR'];
    $typeR = $_POST['typeR'];
    $Flo = $_POST['Flo'];
    $Peo = $_POST['Peo'];
    $Ba = $_POST['Ba'];
    $Lo = $_POST['Lo'];
    $Des = $_POST['Des'];
    $Pri = $_POST['Pri'];
    $Bed = $_POST['Bed'];
    $supImg = $_POST['supImg'];
	
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
    $image = $_FILES['image']['name']==''?$supImg: $_FILES['image']['name'];
    $target = "../../assets/photo/room/".basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

	$sql1 = "UPDATE `phong` SET `idloaiphong`= '$typeR' ,`tenphong`= '$nameR' ,`tang`= '$Flo' ,`vitri`= '$Lo',`mota`= '$Des',`dongia`= $Pri ,`sogiuong`= $Bed ,`anh`='$image',`songuoi`= $Peo,`sobontam`= $Ba WHERE idphong = $idR";
	if($conn->query($sql1)){
		echo 'alert("Update Successful!");
			';
	}else 
		echo 'alert("Update failed! '.$conn->error.'") ';
}
?>