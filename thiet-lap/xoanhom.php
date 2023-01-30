
<?php
include '../connetDB.php';
 $TenNhom = $_GET['TenNhom'];
 $sqlxoa = "DELETE FROM nhomtaikhoan where TenNhom = '$TenNhom'"  ;
 $query = mysqli_query($connet,$sqlxoa);
 header('location: thiet-lap.php');
// echo $MaTK ;
?>