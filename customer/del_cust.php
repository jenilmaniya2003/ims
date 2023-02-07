<?php
	include('../inc/connection.php');
	$sql="delete  from party where id='".$_GET['id']."'";
	$result=mysqli_query($con,$sql);
	header('location:view_cust.php');	
?>