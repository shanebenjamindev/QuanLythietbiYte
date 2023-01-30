<?php 
if (sizeOf($_SESSION['bill']) == '0') 
{
	$display = 'display:none';
}else
$display ='';
 ?>


<div id="bill" style="position: absolute;right: 50px;top: 50px;width: 350px;<?php echo $display ?>">
	
	<span class="badge"><input type="text" id="counter" value="<?php echo sizeOf($_SESSION['bill']); ?>" readonly style=' font-size: 20px;width: 33px;color: black;padding:2px;border-radius: 5px;'></span> <a style = "font-size: 22px; color: white">selected</a> <a href="billing.php"><button style = "font-size: 20px;">View Bill</button></a>
<a href='clear.php?url=<?php echo $_SERVER['PHP_SELF']; ?>'><button style = "font-size: 20px;">Clear</button></a>
</div>