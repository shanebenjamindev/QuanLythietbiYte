<?php
session_start();

if(!isset($_SESSION['user']))
{
  header('location:../dangnhap/login.php');
}

 ?>
<?php require "assets/function.php" ?>
<?php require 'assets/db.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo siteTitle(); ?></title>
    <script src='js/jquery.js'></script>
    <title>Tạo đơn</title>
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../jquery-ui-1.12.1/jquery-ui.css">
    <link rel="stylesheet" href="../jquery-ui-1.12.1/jquery-ui.theme.css">
      <link rel="stylesheet" href="tao-don-hang.css">
      <script src="../jquery-3.6.0.min.js"></script>
      <script src="../js/wow.min.js"></script>
      <script src="../jquery-ui-1.12.1/jquery-ui.js"></script>
      <script src="tao-don-hang.js"></script>
</head>
<body>
<?php 
//  echo 'Bạn đã đăng nhập với tên là '.$_SESSION['user']."<br/>";
if (isset($_GET['catId']))
{
  
  $catId = $_GET['catId'];
  $array = $con->query("select * from loaisp where MaLoaiSP='$catId'");
  $catArray =$array->fetch_assoc();
  $catName = $catArray['TenSP'];
  $stockArray = $con->query("select * from sanpham where MaSP='$catArray[MaSP]'");
 
}
else
{
  $catName = "Tất cả sản phẩm";
  $stockArray = $con->query("select * from sanpham");

  $ncc = $con->query("select * from ncc");


}
  include 'assets/bill.php';
 ?>
  <!-- <div class="load">
    <img src="../image/giphy-unscreen.gif">
</div>  -->
 <div class="header">
   <iframe src="http://localhost/QuanLyWebTBYT/header/header-index.php" width="100%" height="130px"frameborder="0"></iframe>
 </div>


 <div class="left-menu">
  <span><button type="button" class="btn-button">&#9776;DANH MỤC</button></span>
</div>
<div class="slidenav">
  <button type="button" class="btn-button2">&times;</button>
  <div class="slide-nav-menu">
    <ul>
      <li style="border-top: 2px solid black;
      box-shadow: 1px 1px black;" class="active-class-2"><a href="../Trang-chu-admin/home-admin.php"><span style="margin-right: 15px"><i class="fas fa-home"></i></span>Trang chủ</a></li>
      <li><a href="../Tao-don-hang/tao-don-hang.php"><span style="margin-right: 15px"><i class="fas fa-cart-arrow-down"></i></span>Tạo đơn hàng y tế</a></li>
      <li><a href="../San-pham/san-pham.php"><span style="margin-right: 15px"><i class="fab fa-product-hunt"></i></span>Sản phẩm y tế</a></li>
      <li><a href="../Khach-hang/khach-hang.php"><span style="margin-right: 15px"><i class="fas fa-user-tie"></i></span>Doanh nghiệp</a></li>
      <li><a href="../Nhap-kho/nhap-kho.php"><span style="margin-right: 15px"><i class="fas fa-truck"></i></span>Nhập kho</a></li>
      <li><a href="../Xuat-kho/xuat-kho.php"><span style="margin-right: 15px"><i class="fas fa-warehouse"></i></span>Xuất kho</a></li>
      <li><a href="../Doanh-thu/doanh-thu.php"><span style="margin-right: 15px"><i class="fas fa-balance-scale"></i></span>Doanh thu</a></li>
      <li><a href="../thu-chi/thu-chi.php"><span style="margin-right: 15px"><i class="fas fa-money-bill-alt"></i></span>Thu chi</a></li>
      <li><a href="../loi-nhuan/loi-nhuan.php"><span style="margin-right: 15px"><i class="fas fa-donate"></i></span>Lợi nhuận</a></li>
      <li><a href="../thiet-lap/thiet-lap.php"><span style="margin-right: 15px"><i class="fas fa-users-cog"></i></span>Thiết lập</a></li>
  </ul>
  </div>
</div>

 <div class="right">
   <div class="header-right">
     <div class="title-right">
       <p>DANH SÁCH SẢN PHẨM</p>
     </div>
 
   </div>

   <div class="button-group">

<div class="button-group-min-2">

</div>
   </div>

   <div class="table-group">
     <table>
       <tr>
       <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Giá bán</th>
        <th>Mã Loại sản phẩm</th>
        <th></th>
        <th></th>
       </tr>
       <tr>
       <?php $i=0;
        while ($row = $stockArray->fetch_assoc()) 
        { 
          $i=$i+1;
          $MaSP = $row['MaSP'];
        ?>
          <tr>
            <th><?php echo $i; ?></th>
            <th><?php echo $row['TenSP']; ?></th>
            <th><?php echo $row['GiaVon']; ?>.VNĐ</th>
            <th><?php echo $row['MaLoaiSP']; ?></th>
            <?php 
            if (!empty($_SESSION['bill'])) 
            {
             
            foreach ($_SESSION['bill'] as $key => $value) 
            {
              if (in_array($row['MaSP'], $_SESSION['bill'][$key])) 
              {
                echo "<th>Selected</th>";break;
              }            
               else
               {
              ?>
             <th id='selection<?php echo $i; ?>'><button onclick="addInBill('<?php echo $MaSP ?>','<?php echo $i; ?>')">Select</button></th>
              <?php break;} } } else {?>
              <th id='selection<?php echo $i; ?>'><button onclick="addInBill('<?php echo $MaSP ?>','<?php echo $i; ?>')">Select</button></th>
              <?php } ?>
              
              <th colspan="center"><a href="delete.php?item=<?php echo $row['MaSP'] ?>&url=<?php echo $_SERVER['QUERY_STRING'] ?>"><button>Delete Item</button></a></th>
          </tr>
      <?php
        }
       ?>
     </table>
 
   </div>

 </div>
 <div class="footer">
   <iframe src="http://localhost/QuanLyWebTBYT/footer/footer-index.php" width="100%" height="70px" frameborder="0"></iframe>
 </div>
 <script type="text/javascript" src="">
  
</script>
</body>
</html>
<script type="text/javascript">
  function addInBill(MaSP,place)
  { 
    var value = $("#counter").val();
    value ++;
    var selection = 'selection'+place;
    $("#bill").fadeIn();
    $("#counter").val(value);
    $("#"+selection).html("Selected");
    $.post('called.php?q=addtobill',
               {
                   MaSP:MaSP
                   
               }
        );

  }
 
</script>