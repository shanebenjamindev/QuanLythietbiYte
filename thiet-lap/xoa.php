<?php
include '../connetDB.php';
 $MaTK = $_GET['MaTK'];
 $sqlxoa = "DELETE FROM taikhoan where MaTk = '$MaTK'"  ;
 $query = mysqli_query($connet,$sqlxoa);
 header('location: thiet-lap.php');
// echo $MaTK ;
?>