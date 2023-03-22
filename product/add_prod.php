<?php
session_start();
//error_reporting(0);
include('../inc/connection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:index.php');
} else {
    // Add product Code
    if (isset($_POST['submit'])) {
        //Getting Post Values
        $catname = $_POST['category'];
        // $opening_stock = $_POST['opening_stock'];
        $pname = $_POST['productname'];
        $pprice = $_POST['productprice'];
        $query = mysqli_query($con, "insert into product (name,category,price) values('$pname','$catname','$pprice')");
        if ($query) {
            echo "<script>alert('Product added successfully.');</script>";
            echo "<script>window.location.href='view_prod.php'</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
            echo "<script>window.location.href='add_prod.php'</script>";
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
                        <h2>Add Product</h2>
                        <div class="form-row">
                            <input type="text" name="productname" class="street" id="productname" placeholder="Product Name" required autocomplete="off">
                        </div>


                        <div class="form-row">
                            <!-- <input type="text" name="email" id="email" class="input-text" placeholder="Categoty"> -->
                            <select class="form-control custom-select" name="category" required>
                                <option value="">Select category</option>
                                <!--  -->
                                <option>One Side</option>
                                <option>Both Side</option>
                                <option>Flora</option>
                                <option>Gray</option>
                                <option>Black</option>
                                <option>Silver</option>
                            </select>
                        </div>

                        <div class="form-row">
                            <input type="text" name="productprice" class="additional" id="productprice" placeholder="Product Price" autocomplete="off">
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