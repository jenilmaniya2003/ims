<?php
	include('../inc/connection.php');
	// include("../inc/menu.php");
	if (isset($_REQUEST['btnsubmit'])){
		$q="insert into product set
		name='" .$_REQUEST['name']."',
		category='" .$_REQUEST['category']."',
		opening_stock='" .$_REQUEST['opening_stock']."'
				

		";
		mysqli_query($con,$q);
		header("location:view_prod.php");
	}
?>