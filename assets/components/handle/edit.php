<?php
require_once ('../handle/configDB.php');

if (!empty($_POST)) {
	$action = '';
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

	if (isset($_POST['action'])) {
		$action = $_POST['action'];
	}
	if (isset($_POST['idR'])) {
		$idR = $_POST['idR'];
	}
	if ($action == 'deleteAcount') {
		$sql1 = 'delete from taikhoan where idtaikhoan = '.$id;
		$sql2 = 'delete from taikhoan where idtaikhoan = '.$id;
		$conn->multi_query($sql1);
	}

    if ($action == 'deleteEmployee') {
		$sql1 = 'delete from nhanvien where idtaikhoan = '.$id;
		$conn->multi_query($sql1);
	}

	if ($action == 'editRoom') {
		$sql1 = "UPDATE `phong` SET `idloaiphong`='.$typeR.',`tenphong`='.$nameR.',`tang`='.$Flo.',`vitri`='.$Lo.',`mota`='.$Des.',`dongia`='.$Pri.',`sogiuong`='.$Bed.',`songuoi`='.$Peo.',`sobontam`='.$Ba.' WHERE idphong = '.$idR";
		$conn->multi_query($sql1);
	}

    if ($action == 'update') {
		$sql1 = 'delete from taikhoan where idtaikhoan = '.$id;
		$sql1 = 'delete from taikhoan where idtaikhoan = '.$id;
		$conn->multi_query($sql);
	}
}
?>