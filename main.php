<?php
session_start();
error_reporting(0);

if (strlen($_SESSION['aid'] == 0)) {
    header('location:index.php');
} else {
    include('inc/connection.php');

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
                <a href="supplier/view_supplier.php"><br><img src="IMG/supplier.png" alt="add" height=80 width=80><br><br>
                    <font class="f1">Supplier</font>
                </a>
            </div><br>
            <div class="div4 d3">
                <a href="sales/sales_main.php"><br><img src="IMG/sale.png" alt="add" height=80 width=80><br><br>
                    <font class="f1">Sales </font>
                </a>
            </div>
            <div class="div5 d3">
                <a href="purchase/purch_main.php"><br><img src="IMG/purchase.png" alt="add" height=100 width=100><br>
                    <font class="f1">Purchase</font>
                </a>
            </div>
            <div class="div6 d3">
                <a href="reports/stock_report.php"><br><img src="IMG/stock.png" alt="add" height=100 width=100><br>
                    <font class="f1">Stock Report</font>
                </a>
            </div>
            <div class="div7 d3">
                <a href="transaction/main_trans.php"><br><img src="IMG/payment.png" alt="add" height=80 width=80><br><br>
                    <font class="f1">Pending Payment</font>
                </a>
            </div>
          
            <div class="div8 d3">
                <a href="account/account_main.php"><br><img src="IMG/user.png" alt="add" height=80 width=80><br><br>
                    <font class="f1">Profile</font>
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
                Total Supplier
                <br>
                [<?php echo $con->query('select * from supplier')->num_rows; ?>]
            </div>
        </div>
    </body>

    </html>

<?php } ?>