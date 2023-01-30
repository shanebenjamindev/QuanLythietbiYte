<?php 
    session_start(); 
?>


<?php
    echo 'Bạn đã đăng nhập với tên là '.$_SESSION['user']."<br/>";
     echo 'Click vào đây để <a href="./Form Login-SignUp/logout.php">Logout</a></br>';
     echo 'Click vào đây để <a href="./khachhang/khachhang.php">Quản lú khách hàng</a></br>';
     echo 'Click vào đây để <a href="./donhang/donhang.php">Quản lú đơn hàng</a></br>';
     echo 'Click vào đây để <a href="./doimatkhau/doimk.php">Đổi mật khẩu</a>';
?>



<!-- <!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
      
    //    if (isset($_SESSION['username']) && $_SESSION['username']){
    //        echo 'Bạn đã đăng nhập với tên là '.$_SESSION['username']."<br/>";
    //        
    //    }
    //    else{
    //       
    //    }
       ?> -->
    <!-- </body>
</html> --> 