<?php
session_start();

if(!isset($_SESSION['user']))
{
  header('location:login.php');
}
 ?>
<?php require "assets/function.php" ?>
<?php require 'assets/db.php';?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo siteTitle(); ?></title>
  <?php require "assets/autoloader.php" ?>
  <style type="text/css">
  <?php include 'css/customStyle.css'; ?>

  </style>
  <?php 
  $notice="";
  
   ?>
</head>
<body style="background: #ECF0F5;padding:0;margin:0">

  <div class="content2">
  	<div class="well well-sm" style="width: 77%;margin:auto;margin-top: 33px;">
      <div class="well well-sm center"><h1><?php echo siteName(); ?></h1></div> 
    </div>
    <br>
    <div class="well well-sm" style="width: 77%;margin: auto;">
   
      <table class="table table-bordered table-striped">
        
      <tr>
          <th>Tên Khách hàng: </th>
          <td><?php echo $_POST['name'] ?> </th>
          <th>Địa chỉ: </th>
          <td><?php echo diachi(); ?>
           </th>
        </tr>
        
        <tr>
          <th>Ngày tạo: </th>
          <td><?php echo date("Y-m-d h:i:sa"); ?></td>
          <th>Người nhập: </th>
          <td><?php echo adminName(); ?></td>
        </tr>
        <tr>
          <th colspan="4" class="center"><h3>Chi tiết đặt hàng</h3></th>
        </tr>
          <tr>
        <th>STT</th>
        <th>Tên Sản phẩm</th>
        <th>Giá </th>
        <th>Số lượng</th>
      </tr>
    
      
        <?php

$i=$total=0;
$thanhtien = 0;
if(!empty($_SESSION['bill'])){


  $makh = $_POST['makh1'];
  $con->query("INSERT INTO taodonhang (MaKH,TrangThai) values ('$makh','Chưa giao')");

  $id2 = $con->insert_id;





  foreach ($_SESSION['bill'] as $row) 
    {
      
      
      $i++;
      echo "<tr>";
      echo "<td>$i</td>";
      echo "<td>$row[TenSP] $row[MaSP]</td>";
      echo "<td>$row[GiaBan]</td>";
      echo "<td>$row[qty]</td>";
      echo "</tr>";
      $total = $total + $row['GiaBan']*$row['qty'];
      $thanhtien = $row['GiaBan']*$row['qty'];


      $makh = $_POST['makh1'];
      
   

    $matk = "SELECT MaTk FROM taikhoan where TenTK = '$_SESSION[user]'";
    $querymatk = mysqli_query($con,$matk);
    $rowTK = mysqli_fetch_assoc($querymatk);

      $maloai = $row['MaLoaiSP'];
      $matk= $rowTK['MaTk'];
      $soluong = $row['qty'];
      $tensp = $row['TenSP'];
      $giasp = $row['GiaVon'];
      $giaban = $row['GiaBan'];

      $sql = "SELECT * FROM khachhang where MaKH = '$makh'";
      $query = mysqli_query($con,$sql);
      $rowKH = mysqli_fetch_assoc($query);

      $sdt = $rowKH['SDT'];
      $diachi = $rowKH['DiaChi'];
      

      $con->query("insert into donhang (id_MaDon, GiaSP,TenSP,MaLoaiSP,SoLuong,MaKH,TenKH,NguoiBan,GhiChu, MaTk, SDT  ,GiaBan, DiaChi) values 
      ('$id2','$giasp','$tensp','$maloai','$soluong','$makh','$_POST[name]','$_SESSION[user]','Chưa Giao','$matk','$sdt','$giaban','$diachi')") ;

      $query1 = $con->query("SELECT SUM(GiaBan)'total' from donhang WHERE id_MaDon = $id2");
      $rowtongtien = mysqli_fetch_assoc($query1);

      $tongtien = $rowtongtien['total'];


      $con->query("UPDATE taodonhang SET DiaChi = '$diachi', TongTien = '$tongtien' where id_MaDon = '$id2';") ;

    }

}
    
  ?>
  <tr>
    <td colspan="3" style="text-align: right;">Tổng số lượng: </td><th><?php echo $_POST['soluong']; ?></th>
  </tr>
  <tr>
    <td colspan="3" style="text-align: right;border-right: 1px solid blue">Tổng tiền: </td><th style="border: 1px solid blue;"><?php echo $total ?></th>
  </tr>
  <tr>
    <td class="center" colspan="4"><button class="btn btn-primary" onclick="window.print()">Print</button>
    <a href = "../Tao-don-hang/tao-don.php"><button class="btn btn-primary">Trở về</button></a>
      </table>
    </div>
  </div>

<?php 







 if (isset($_POST['billInfo1'])) 
  {
    unset($_SESSION['bill']);
    $_SESSION['bill'] = array();
  }
 ?>
</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){$(".rightAccount").click(function(){$(".account").fadeToggle();});});
</script>

 