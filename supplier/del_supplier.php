<?php
include('../inc/connection.php');
$sql = "delete  from supplier where id='" . $_GET['id'] . "'";
$result = mysqli_query($con, $sql);
header('location:view_supplier.php');
