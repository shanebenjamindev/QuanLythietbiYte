<?php 
session_start();
include 'assets/bill.php';
include 'assets/db.php';
if (isset($_REQUEST['q'])) 
{
	if ($_REQUEST['q'] == 'addtobill') 
	{
		$MaSP = $_REQUEST['MaSP'];
		$array = $con->query("select * from sanpham where MaSP = '$MaSP'");
    	$row = $array->fetch_assoc();
		$name = $row['TenSP'];
		$price = $row['GiaBan'];
		$giavon = $row['GiaVon'];
		$MaLoaiSP= $row['MaLoaiSP'];
		$qty = '1';
		$item = array(
			'MaSP' => $MaSP,
			'TenSP' => $name,
			'GiaBan' => $price,
			'MaLoaiSP' => $MaLoaiSP,
			'GiaVon' => $giavon,
			'qty' => $qty,
		);

		array_push($_SESSION['bill'],$item);
	}
}
if (isset($_GET['remove'])) 
{
	$MaSP = $_GET['remove'];
    foreach ($_SESSION['bill'] as $key => $value) 
    {
      if($_SESSION['bill'][$key]['MaSP'] == $MaSP){
      	unset($_SESSION['bill'][$key]);
      	break;
      } 
    }
    header("location:billing.php");
}
echo $_SESSION['bill'][2]['MaSP'];
echo "<pre>";
print_r($_SESSION['bill']);
 ?>