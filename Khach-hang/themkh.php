<?php
    session_start();
    include('./ketnoi.php');

   
?>
<?php
     $sql = "SELECT * FROM khachhang";
     $query = mysqli_query($con, $sql);

     if(isset($_POST['them'])){


         $MaKH = rand(0,99);
         $TenKH = $_POST ['tenkh'];
         $email = $_POST ['email'];
     
         $Diachi = $_POST ['diachi'];
    
         $Ghichu = $_POST ['ghichu'];

         $sql1 = "SELECT * FROM khachhang WHERE MaKH = '$MaKH'";
         $old = mysqli_query($con,$sql1);

        if(mysqli_num_rows($old)>0){
        echo "Khách hàng đã tồn tại";
        }

         $sql = "INSERT INTO khachhang (MaKH,TenKH,Email,DiaChi,GhiChu)
         VALUES ('$MaKH','$TenKH','$email','$Diachi','$Ghichu')";
         $query = mysqli_query($con,$sql);
         header ('location:khach-hang.php');

     
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="taokhachhang.css">
</head>
<body>
    <form method="post">
    <div id="header"></div>
      <div class="menu">
        <h2 style="font-weight: bold; color: grey">Tạo mới khách hàng</h2>
        <p>______________________________________________________________________</p>
       
        <b>Tên khách hàng</b>
        <input type="text" placeholder=" Nhập tên khách hàng( bắt buộc ) " name = "tenkh" style="width:370px; height: 25px; margin-left: 42px;">
        <br><br>
       
        <b>Email</b>
        <input type="text" placeholder=" Nhập email khách hàng( vd: tk10@gmail.com ) " name = "email" style="width:370px; height: 25px; margin-left: 110px;">
        <br><br>

        <b>Địa chỉ</b>
        <input type="text" style="width:370px; height: 25px; margin-left: 103px;" name = "diachi">
        <br><br>

        <b>Ghi chú</b>
        <input type="text" style="width:370px; height: 25px; margin-left: 96px;" name = "ghichu">
        <br><br>

        <p>______________________________________________________________________</p>
        <button type="submit" name="them"  style="width:60px; height:35px; color: white; background-color:rgb(49, 49, 110); margin-left: 370px"><b>✔ Lưu</b></button>
        <button type="button" name="boqua" value="boqua"  style="width:100px; height:35px; color: black; background-color:rgb(210, 210, 221);"><b>⟲ Bỏ qua</b></button>
      </div>
      </form>
      <div id="right"></div>        
      <div id="footer"></div>
</body>
</html>