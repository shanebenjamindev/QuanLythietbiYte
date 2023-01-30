
<?php session_start(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="header-index.css">
</head>
<body>
    <form>
    <div class="header">
        <div class="logo-header">
     <img src="../image/logo.jpg">
        </div>
        <div class="title-header">
            <ul>
                <li><button type="button" name="" value="" style="width:120px; height:25px; border: 1px solid black; background-color:red; border-radius:10px; color:white; font-weight:bold;">
                 Xin chào, <?php
                 if(isset($_SESSION['user']))
                 {
                    echo $_SESSION['user'];
                 
                 }
                 else {
                     echo 'bạn' ; 
                 }
                  
                           ?>!</button></li>
            </ul>
           
        </div>
    </div>
    </form>
</body>
</html>