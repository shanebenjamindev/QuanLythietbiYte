<?php 
require '../connetdb.php';
if(isset($_POST['submit']))
{
  $TenSP=$_POST['TenSP'];
  $SoLuong=$_POST['SoLuong'];
  $MaLoaiSP=$_POST['MaLoaiSP'];
  $GiaVon=$_POST['GiaVon'];
  $TenLoai=$_POST['TenLoai'];
  $giaban=$_POST['giaban'];
  $NCC=$_POST['NCC'];
  $MaSP=$_POST['MaSP'];
  $sqlkt="SELECT MaSP FROM `sanpham` WHERE MaSP='$MaSP'";
  $query=mysqli_query($connet,$sqlkt);
  $row = mysqli_num_rows($query);
  if($row)
  {
      echo"<script> alert('Mã sản phẩm đã tồn tại') </script>";
  }
  else
  {
      $sql = "INSERT INTO `sanpham` VALUES ('$MaSP','$MaLoaiSP','$TenSP','$GiaVon','0','$NCC','$TenLoai','vi','$giaban','$SoLuong')";
      $row1 = mysqli_query($connet,$sql);
      echo"<script> alert('Thêm Sản Phẩm Thành Công') </script>";
  }

}
if(isset($_POST['trolai']))
{
    header('location:../San-pham/san-pham.php');

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="qlibanhang.css">
</head>
<body>

    <div id="header">

        <div id="hh">
            <h2 style="font-weight: bold;">Tạo sản phẩm</h2>
        </div>

        <div id="kk">
            <form method="post">
                <button type="submit" name="trolai" value="trolai"  style="width:80px; height:35px; color: white; background-color:rgb(96, 96, 197); border-radius: 5px">Trở về</button>
            </form>

        
        </div>
    </div>
    <div class="aaa">
      <div id="menu">
      <div class="tt" style="margin-top: 100px">
          <form method="post">
          <b>Thông tin cơ bản</b>
          <p>Nhập tên và các thông tin cơ bản của sản phẩm</p>
         <div class="ttcb" style="margin-top: 100px; margin-left: 350px; margin-bottom: 200px;">
           <b>Tên sản phẩm</b>
            <br>
            <input type="text" name="TenSP" placeholder=" Nhập tên sản phẩm " style="width:450px; height: 25px;" required>
            <br><br>
            <b>Số lượng</b>
            <br>
            <input type="text" name="SoLuong" placeholder=" 0 " style="width: 450px;height: 25px" required>
            <br><br>
            <b>Giá vốn</b>
            <br>
            <input type="text" name="GiaVon" placeholder=" Nhập giá vốn " style="width:450px; height: 25px;" required>
            <br><br>
           
            <b>Danh mục</b>
            <br>
           <?php
           $sql1="select MaLoaiSP from LoaiSP";
           $row1=mysqli_query($connet,$sql1);
           ?>
            <select name="MaLoaiSP" id="MaLoaiSP" style=" width: 420px; height: 32px"required>
             <?php
             while ($row2 = mysqli_fetch_assoc($row1)) {
             ?>
            
              <option value="<?php echo $row2['MaLoaiSP']; ?>"><?php echo $row2['MaLoaiSP']; ?></option>
              <?php
                }
              ?>
          </select> 

            <br><br>
            
            <?php
           $sqlTenLoai="select TenLoai from LoaiSP";
           $Tenloai=mysqli_query($connet,$sqlTenLoai);
           ?>
            <select name="TenLoai" id="TenLoai" style=" width: 420px; height: 32px"required>
             <?php
             while ($TenLoai1 = mysqli_fetch_assoc($Tenloai)) {
             ?>
            
              <option value="<?php echo $TenLoai1['TenLoai']; ?>"><?php echo $TenLoai1['TenLoai']; ?></option>
              <?php
                }
              ?>
          </select> 
          </div>  
    </div>
  </div>
    <div id="right" style="margin-top: 100px">
      <div id="aa">
        <b>Mã sản phẩm</b>    
        <br>
        <input type="text" name="MaSP" placeholder=" Mã sản phẩm " style="width:450px; height: 25px;" required>
        <br><br>
        <b>Giá bán</b>
        <br>
        <input type="text" name="giaban" placeholder=" 0 " style="width: 450px;height: 25px" required>
        <br><br>
              <b>Nhà Cung Cấp</b>
              <br>
              <?php
           $sql2="select TenNCC from nhacungcap";
           $row3=mysqli_query($connet,$sql2);
           ?>
              <select name="NCC" id="NCC" style=" width: 420px; height: 32px" >
              <?php
             while ($row4 = mysqli_fetch_assoc($row3)) {
             ?>
                 <option value="<?php echo $row4['TenNCC']; ?>"><?php echo $row4['TenNCC']; ?></option> 
                <?php
                }
              ?>
              </select>
          <br>
          <br>
          <input type="submit" name="submit" value="Lưu" style="width:80px; height:35px; color: white; background-color:rgb(96, 96, 197); border-radius: 5px">

     </div> 
    </div>
        </form>
    </div>
    <div id="footer"></div>
</body>
</html>