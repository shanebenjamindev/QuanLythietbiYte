<?php 
    session_start(); 
    include '../connetdb.php';
    if( !isset($_SESSION["user"])){
        header("location:./Form Login-SignUp/login-signup.php");
    }
        // Tiền Thu
        $sql_THU = "SELECT SUM(TongTien)'TienThu' FROM taodonhang ";
        $query_THU = mysqli_query($connet,$sql_THU);
        $Tong_THU = mysqli_fetch_assoc($query_THU); 
    // Số đơn
    $sql_SODON = "SELECT count(id_MaDon) 'Số đơn' from taodonhang ";
    $query_SODON = mysqli_query($connet,$sql_SODON);
    $Tong_SD = mysqli_fetch_assoc($query_SODON);
    // Số lượng sản phẩm
    $sql_sanpham = "SELECT  SUM(SoLuong)'SoLuong' from sanpham" ;  
    $query_sanpham = mysqli_query($connet,$sql_sanpham);
    $Tong_SoLuongSP = mysqli_fetch_assoc($query_sanpham);
    
    $sql_SANPHAMVIP = "SELECT TenSP from donhang where month(NgayMua)=month(curdate()) group by MaLoaiSP ORDER BY SUM(SoLuong) desc limit 0 , 1 ";
     $query_SANPHAMVIP= mysqli_query($connet,$sql_SANPHAMVIP);
     $Tong_SANPHAMVIP = mysqli_fetch_assoc($query_SANPHAMVIP);

     
     $sql_SANPHAMNHIEU = "SELECT TenSP from sanpham ORDER BY SoLuong DESC  LIMIT 0 , 1 ";
     $query_SANPHAMNHIEU= mysqli_query($connet,$sql_SANPHAMNHIEU);
     $Tong_SANPHAMNHIEU = mysqli_fetch_assoc($query_SANPHAMNHIEU);
     
    $sql_SANPHAMHET = "SELECT TenSP from sanpham ORDER BY SoLuong LIMIT 0 , 1 ";
    $query_SANPHAMHET= mysqli_query($connet,$sql_SANPHAMHET);
    $Tong_SANPHAMHET = mysqli_fetch_assoc($query_SANPHAMHET);
     //Số lượng khách hàng
     $sql_SOKHACH = "SELECT count(MaKH) 'KhachHang' from khachhang ";
     $query_SOKHACH = mysqli_query($connet,$sql_SOKHACH);
     $Tong_SOKHACH = mysqli_fetch_assoc($query_SOKHACH);

     $sql_KHACHVIP = "SELECT TenKH from donhang where month(NgayMua)=month(curdate()) group by TenKH ORDER BY SUM(GiaBan*SoLuong) desc limit 0 , 1 ";
     $query_KHACHVIP= mysqli_query($connet,$sql_KHACHVIP);
     $Tong_KHACHVIP = mysqli_fetch_assoc($query_KHACHVIP);
      //Tổng chi
   $sql_CHI = "select SUM(ThanhTien)'TongChi' from ct_dathang ";
   $query_CHI = mysqli_query($connet,$sql_CHI);
   $Tong_CHI = mysqli_fetch_assoc($query_CHI); 

   // Số lượng nhân viên  


   $sql_NHANVIENVIP = "SELECT NguoiBan from donhang where month(NgayMua)=month(curdate()) group by MaTk ORDER BY SUM(GiaBan*SoLuong) desc limit 0 , 1 ";
    $query_NHANVIENVIP= mysqli_query($connet,$sql_NHANVIENVIP);
    $Tong_NHANVIENVIP = mysqli_fetch_assoc($query_NHANVIENVIP);

    //Nhà cung cấp 

    $sql_NCC = "    SELECT SoLuong , TenNCC from nhacungcap ncc , loaisp lsp where ncc.MaNCC = lsp.MaNCC ORDER BY SoLuong DESC LIMIT 0 ,1 ";
    $Query_NCC= mysqli_query($connet,$sql_NCC);
    $Tong_NCC = mysqli_fetch_assoc($Query_NCC);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="home-admin.css">
    <script src="../jquery-3.6.0.min.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="home-admin.js"></script>
</head>
<body>
    <div class="container">
       
        <div class="header">
            <iframe src="http://localhost/QuanLyWebTBYT/header/header-index.php" width="100%" height="130px"frameborder="0"></iframe>
          </div>
            <div class="title-header">
               
            </div>
        </div>
        <div class="left-menu">
            <span><button type="button" class="btn-button">&#9776;DANH MỤC</button></span>
          </div>
        <div class="slidenav">
            <button type="button" class="btn-button2">&times;</button>
            <div class="slide-nav-menu">
                <ul>
                    <li  style="border-top: 2px solid black;
                    box-shadow: 1px 1px black;" class="active-class-2"><a href="../Trang-chu-admin/home-admin.php"> <span style="margin-right: 15px"><i class="fas fa-home"></i></span>Trang chủ</a></li>
                    <li><a href="../Tao-don-hang/tao-don-hang.php"><span style="margin-right: 15px"><i class="fas fa-cart-arrow-down"></i></span>Tạo đơn hàng y tế</a></li>
                    <li><a href="../San-pham/san-pham.php"><span style="margin-right: 15px"><i class="fab fa-product-hunt"></i></span>Sản phẩm y tế</a></li>
                    <li><a href="../Khach-hang/khach-hang.php"><span style="margin-right: 15px"><i class="fas fa-user-tie"></i></span>Doanh nghiệp</a></li>
                    
                    <li><a href="../Doanh-thu/doanh-thu.php"><span style="margin-right: 15px"><i class="fas fa-balance-scale"></i></span>Doanh thu</a></li>
                    <li><a href="../thu-chi/thu-chi.php"><span style="margin-right: 15px"><i class="fas fa-money-bill-alt"></i></span>Thu chi</a></li>
                    <li><a href="../loi-nhuan/loi-nhuan.php"><span style="margin-right: 15px"><i class="fas fa-donate"></i></span>Lợi nhuận</a></li>
                    <li><a href="../thiet-lap/thiet-lap.php"><span style="margin-right: 15px"><i class="fas fa-users-cog"></i></span>Thiết lập</a></li>
                    <li><a href="../Form%20Login-SignUp/logout.php"><span style="margin-right: 15px"><i class="fas fa-users-cog"></i></span>ĐĂNG XUẤT</a></li>
                </ul>
            </div>
          </div>


        <div class="right">
            <h3>HOẠT ĐỘNG HÔM NAY</h3>
<div class="khoi-container">
    <div class="khoi-1 wow bounceIn">
        <i class="far fa-credit-card"></i>
        <div class="title-1">
            <a>TIỀN BÁN HÀNG : <?php echo $Tong_THU['TienThu']; ?>.VNĐ</a>
        </div>
    </div>
    <div class="khoi-2 wow bounceIn">
        <i class="fas fa-cart-arrow-down"></i>
        <div class="title-1">
            <a>SỐ ĐƠN HÀNG :<?php echo $Tong_SD['Số đơn']; ?>    </a>
            <br>
            <a>SỐ SẢN PHẨM : <?php echo $Tong_SoLuongSP['SoLuong']; ?> (sp)</a>
        </div>
    </div>
    <div class="khoi-3 wow bounceIn">
        <i class="fas fa-arrow-alt-circle-left"></i>
        <div class="title-1">
            <a>KHÁCH HÀNG VIP : <?php echo $Tong_THU['TienThu']; ?> .VNĐ</a>
        </div>
    </div>
    <div class="khoi-4 wow bounceIn">
        <i class="fab fa-cloudflare"></i>
        <div class="title-1">
            <a>TỔNG CHI : <?php echo $Tong_CHI['TongChi'];?> .VNĐ</a>
        </div>
    </div>
</div>
<div class="khoi-container">
    <div class="khoi-5 wow bounceInUp">
        <p style="height: 40px; box-shadow: 1px 1px #000000; background-color:#a9a9a99c; text-align: center; font-size:20px; line-height:40px; color:black;"><span style="margin-right: 5px;"><i class="fas fa-play-circle"></i></span>HOẠT ĐỘNG</p>
        <div class="noi-dung-khung">
            <div class="noi-dung">
<p>Khách hàng VIP :  </p>
<p>Sản phẩm mua nhiều : </p>
<p>Nhân viên của tháng :  </p>
<p>Công ty DH : </p>
            </div>
            <div class="so-luong">
                <p><?php echo $Tong_KHACHVIP['TenKH'];  ?></p>
                <p><?php echo $Tong_SANPHAMVIP['TenSP'];  ?></p>
                <p><?php echo $Tong_NHANVIENVIP['NguoiBan'];  ?></p>
                <p>02922.222.228</p>
            </div>
        </div>
    </div>


    <div class="khoi-6 wow bounceInUp">
        <p style="height: 40px; box-shadow: 1px 1px #000000; background-color: #a9a9a99c; text-align: center; font-size:20px; line-height:40px; color:#000000c4;"><span style="margin-right: 5px;"><i class="fas fa-info"></i></span>THÔNG TIN KHO</p>
        <div class="noi-dung-khung">
            <div class="noi-dung">
                <p>Tồn kho</p>
                <p>Sắp hết hàng</p>
                <p>Còn hàng nhiều nhất : </p>
            </div>
            <div class="so-luong">
                <p><?php echo $Tong_SoLuongSP['SoLuong'];  ?> (sp)</p>
                <p><?php echo $Tong_SANPHAMHET['TenSP'];  ?></p>
            
                <p><?php echo $Tong_SANPHAMNHIEU['TenSP'];  ?></p>
            </div>
        </div>
    </div>
    <div class="khoi-7 wow bounceInUp">
        <p style="height: 40px; box-shadow: 1px 1px #000000; background-color: #a9a9a99c; text-align: center; font-size:20px;  line-height:40px; color:#000000c4;"><span style="margin-right: 5px;"><i class="fas fa-barcode"></i></span>THÔNG TIN NHÀ CUNG CẤP</p>
        <div class="noi-dung-khung">
            <div class="noi-dung">
<p>NHÀ CUNG CẤP : </p>
<p>Số lượng SP :    </p>

            </div>
            <div class="so-luong">
                
                <p><?php echo $Tong_NCC['TenNCC'];  ?></p> 
                <p><?php echo $Tong_NCC['SoLuong'];  ?> (sp)</p>
            </div>
    </div>
</div>
</div>
<div class="khoi-container">
    <div class="khoi-8 wow bounceInUp">
        <p style="height: 40px; box-shadow: 1px 1px #000000; background-color: #a9a9a99c; text-align: center; font-size:20px;  line-height:40px; color:#000000c4; "><span style="margin-right: 5px;"><i class="fas fa-chart-pie"></i></span>BIỂU ĐỒ DOANH SỐ TUẦN</p>
        <p style="padding-left: 10px; padding-top: 10px;">Loading ...</p>
    </div>
    <div class="khoi-9 wow bounceInUp">
        <p style="height: 40px; box-shadow: 1px 1px #000000; background-color: #a9a9a99c; text-align: center; font-size:20px;  line-height:40px; color:#000000c4;"><span style="margin-right: 5px;"><i class="fa fa-globe"></i></span>THÔNG TIN TỪ WEB</p>
        <p style="padding-left: 10px; padding-top: 10px;">Loading ...</p>
    </div>
    <div class="khoi-10 wow bounceInUp">
        <p style="height: 40px; box-shadow: 1px 1px #000000; background-color: #a9a9a99c; text-align: center; font-size:20px;  line-height:40px; color:#000000c4; "><span style="margin-right: 5px;"><i class="fa fa-rss"></i></span>TIN CHUYÊN NGÀNH</p>
        <p style="padding-left: 10px; padding-top: 10px;">Loading ...</p>
    </div>
</div>
        </div>


        <div class="footer">
        <iframe src="http://localhost/QuanLyWebTBYT/footer/footer-index.php" width="100%" height="70px" frameborder="0"></iframe>
      </div>  
            <marquee behavior="alternate" direction="right">
             
            </marquee>
        </div>
    </div>
    <script type="text/javascript">
        new WOW().init();
    </script>
</body>
</html>