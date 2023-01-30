<?php
    session_start();
    include('./ketnoi.php');

   
?>
<?php
     $sql = "SELECT * FROM nhacungcap";
     $query = mysqli_query($con, $sql);

     if(isset($_POST['themncc'])){

         $TenNCC = $_POST ['tenncc'];
         $Ghichu = $_POST ['ghichu'];
         $diachi = $_POST ['diachi'];
         $sdt = $_POST ['sdt'];
         $gmail = $_POST ['gmail'];

         $sql1 = "SELECT * FROM nhacungcap WHERE MaNCC = '$MaNCC'";
         $old = mysqli_query($con,$sql1);

        if(mysqli_num_rows($old)>0){
        echo "Nhà cung cấp đã tồn tại";
        }

         $sql = "INSERT INTO nhacungcap (TenNCC,GhiChu,DiaChi,SDT,Gmail)
         VALUES ('$TenNCC','$Ghichu','$diachi','$sdt','$gmail')";
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
        <h2 style="font-weight: bold; color: grey">Tạo mới Nhà cung cấp</h2>
        <p>______________________________________________________________________</p>
       
        <b>Tên Nhà cung cấp</b>
        <input type="text" placeholder=" Nhập tên khách hàng( bắt buộc ) " name = "tenncc" style="width:370px; height: 25px; margin-left: 42px;">
        <br><br>

        <b>Ghi chú</b>
        <input type="text" style="width:370px; height: 25px; margin-left: 96px;" name = "ghichu"style="width:370px; height: 25px; margin-left: 42px;">
        <br><br>

        <b>Địa chỉ</b>
        <input type="text" style="width:370px; height: 25px; margin-left: 96px;" name = "diachi"style="width:370px; height: 25px; margin-left: 42px;">
        <br><br>

        <b>SDT</b>
        <input type="text" style="width:370px; height: 25px; margin-left: 96px;" name = "sdt"style="width:370px; height: 25px; margin-left: 42px;">
        <br><br>

        <b>Email</b>
        <input type="text" style="width:370px; height: 25px; margin-left: 96px;" name = "gmail"style="width:370px; height: 25px; margin-left: 42px;">
        <br><br>

        <p>______________________________________________________________________</p>
        <button type="submit" name="themncc"  style="width:60px; height:35px; color: white; background-color:rgb(49, 49, 110); margin-left: 370px"><b>✔ Lưu</b></button>
        <button type="button" name="boqua" value="boqua"  style="width:100px; height:35px; color: black; background-color:rgb(210, 210, 221);"><b>⟲ Bỏ qua</b></button>
      </div>
      </form>
      <div id="right"></div>        
      <div id="footer"></div>
</body>
</html>