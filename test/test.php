<?php 
  session_start();
     include '../connetDB.php';
      
    $sql = "select * from khachhang" ;
    $query = mysqli_query($connet,$sql);

    if(isset($_GET['truyen'])){
        $tenkh = $_GET['KhachHang'];

        $sql1 = "select * from khachhang where TenKH = '$tenkh'" ;
         $query1 = mysqli_query($connet,$sql1);
         $laythongtin = mysqli_fetch_assoc($query1);
         $sdt = $laythongtin['SDT'];      
         $gmail = $laythongtin['Email'];

         $_SESSION["SDT"] =$sdt;
         $_SESSION["Email"] = $gmail;
        
         header('location: form.php');
      
        
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
<body> 
      <form>
     <select name="KhachHang" id="" class="input-group">
        <option value="">Chọn khách hàng</option> 
        <?php
           while($tenkh = mysqli_fetch_assoc($query)){

           
        ?>
       <option value="<?php echo $tenkh['TenKH'];?>" require ><?php echo $tenkh['TenKH'];?>
         
    </option> 
       
      <?php
        }
        ?>
         </select>
          <button name = "truyen"> truyền </button>
         
         </form>
</body>
</html>