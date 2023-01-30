<?php
   
   include '../connetDB.php';
//// BẢNG CHI
   $sqlChi = "SELECT * from ct_dathang ct,dondathang dh where ct.id_donnhap=dh.id ";
   $queryChi = mysqli_query($connet,$sqlChi);


//// BẢNG THU
   $sqlThu = "SELECT NguoiBan , NgayMua, SUM(GiaBan)'TienThu',TenKH , GhiChu From donhang group by MaTk  ";
   $queryThu = mysqli_query($connet,$sqlThu);

////THU CHI 
   // Số đơn
   $sql_SODON = "SELECT count(ID) 'Số đơn' from donhang ";
   $query_SODON = mysqli_query($connet,$sql_SODON);
   $Tong_SD = mysqli_fetch_assoc($query_SODON);
   //Số lượng khách hàng
   $sql_SOKHACH = "SELECT count(MaKH) 'KhachHang' from khachhang ";
   $query_SOKHACH = mysqli_query($connet,$sql_SOKHACH);
   $Tong_SOKHACH = mysqli_fetch_assoc($query_SOKHACH);
  //Mua
   $sql_KHACHVIP = "SELECT TenKH ,SUM(GiaBan*SoLuong)'TongTien' from donhang group by MaKH ORDER BY SUM(GiaBan*SoLuong) desc limit 0 , 1 ";
   $query_KHACHVIP= mysqli_query($connet,$sql_KHACHVIP);
   $Tong_KHACHVIP = mysqli_fetch_assoc($query_KHACHVIP);

  //Ban
   $sql_NHANVIENVIP = "SELECT NguoiBan,SUM(GiaBan*SoLuong)'TongTien' from donhang  group by MaTk ORDER BY SUM(GiaBan*SoLuong) desc limit 0 , 1 ";
   $query_NHANVIENVIP= mysqli_query($connet,$sql_NHANVIENVIP);
   $Tong_NHANVIENVIP = mysqli_fetch_assoc($query_NHANVIENVIP);

   // Tổng Thu
   $sql_THU = "SELECT SUM(GiaBan*SoLuong)'TienThu' FROM donhang ";
   $query_THU = mysqli_query($connet,$sql_THU);
   $Tong_THU = mysqli_fetch_assoc($query_THU); 

   //Tổng chi
   $sql_CHI = "select SUM(ThanhTien)'TongChi' from ct_dathang ";
   $query_CHI = mysqli_query($connet,$sql_CHI);
   $Tong_CHI = mysqli_fetch_assoc($query_CHI); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thu-Chi</title>
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../jquery-ui-1.12.1/jquery-ui.css">
    <link rel="stylesheet" href="../jquery-ui-1.12.1/jquery-ui.theme.css">
      <link rel="stylesheet" href="thu-chi.css">
      <script src="../jquery-3.6.0.min.js"></script>
      <script src="../js/wow.min.js"></script>
      <script src="../jquery-ui-1.12.1/jquery-ui.js"></script>
      <script src="thu-chi1.js"></script>
</head>
<script>
$(window).on("load", function(e) {
    $("body").removeClass("preloadings");
    $(".load").delay(1000).fadeOut("fast");
   });
</script>
<body>
  <div class="load">
    <img src="../image/giphy-unscreen.gif">
</div> 
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
          <p>THU CHI</p>
        </div>
        <div class="menu-right">
          <button type="button" name="" class="button-right-3"><span><i class="fa fa-download icon"></i>Xuất Excel</span></button>
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
     <script src="./jquery.table2excel.min.js"></script>
     <script>
     $("button").click(function(){
  $("#table2excel").table2excel({
    // exclude CSS class
    name: "TênFile",
    filename: "FileExcel", //do not include extension
    fileext: ".xls" // file extension
  }); 
});

     </script>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
     <script src="./jquery.table2excel.min.js"></script>
     <script>
     $("button").click(function(){
  $("#table2excelchi").table2excel({
    // exclude CSS class
    name: "TênFile",
    filename: "FileExcel", //do not include extension
    fileext: ".xls" // file extension
  }); 
});
     </script>
        </div>
      
      </div>

      <div class="khoi-container">
        <div class="khoi-1 wow bounceIn">
            <i class="far fa-credit-card"></i>
            <div class="title-1">
                <a>TỔNG THU : <?php echo $Tong_THU['TienThu']?></a> <br>
                <a>TỔNG CHI : <?php echo $Tong_CHI['TongChi']?></a>
            </div>
        </div>
        <div class="khoi-2 wow bounceIn">
            <i class="fas fa-cart-arrow-down"></i>
            <div class="title-1">
                <a>SỐ ĐƠN : <?php echo $Tong_SD['Số đơn']?></a>
                <br>
                <a>SỐ KHÁCH : <?php echo $Tong_SOKHACH['KhachHang']?></a>
            </div>
        </div>
        <div class="khoi-3 wow bounceIn">
            <i class="fas fa-arrow-alt-circle-left"></i>
            <div class="title-1">
                <a>VIP MUA : <?php echo $Tong_KHACHVIP['TenKH']?> <?php echo $Tong_KHACHVIP['TongTien']?> VNĐ </a>
                <br>
                <a>VIP BÁN : <?php echo $Tong_NHANVIENVIP['NguoiBan']?> <?php echo $Tong_NHANVIENVIP['TongTien']?>VNĐ</a>
            </div>
        </div>
      </div>
<div class="button-group-3">
    <button type="button" name="" value="" class="btn-tab-1"><span><i class="fas fa-cart-arrow-down icon"></i></span>Thu</button>
    <button type="button" name="" value="" class="btn-tab-2"><span><i class="fas fa-dollar-sign icon"></i></span>Chi</button>
</div>

<div class="button-group-1">
    <div class="table-group">
        <table id="table2excel">
          <tr>
            <th>STT</th>
            <th>Nhân viên</th>
            <th>Ngày thu</th>
            <th>Số tiền thu</th>
            <th>Nguồn thu</th>
            <th>Ghi chú nguồn thu</th>
          </tr>
          <?php 
            $i=1 ;
             while($Thu = mysqli_fetch_assoc($queryThu)){
          ?>
          <tr>
            <th><?php echo $i++?></th>
            <th><?php echo $Thu['NguoiBan']?></th>
            <th><?php echo $Thu['NgayMua']?></th>
            <th><?php echo $Thu['TienThu']?></th>
            <th><?php echo $Thu['TenKH']?></th>
            <th><?php echo $Thu['GhiChu']?></th>

          </tr>

          <?php }?>

        </table>
      </div>
      <div class="bottom">
        <p>Tổng tiền thu : 0</p>
       </div>
</div>   
<div class="button-group-2">
    <div class="table-group">
        <table id="table2excelchi"> 
          <tr>
            <th>STT</th>
            <th>Nhân viên</th>
            <th>Ngày chi</th>
            <th>Số tiền chi</th>
            <th>Ghi chú</th>
          </tr>
          <?php
           $y=1 ;
            while($Chi = mysqli_fetch_assoc($queryChi)){
          ?>
          <tr>
            <th><?php echo $y++;?></th>
            <th><?php echo $Chi['NguoiNhap']?></th>
            <th><?php echo $Chi['NgayNhap']?></th>
            <th><?php echo $Chi['ThanhTien']?></th>
            <th><?php echo $Chi['GhiChu']?></th>

          </tr>
          <?php }?>
        </table>
      </div>
      <div class="bottom">
        <p>Tổng tiền chi : 0</p>
       </div>
</div>   
      </div>
</div>
<div class="footer">
        <iframe src="http://localhost/QuanLyWebTBYT/footer/footer-index.php" width="100%" height="70px" frameborder="0"></iframe>
      </div>   
      <script type="text/javascript">
        new WOW().init();
    </script>
    
</body>
</html>