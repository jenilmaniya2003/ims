<?php
session_start();
// error_reporting(0);
if (strlen($_SESSION['aid'] == 0)) {
    header('location:index.php');
} else {
    include('../inc/connection.php');
    //  include("../inc/menu.php");
    $sql = "select * from product where id=" . $_GET['id'];
    $res = mysqli_query($con, $sql);

    $row = mysqli_fetch_object($res);

    if (isset($_REQUEST['submit'])) {
        $q = "update product set
		name='" . $_REQUEST['productname'] . "',
		category='" . $_REQUEST['category'] . "',
		opening_stock='" . $_REQUEST['opening_stock'] . "',
        price='" . $_REQUEST['productprice'] . "'
        where id='" . $_GET['id'] . "'
		";
        $query = mysqli_query($con, $q);
        // header("location:view_prod.php");
        if ($query) {
            echo "<script>alert('Product Update successfully.');</script>";
            echo "<script>window.location.href='view_prod.php'</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
            echo "<script>window.location.href='updt_prod.php'</script>";
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

                        <div class="form-row">
                            <input type="text" name="productprice" class="additional" id="productprice" value="<?php echo $row->price; ?>" autocomplete="off">
                        </div>

                        <div class="form-row-last">
                            <input type="submit" name="submit" class="register" value="Register">
                            <a href="view_prod.php"> <input type="button" name="btnback" class="register" value="Back"></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <?php include_once('../inc/footer.php'); ?>

    </html>



<?php } ?>