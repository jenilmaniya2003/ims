<?php
// include('../inc/menu.php');
include('../inc/connection.php');
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
                    <form method="POST" action="add_prod_data.php">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="NAME" name="name" required>
                        </div>

                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="category" required>
                                    <option disabled="disabled" selected="selected">Category</option>
                                    <option>One Side</option>
                                    <option>Both Side</option>
                                    <option>Flora</option>
                                    <option>Gray</option>
                                    <option>Black</option>
                                    <option>Silver</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Opening Stock" name="opening_stock" required>
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