<?php
include('../inc/connection.php');
$sql = "delete  from purch_trans where id='" . $_GET['id'] . "'";
$result = mysqli_query($con, $sql);
header('location:view_pending_purchase_payment.php');
