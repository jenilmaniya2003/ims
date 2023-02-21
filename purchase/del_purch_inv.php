<?php
include('../inc/connection.php');
$sql = "delete  from purchase where invoice_no='" . $_GET['id'] . "'";
$result = mysqli_query($con, $sql);
header('location:view_purch_inv.php');
