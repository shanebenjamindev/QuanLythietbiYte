<?php
include '../connetdb.php';
$sqlSP= "SELECT * FROM `sanpham`";
$data = mysqli_query($connet,$sqlSP);


$sqldemsosp="SELECT COUNT(SoLuong) FROM sanpham";
$demsp=mysqli_query($connet,$sqldemsosp);
$sqldemnhacungcap="SELECT COUNT(`TenNhaCungCap`) FROM sanpham";
$demnhacungcap=mysqli_query($connet,$sqldemnhacungcap);



#tim kiem

if(isset($_GET['tim'])){
$tbTim=$_GET['tbTim'];
$LoaiSP=$_GET['LoaiSP'];
$NSX=$_GET['NSX'];
$sqlSP="SELECT * FROM sanpham WHERE TenSP LIKE '%$tbTim%' AND LoaiSP LIKE '%$LoaiSP%' AND TenNhaCungCap LIKE'%$NSX%' ";
$data=mysqli_query($connet,$sqlSP);

}

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
    <link rel="stylesheet" href="../jquery-ui-1.12.1/jquery-ui.css">
    <link rel="stylesheet" href="../jquery-ui-1.12.1/jquery-ui.theme.css">
      <link rel="stylesheet" href="san-pham.css">
      <script src="../jquery-3.6.0.min.js"></script>
      <script src="../js/wow.min.js"></script>
      <script src="../jquery-ui-1.12.1/jquery-ui.js"></script>
      <script src="san-pham1.js"></script>
</head>
<body>
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
          <p>DANH SÁCH SẢN PHẨM</p>
        </div>
        <div class="menu-right">
          <a href="../webbh/qlibanhang.php"><button type="button" name="" class="button-right-2"><span><i class="fa fa-plus icon"></i>Tạo sản phẩm</span></button></a>
          <button type="button" name="" class="button-right-3"><span><i class="fa fa-download icon"></i>Xuất Excel</span></button>
        </div>
      </div>

      <div class="button-group">
        <div class="button-group-min-1">
          <form>
         <input type="text" name="tbTim"  class="input-group" placeholder="Nhập vào ô để tìm kiếm">
         
         <?php
           $sqlTenLoai="select TenLoai from LoaiSP";
           $Tenloai=mysqli_query($connet,$sqlTenLoai);
           ?>
         <select name="LoaiSP" class="input-group">
            <option value="">Loại sản phẩm</option>
            
            <?php
             while ($TenLoai1 = mysqli_fetch_assoc($Tenloai)) 
             {
             ?>
            <option value="<?php echo $TenLoai1['TenLoai']; ?>"><?php echo $TenLoai1['TenLoai']; ?></option>
            <?php
             }
            ?>
          </select>
          <select name="NSX"  class="input-group">
            <option value="">Nhà sản xuất</option>
            <?php
           $sql2="select TenNCC from nhacungcap";
           $row3=mysqli_query($connet,$sql2);
           ?>
           <?php
             while ($row4 = mysqli_fetch_assoc($row3)) {
             ?>
                 <option value="<?php echo $row4['TenNCC']; ?>"><?php echo $row4['TenNCC']; ?></option> 
                <?php
                }
              ?>
          </select>
         <button type="submit" name="tim"  class="btn-1"><span><i class="fa fa-search icon"></i></span>Tìm </button>
        
        </div>
</div>   


<div class="table-group">
    <table>
      <tr>
        <th>Tên sản phẩm</th>
        <th>Mã sản phẩm </th>
        <th>Số Lượng</th>
        <th>Gía bán</th>
        <th>Danh mục</th>
        <th>Nhà sản xuất</th>
        <th></th>
      </tr>
      <?php
      while ($datavao = mysqli_fetch_assoc($data))
      {
      ?>
      <tr>
        <th><?php echo $datavao['TenSP'];?></th>
        <th><?php echo $datavao['MaSP'];?></th>
        <th><?php echo $datavao['SoLuong'];?></th>
        <th><?php echo $datavao['GiaBan'];?></th>
        <th><?php echo $datavao['LoaiSP'];?></th>
        <th><?php echo $datavao['TenNhaCungCap'];?></th>
        <th>
<!--            <i title="Ngừng kinh doanh" class="fa fa-pause" style="margin-right: 15px; color: red; cursor: pointer;"></i>-->

            <a href="../xoasp.php?id=<?php echo $datavao['MaSP']?>"><i title="Xóa" class="fas fa-trash-alt"  style=" color: blue; cursor: pointer;"></i></a>
            <a href="../testnhaphang.php?id=<?php echo $datavao['MaSP'] ?>&xuli=cong" name="nhaphang">Nhap hang</a>
        </th>
      </tr>
      <?php   
      }
      ?>
    </table>
  </div>
<div class="bottom">
  <?php
  while ($demsp1= mysqli_fetch_assoc($demsp))
    {
  ?>
 <p>SL sản phẩm / SL nhà sản xuất : <?php echo $demsp1['COUNT(SoLuong)'];?></p>
 <?php
    }
 ?>
 <p>/</p>
 <?php
  while ($demncc1= mysqli_fetch_assoc($demnhacungcap))
    {
  ?>
 <p><?php echo $demncc1['COUNT(`TenNhaCungCap`)'];?></p>
 <?php
    }
 ?>
</div>
</div>
</div>
</form>
<div class="footer">
        <iframe src="http://localhost/QuanLyWebTBYT/footer/footer-index.php" width="100%" height="70px" frameborder="0"></iframe>
      </div>  
</body>
</html>