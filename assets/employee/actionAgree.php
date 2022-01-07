<?php
include('../components/handle/configDB.php');
if(isset($_GET['action'])){
    $action = $_GET['action'];
    $id = $_GET['id'];
    $idr = $_GET['idr'];

    if($action == 'agree'){
        $query = 'UPDATE HOADON SET trangthai = 0 where idhoadon = '.$id;
        $query1 = 'UPDATE phong SET trangthai = 1 where idphong = '.$idr;
        $conn->query($query1);
        if($conn->query($query)) echo '<script> alert("Agree successful!"); </script>';
        
    }

    if($action == 'disagree'){
        $query = 'UPDATE HOADON SET trangthai = 3 where idhoadon = '.$id;
        $query1 = 'UPDATE phong SET trangthai = 0 where idphong = '.$idr;
        $conn->query($query1);
        if($conn->query($query)) echo '<script> alert("Disagree successful!"); </script>';
    }
}