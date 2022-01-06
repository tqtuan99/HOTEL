<?php
include('../components/handle/configDB.php');
if(isset($_GET['action'])){
    $action = $_GET['action'];
    $id = $_GET['id'];

    if($action == 'agree'){
        $query = 'UPDATE HOADON SET trangthai = 0';
        if($conn->query($query)) echo '<script> alert("Agree successful!"); </script>';
        
    }

    if($action == 'disagree'){
        $query = 'UPDATE HOADON SET trangthai = 3';
        if($conn->query($query)) echo '<script> alert("Disagree successful!"); </script>';
    }
}