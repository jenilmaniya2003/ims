<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['aid'] == 0)) {
    header('location:index.php');
} else {
    include('../inc/connection.php');
    include('../inc/menu.php');
    // Code for deletion   
    if (isset($_GET['del'])) {
        $cmpid = substr(base64_decode($_GET['del']), 0, -5);
        $query = mysqli_query($con, "delete from tblcategory where id='$cmpid'");
        echo "<script>alert('Category record deleted.');</script>";
        echo "<script>window.location.href='manage-categories.php'</script>";
    }
    $fdate = $_POST['fromdate'];
    $tdate = $_POST['todate'];

    if (isset($_POST['prod_delete_multiple_btn'])) {
        $all_id = $_POST['product_delete_id'];
        $extract_id = implode(',', $all_id);

        $query = "DELETE FROM purchase where id IN($extract_id)";
        $query_run = mysqli_query($con, $query);
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Avalon Metalic</title>
    <link rel="icon" href="../IMG/logo.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/datatables.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/buttons.dataTables.min.css">

    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.buttons.min.js"></script>
    <script src="../assets/js/jszip.min.js"></script>
    <script src="../assets/js/buttons.html5.min.js"></script>
    <script src="../assets/js/buttons.colVis.min.js"></script>
</head>

<body>
    <div class="container">
        <!-- <div class="row"> -->
        <!-- <div class="col-12"> -->
        <div class="data_table">
            <form method="post">
                <table id="example" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Sr.No</th>
                            <th>Invoice No</th>
                            <th>Party Name</th>
                            <th>Date</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = mysqli_query($con, "SELECT supplier.name, purchase.id, purchase.invoice_no, purchase.date, purchase.bill_no, purchase.bill_date, purchase.product_name, purchase.quantity,purchase.rate,purchase.amount FROM purchase JOIN supplier ON supplier.id = purchase.supplier_name where date(date) between '$fdate' and '$tdate'");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                        <tr>
                            <td style="text-align: center;"><?= $cnt; ?></td>
                            <td style="text-align: center;"><?= $row['invoice_no']; ?></td>
                            <td style="text-align: center;"><?= $row['name']; ?></td>
                            <td style="text-align: center;"><?= $row['date']; ?></td>
                            <td style="text-align: center;"><?= $row['product_name']; ?></td>
                            <td style="text-align: center;"><?= number_format($row['quantity'], 3); ?></td>
                            <td style="text-align: center;"><?= number_format($row['rate'], 2); ?></td>
                            <td style="text-align: center;"><?= number_format($row['amount'], 2); ?></td>

                        </tr>
                        <?php
                                $cnt++;
                            } ?>

                    </tbody>
                </table>
            </form>
        </div>
    </div>
    </div>
    </div>

    <script>
    $(document).ready(function() {
        $("#chkAll").change(function() {
            debugger;
            if ($(this).prop('checked')) {
                $('.tblChk').not(this).prop('checked', true);
            } else {
                $('.tblChk').not(this).prop('checked', false);
            }
        })
    });
    </script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/datatables.min.js"></script>
    <script src="../assets/js/pdfmake.min.js"></script>
    <script src="../assets/js/vfs_fonts.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>

</html>
<?php } ?>

<?php
include('../inc/footer.php');
?>