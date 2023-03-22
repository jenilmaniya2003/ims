<?php
session_start();
<<<<<<< HEAD
// error_reporting(0);
if (strlen($_SESSION['aid'] == 0)) {
    header('location:index.php');
} else {
    include('../inc/connection.php');
    //  include("../inc/menu.php");
    $sql = "select * from product where id=" . $_GET['id'];
    $res = mysqli_query($con, $sql);

    $row = mysqli_fetch_object($res);
=======
error_reporting(0);
if (strlen($_SESSION['aid']==0)) {
  header('location:index.php');
  } else{
include('../inc/connection.php');
$sql = "select * from product where id=" . $_GET['id'];
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_object($res);
>>>>>>> 6328fc7510423e68eedd9bf90e516bed4aaf17f1

    if (isset($_REQUEST['submit'])) {
        $q = "update product set
		name='" . $_REQUEST['productname'] . "',
		category='" . $_REQUEST['category'] . "',
		opening_stock='" . $_REQUEST['opening_stock'] . "',
        price='" . $_REQUEST['productprice'] . "'
        where id='" . $_GET['id'] . "'
		";
<<<<<<< HEAD
        $query = mysqli_query($con, $q);
        // header("location:view_prod.php");
        if ($query) {
            echo "<script>alert('Product Update successfully.');</script>";
            echo "<script>window.location.href='view_prod.php'</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
            echo "<script>window.location.href='updt_prod.php'</script>";
=======
    $query=mysqli_query($con, $q);
    if($query){
        echo "<script>alert('Product Update successfully.');</script>";   
        echo "<script>window.location.href='view_prod.php'</script>";
        } else{
        echo "<script>alert('Something went wrong. Please try again.');</script>";   
        echo "<script>window.location.href='updt_prod.php'</script>";    
>>>>>>> 6328fc7510423e68eedd9bf90e516bed4aaf17f1
        }
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Avalon Metalic</title>
        <link rel="icon" href="../IMG/logo.png" type="image/x-icon">
        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Main Style Css -->
        <link rel="stylesheet" href="../customer/css/style.css" />
    </head>

<<<<<<< HEAD
    <body class="form-v10">
        <div class="page-content">
            <div class="form-v10-content">
                <form class="form-detail" action="#" method="post" id="myform">



                    <div class="form-right">
                        <h2>Update Product</h2>
                        <div class="form-row">
                            <input type="text" name="productname" class="street" id="productname" value="<?php echo $row->name; ?>" required autocomplete="off">
                        </div>


                        <div class="form-row">
                            <select class="form-control custom-select" name="category" required>
                                <option disabled="disabled" selected="selected">Category</option>
                                <option value="One Side" <?php if ($row->category == "One Side") {
=======
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
                                                <label for="validationCustom03">Product Name</label>
                                                <input type="text" class="form-control" id="validationCustom03"
                                                    placeholder="Product Name" name="productname"
                                                    value="<?php echo $row->name; ?>" required>
                                                <div class="invalid-feedback">Please provide a valid product name.</div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-10">
                                                <label for="validationCustom03">Category</label>
                                                <select class="form-control custom-select" name="category" required>
                                                    <option disabled="disabled" selected="selected">Category</option>
                                                    <option value="One Side" <?php if ($row->category == "One Side") {
                                                                    echo "selected";
                                                                } ?>>One Side</option>
                                                    <option value="Both Side" <?php if ($row->category == "Both Side") {
                                                                    echo "selected";
                                                                } ?>>Both Side</option>
                                                    <option value="Flora" <?php if ($row->category == "Flora") {
>>>>>>> 6328fc7510423e68eedd9bf90e516bed4aaf17f1
                                                                echo "selected";
                                                            } ?>>One Side</option>
                                <option value="Both Side" <?php if ($row->category == "Both Side") {
                                                                echo "selected";
                                                            } ?>>Both Side</option>
                                <option value="Flora" <?php if ($row->category == "Flora") {
                                                            echo "selected";
                                                        } ?>>Flora</option>
                                <option value="Gray" <?php if ($row->category == "Gray") {
                                                            echo "selected";
                                                        } ?>>Gray</option>
                                <option value="Black" <?php if ($row->category == "Black") {
                                                            echo "selected";
                                                        } ?>>Black</option>
                                <option value="Silver" <?php if ($row->category == "Silver") {
                                                            echo "selected";
                                                        } ?>>Sil
                        </div>

<<<<<<< HEAD
                        <div class="form-row">
                            <input type="text" name="productprice" class="additional" id="productprice" value="<?php echo $row->price; ?>" autocomplete="off">
                        </div>

                        <div class="form-row-last">
                            <input type="submit" name="submit" class="register" value="Register">
                            <a href="view_prod.php"> <input type="button" name="btnback" class="register" value="Back"></a>
                        </div>
=======
                                        <div class="form-row">
                                            <div class="col-md-6 mb-10">
                                                <label for="validationCustom03">Stock</label>
                                                <input type="text" class="form-control" id="validationCustom03"
                                                    placeholder="Stock" name="opening_stock" readonly
                                                    value="<?php echo $row->opening_stock; ?>" required>
                                                <div class="invalid-feedback">Please provide a stock.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-10">
                                                <label for="validationCustom03">Product Price</label>
                                                <input type="text" class="form-control" id="validationCustom03"
                                                    placeholder="Product Price" name="productprice"
                                                    value="<?php echo $row->price; ?>" required>
                                                <div class="invalid-feedback">Please provide a valid product price.
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                    </form>
                                </div>
                            </div>
                        </section>

>>>>>>> 6328fc7510423e68eedd9bf90e516bed4aaf17f1
                    </div>
                </form>
            </div>
        </div>
    </body>
    <?php include_once('../inc/footer.php'); ?>

    </html>



<?php } ?>