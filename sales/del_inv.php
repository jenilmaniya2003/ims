<?php
	include('../inc/connection.php');
	$sql="delete  from sales where challan_no='".$_GET['id']."'";
	$result=mysqli_query($con,$sql);
	header('location:view_inv.php');	
?>