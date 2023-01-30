<?php
    session_start();
    include('./ketnoi.php');

   
?>
<?php
     $sql = "SELECT * FROM khachhang";
     $query = mysqli_query($con, $sql);

     if(isset($_POST['themkh'])){


         $MaKH = rand(0,99);
         $TenKH = $_POST ['TenKH'];
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
</head>
<style>
table, p, td {
  border: 1px solid black;
  padding: 5px;
}
</style>
<body>

      <form method="POST" enctype="multipart/form-data">

        <div> 
        <br>Tên khách hàng</br>
        <input type="text" name ="TenKH" required></input>
        </div>

        <div> 
        <br>Email</br>
        <input type="text" name = "email" required></input>
        </div>


        <div> 
        <br>Địa Chỉ</br>
        <input type="text" name = "diachi" required></input>
        </div>


        <div> 
        <br>Ghi chú</br>
        <input type="text" name = "ghichu"></input>
        </div> 

        <br>
        <input type="submit" name = "themkh" value="Thêm"></input>
        </br>
    
    </form>
    </div>
 
</body>
</html>