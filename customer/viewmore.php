<?php
include('../inc/connection.php');
include('../inc/menu.php');
$sql = "select * from party where id='" . $_GET['id'] . "'";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_object($res);
// header('location:view_cust.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Avalon Metalic</title>
    <link rel="icon" href="../IMG/logo.png" type="image/x-icon">
    <!-- -->
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="vc/css/opensans-font.css">
    <link rel="stylesheet" type="text/css" href="vc/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="vc/css/style.css" />
</head>

<body>
    <div class="page-content">
        <div class="form-v1-content">
            <div class="wizard-form">
                <form class="form-register" action="view_cust.php" method="post">
                    <div id="form-total">
                        <!-- SECTION 1 -->
                        <h2>
                            <p class="step-icon"><span>01</span></p>
                            <span class="step-text">Genreal Infomation</span>
                        </h2>
                        <section>
                            <div class="inner">
                                <div class="wizard-header">
                                    <h3 class="heading">General Infomation</h3>
                                </div>

                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Customer Name</legend>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row->name; ?>" disabled required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Alias</legend>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row->alias; ?>" disabled required>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>City</legend>
                                            <input type="text" class="form-control" id="first-name" name="first-name" value="<?php echo $row->city; ?>" disabled required>
                                        </fieldset>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Area</legend>
                                            <input type="text" class="form-control" id="last-name" name="last-name" value="<?php echo $row->area; ?>" disabled required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>State</legend>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row->state; ?>" disabled required>
                                        </fieldset>
                                    </div>
                                </div>

                            </div>
                        </section>
                        <!-- SECTION 2 -->
                        <h2>
                            <p class="step-icon"><span>02</span></p>
                            <span class="step-text">Contact Details</span>
                        </h2>
                        <section>
                            <div class="inner">
                                <div class="wizard-header">
                                    <h3 class="heading">Contact Details</h3>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Contact Person Name</legend>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row->con_per_name; ?>" disabled required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Address</legend>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row->address; ?>" disabled required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Pin Code</legend>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row->pin; ?>" disabled required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Mobile Number</legend>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row->mo_no; ?>" disabled required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Phone Number</legend>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row->phone_no; ?>" disabled required>
                                        </fieldset>
                                    </div>
                                </div>

                            </div>
                        </section>
                        <!-- SECTION 3 -->
                        <h2>
                            <p class="step-icon"><span>03</span></p>
                            <span class="step-text">Other Details</span>
                        </h2>
                        <section>
                            <div class="inner">
                                <div class="wizard-header">
                                    <h3 class="heading">Other Details</h3>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Pan Number</legend>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row->pan_no; ?>" disabled required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Adhar Number</legend>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row->adhar_no; ?>" disabled required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>GSTIN Number</legend>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row->gstin; ?>" disabled required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Fax</legend>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row->fax; ?>" disabled required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Email</legend>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row->email; ?>" disabled required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Website</legend>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row->website; ?>" disabled required>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <center>
                                <a href="view_cust.php"><button class="btn btn-primary">Back</button></a>
                            </center>
                        </section>
                    </div>
                </form>


            </div>
        </div>
    </div>
    <script src="vc/js/jquery-3.3.1.min.js"></script>
    <script src="vc/js/jquery.steps.js"></script>
    <script src="vc/js/main.js"></script>
</body>

</html>

<?php
	include('../inc/footer.php');
?>