<?php
	include('../inc/connection.php');
	$sql="delete  from transaction where id='".$_GET['id']."'";
	$result=mysqli_query($con,$sql);
	header('location:view_pending_payment.php');	
?>