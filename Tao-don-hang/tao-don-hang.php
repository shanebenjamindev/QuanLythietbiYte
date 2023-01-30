<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
          <li><a href=""><span style="margin-right: 15px"><i class="fas fa-cart-arrow-down"></i></span>Tạo đơn hàng y tế</a></li>
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
       <p>DANH SÁCH ĐƠN HÀNG</p>
     </div>
     <div class="menu-right">
     <a href="tao-don.php">
       <button type="button" name="" class="button-right-1"><span><i class="fa fa-shopping-cart icon"></i>Đặt Hàng</span></button></a>

     </div>
   </div>

   <div class="button-group">
     <div class="button-group-min-1">

      </select>

     </div>
<div class="button-group-min-2">
 
</div>
   </div>
<form method="" action = "danhan.php">
   <div class="table-group">
     <table>
       <tr>
       <th>STT</th>
         <th>Khách hàng</th>
         <th>Địa chỉ</th>
         <th>Ngày bán</th>
         <th>Số lượng</th>
         <th>Tổng tiền</th>
         <th>Thu ngân</th>   
         <th>Trạng thái</th>
         <th>Xác nhận đã giao</th>
       </tr>
       <tr>
       <?php

include ('./assets/db.php');

$sql = "Select TenKH , SUM(SoLuong)'SoLuong' , SDT, taodonhang.DiaChi , NguoiBan , (SUM(GiaBan*SoLuong)) 'TongTien', NgayBan, TrangThai, donhang.id_MaDon from donhang, taodonhang WHERE donhang.id_MaDon = taodonhang.id_MaDon group by id_MaDon;";
$result = $con->query($sql);

$sqlkh = "SELECT * FROM taodonhang";
$kh = $con->query($sqlkh);





$stt = 1;

    while($row = $result -> fetch_assoc()){ ?>
  
  <tr>
  <th><?php echo $stt++?></th>
  
  <th> <?php echo $row['TenKH']?></th>  
  <th> <?php echo $row['DiaChi']?></th>
  <th> <?php echo $row['NgayBan']?></th>
  <th> <?php echo $row['SoLuong']?></th>
  <th> <?php echo $row['TongTien']?></th>
  <th> <?php echo $row['NguoiBan']?></th>
  <th><?php echo $row['TrangThai']?></th>

  <th><a href='danhan.php?madh=<?php echo $row['id_MaDon']?>'>Đã nhận hàng</button></a></th>
  </tr>
      <?php } ?>
     </table>
    </form>
   </div>

 </div>
 <div class="footer">
        <iframe src="http://localhost/QuanLyWebTBYT/footer/footer-index.php" width="100%" height="70px" frameborder="0"></iframe>
      </div>  
 <script type="text/javascript" src="">
  
</script>
</body>
</html>