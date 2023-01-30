<?php
session_start();

if(!isset($_SESSION['user']))
{
  header('location:../Form Login-SignUp/login-signup.php');
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
          <th>Người mua</th>
          <td><?php echo $_POST['name'] ?></td>
          <th>Người mua</th>
          <td><?php echo $_POST['email'] ?></td>
          <th>SĐT</th>
          <td><?php echo $_POST['sdt'] ?></td>
          <th>Địa chỉ</th>
          <td><?php echo $_POST['contact'] ?></td>
        </tr>
        <tr>
          <th>Ngày tạo:</th>
          <td><?php echo date("Y-m-d h:i:sa"); ?></td>
          <th>Người bán</th>
          <td><?php echo adminName(); ?></td>
        </tr>
        <tr>
          <th colspan="4" class="center"><h3>Chi tiết đơn hàng</h3></th>
        </tr>
          <tr>
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
      </tr>
        <?php



        $i=$total=0;


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
      echo "<td>$row[GiaVon]</td>.VNĐ";
      echo "<td>$row[qty]</td>";
      
      echo "</tr>";
      $total = $total + $row['GiaVon']*$row['qty'];


    

    $makh = rand(0,99);

    $con->query("insert into khachhang (idKH,TenKH,DiaChi,GhiChu,SDT, Email) values 
    ('$makh','$_POST[name]', '$_POST[contact]','Thường','$_POST[sdt]', '$_POST[email]')");

    $matk = "SELECT MaTk FROM taikhoan where TenTK = '$_SESSION[user]'";
    $querymatk = mysqli_query($con,$matk);
    $rowTK = mysqli_fetch_assoc($querymatk);

      $maloai = $row['MaLoaiSP'];
 
      $makh1 = $makh;
      $matk= $rowTK['MaTk'];
      $soluong = $row['qty'];
      $tensp = $row['TenSP'];
      $giasp = $row['GiaVon'];
      $giaban = $row['GiaBan'];

      $con->query("insert into taodonhang (MaKH,TongTien, TrangThai) values 
      ('$makh1','$total','Chưa Giao')");
  

      $con->query("insert into donhang (GiaSP,TenSP,MaLoaiSP,SoLuong,idKH,TenKH,DiaChi,NguoiBan,GhiChu,SDT, MaTk, GiaBan) values 
      ('$giasp','$tensp','$maloai','$soluong','$makh1','$_POST[name]','$_POST[contact]','$_SESSION[user]','Chưa Giao','$_POST[sdt]','$matk','$giaban')") ;

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
  </tr>
      </table>
    </div>
  </div>

<?php 



  
 



   
    
 if (isset($_POST['billInfo'])) 
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

 