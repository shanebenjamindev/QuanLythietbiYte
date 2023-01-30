<?php 
  session_start();
   $laysdt = $_SESSION['SDT'];
   $laygmail =   $_SESSION["Email"]    ;
   echo "sđt của nó là  $laysdt" ; 
   echo "<br>"; 
   echo "Gmail của nó là  $laygmail" ;    
   echo "<br>"; 
   session_destroy();
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
            <a href="../test/test.php">quay về </a>
</body>
</html>