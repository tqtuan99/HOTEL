<?php
include('../components/handle/configDB.php');

$query = 'SELECT phong.* FROM PHONG, loaiphong WHERE 1=1 and phong.idloaiphong = loaiphong.idloaiphong ';

if(isset($_GET['typeSubmit'])){

    $value = $_GET['typeSubmit'];
    $type = $_GET['typeRoom'];

    
    switch($type){
        case 'standard':
            $query .= " and tenloaiphong = 'standard'";
            break;
        case "superior":
            $query .= " and tenloaiphong = 'superior'";
            break;
        case "deluxe":
            $query .= " and tenloaiphong = 'deluxe'";
            break;
        case "suite":
            $query = " and tenloaiphong = 'suite'";
            break;
        case "all":
            $query .= "";
            break;
    }

    switch($value){
        case 0:
            $query .='';
            break;
        case 1:
            $query .= ' and trangthai = 2';
            break;
        case 2:
            $query .= ' and trangthai = 1';
            break;
        case 3:
            $query = 'SELECT phong.*
                    FROM `hoadon`, `ct_hoadon`, `phong` 
                    WHERE hoadon.idhoadon = ct_hoadon.idhoadon and ct_hoadon.idphong = phong.idphong 
                        and datediff(CURDATE(),ngaytao) <= 1';
            break;
        case 4:
            $query .= ' and trangthai = 0';
            break;
        case 5:
            $query .= ' and trangthai = 3';
            break;
    }
}
    
    $result = $conn->query($query);
    if($result)
        while($row = $result->fetch_assoc()){
            
            if($row['trangthai']==0)
                echo    '
                            <div class="room bg-green-400 px-5 flex flex-col justify-between">
                                <img src="../image/hotel-room.png" alt="">
                                <h3 class="text-center p-4">'.$row['tenphong'].'</h3>
                            </div>
                        ';

            else if($row['trangthai']==3)
                echo    '
                            <div class="room bg-yellow-400 px-5 flex flex-col justify-between">
                                <img src="../image/hotel-room.png" alt="">
                                <h3 class="text-center p-4">'.$row['tenphong'].'</h3>
                            </div>
                        ';
            
            else if($row['trangthai']==2)
                echo    '
                            <div class="room bg-blue-400 px-5 flex flex-col justify-between">
                                <img src="../image/hotel-room.png" alt="">
                                <h3 class="text-center p-4">'.$row['tenphong'].'</h3>
                            </div>
                        ';
            else 
                echo    '
                            <div class="room bg-red-400 px-5 flex flex-col justify-between">
                                <img src="../image/hotel-room.png" alt="">
                                <h3 class="text-center p-4">'.$row['tenphong'].'</h3>
                            </div>
                        ';
        }