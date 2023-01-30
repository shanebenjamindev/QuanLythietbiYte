<?php
    include('./ketnoi.php');
    error_reporting(0);

    $MaNCC = $_GET['id'];
    $sql = "DELETE FROM ncc WHERE MaNCC = '$MaNCC'";
    $query = mysqli_query($con, $sql);

    if($query){
        echo "<font color ='green'>Deleted";
        header ('Location:khach-hang.php');
    }else{
        echo "<font color ='red'>Thất bại";
    }
?>