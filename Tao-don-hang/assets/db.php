<?php 
    $con = new mysqli('localhost','root','','qlthietbiyte');
//for user informationa making available for all pages

    $array = $con->query("select * from taikhoan where TenTK ='$_SESSION[user]'");
    $user = $array->fetch_assoc();

	$base_path = "http://localhost/";
?>