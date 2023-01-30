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
 <div class="header">
   <iframe src="file:///C:/xampppp/htdocs/QuanLyWebTBYT/header/header-index.html" width="100%" height="130px"frameborder="0"></iframe>
 </div>


 <div class="left-menu">
  <span><button type="button" class="btn-button">&#9776;DANH MỤC</button></span>
</div>
<div class="slidenav">
  <button type="button" class="btn-button2">&times;</button>
  <div class="slide-nav-menu">
      <ul>
          <li style="border-top: 2px solid black;
          box-shadow: 1px 1px black;"><a href="#"><span style="margin-right: 15px"><i class="fas fa-home"></i></span>Trang chủ</a></li>
          <li><a href="#"><span style="margin-right: 15px"><i class="fas fa-cart-arrow-down"></i></span>Tạo đơn hàng y tế</a></li>
          <li><a href="#"><span style="margin-right: 15px"><i class="fab fa-product-hunt"></i></span>Sản phẩm y tế</a></li>
          <li><a href="#"><span style="margin-right: 15px"><i class="fas fa-user-tie"></i></span>Doanh nghiệp</a></li>
          <li><a href="#"><span style="margin-right: 15px"><i class="fas fa-truck"></i></span>Nhập kho</a></li>
          <li><a href="#"><span style="margin-right: 15px"><i class="fas fa-warehouse"></i></span>Xuất kho</a></li>
          <li><a href="#"><span style="margin-right: 15px"><i class="fas fa-balance-scale"></i></span>Doanh thu</a></li>
          <li><a href="#"><span style="margin-right: 15px"><i class="fas fa-money-bill-alt"></i></span>Thu chi</a></li>
          <li><a href="#"><span style="margin-right: 15px"><i class="fas fa-donate"></i></span>Lợi nhuận</a></li>
          <li><a href="#"><span style="margin-right: 15px"><i class="fas fa-users-cog"></i></span>Thiết lập</a></li>
      </ul>
  </div>
</div>

 <div class="right">
   <div class="header-right">
     <div class="title-right">
       <p>DANH SÁCH ĐƠN HÀNG</p>
     </div>
     <div class="menu-right">
       <a href="taodon.php">Tạo đơn hàng</a>
       <button type="button" name="" class="button-right-1"><span><i class="fa fa-shopping-cart icon"></i>Đặt Hàng</span></button>
       <button type="button" name="" class="button-right-2"><span><i class="fa fa-desktop icon"></i>Bán Hàng</span></button>
       <button type="button" name="" class="button-right-3"><span><i class="fa fa-download icon"></i>Xuất Excel</span></button>
     </div>
   </div>

   <div class="button-group">
     <div class="button-group-min-1">
      <input type="text" name="" value="" class="input-group" placeholder="Nhập vào ô để tìm kiếm">
      <select name="" id="" class="input-group">
        <option value="">Đơn hàng</option>
        <option value="">Đơn hàng đã xóa</option>
        <option value="">Đơn hàng còn nợ</option>
      </select>
      <p>Từ ngày: <input type="text" name="" id="datepick" class="input-group" placeholder="2021-01-01"></p>
      <p>Đến ngày: <input type="text" name="" id="datepick1" class="input-group"placeholder="2021-01-01"></p>
      <button type="submit" name="" value="" class="btn-1"><span><i class="fa fa-search icon"></i></span>Tìm kiếm</button>
     </div>
<div class="button-group-min-2">
  <button type="button" name="" value="" class="btn">Tuần</button>
  <button type="button" name="" value="" class="btn" >Tháng</button>
  <button type="button" name="" value="" class="btn">Năm</button>
</div>
   </div>

   <div class="table-group">
     <table>
       <tr>
         <th>STT</th>
         <th>Khách hàng</th>
         <th>Sản phẩm</th>
         <th>Số lượng</th>
         <th>Giá</th>
         <th>SĐT</th>
         <th>Địa chỉ</th>
         <th>Ngày bán</th>
         <th>Ghi chú</th>
         <th>Thu ngân</th>
       </tr>
       <tr>
       <?php

        include ('./assets/db.php');

        $sql = "SELECT * FROM donhang";
        $result = $con->query($sql);

        $stt = 1;
        
        while($row = $result -> fetch_assoc()){
          echo 
          "<tr>
          <th>".$stt++."</th>
          <th>".$row['TenKH']."</th>
          <th>".$row['DiaChi']."</th>
          <th>".$row['NgayMua']."</th>
          <th>".$row['NguoiBan']."</th>
          <th><a href='suadh.php?MaDH=$row[MaDH]'>Sửa</th>
          <th><a href='danhan.php?madh=$row[MaDH]'>Đã nhận hàng</a></th>
          </tr>";
        }
      ?>
      
       </tr>
     </table>
   </div>
<div class="bottom">
  <p>Tổng số hóa đơn : 0</p>
  <p>Tổng tiền : 0</p>
  <p>Tổng nợ : 0</p>
</div>
 </div>
 <div class="footer">
   <iframe src="file://C:/xampppp/htdocs/QuanLyWebTBYT/footer/footer-index.html" width="100%" height="70px" frameborder="0"></iframe>
 </div>
 <script type="text/javascript" src="">
  
</script>
</body>
</html>