<?php 
    session_start(); 
    if( !isset($_SESSION["user"])){
        header("location:./Form Login-SignUp/login-signup.php");
    }

?>


<?php
    echo 'Bạn đã đăng nhập với tên là '.$_SESSION['user']."<br/>";
    echo 'hello '.$_SESSION['user']."<br/>"; 
     echo 'Click vào đây để <a href="./Form Login-SignUp/logout.php">Logout</a></br>';
     echo 'Click vào đây để <a href="./khach-hang/khach-hang.php">Quản lú khách hàng</a></br>';
     echo 'Click vào đây để <a href="./Tao-don-hang/tao-don-hang.php">Quản lú đơn hàng</a></br>';
     echo 'Click vào đây để <a href="./doimatkhau/doimk.php">Đổi mật khẩu</a>';
     echo 'Click vào đây để <a href="./san-pham/san-pham.php">San pham</a>';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <ul>
                    <li><a href="#"><p  style="font-weight: bold; font-size: 17px; color:whitesmoke">Cửa hàng</p></a></li>
                    <li><select name="" id="" style="height: 25px; border: 1px solid black; border-radius:10px; background-color: rgb(56, 56, 173); color: white;">
                            <option value="">Cửa hàng y tế 1</option>
                            <option value="">Cửa hàng y tế 2</option>
                            <option value="">Cửa hàng y tế 3</option>
                            <option value="">Cửa hàng y tế 4</option>
                            <option value="">Cửa hàng y tế 5</option>
                        </select>
                    </li>
                    <li><button type="button" name="" value="" style="width:100px; height:25px; border: 1px solid black; background-color:red; border-radius:10px; color:white; font-weight:bold;">Đăng nhập</button></li>
                </ul>
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
                    box-shadow: 1px 1px black;" class="active-class-2"><a href="../Trang-chu-admin/home-admin.html"> <span style="margin-right: 15px"><i class="fas fa-home"></i></span>Trang chủ</a></li>
                    <li><a href="../Tao-don-hang/tao-don-hang.html"><span style="margin-right: 15px"><i class="fas fa-cart-arrow-down"></i></span>Tạo đơn hàng y tế</a></li>
                    <li><a href="../San-pham/san-pham.html"><span style="margin-right: 15px"><i class="fab fa-product-hunt"></i></span>Sản phẩm y tế</a></li>
                    <li><a href="../Khach-hang/khach-hang.html"><span style="margin-right: 15px"><i class="fas fa-user-tie"></i></span>Doanh nghiệp</a></li>
                    <li><a href="../Nhap-kho/nhap-kho.html"><span style="margin-right: 15px"><i class="fas fa-truck"></i></span>Nhập kho</a></li>
                    <li><a href="../Xuat-kho/xuat-kho.html"><span style="margin-right: 15px"><i class="fas fa-warehouse"></i></span>Xuất kho</a></li>
                    <li><a href="../Doanh-thu/doanh-thu.php"><span style="margin-right: 15px"><i class="fas fa-balance-scale"></i></span>Doanh thu</a></li>
                    <li><a href="../thu-chi/thu-chi.php"><span style="margin-right: 15px"><i class="fas fa-money-bill-alt"></i></span>Thu chi</a></li>
                    <li><a href="../loi-nhuan/loi-nhuan.php"><span style="margin-right: 15px"><i class="fas fa-donate"></i></span>Lợi nhuận</a></li>
                    <li><a href="../thiet-lap/thiet-lap.php"><span style="margin-right: 15px"><i class="fas fa-users-cog"></i></span>Thiết lập</a></li>
                </ul>
            </div>
          </div>


        <div class="right">
            <h3>HOẠT ĐỘNG HÔM NAY</h3>
<div class="khoi-container">
    <div class="khoi-1 wow bounceIn">
        <i class="far fa-credit-card"></i>
        <div class="title-1">
            <a>TIỀN BÁN HÀNG : 0</a>
        </div>
    </div>
    <div class="khoi-2 wow bounceIn">
        <i class="fas fa-cart-arrow-down"></i>
        <div class="title-1">
            <a>SỐ ĐƠN HÀNG : 0</a>
            <br>
            <a>SỐ SẢN PHẨM : 0</a>
        </div>
    </div>
    <div class="khoi-3 wow bounceIn">
        <i class="fas fa-arrow-alt-circle-left"></i>
        <div class="title-1">
            <a>HÀNG KHÁCH TRẢ : 0</a>
        </div>
    </div>
    <div class="khoi-4 wow bounceIn">
        <i class="fab fa-cloudflare"></i>
        <div class="title-1">
            <a>ĐƠN HÀNG WEB : 0</a>
        </div>
    </div>
</div>
<div class="khoi-container">
    <div class="khoi-5 wow bounceInUp">
        <p style="height: 40px; box-shadow: 1px 1px #000000; background-color:#a9a9a99c; text-align: center; font-size:20px; line-height:40px; color:black;"><span style="margin-right: 5px;"><i class="fas fa-play-circle"></i></span>HOẠT ĐỘNG</p>
        <div class="noi-dung-khung">
            <div class="noi-dung">
<p>Tên bán hàng</p>
<p>Tên đơn hàng</p>
<p>Số sản phẩm</p>
<p>Khách hàng trả</p>
            </div>
            <div class="so-luong">
                <p>0</p>
                <p>0</p>
                <p>0</p>
                <p>0</p>
            </div>
        </div>
    </div>


    <div class="khoi-6 wow bounceInUp">
        <p style="height: 40px; box-shadow: 1px 1px #000000; background-color: #a9a9a99c; text-align: center; font-size:20px; line-height:40px; color:#000000c4;"><span style="margin-right: 5px;"><i class="fas fa-info"></i></span>THÔNG TIN KHO</p>
        <div class="noi-dung-khung">
            <div class="noi-dung">
                <p>Tồn kho</p>
                <p>Hết hàng</p>
                <p>Sắp hết hàng</p>
                <p>Vượt định mức</p>
            </div>
            <div class="so-luong">
                <p>0</p>
                <p>0</p>
                <p>0</p>
                <p>0</p>
            </div>
        </div>
    </div>
    <div class="khoi-7 wow bounceInUp">
        <p style="height: 40px; box-shadow: 1px 1px #000000; background-color: #a9a9a99c; text-align: center; font-size:20px;  line-height:40px; color:#000000c4;"><span style="margin-right: 5px;"><i class="fas fa-barcode"></i></span>THÔNG TIN SẢN PHẨM</p>
        <div class="noi-dung-khung">
            <div class="noi-dung">
<p>Sản phẩm/Nhà sản xuất</p>
<p>Chưa làm giá bán</p>
<p>Chưa nhập giá mua</p>
<p>Hàng chưa phân loại</p>
            </div>
            <div class="so-luong">
                <p>0/0</p>
                <p>0</p>
                <p>0</p>
                <p>0</p>
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
            <marquee behavior="alternate" direction="right">
                <p>QUẢN LÍ THIẾT BỊ Y TẾ</p>
            </marquee>
        </div>
    </div>
    <script type="text/javascript">
        new WOW().init();
    </script>
</body>
</html>