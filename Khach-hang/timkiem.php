<?php 
  
    include('./ketnoi.php');
    if (isset($_POST['tukhoa'])){
      $query = "SELECT * FROM khachhang WHERE TenKH like '%".$_POST['tukhoa']."%'";

    $result = $con->query($query);
    return $result;
    }
    
  
?>
<?php include('khachhang.php'); ?>
