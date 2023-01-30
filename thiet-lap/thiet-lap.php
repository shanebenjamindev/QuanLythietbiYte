<?php 
   include '../connetDB.php';
   $sqlNV = "SELECT * from taikhoan";
   $queryNV= mysqli_query($connet,$sqlNV);
   
   $sqlNhom = "SELECT * from NhomTaiKhoan";
   $queryNhom= mysqli_query($connet,$sqlNhom);

   $sqlKho = "SELECT * from Kho";
   $queryKho= mysqli_query($connet,$sqlKho);

  if(isset($_GET['btnSuaNV'])){
    $id = $_GET['id'];
    $TenTK = $_GET['TenTK'];
     $MatKhau = $_GET['MatKhau'];
     $Gmail = $_GET['Gmail'];
     $SDT = $_GET['SDT'];
     $Quyen = $_GET['Quyen'];
     $sqlSua = "UPDATE taikhoan SET TenTK ='$TenTK' , MatKhau ='$MatKhau',Gmail ='$Gmail',SDT ='$SDT',Quyen ='$Quyen' WHERE MaTk = '$id' ";
     $querySua = mysqli_query($connet,$sqlSua);
     header('location: thiet-lap.php');
  }
  if(isset($_GET['btnSuaNhom'])){
     $TenNhom = $_GET['TenNhom'];
     $NgayTao = $_GET['NgayTao'];
     $SoNhanVien = $_GET['SoNhanVien'];
     $sqlSuaNhom = "UPDATE NhomTaiKhoan SET NgayTao='$NgayTao',SoNhanVien='$SoNhanVien' Where TenNhom ='$TenNhom' ";
     $querySuaNhom = mysqli_query($connet,$sqlSuaNhom);
     header('location: thiet-lap.php');
  }
  if(isset($_GET['btnSuaKho'])){
    $MaKho = $_GET['MaKho'];
    $TenKho = $_GET['TenKho'];
    $NgayLap = $_GET['NgayLap'];
    $sqlSuaKho = "UPDATE Kho SET NgayLap='$NgayLap' , TenKho ='$TenKho' where MaKho = '$MaKho' ";
    $querySuaKho = mysqli_query($connet,$sqlSuaKho);
    header('location: thiet-lap.php');
  }
  if(isset($_GET['save'])){
     $ThemTen = $_GET['TenNV'] ;
     $ThemMatKhau = $_GET['MatKhau'] ;
     $ThemEmail = $_GET['Email'] ;
     $ThemSDT = $_GET['ThemSDT'] ;
     $ThemQuyen = $_GET['ThemQuyen'] ;
     $ThemNhom = $_GET['ThemNhom'] ;
     $sqlThemNV ="INSERT INTO `taikhoan`(`TenTK`, `MatKhau`, `Gmail`, `SDT`, `Quyen`) 
                  VALUES ('$ThemTen','$ThemMatKhau','$ThemEmail','$ThemSDT','$ThemQuyen')" ;
     $queryThemNV = mysqli_query($connet,$sqlThemNV);  
     header('location: ../thiet-lap/thiet-lap.php') ;
     echo '<script> alert("Thêm thành công !") </script>' ; 
  
  }
  if(isset($_GET['saveNhom'])){
    
    $ThemSoNhanVien = $_GET['ThemSoNhanVien'] ;
    $ThemNgayNhap = $_GET['ThemNgayNhap'] ;
    $sqlThemNhomTK ="INSERT INTO `nhomtaikhoan`(`NgayTao`, `SoNhanVien`) VALUES ('$ThemNgayNhap','$ThemSoNhanVien')" ;
    $queryThemNhomTK = mysqli_query($connet,$sqlThemNhomTK);  
    echo '<script> alert("Thêm thành công !") </script>' ; 
    header('location: ../thiet-lap/thiet-lap.php') ;
  }
  if(isset($_GET['saveKho'])){
    $ThemTenKho = $_GET['ThemTenKho'] ;
    $NgayThemKho = $_GET['NgayThemKho'] ;
    $sqlThemKho ="INSERT INTO `kho`( `TenKho`, `NgayLap`) VALUES ('$ThemTenKho','$NgayThemKho')" ;
    $queryThemKho = mysqli_query($connet,$sqlThemKho);  
    echo '<script> alert("Thêm thành công !") </script>' ;
    header('location: ../thiet-lap/thiet-lap.php') ; 
  }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThietLap</title>
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../jquery-ui-1.12.1/jquery-ui.css">
    <link rel="stylesheet" href="../jquery-ui-1.12.1/jquery-ui.theme.css">
      <link rel="stylesheet" href="thiet-lap.css">
      <script src="../jquery-3.6.0.min.js"></script>
      <script src="../js/wow.min.js"></script>
      <script src="../jquery-ui-1.12.1/jquery-ui.js"></script>
      <script src="thiet-lap1.js"></script>
</head>
<style>

.class-1{
    width: 147px;
height:15px;
border: 2px solid black;
background-color:antiquewhite;
}

.class-2{
    width: 227px;
height:15px;
border: 2px solid black;
background-color:antiquewhite;
}
.class-3{
    width: 370px;
height:15px;
border: 2px solid black;
background-color:antiquewhite;
}
.class-4{
    width:240px;
height:15px;
border: 2px solid black;
background-color:antiquewhite;
}
.class-5{
    width: 240px;
height:15px;
border: 2px solid black;
background-color:antiquewhite;
}
.class-6{
    width: 200px;
height:15px;
border: 2px solid black;
background-color:antiquewhite;
}
.class-11{
    width: 230px;
height:15px;
border: 2px solid black;
background-color:antiquewhite;
}
.class-12{
    width: 415px;
height:15px;
border: 2px solid black;
background-color:antiquewhite;
}
.class-13{
    width: 442px;
height:15px;
border: 2px solid black;
background-color:antiquewhite;
}
</style>
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
  <div class="nen-mo"></div>
  <div class="container">
    <div class="title-container">
      <span><i class="fas fa-user-plus icon"></i></span>THÊM NHÂN VIÊN
    </div>
    <form>
      <label class="title">Tên nhân viên</label>
      <input type="text" name="TenNV" value="" class="input-container" placeholder="Nhập tên nhân viên">
    
      <label class="title">Mật Khẩu  </label>
      <input type="text" name="MatKhau" value="" class="input-container" placeholder="Nhập Nhập mật khẩu">
    
      <label class="title">Email </label>
      <input type="text" name="Email" value="" class="input-container-1" placeholder="Nhập email">
    
      <label class="title">Số DT</label>
      <input type="text" name="ThemSDT" value="" class="input-container-2" placeholder="Nhập số điện thoại">
    
      <label class="title">Nhóm người dùng</label>
    <select name="ThemQuyen" id="" class="input-container-3">
      <option value="Admin">Admin</option>
      <option value="Quản lý">Quản lý</option>
      <option value="Nhân viên">Nhân viên</option>
    </select>
    <label class="title">Nhóm thành viên</label>
    <select name="ThemNhom" id="" class="input-container-3">
    <?php
         $sqlNhomNguoi = "SELECT TenNhom from nhomtaikhoan";
         $queryNhomNguoi = mysqli_query($connet,$sqlNhomNguoi);
         while($NhomNguoi = mysqli_fetch_assoc($queryNhomNguoi)){
         
    ?>
      <option value="<?php echo $NhomNguoi['TenNhom']; ?>"><?php echo $NhomNguoi['TenNhom']; ?></option>
      
      <?php 
         }
      ?>
    </select>
   
    
    <div class="button-container">
      <button type="submit" name ="save" id="btn-close-1"><span><i class="fa fa-check icon"></i></span>Lưu</button>
      </form>
      <button type="button" id="btn-close"><span><i class="fa fa-undo icon"></i></span>Bỏ qua</button>
    </div>
  </div>

  <div class="nen-mo-2"></div>
  <div class="container-2">
    <div class="title-container">
      <span><i class="fas fa-user-plus icon"></i></span>THÊM NHÓM NGƯỜI DÙNG
    </div>
    <form>
      <label class="title">Nhập số nhân viên </label>
      <input type="number" name="ThemSoNhanVien" value="" class="input-container" placeholder="Nhập số nhân viên">
      <label class="title">Ngày nhập </label>
      <input type="date" name="ThemNgayNhap" value="" class="input-container" placeholder="Ngày nhập">
   
    <div class="button-container-2">
      <button type="sumit" name = "saveNhom" id="btn-close-2"><span><i class="fa fa-check icon"></i></span>Lưu</button>
      </form>
      <button type="button" id="btn-close-4"><span><i class="fa fa-undo icon"></i></span>Bỏ qua</button>
    </div>
  </div>

  <div class="nen-mo-3"></div>
  <div class="container-3">
    <div class="title-container">
      <span><i class="fas fa-user-plus icon"></i></span>THÊM KHO
    </div>
    <form>
      <label class="title">Tên kho</label>
      <input type="text" name="ThemTenKho" value="" class="input-container-9" placeholder="Nhập tên kho">
     
      <label class="title">Ngày</label>
      <input type="DATE" name="NgayThemKho" value="" class="input-container-9" placeholder="Ngày nhập kho">

    <div class="button-container-3">
      <button type="sumit"  name = "saveKho" id="btn-close-3"><span><i class="fa fa-check icon"></i></span>Lưu</button>
      </form>
      <button type="button" id="btn-close-5"><span><i class="fa fa-undo icon"></i></span>Bỏ qua</button>
    </div>
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

<div class="button-group-3">
    <button type="button" name="" value="" class="btn-tab-1"><span><i class="fa fa-user icon"></i></span>Nhân viên</button>
    <button type="button" name="" value="" class="btn-tab-2"><span><i class="fa fa-truck icon"></i></span>Thiết lập chức năng</button>
    <button type="button" name="" value="" class="btn-tab-3"><span><i class="fa fa-truck icon"></i></span>Kho</button>
</div>
<div class="button-group-1-1">
    <div id="button-group-min-1">
      <div class="title-right"><p>TẠO NHÂN VIÊN</p></div>
      <div class="button"> <button type="submit" name="" value="" class="button-right-2 btn-open"><span><i class="fas fa-user-plus icon"></i></span>Tạo nhân viên</button>
        <i class="fas fa-sync icon"></i></div>
    </div>
  <div class="table-group">
        <table>
          <tr>
            <th>Mã tài khoản</th>
            <th>Tên nhân viên</th>
            <th>Mật khẩu</th>
            <th>Email</th>
            <th>SDT</th>
            <th>Nhóm người sử dụng</th>
            
          </tr>
  <?php 

     while($NV = mysqli_fetch_assoc($queryNV)){
  ?>
          <tr>
          <form >
            <th>
              <label><?php echo $NV['MaTk'];?></label>
              <div class="form-1">
                <input  type="text" name="id" value="<?php echo $NV['MaTk'];?>" class="class-1">
              </div>
            </th>
            <th>
              <label><?php echo $NV['TenTK'];?></label>
              <div class="form-1">
                <input type="text" name="TenTK" value="<?php echo $NV['TenTK'];?>" class="class-2">
              </div>
            </th>
            <th>
              <label><?php echo $NV['MatKhau'];?></label>
              <div class="form-1">
                <input type="text" name="MatKhau" value="<?php echo $NV['MatKhau'];?>" class="class-3">
              </div>
            </th>
            <th>
              <label><?php echo $NV['Gmail'];?></label>
              <div class="form-1">
                <input type="text" name="Gmail" value="<?php echo $NV['Gmail'];?>" class="class-4">
              </div>
            </th>
            <th>
              <label><?php echo $NV['SDT'];?></label>
              <div class="form-1">
                <input type="text" name="SDT" value="<?php echo $NV['SDT'];?>" class="class-5">
              </div>
            </th>
            <th>
              <label><?php echo $NV['Quyen'];?></label>
              <div class="form-1">
                <input type="text" name="Quyen" value="<?php echo $NV['Quyen'];?>" class="class-6">
              </div>
            </th>
            <th>
            <button type="submit"  name="btnSuaNV" title="Sửa"   class="fas fa-edit "  style=" color: orange; cursor: pointer;"></button>
              <i  class="far fa-eye title-10" title="xem" style=" color: red; cursor: pointer;"></i>
                <a href="../thiet-lap/xoa.php?MaTK=<?php echo $NV['MaTk']?>" title="Xóa"  class="fas fa-trash-alt"  style=" color: blue; cursor: pointer;"></a>
            </th> 
            </form>      
          </tr>
         
         <?php 
            // break ;
           }?>
         
        </table>
      </div> 
</div>

      <div class="button-group-1-2">
        <div id="button-group-min-1">
          <div class="title-right"><p>NHÓM NGƯỜI DÙNG</p></div>
          <div class="button"> <button type="submit" name="" value="" class="button-right-2 btn-nhom"><span><i class="fas fa-user-plus icon"></i></span>Thêm nhóm mới</button>
            <i class="fas fa-sync icon"></i></div>
        </div>
      <div class="table-group">
            <table>
              <tr>
                
                <th>Tên nhóm</th>
                <th>Ngày tạo</th>
                <th>Số nhân viên</th>
              </tr>
              <?php 
              
                 while($Nhom = mysqli_fetch_assoc($queryNhom)){
           ?>
              <tr>
                <form method="GET">
                
                <th>
                  <label><?php echo $Nhom['TenNhom'] ;?></label>
                  <div class="form-2">
                    <input type="text" name="TenNhom" value="<?php echo $Nhom['TenNhom'] ;?>" class="class-8">
                  </div>
                </th>
                <th>
                  <label><?php echo $Nhom['NgayTao'] ;?></label>
                  <div class="form-2">
                    <input type="date" name="NgayTao" value="<?php echo $Nhom['NgayTao'] ;?>" class="class-9">
                  </div>
                </th>
                <th>
                  <label><?php echo $Nhom['SoNhanVien'] ;?></label>
                  <div class="form-2">
                    <input type="text" name="SoNhanVien" value="<?php echo $Nhom['SoNhanVien'] ;?>" class="class-10">
                  </div>
                </th>
                <th>
                  <button type="submit" name="btnSuaNhom" class="fas fa-edit " title="Sữa" style=" color: orange;" > </button>
                  <i class="far fa-eye title-11" title="Sửa" style=" color: red; cursor: pointer;"></i>
                    <a title="Xóa"  href="../thiet-lap/xoanhom.php?TenNhom=<?php echo $Nhom['TenNhom']?>" class="fas fa-trash-alt"  style=" color: blue; cursor: pointer;"></a>
                </th>
              </tr>
              </form>
              <?php
            }
            ?>
            </table>
          </div> 
</div>

<div class="button-group-1-3">
  <div id="button-group-min-1">
    <div class="title-right"><p>DANH SÁCH KHO</p></div>
    <div class="button"> <button type="submit" name="" value="" class="button-right-2 btn-kho"><span><i class="fas fa-user-plus icon"></i></span>Thêm kho</button>
      <i class="fas fa-sync icon"></i></div>
  </div>
<div class="table-group">
      <table>
        <tr>
          <th>Mã kho</th>
          <th>Tên kho</th>
          <th>Ngày tạo</th>
        </tr>
        <?php 
                 $i =1;
                 while($Kho = mysqli_fetch_assoc($queryKho)){
           ?>
      
        <tr>
        <form>
          <th>
            <label><?php echo $Kho['MaKho'] ;?></label>
            <div class="form-3">
              <input type="text" name="MaKho" value="<?php echo $Kho['MaKho'];?>" class="class-11">
            </div>
          </th>
          <th>
            <label><?php echo $Kho['TenKho'];?></label>
            <div class="form-3">
              <input type="text" name="TenKho" value="<?php echo $Kho['TenKho'];?>" class="class-12">
            </div>
          </th>
          <th>
            <label><?php echo $Kho['NgayLap'];?></label>
            <div class="form-3">
              <input type="date" name="NgayLap" value="<?php echo $Kho['NgayLap'];?>" class="class-13">
            </div>
          </th>
          <th>
          <button type="submit" name="btnSuaKho" class="fas fa-edit " title="Sửa" style=" color: orange;" > </button>
          <i class="far fa-eye title-12" title="Sửa" style=" color: red; cursor: pointer;"></i>
              <a title="Xóa"   href="../thiet-lap/xoakho.php?MaKho=<?php echo $Kho['MaKho']?>" class="fas fa-trash-alt"  style=" color: blue; cursor: pointer;"></a>
          </th>
          </form>
        </tr>
        <?php 
                 }
           ?>
      </table>
    </div> 
   
    </div>
</div>
</div>
      <div class="footer">
        <iframe src="http://localhost/QuanLyWebTBYT/footer/footer-index.php" width="100%" height="70px" frameborder="0"></iframe>
      </div>  
      
</body>
</html>