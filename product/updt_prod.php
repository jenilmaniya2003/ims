<?php
include('../inc/connection.php');
//  include("../inc/menu.php");
$sql = "select*from product where id=" . $_GET['id'];
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_object($res);

if (isset($_REQUEST['btnsubmit'])) {
    $q = "update product set
		name='" . $_REQUEST['name'] . "',
		category='" . $_REQUEST['category'] . "',
		opening_stock='" . $_REQUEST['opening_stock'] . "'
        where id='" . $_GET['id'] . "'
		";
    mysqli_query($con, $q);
    header("location:view_prod.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Avalon Metalic</title>
    <link rel="icon" href="../IMG/logo.png" type="image/x-icon">

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-body">
                    <h2 class="title">Product Registration</h2>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="NAME" name="name" value="<?php echo $row->name; ?>" required>
                        </div>

                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="category" required>
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
                                                            } ?>>Silver</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Opening Stock" name="opening_stock" value="<?php echo $row->opening_stock; ?>" required>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="btnsubmit">Submit</button>&nbsp;&nbsp;&nbsp;
                            <button class="btn btn--radius btn--red" type="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
<?php
include('../inc/footer.php');
?>