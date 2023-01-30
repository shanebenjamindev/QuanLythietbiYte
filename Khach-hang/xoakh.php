<?php
    include('./ketnoi.php');
    error_reporting(0);

    $makh = $_GET['id'];
    $sql = "DELETE FROM khachhang WHERE MaKH = '$makh'";
    $query = mysqli_query($con, $sql);

    if($query){
        echo "<font color ='green'>Deleted";
        header ('Location:khach-hang.php');
    }else{
        echo "<font color ='red'>Thất bại";
    }
?>