<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['aid'] == 0)) {
    header('location:index.php');
} else {
    include('../inc/connection.php');
    $sql = "select * from purch_trans where id=" . $_GET['id'];
    $res = mysqli_query($con, $sql);

    $row = mysqli_fetch_object($res);
    $pm = $row->paid_amount;

    if (isset($_REQUEST['submit'])) {
        $total_amount = $_POST['total_amount'];
        $paid_amount = $_POST['paid_amount'];
        $pm1 = ($_POST['paid_amount'] + $pm);
        $pending_amount = $_POST['pending_amount'];
        $pending_amount1 = ($pending_amount) - ($paid_amount);

        $q = "update purch_trans set 
        total_amount='$total_amount',
        paid_amount='$pm1',
        pending_amount='$pending_amount1'
        where id=" . $_GET['id'];

        $query = mysqli_query($con, $q);

        if ($query) {
            echo "<script>alert('Transaction Update successfully.');</script>";
            echo "<script>window.location.href='view_pending_purchase_payment.php'</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
            echo "<script>window.location.href='updt_purchase_pen_trans.php'</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Add Product</title>
    <link href="../vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="../vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="../dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="hk-wrapper">

        <?php include_once('../inc/menu.php'); ?>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>

        <div class="hk-pg-wrapper">

            <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                                    data-feather="external-link"></i></span></span>Update Product</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">

                            <div class="row">
                                <div class="col-sm">
                                    <form class="needs-validation" method="post" novalidate>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-10">
                                                <label for="validationCustom03">Invoice No</label>
                                                <input type="text" class="form-control" id="validationCustom03"
                                                    placeholder="Product Name" name="productname"
                                                    value="<?php echo $row->invoice_no; ?>" readonly required>
                                                <div class="invalid-feedback">Please provide a valid challan no.</div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-10">
                                                <label for="validationCustom03">Total Amount</label>
                                                <input type="text" class="form-control" id="validationCustom03"
                                                    placeholder="Total Amount" name="total_amount"
                                                    value="<?php echo $row->total_amount; ?>" readonly required>
                                                <div class="invalid-feedback">Please provide a valid total amount.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-10">
                                                <label for="validationCustom03">Recevid Amount</label>
                                                <input type="text" class="form-control" id="validationCustom03"
                                                    placeholder="Received Amount" name="paid_amount" required>
                                                <div class="invalid-feedback">Please provide a valid received amount.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-10">
                                                <label for="validationCustom03">Pending Amount</label>
                                                <input type="text" class="form-control" id="validationCustom03"
                                                    placeholder="Pending Amount" name="pending_amount"
                                                    value="<?php echo $row->pending_amount; ?>" readonly required>
                                                <div class="invalid-feedback">Please provide a valid pending amount.
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                    </form>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div>

            <!-- Footer -->
            <?php include_once('../inc/footer.php'); ?>
            <!-- /Footer -->

        </div>
        <!-- /Main Content -->

    </div>

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
    <script src="../dist/js/jquery.slimscroll.js"></script>
    <script src="../dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../vendors/jquery-toggles/toggles.min.js"></script>
    <script src="../dist/js/toggle-data.js"></script>
    <script src="../dist/js/init.js"></script>
    <script src="../dist/js/validation-data.js"></script>

</body>

</html>
<?php } ?>