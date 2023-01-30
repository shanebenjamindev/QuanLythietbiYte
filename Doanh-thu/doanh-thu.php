<?php

  include '../connetDB.php';
  ////BÁO CÁO TỔNG HỢP
      $sqlTH = " SELECT id_MaDon, TenKH,NgayMua,NguoiBan,SUM(SoLuong)'SoLuong',SUM(GiaBan)'TongThu', GhiChu 
      from donhang group by TenKH ";
      $queryTH = mysqli_query($connet,$sqlTH);
     // Tổng tiền lợi nhuận
    
    $sql_LoiNhuan = "SELECT (SUM(GiaBan*SoLuong)-SUM(GiaSP*SoLuong))'LoiNhuan' from donhang";
    $query_LoiNhuan = mysqli_query($connet,$sql_LoiNhuan);
    $Tong_LoiNhuan = mysqli_fetch_assoc($query_LoiNhuan); 
    // Số đơn
    $sql_SODON = "SELECT count(id_MaDon) 'Số đơn' from taodonhang ";
    $query_SODON = mysqli_query($connet,$sql_SODON);
    $Tong_SD = mysqli_fetch_assoc($query_SODON);
    // Tiền vốn
    $sql_Gia = "SELECT SUM(GiaSP*SoLuong)'GiaSP' FROM donhang";
    $query_TGia = mysqli_query($connet,$sql_Gia);
    $Tong_TGia = mysqli_fetch_assoc($query_TGia); 
    // Tiền Thu
    $sql_THU = "SELECT SUM(TongTien)'TienThu' FROM taodonhang ";
    $query_THU = mysqli_query($connet,$sql_THU);
    $Tong_THU = mysqli_fetch_assoc($query_THU); 
    // khách hàng 

    $sql_ChonKhachHang = "SELECT *  from khachhang" ;  
    $query_khachhang = mysqli_query($connet,$sql_ChonKhachHang);
    // Nhân viên 
    $sql_NhanVien = "SELECT *  from taikhoan " ;  
    $query_NhanVien = mysqli_query($connet,$sql_NhanVien); 

    
   // nút tìm 
   if(isset($_GET['btnTim'])){
       
    $TenKH = $_GET['KhachHang'] ; 
    $NguoiBan = $_GET['NhanVien'] ;
    $NgayBatDau = $_GET['NgayBatDau'] ;
    $NgayKetThuc = $_GET['NgayKetThuc'] ;
    
   $sqlTH = "SELECT id_MaDon, TenKH,NgayMua,NguoiBan,SUM(SoLuong)'SoLuong',SUM(GiaBan)'TongThu', GhiChu 
    from donhang where TenKH like '%$TenKH%' and  NguoiBan like '%$NguoiBan%' and NgayMua BETWEEN '$NgayBatDau' AND '$NgayKetThuc' group by ID" ;  
   $queryTH = mysqli_query($connet,$sqlTH);}
    // refresh 
    if(isset($_GET['btnrs'])){
      header('location: doanh-thu.php');}
   //  DOANH THU NGÀY
   if(isset($_GET['btnNgay'])){
        
    $sqlTH = "SELECT id_MaDon, TenKH,NgayMua,NguoiBan,SUM(SoLuong)'SoLuong',SUM(GiaBan)'TongThu', GhiChu  from donhang where day(NgayMua)=day(curdate()) group by id_MaDon	" ;  
    $queryTH = mysqli_query($connet,$sqlTH);
  }

    //  DOANH THU THÁNG
 if(isset($_GET['btnThang'])){
     $sqlTH = "SELECT id_MaDon, TenKH,NgayMua,NguoiBan,SUM(SoLuong)'SoLuong',SUM(GiaBan)'TongThu', GhiChu  from donhang where month(NgayMua)=month(curdate()) group by id_MaDon	" ;  
     $queryTH = mysqli_query($connet,$sqlTH);
   }

    //  DOANH THU NĂM 
  if(isset($_GET['btnNam'])){
       $sqlTH = "SELECT id_MaDon, TenKH,NgayMua,NguoiBan,SUM(SoLuong)'SoLuong',SUM(GiaBan)'TongThu', GhiChu  from donhang where year(NgayMua)=year(curdate()) group by id_MaDon" ;  
       $queryTH = mysqli_query($connet,$sqlTH);
     }   
     //Số lượng khách hàng
     $sql_SOKHACH = "SELECT count(MaKH) 'KhachHang' from khachhang ";
     $query_SOKHACH = mysqli_query($connet,$sql_SOKHACH);
     $Tong_SOKHACH = mysqli_fetch_assoc($query_SOKHACH);

     $sql_KHACHVIP = "SELECT TenKH from donhang where month(NgayMua)=month(curdate()) group by TenKH ORDER BY SUM(GiaBan*SoLuong) desc limit 0 , 1 ";
     $query_KHACHVIP= mysqli_query($connet,$sql_KHACHVIP);
     $Tong_KHACHVIP = mysqli_fetch_assoc($query_KHACHVIP);
    // Số lượng nhân viên
    $sql_NhanVien2 = "SELECT count(MaTk) 'NhanVien' from taikhoan " ;  
    $query_NhanVien2 = mysqli_query($connet,$sql_NhanVien2);
    $Tong_NVBAN = mysqli_fetch_assoc($query_NhanVien2); 

    $sql_NHANVIENVIP = "SELECT NguoiBan from donhang where month(NgayMua)=month(curdate()) group by MaTk ORDER BY SUM(GiaBan*SoLuong) desc limit 0 , 1 ";
     $query_NHANVIENVIP= mysqli_query($connet,$sql_NHANVIENVIP);
     $Tong_NHANVIENVIP = mysqli_fetch_assoc($query_NHANVIENVIP);
    // Số lượng sản phẩm
    $sql_sanpham = "SELECT  SUM(SoLuong)'SoLuong' from donhang" ;  
    $query_sanpham = mysqli_query($connet,$sql_sanpham);
    $Tong_SoLuongSP = mysqli_fetch_assoc($query_sanpham);

    $sql_SANPHAMVIP = "SELECT TenSP from donhang where month(NgayMua)=month(curdate()) group by MaLoaiSP ORDER BY SUM(SoLuong) desc limit 0 , 1 ";
     $query_SANPHAMVIP= mysqli_query($connet,$sql_SANPHAMVIP);
     $Tong_SANPHAMVIP = mysqli_fetch_assoc($query_SANPHAMVIP);
   
//// DOANH THU THEO KHÁCH HÀNG    
       $sqlKH = "	 SELECT TenKH ,(count(id_MaDon))'TongSoDon', (SUM(SoLuong))'SoLuong' , SUM(GiaBan*SoLuong)'TienThu', SUM(GiaSP*SoLuong)'TienVon',(SUM(GiaBan*SoLuong)-SUM(GiaSP*SoLuong))'LoiNhuan' , GhiChu FROM donhang    GROUP BY TenKH   " ;  
       $queryKH = mysqli_query($connet,$sqlKH);

//// DOANH THU THEO NHÂN VIÊN
       $sqlNV = "	SELECT NguoiBan , COUNT(MaTk)'TongSoDon' , SUM(GiaBan)'TienThu' ,SUM(SoLuong)'SoLuong' ,  (SUM(GiaBan*SoLuong)-SUM(GiaSP*SoLuong))'LoiNhuan'From donhang group by MaTk	" ;  
       $queryNV = mysqli_query($connet,$sqlNV);

//// DOANH THU THEO SẢN PHẨM
       $sqlSP = "SELECT MaLoaiSP,TenSP ,SUM(SoLuong)'SoLuong',SUM(GiaBan)'TienThu', (SUM(GiaBan*SoLuong)-SUM(GiaSP*SoLuong))'LoiNhuan' 
       from donhang group by MaLoaiSP" ;  
       $querySP = mysqli_query($connet,$sqlSP);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoanhThu</title>
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../jquery-ui-1.12.1/jquery-ui.css">
    <link rel="stylesheet" href="../jquery-ui-1.12.1/jquery-ui.theme.css">
      <link rel="stylesheet" href="doanh-thu.css">
      <script src="../jquery-3.6.0.min.js"></script>
      <script src="../js/wow.min.js"></script>
      <script src="../jquery-ui-1.12.1/jquery-ui.js"></script>
      <script src="doanh-thu.js"></script>
</head>
<body>
  <form>
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

<div class="group-right">
    <div class="title-right">BÁO CÁO DOANH THU</div>
    <div class="bcth">
     BÁO CÁO TỔNG HỢP
    </div>
    <div class="tkh">
       THEO KHÁCH HÀNG
    </div>
    <div class="tnvbh">
    THEO NHÂN VIÊN BÁN HÀNG
    </div>
    <div class="thh">
    THEO HÀNG HÓA
    </div>
  
</div>


        <div class="button-group">
            <div class="button-group-min-1">
      <select name="KhachHang" id="" class="input-group">
        <option value="">Chọn khách hàng</option> 
        <?php 
               while ($KH = mysqli_fetch_assoc($query_khachhang)){
           ?>
       <option  value="<?php echo $KH['TenKH'] ?>" require ><?php echo $KH['TenKH'] ?></option>
        <?php }?>
      </select>
      <select name="NhanVien" id="" class="input-group">
        <option value="">Chọn nhân viên bán hàng</option>
        <?php 
           while ($NV = mysqli_fetch_assoc($query_NhanVien)){
      ?>
           
          <option  value="<?php echo $NV['TenTK'] ?>" require ><?php echo $NV['TenTK'] ?></option>

      <?php }?>
      </select>
      <p>Từ ngày: <input type="date" name="NgayBatDau" id="datepick" class="input-group" placeholder="2021-01-01"></p>
             <p>Đến ngày: <input type="date" name="NgayKetThuc" id="datepick1" class="input-group"placeholder="2021-01-01"></p>
             <button type="submit" name="btnTim" value="" class="btn-1"><span><i class="fa fa-search icon"></i></span>Tìm kiếm</button>
             <button type="submit" name="btnrs" class="btn-1"><span><i class="fa fa-search icon"></i></span>Refesh</button>
            </div>
       <div class="button-group-min-2">
         <button type="submit" name="btnNgay" value="" class="btn">Ngày</button>
         <button type="submit" name="btnThang" value="" class="btn" >Tháng</button>
         <button type="submit" name="btnNam" value="" class="btn">Năm</button>
       </div>
          </div>

       <div class="radio-bcth">
        <div class="khoi-container">
            <div class="khoi-1 wow bounceIn">
                <i class="fa fa-clock"></i>
                <div class="title-1">
                    <a>SỐ ĐƠN : <?php echo $Tong_SD['Số đơn']?> đơn</a> <br>
                   <a> SỐ LƯỢNG : <?php echo $Tong_SoLuongSP['SoLuong']?> sản phẩm </a>
                </div>
            </div>
            <div class="khoi-2 wow bounceIn">
                <i class="fa fa-tag"></i>
                <div class="title-1">
                    <a>TỔNG SỐ TIỀN CHIẾT KHẤU :<?php echo $Tong_TGia['GiaSP']?> VNĐ </a>
                </div>
            </div>
            <div class="khoi-3 wow bounceIn">
                <i class="fas fa-sync-alt"></i>
                <div class="title-1">
                    <a>DOANH SỐ : <?php echo $Tong_LoiNhuan['LoiNhuan']?> VNĐ</a>
                </div>
            </div>
            <div class="khoi-4 wow bounceIn">
                <i class="fa fa-shopping-cart"></i>
                <div class="title-1">
                    <a>KHÁCH VIP CỦA THÁNG : <?php echo $Tong_KHACHVIP['TenKH']?> </a>
                </div>
            </div>
        </div>
        <div class="table-group">
            <table>
              <tr>
                <th>Mã đơn hàng</th>
                <th>Khách hàng</th>
                <th>Ngày bán</th>
                <th>Thu ngân</th>
                <th>Số lượng</th>
                <th>Tổng thu</th>
         
                <th>Ghi Chú</th>
              </tr>
              <?php
                  while($TH = mysqli_fetch_assoc($queryTH))
                  {
               ?>

              <tr>
                <th><?php echo $TH['id_MaDon']?></th>
                <th><?php echo $TH['TenKH']?></th>
                <th><?php echo $TH['NgayMua']?></th>
                <th><?php echo $TH['NguoiBan']?></th>
                <th><?php echo $TH['SoLuong']?> sản phẩm</th>
                <th><?php echo $TH['TongThu']?> VNĐ</th>
               
                <th><?php echo $TH['GhiChu']?></th>

              </tr>
                  <?php
                  }
                  ?>
            </table>
          </div>
        <div class="bottom">
        </div>
        </div>

        <div class="radio-tkh">
            <div class="khoi-container">
                <div class="khoi-1 wow bounceIn">
                    <i class="fa fa-clock"></i>
                    <div class="title-1">
                        <a>KHÁCH HÀNG :<?php echo $Tong_SOKHACH['KhachHang']?> /</a><br>
                        <a> SỐ LƯỢNG SẢN PHẨM : <?php echo $Tong_SoLuongSP['SoLuong']?> sản phẩm</a>
                    </div>
                </div>
                <div class="khoi-2 wow bounceIn">
                <i class="fa fa-tag"></i>
                <div class="title-1">
                    <a>TỔNG SỐ TIỀN CHIẾT KHẤU :<?php echo $Tong_TGia['GiaSP']?> VNĐ </a>
                </div>
            </div>
            <div class="khoi-3 wow bounceIn">
                <i class="fas fa-sync-alt"></i>
                <div class="title-1">
                    <a>DOANH SỐ : <?php echo $Tong_LoiNhuan['LoiNhuan']?> VNĐ</a>
                </div>
            </div>
            <div class="khoi-4 wow bounceIn">
                <i class="fa fa-shopping-cart"></i>
                <div class="title-1">
                    <a>KHÁCH VIP CỦA THÁNG : <?php echo $Tong_KHACHVIP['TenKH']?> </a>
                </div>
            </div>
            </div>
            <div class="table-group">
                <table>
                  <tr>
                    <th>Tên khách hàng</th>
                    <th>Tổng số đơn</th>
                    <th>Tiền thu </th>
                    <th>Tổng sản phẩm</th>
                    <th>Doanh thu</th>
                    <th>Ghi chú</th>
                  </tr>
                  <?php
                     while($KH=mysqli_fetch_assoc($queryKH)){    
                  ?>
                  <tr>
                    <th><?php echo $KH['TenKH'];?></th>
                    <th><?php echo $KH['TongSoDon'];?> Đơn</th>
                    <th><?php echo $KH['TienThu'];?> VNĐ</th>
                    <th><?php echo $KH['SoLuong'];?> sản phẩm</th>
                    <th><?php echo $KH['LoiNhuan'];?> VNĐ</th>
                    <th><?php echo $KH['GhiChu'];?></th>
                  </tr>
                  <?php
                  }
                  ?>
                </table>
              </div>
            <div class="bottom">
            </div>
            </div>


            <div class="radio-nvbh">
                    <div class="khoi-container">
                        <div class="khoi-1 wow bounceIn">
                            <i class="fa fa-clock"></i>
                            <div class="title-1">
                                <a>NHÂN VIÊN BÁN HÀNG : <?php echo $Tong_NVBAN['NhanVien']?>  / </a><br>
                                <a>SỐ LƯỢNG SẢN PHẨM : <?php echo $Tong_SoLuongSP['SoLuong']?> sản phẩm</a>
                            </div>
                        </div>
                        <div class="khoi-2 wow bounceIn">
                         <i class="fa fa-tag"></i>
                          <div class="title-1">
                             <a>TỔNG SỐ TIỀN CHIẾT KHẤU :<?php echo $Tong_TGia['GiaSP']?> VNĐ </a>
                         </div>
                       </div>
                      <div class="khoi-3 wow bounceIn">
                      <i class="fas fa-sync-alt"></i>
                           <div class="title-1">
                           <a>DOANH SỐ : <?php echo $Tong_LoiNhuan['LoiNhuan']?> VNĐ</a>
                          </div>
                      </div>
                  <div class="khoi-4 wow bounceIn">
                      <i class="fa fa-shopping-cart"></i>
                         <div class="title-1">
                          <a>NHÂN VIÊN VIP CỦA THÁNG : <?php echo $Tong_NHANVIENVIP['NguoiBan']?> </a>
                       </div>
                  </div>
                    </div>
                    <div class="table-group">
                        <table>
                          <tr>
                            <th>NV bán hàng</th>
                            <th>Tổng số đơn</th>
                            <th>Tổng tiền thu</th>
                            <th>Tổng SP</th>
                            <th>Tổng doanh thu</th>
                          </tr>
                          <?php
                     while($NV=mysqli_fetch_assoc($queryNV)){    
                  ?>
                  <tr>
                            <th> <?php echo $NV['NguoiBan'] ?> </th>
                            <th><?php echo $NV['TongSoDon'] ?>đơn</th>
                            <th><?php echo $NV['TienThu'] ?>VNĐ</th>
                            <th><?php echo $NV['SoLuong'] ?> sản phẩm</th>
                            <th><?php echo $NV['LoiNhuan'] ?>VNĐ</th>
                  </tr>
                  <?php
                  }
                  ?>
                        </table>
                      </div>
                    <div class="bottom">
                    </div>
                  
            </div>
            

            <div class="radio-thh">
                                <div class="khoi-container">
                                    <div class="khoi-1 wow bounceIn">
                                        <i class="fa fa-clock"></i>
                                        <div class="title-1">
                                            
                                            <a> SỐ LƯỢNG SẢN PHẨM : <?php echo $Tong_SoLuongSP['SoLuong']?> sản phẩm</a>
                                        </div>
                                    </div>
                                    <div class="khoi-2 wow bounceIn">
                <i class="fa fa-tag"></i>
                <div class="title-1">
                    <a>TỔNG SỐ TIỀN CHIẾT KHẤU :<?php echo $Tong_TGia['GiaSP']?> VNĐ </a>
                </div>
            </div>
            <div class="khoi-3 wow bounceIn">
                <i class="fas fa-sync-alt"></i>
                <div class="title-1">
                    <a>DOANH SỐ : <?php echo $Tong_LoiNhuan['LoiNhuan']?> VNĐ</a>
                </div>
            </div>
            <div class="khoi-4 wow bounceIn">
                <i class="fa fa-shopping-cart"></i>
                <div class="title-1">
                    <a>SẢN PHẨM VIP CỦA THÁNG : <?php echo $Tong_SANPHAMVIP['TenSP']?> </a>
                </div>
            </div>
                                </div>
                                <div class="table-group">
                                    <table>
                                      <tr>
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng bán</th>
                                        <th>Tổng tiền thu</th> 
                                        <th>Doanh thu</th> 
                                      </tr>
                                      <?php
                        while($SP=mysqli_fetch_assoc($querySP)){    
                            ?>
                  <tr>
                            <th> <?php echo $SP['MaLoaiSP'] ?> </th>
                            <th><?php echo $SP['TenSP'] ?></th>
                            <th><?php echo $SP['SoLuong'] ?>sản phẩm</th>
                            <th><?php echo $SP['TienThu'] ?> VNĐ</th>
                            <th><?php echo $SP['LoiNhuan'] ?>VNĐ</th>
                  </tr>
                  <?php
                  }
                  ?>
                  
                                    </table>
                                  </div>
                                <div class="bottom">
                                </div>
</div>
</div>



        
<div class="footer">
          <iframe src="htttp://localhost/QuanLyWebTBYT/footer/footer-index.php" width="100%" height="70px" frameborder="0"></iframe>
        </div>   
</form>


</body>
</html>