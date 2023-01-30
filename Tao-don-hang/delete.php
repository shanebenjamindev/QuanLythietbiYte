<?php 
session_start();
include 'assets/db.php';
if (isset($_GET['category'])) 
{
	if ($con->query("delete from loaisp where id = '$_GET[category]'")) 
	{
		header("location:manageCat.php");
	}
	else
		echo "error is:".$con->error;
}
if (isset($_GET['item'])) 
{
	if ($con->query("delete from sanpham where MaSP = '$_GET[item]'")) 
	{	$url = "location:tao-don.php?".$_GET['url'];
		header($url);
	}
	else
		echo "error is:".$con->error;
}

 ?>