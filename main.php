<?php
session_start();
error_reporting(0);

if (strlen($_SESSION['aid'] == 0)) {
    header('location:index.php');
} else {
    include('inc/connection.php');
    // include('header.php');
    // include('sidebar.php');
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Avalon Metalic</title>
        <link rel="icon" href="IMG/logo.png" type="image/x-icon">
        <link href="css/home.css" rel="stylesheet">

    </head>

    <body class="b1">
        <div class="parent">
            <div class="div1 d3">
                <a href="customer/view_cust.php"><br><img src="IMG/customer.png" alt="add" height=100 width=100><br>
                    <font class="f1">Customer</font>
                </a>
            </div>
            <div class="div2 d3">
                <a href="product/view_prod.php"><br><img src="IMG/product.png" alt="add" height=80 width=80><br><br>
                    <font class="f1">Products</font>
                </a>
            </div>
            <div class="div3 d3">
                <a href="#"><br><img src="IMG/ledger.png" alt="add" height=80 width=80><br><br>
                    <font class="f1">A/C. Ledger</font>
                </a>
            </div><br>
            <div class="div4 d3">
                <a href="sales/srch_prod.php"><br><img src="IMG/sale.png" alt="add" height=80 width=80><br><br>
                    <font class="f1">Sales Challan</font>
                </a>
            </div>
            <div class="div5 d3">
                <a href="purchase/purch_prod.php"><br><img src="IMG/purchase.png" alt="add" height=100 width=100><br>
                    <font class="f1">Purc. Invoice</font>
                </a>
            </div>
            <div class="div6 d3">
                <a href="#"><br><img src="IMG/stock.png" alt="add" height=100 width=100><br>
                    <font class="f1">Stock Report</font>
                </a>
            </div>
            <div class="div7 d3">
                <a href="transaction/view_pending_payment.php"><br><img src="IMG/payment.png" alt="add" height=80 width=80><br><br>
                    <font class="f1">Pending Payment</font>
                </a>
            </div>
            <div class="div8 d3">
                <a href="reports/salereport.php"><br><img src="IMG/sale-report.png" alt="add" height=80 width=80><br><br>
                    <font class="f1">Sales Report</font>
                </a>
            </div>
            <div class="div9 d3">
                <a href="reports/bwreport.php"><br><img src="IMG/bw-report.png" alt="add" height=80 width=80><br><br>
                    <font class="f1">B/W Report</font>
                </a>
            </div>
            <div class="box1">
                Total Customers
                <br>
                [<?php echo $con->query('select * from party')->num_rows; ?>]
            </div>
            <div class="box2">
                Total Products
                <br>
                [<?php echo $con->query('select * from product')->num_rows; ?>]
            </div>

            <div class="box3">
                Total Sales
                <br>
                [<?php
                    $q = "select sum(amount) as tt  from sales";
                    $r = mysqli_query($con, $q);
                    $row = mysqli_fetch_array($r);
                    $tt = $row['tt'];
                    echo number_format(round($tt), 2);
                    ?>]
            </div>
        </div>
    </body>

    </html>

<?php } ?>