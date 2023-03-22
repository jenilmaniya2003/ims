<?php
session_start();
error_reporting(0);

if (strlen($_SESSION['aid'] == 0)) {
    header('location:index.php');
} else {
    include('../inc/menu.php');
    include('../inc/connection.php');

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Avalon Metalic</title>
        <link rel="icon" href="../IMG/logo.png" type="image/x-icon">
        <link href="../vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
        <link href="../vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
        <link href="../dist/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <!-- HK Wrapper -->
        <div class="hk-wrapper">

            <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>

            <!-- Main Content -->
            <div class="hk-pg-wrapper">
                <div class="container">
                    <!-- Title -->
                    <div class="hk-pg-header">
                        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Purchase Report Date Selection</h4>
                    </div>
                    <!-- /Title -->

                    <!-- Row -->
                    <div class="row">
                        <div class="col-xl-12">
                            <section class="hk-sec-wrapper">

                                <div class="row">
                                    <div class="col-sm">
                                        <form class="needs-validation" method="post" action="purch_reportdetails.php" novalidate>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="validationCustom03">From Date</label>
                                                    <input class="form-control" type="date" name="fromdate" required />
                                                    <div class="invalid-feedback">Please provide a valid from date.</div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="validationCustom03">To Date</label>
                                                    <input class="form-control" type="date" name="todate" required />
                                                    <div class="invalid-feedback">Please provide a valid to date.</div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <?php
                include('../inc/footer.php');
                ?>
                <!-- /Footer -->

            </div>
            <!-- /Main Content -->

        </div>

        <script src="../../vendors/jquery/dist/jquery.min.js"></script>
        <script src="../../vendors/popper.js/dist/umd/popper.min.js"></script>
        <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../../vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
        <script src="../../dist/js/jquery.slimscroll.js"></script>
        <script src="../../dist/js/dropdown-bootstrap-extended.js"></script>
        <script src="../../dist/js/feather.min.js"></script>
        <script src="../../vendors/jquery-toggles/toggles.min.js"></script>
        <script src="../../dist/js/toggle-data.js"></script>
        <script src="../../dist/js/init.js"></script>
        <script src="../../dist/js/validation-data.js"></script>

    </body>

    </html>
<?php } ?>