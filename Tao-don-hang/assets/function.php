<?php 


function siteTitle()
{	
	global $con;
	$array = $con->query("select * from site where id='1'");
	$row = $array->fetch_assoc();
	return $row['title'];
}
function siteName()
{	
	global $con;
	
	$array = $con->query("select * from site where id='1'");
	$row = $array->fetch_assoc();
	return $row['name'];
}
function adminName()
{	
	global $con;
	
	$array = $con->query("select * from taikhoan where TenTK='$_SESSION[user]'");
	$row = $array->fetch_assoc();
	return $row['TenTK'];
}
function getAdminName($id)
{	
	global $con;
	
	$array = $con->query("select * from taikhoan where id='$id'");
	$row = $array->fetch_assoc();
	return $row['TenTK'];
}
function getAllCat()
{	
	global $con;
	
	$array = $con->query("select * from loaisp");
	while($row = $array->fetch_assoc())
	{
		echo "<option value='$row[MaLoai]'>$row[TenLoaiSP]</option>";
	}
	
}
function diachi()
{	
	global $con;
	$makh= $_POST['makh1'];
	$array = $con->query("select * from khachhang where MaKH = '$makh'");
	while($rowdc = $array->fetch_assoc())
	{
		echo "$rowdc[DiaChi]";
	}
	
}
function makh()
{	
	global $con;
	$tenkh= $_POST['name'];
	$array = $con->query("select * from khachhang where TenKH = '$tenkh'");
	while($row = $array->fetch_assoc())
	{
		echo "$row[MaKH]";
	}
	
}
function maloaisp()
{	
	global $con;
	$masp=$_POST['MaSP'];
	$array = $con->query("select * from sanpham where MaSP = '$masp'");
	while($row = $array->fetch_assoc())
	{
		echo "$row[MaLoaiSP]";
	}
	
}

 ?>