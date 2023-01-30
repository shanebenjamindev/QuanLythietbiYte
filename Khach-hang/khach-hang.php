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
      <link rel="stylesheet" href="khach-hang.css">
      <script src="../jquery-3.6.0.min.js"></script>
      <script src="../js/wow.min.js"></script>
      <script src="../jquery-ui-1.12.1/jquery-ui.js"></script>
      <script src="khach-hang1.js"></script>
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
          <li><a href="../Tao-don-hang/tao-don-hang.php"><span style="margin-right: 15px"><i class="fas fa-cart-arrow-down"></i></span>Tạo đơn hàng y tế</a></li>
          <li><a href="../San-pham/san-pham.php"><span style="margin-right: 15px"><i class="fab fa-product-hunt"></i></span>Sản phẩm y tế</a></li>
          <li><a href="../Khach-hang/khach-hang.php"><span style="margin-right: 15px"><i class="fas fa-user-tie"></i></span>Doanh nghiệp</a></li>
          
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
          <p>KHÁCH HÀNG</p>
        </div>
        <div class="menu-right">
          <a href="themkh.php" ><button type="button" name="" class="button-right-2"><span><i class="fa fa-plus icon"></i>Thêm khách hàng</span></button></a>
          <a href="themncc.php" ><button type="button" name="" class="button-right-2"><span><i class="fa fa-plus icon"></i>Thêm NCC</span></button></a>
          <button type="button" name="" class="button-right-3"><span><i class="fa fa-download icon"></i>Xuất Excel</span></button>
        </div>
      </div>
<div class="button-group-3">
    <button type="button" name="" value="" class="btn-tab-1"><span><i class="fa fa-user icon"></i></span>Khách hàng</button>
    <button type="button" name="" value="" class="btn-tab-2"><span><i class="fa fa-truck icon"></i></span>Nhà cung cấp</button>
</div>
<div class="button-group-1">
    <div id="button-group-min-1">
     <input type="text" name="" value="" class="input-group" placeholder="Nhập vào ô để tìm kiếm">
     <select name="" id="" class="input-group">
       <option value="">Tất cả</option>
       <option value="">VIP</option>
       <option value="">NẠP LẦN ĐẦU</option>
     </select>
     <button type="submit" name="" value="" class="btn-1"><span><i class="fa fa-search icon"></i></span>Tìm kiếm</button>
    </div>
    <div class="table-group">
        <table>
          <tr>
            <th>STT</th>
            <th>Tên KH</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Ghi Chú</th>
            <th colspan="2"> Thao tác </th>
          </tr>
          <tr>
          <?php
        $con = new mysqli('localhost','root','','qlthietbiyte');

        $sql = "SELECT * FROM khachhang";
        $result = $con->query($sql);

        $stt = 1;
        
        while($row = $result -> fetch_assoc()){
          echo 
          "<tr>
          <th>".$stt++."</th>
          <th>".$row['TenKH']."</th>
          <th>".$row['Email']."</th>
          <th>".$row['DiaChi']."</th>
          <th>".$row['GhiChu']."</th>
          <th><a href='suakh.php?id=$row[MaKH]' >Sửa</th>
          <th><a href='xoakh.php?id=$row[MaKH]' >Xóa</th>
          </tr>";
        }
      ?>
            <!-- <th>
                <i title="Xóa" class="fas fa-trash-alt"  style=" color: blue; cursor: pointer;"></i>
            </th> -->
          </tr>
        </table>
      </div>
      <div class="bottom">
        <p>Số khách hàng : 0 | Tổng tiền hàng : 0 | Tổng nợ : 0</p>
       </div>
</div>   
<div class="button-group-2">
    <div id="button-group-min-2">
     <input type="text" name="" value="" class="input-group" placeholder="Nhập vào ô để tìm kiếm">
     <select name="" id="" class="input-group">
       <option value="">Tất cả</option>
       <option value="">VIP</option>
       <option value="">NẠP LẦN ĐẦU</option>
     </select>
     <button type="submit" name="" value="" class="btn-1"><span><i class="fa fa-search icon"></i></span>Tìm kiếm</button>
    </div>
    <div class="table-group">
        <table>
          <tr>
            <th>STT</th>
            <th>Tên NCC</th>
            <th>Địa chỉ</th>
            <th>STT</th>
            <th>Gmail</th>
            <th>Ngày sửa đổi</th>
            <th colspan="2"> Thao tác </th>
          </tr>
          <tr>
          <?php
        $con = new mysqli('localhost','root','','qlthietbiyte');

        $sql = "SELECT * FROM nhacungcap";
        $result = $con->query($sql);

        $stt = 1;
        
        while($row = $result -> fetch_assoc()){
          echo 
          "<tr>
          <th>".$stt++."</th>
          <th>".$row['TenNCC']."</th>
          <th>".$row['DiaChi']."</th>
          <th>".$row['SDT']."</th>
          <th>".$row['Gmail']."</th>
          <th>".$row['NgayTao']."</th>
          <th><a href='suancc.php?id=$row[MaNCC]' >Sửa</th>
          <th><a href='xoancc.php?id=$row[MaNCC]' >Xóa</th>
          </tr>";
        }
      ?>
          </tr>
        </table>
      </div>
      <div class="bottom">
        <p>Số NCC : 0 | Tổng tiền hàng : 0 | Tổng nợ : 0</p>
       </div>
</div>   
</div>
<div class="footer">
        <iframe src="http://localhost/QuanLyWebTBYT/footer/footer-index.php" width="100%" height="70px" frameborder="0"></iframe>
      </div>  
</body>
</html>