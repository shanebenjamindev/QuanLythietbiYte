<?php session_start(); ?>

    <?php
    include ('./assets/db.php');
        if (isset($_GET['madh']))
        {
           
            $madh = $_GET['madh'];
            $sql = "UPDATE taodonhang SET TrangThai = 'Đã Giao' WHERE id_MaDon = '$madh' ";
            $query = mysqli_query($con,$sql);
            header('Location:./tao-don-hang.php');
            
        }
        
    ?>
