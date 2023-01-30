<?php
include 'connetdb.php';
if(!empty($_GET['id']))
{
    $id=$_GET['id'];
    $sql="DELETE FROM `sanpham` WHERE `MaSP`='$id'";
    $row = mysqli_query($connet,$sql);
}
header('location:San-pham/san-pham.php');

?>
