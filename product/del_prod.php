<?php
	include('../inc/connection.php');
	$sql="delete  from product where id='".$_GET['id']."'";
	$result=mysqli_query($con,$sql);
	header('location:view_prod.php');	
?>