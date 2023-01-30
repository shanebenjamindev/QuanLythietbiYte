<?php
session_start();

if(!isset($_SESSION['user']))
{
  echo "error";
}
 ?>
<?php require "assets/function.php" ?>
<?php require 'assets/db.php';?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo siteTitle(); ?></title>
  <?php require "assets/autoloader.php" ?>
  <style type="text/css">

  .yeu table{
    background-color: while;
    margin: auto;
    font-size: 20px;
    border: 2px solid black;
    width:70%;
    

  }
  table tr th{
    border-bottom: 1px solid black;
    border-right: 1px solid black;
    text-align:center;
  }
table tr td{
  border-bottom: 1px solid black;
    border-right: 1px solid black;
    text-align:center;
}
</style>

  

  
  <?php 
  $notice="";
   ?>
</head>

<body style="background: #ECF0F5;padding:0;margin:0">

  <?php 
  if (isset($_POST['updateBill'])) 
  {
    $MaSP = $_POST['MaSP'];
    $qty = $_POST['qty'];
    foreach ($_SESSION['bill'] as $key => $value) 
    {
      if($_SESSION['bill'][$key]['MaSP'] == $MaSP) 
      $_SESSION['bill'][$key]['qty'] = $qty; 
      
    }
  }
  	$i=0;$total = 0;
    $i2 = 0;
    ?>
   
    <div class="header">
   <iframe src="http://localhost/QuanLyWebTBYT/header/header-index.php" width="100%" height="130px"frameborder="0"></iframe>
 </div>

 <div class="yeu">
    <table>
    	<tr>
    		<th>STT</th>
    		<th>Tên sản phẩm</th>
    		<th>Giá</th>
        <th>MaLoaiSP</th>
        <th>Chọn số lượng</th>
        <th colspan="2">Thao tác</th>
    	
    	</tr>
    <?php
    
    foreach ($_SESSION['bill'] as $row) 
    {
      $i++;
      echo "<tr>";
      echo "<td>$i</td>";
      echo "<td>$row[TenSP]</td>";
      echo "<td> $row[GiaBan].VNĐ</td>";
      echo "<td>$row[MaLoaiSP]</td>";
      
      
    
            
      echo "<td> 
      
            <form method='POST'>
            <input type='hidden' value='$row[MaSP]' name='MaSP'>
            <input type='number' min='1' value ='$row[qty]' style='margin: auto; width: 120px;' name='qty'> 

            </td>";

            echo "<td>  
            
            <button type='submit' name='updateBill' style='margin-left:2px''>Update</button>
            </form>
            <a href='called.php?remove=$row[MaSP]'><button>Remove</button></a></td>";
            
      echo "</tr>";
      

      

      $total = $total + $row['GiaBan']*$row['qty'];
      $i2 += $row['qty'];
    }
   
  ?>
  <tr>
    <td></td>
    
    <td >Tổng tiền:</td>
    <td ><strong> <?php echo $total;  ?> .VNĐ</strong></td>
    <td></td>

    <td > Tổng số lương :<?php echo $i2;  ?>(sp) </td>
    <td><button data-toggle="modal" data-target="#billOut1" style="background-color:darkkhaki; color: white;">Hóa đơn</button>
    <button data-toggle="modal" data-target="#billOut" style="background-color:seagreen; color: white">Hóa đơn cho khách hàng mới</button>
    <a href="tao-don.php"><button>Thêm sản phẩm</button>
  </tr>
</table>
</div>




<div id="billOut1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thông tin người mua</h4>
      </div>
      <?php
            include './assets/db.php';
            $tenkh = "SELECT * FROM khachhang";
            $query= mysqli_query ($con,$tenkh); 

            $makh = "SELECT MaKH FROM khachhang";
            $query1= mysqli_query ($con,$makh); 
            
            $diachi = "SELECT DiaChi FROM khachhang";
            $query2= mysqli_query ($con,$diachi); ?>


      <div class="modal-body">
        <div style="width: 77%;margin: auto;"><form method = "POST" action = "billout1.php">
         
          <div class="form-group">
            <label for="some" class="col-form-label">Tên</label>
                
            <select name="name" class="form-control" id="some" >  
            

                <option value="">--Chọn--</option>

                <?php while ($KH = mysqli_fetch_assoc($query)) { ?>
                  
                  <option value="<?php echo $KH['TenKH'] ?>"><?php echo $KH['TenKH']  ?>
                 
                  </option>
                <?php }?>
            </select>
            
          </div>
        
       
        </div>

        
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      <?php while ($maKH = mysqli_fetch_assoc($query1)) { ?>
                 <input type="hidden" name="makh1" value="<?php echo $maKH['MaKH']; ?>">     
      <?php }?>

         <?php while ($diachiKH = mysqli_fetch_assoc($query2)) { ?>
                 <input type="hidden" name="diachi" value="<?php echo $diachiKH['DiaChi']; ?>">     
                      <?php }?>             
      
      <button type="submit" class="btn btn-primary" name="billInfo1" >Xem hóa đơn</button></a></form>
      </div>
    
    </div>

  </div>
</div>

<div id="billOut" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thông tin người mua</h4>
      </div>
      <div class="modal-body"> <form method="POST" action="billout.php">
        <div style="width: 77%;margin: auto;">
         
          <div class="form-group">
            <label for="some" class="col-form-label">Tên</label>
            <input type="text" name="name" class="form-control" id="some" required>
          </div>


          <div class="form-group">
            <label for="some" class="col-form-label">Tổng sản phẩm</label>
            <input type="text" name="soluong" class="form-control" id="some" value="<?php echo $i2 ?>" readonly >
          </div>


          <div class="form-group">
            <label for="some" class="col-form-label">Email</label>
            <input type="email" name="email" class="form-control" id="some" required>
          </div>

          <div class="form-group">
            <label for="some" class="col-form-label">SĐT</label>
            <input type="text" name="sdt" class="form-control" id="some" required>
          </div>

          <div class="form-group">
            <label for="some" class="col-form-label">Địa chỉ</label>
            <input type="text" name="contact" class="form-control" id="some" required>
          </div>
          
       
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary" name="billInfo">Xem hóa đơn</button>
      </div>
    </form>
    </div>

  </div>
</div>

  </body>   

</html>


