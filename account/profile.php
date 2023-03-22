<?php
session_start();
error_reporting(0);
include('../inc/connection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:index.php');
} else {
    if (isset($_POST['update'])) {
        $adminid = $_SESSION['aid'];
        $adminname = $_POST['adminname'];
        $username=$_POST['username'];
        $emailid = $_POST['emailid'];
        $mobileno = $_POST['mobilenumber'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $query = mysqli_query($con, "update admin set name='$adminname',mobile_no='$mobileno',username='$username',email='$emailid', address='$address',contact='$contact' where id='$adminid'");
        if ($query) {
            echo "<script>alert('Admin details updated successfully.');</script>";
            echo "<script>window.location.href='profile.php'</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Admin profile</title>
    <link href="../vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="../vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="../dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>


    <div class="hk-wrapper">
        <?php include('../inc/menu.php'); ?>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <div class="hk-pg-wrapper">
            <div class="container">
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                                    data-feather="external-link"></i></span></span>Update Admin Profile</h4>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">

                            <div class="row">
                                <div class="col-sm">
                                    <form class="needs-validation" method="post" novalidate>
                                        <?php
                                            //Getting admin name
                                            $adminid = $_SESSION['aid'];
                                            $query = mysqli_query($con, "select * from admin where id='$adminid'");
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-10">
                                                <label for="validationCustom03"> Reg. Date</label>
                                                <?php echo $row['admin_reg_date']; ?>
                                            </div>
                                        </div>
                                        <?php if ($row['updation_date'] != "") { ?>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-10">
                                                <label for="validationCustom03"> Last Updation Date</label>
                                                <?php echo $row['updation_date']; ?>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-10">
                                                <label for="validationCustom03"> Name</label>
                                                <input type="text" class="form-control" id="validationCustom03"
                                                    value="<?php echo $row['name']; ?>" name="adminname" required>
                                                <div class="invalid-feedback">Please provide a valid name.</div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-10">
                                                <label for="validationCustom03"> Username</label>
                                                <input type="text" class="form-control" id="validationCustom03"
                                                    value="<?php echo $row['username']; ?>" name="username">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-10">
                                                <label for="validationCustom03">Email id</label>
                                                <input type="text" class="form-control" id="validationCustom03"
                                                    value="<?php echo $row['email']; ?>" name="emailid" required>
                                                <div class="invalid-feedback">Please provide a valid Email id.</div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-10">
                                                <label for="validationCustom03">Address</label>
                                                <input type="text" class="form-control" id="validationCustom03"
                                                    value="<?php echo $row['address']; ?>" name="address" required>
                                                <div class="invalid-feedback">Please provide a valid Address.</div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-10">
                                                <label for="validationCustom03"> Mobile Number</label>
                                                <input type="text" class="form-control" id="validationCustom03"
                                                    value="<?php echo $row['mobile_no']; ?>" name="mobilenumber"
                                                    required>
                                                <div class="invalid-feedback">Please provide a valid mobile number.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-10">
                                                <label for="validationCustom03"> Contact</label>
                                                <input type="text" class="form-control" id="validationCustom03"
                                                    value="<?php echo $row['contact']; ?>" name="contact" required>
                                                <div class="invalid-feedback">Please provide a valid Contact.</div>
                                            </div>
                                        </div>

                                        <?php } ?>

                                        <button class="btn btn-primary" type="submit" name="update">Update</button>
                                    </form>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div>

            <!-- Footer -->
            <?php include('../inc/footer.php'); ?>
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