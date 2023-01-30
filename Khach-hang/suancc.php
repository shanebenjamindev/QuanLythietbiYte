<?php
    session_start();
    include('./ketnoi.php');

   
?>
<?php
    $id = $_GET['id'];

     $sql = "SELECT * FROM sanpham";
     $query = mysqli_query($con, $sql);

     $sql2 = "SELECT * FROM nhacungcap WHERE MaNCC = '$id'";
     $query2 = mysqli_query($con, $sql2);
     $row = mysqli_fetch_assoc($query2);

     if(isset($_POST['sua'])){
         
         $TenNCC = $_POST ['tenncc'];
         $diachi = $_POST ['diachi'];

         $sdt = $_POST ['sdt'];
         $email = $_POST ['gmail'];

         $sql = "UPDATE nhacungcap SET TenNCC ='$TenNCC',DiaChi='$diachi',SDT='$sdt' ,Gmail='$email'  Where MaNCC = '$id'";
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

        <div> 
        <br>Tên Khách hàng</br>
        <input type="text" name ="tenncc" required value="<?php echo $row['TenNCC'] ?>" style="width:370px; height: 25px; margin-left: 110px;"></input> 
        </div>

        <div> 
        <br>Email</br>
        <input type="text" name ="gmail" required value="<?php echo $row['Gmail'] ?>" style="width:370px; height: 25px; margin-left: 110px;"></input> 
        </div>

        <div> 
        <br>SĐT</br>
        <input type="text" name ="sdt" required value="<?php echo $row['SDT'] ?>" style="width:370px; height: 25px; margin-left: 110px;"></input> 
        </div>

        <div> 
        <br>Địa chỉ</br>
        <input type="text" name ="diachi" required value="<?php echo $row['DiaChi'] ?>" style="width:370px; height: 25px; margin-left: 110px;"></input> 
        </div>

        <p>______________________________________________________________________</p>
        <button type="submit" name="sua"  style="width:60px; height:35px; color: white; background-color:rgb(49, 49, 110); margin-left: 370px"><b>✔ Lưu</b></button>
        <a href = "../Khach-hang/khach-hang.php"><button type="button" name="boqua" value="boqua"  style="width:100px; height:35px; color: black; background-color:rgb(210, 210, 221);"><b>⟲ Trở về</b></button></a>
      </div>
      </form>
      <div id="right"></div>        
      <div id="footer"></div>
</body>
</html>