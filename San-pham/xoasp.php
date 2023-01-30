<?php
include 'ketnoicsdl.php';
if(!empty($_GET['id']))
{
    $id=$_GET['id'];
    $sql="DELETE FROM `sanpham` WHERE `MaSP`='$id'";
    $row = mysqli_query($conn,$sql);
}
header('location:san-pham.php');

?>
