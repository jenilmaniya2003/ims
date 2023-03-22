<?php
session_start();
include('inc/connection.php');
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $sql = "SELECT * FROM admin WHERE email='$email' AND mobile_no='$contact'";
    $res = mysqli_query($con, $sql);
    $row = array($res);
    foreach ($res as $r) {
        while ($row = mysqli_fetch_object($r)) {
            echo $row->password;
        }
    }
}
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Forgot Password</title>

    <link rel="stylesheet" href="css1/font-awesome.min.css">
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css1/bootstrap-social.css">
    <link rel="stylesheet" href="css1/bootstrap-select.css">
    <link rel="stylesheet" href="css1/fileinput.min.css">
    <link rel="stylesheet" href="css1/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css1/style.css">
</head <body>

<div class="login-page bk-img">
    <div class="form-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1 class="text-center text-bold text-light mt-4x">Forgot Password</h1>
                    <div class="well row pt-2x pb-3x bk-light">
                        <div class="col-md-8 col-md-offset-2">

                            <form action="" class="mt" method="post">
                                <label for="" class="text-uppercase text-sm">Your Email</label>
                                <input type="email" placeholder="Email" name="email" class="form-control mb" autocomplete="off">
                                <label for="" class="text-uppercase text-sm">Your Contact no</label>
                                <input type="text" placeholder="Contact no" name="contact" class="form-control mb" autocomplete="off">


                                <input type="submit" name="login" class="btn btn-primary btn-block" value="login">
                            </form>
                        </div>
                    </div>
                    <?php foreach ($res as $r) {
                        while ($row = mysqli_fetch_object($r)) {
                            echo $row->password;
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/fileinput.js"></script>
<script src="js/chartData.js"></script>
<script src="js/main.js"></script>
</body>

</html>