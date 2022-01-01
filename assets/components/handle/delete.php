<?php
require_once ('../handle/configDB.php');

if (!empty($_POST)) {
	$action = $id = '';
	if (isset($_POST['action'])) {
		$action = $_POST['action'];
	}
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}
	if ($action == 'deleteAcount') {
		$sql1 = 'delete from taikhoan where idtaikhoan = '.$id;
		$sql2 = 'delete from taikhoan where idtaikhoan = '.$id;
		$conn->multi_query($sql1);
		header('location: ../../admin/adminHome.php?q=account');
	}

    if ($action == 'deleteEmployee') {
		$sql1 = 'delete from nhanvien where idtaikhoan = '.$id;
		$conn->multi_query($sql1);
		header('location: ../assets/admin/adminHome.php?q=employ');

	}

    if ($action == 'update') {
		$sql1 = 'delete from taikhoan where idtaikhoan = '.$id;
		$sql1 = 'delete from taikhoan where idtaikhoan = '.$id;
		$conn->multi_query($sql);
	}
}
?>