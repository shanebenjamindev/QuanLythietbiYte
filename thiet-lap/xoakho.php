<?php
include '../connetDB.php';
 $MaKho = $_GET['MaKho'];
 $sqlxoa = "DELETE FROM Kho where MaKho = '$MaKho'"  ;
 $query = mysqli_query($connet,$sqlxoa);
 header('location: thiet-lap.php');
// echo $MaTK ;
?>