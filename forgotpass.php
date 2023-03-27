<?php
session_start();
include('inc/connection.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $sql = mysqli_query($con, "SELECT * FROM admin WHERE email='$email'");
    $row = mysqli_fetch_array($sql);
    if ($row > 0) {
        $pass = $con->query("SELECT password from admin where email='$email'");
        $user = $pass->fetch_array();
        $match = $user['password'];
    } else {
        echo "<script>alert('Email Not Match Our Database');</script>";
    }
}

if (isset($_POST['submit'])) {
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $email = $_POST['email'];

    if ($password != $cpassword) {
        echo "<script>alert('New Password and Confirm is Not Match')</script>";
    } else {
        $sql = mysqli_query($con, "SELECT * FROM admin WHERE email='$email'");
        $row = mysqli_fetch_array($sql);

        if ($row > 0) {
            $sql1 = "update admin set password='$password' where email='$email'";
            $pass = mysqli_query($con, $sql1);
        }
        if (@$pass) {
            echo "<script>alert('Password Change Successfully');</script>";
            header('location:index.php');
        } else {
            echo "<script>alert('Please Write Correct Email');</script>";
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

                                <?php
                                if (@$match) {
                                    echo '<label for="" class="text-uppercase text-sm">New Password</label>';
                                    echo '<input type="password" placeholder="New Password" name="password" class="form-control mb" autocomplete="off">';
                                    echo '<label for="" class="text-uppercase text-sm">Confirm Password</label>';
                                    echo '<input type="text" placeholder="Confirm Password" name="cpassword" class="form-control mb">';
                                    echo '<input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit"><br>';
                                    echo '<a href="http://localhost/IMS/"><input type="button" name="login" class="btn btn-primary btn-block" value="Back"></a>';
                                } else {
                                    echo '<input type="submit" name="login" class="btn btn-primary btn-block" value="Submit"><br>';
                                    echo '<a href="http://localhost/IMS/"><input type="button" name="login" class="btn btn-primary btn-block" value="Back"></a>';
                                }
                                ?>



                            </form>
                        </div>
                    </div>

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