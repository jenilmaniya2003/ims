<?php
session_start();
//error_reporting(0);
include('inc/connection.php');
if (isset($_POST['login'])) {
    $adminuser = $_POST['username'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "select * from admin where  username='$adminuser' && password='$password' ");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['aid'] = $ret['id'];
        header('location:main.php');
    } else {
        echo "<script>alert('Invalid details. Please try again.');</script>";
        echo "<script>window.location.href='login.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Avalon Metalic</title>
    <link rel="icon" href="IMG/logo.png" type="image/x-icon">
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>


    <!-- HK Wrapper -->
    <div class="hk-wrapper">

        <!-- Main Content -->
        <div class="hk-pg-wrapper hk-auth-wrapper">
            <header class="d-flex justify-content-between align-items-center">
                <a class="d-flex auth-brand align-items-center" href="#">
                    <b><span class="text-dark font-50">Avalon Metalic</span></b>
                    
                </a>

            </header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-5 pa-0">
                        <div id="owl_demo_1" class="owl-carousel dots-on-item owl-theme">
                            <div class="fadeOut item auth-cover-img overlay-wrap"
                                style="background-image:url(IMG/metallic.jpg);">
                                <div class="auth-cover-info py-xl-0 pt-100 pb-50">
                                    <div class="auth-cover-content text-center w-xxl-75 w-sm-90 w-xs-100">

                                    </div>
                                </div>
                                <div class="bg-overlay"></div>
                            </div>
                            <div class="fadeOut item auth-cover-img overlay-wrap"
                                style="background-image:url(IMG/metallic2.jpg);">
                                <div class="auth-cover-info py-xl-0 pt-100 pb-50">
                                    <div class="auth-cover-content text-center w-xxl-75 w-sm-90 w-xs-100">

                                    </div>
                                </div>
                                <div class="bg-overlay "></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 pa-0">
                        <div class="auth-form-wrap py-xl-0 py-50">
                            <div class="auth-form w-xxl-55 w-xl-75 w-sm-90 w-xs-100">

                                <form method="post">
                                    
                                    <h1 class="display-4 mb-10">Welcome Back :)</h1>

                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" type="text" name="username"
                                            required="true">
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Password" type="password"
                                                name="password" required="true">
                                            
                                        </div>
                                    </div>

                                    <button class="btn btn-warning btn-block" type="submit" name="login">Login</button>

                                </form>
                                <br><center><a href="#" >forgot password?</a></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="dist/js/jquery.slimscroll.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- Owl JavaScript -->
    <script src="vendors/owl.carousel/dist/owl.carousel.min.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="dist/js/feather.min.js"></script>

    <!-- Init JavaScript -->
    <script src="dist/js/init.js"></script>
    <script src="dist/js/login-data.js"></script>
</body>

</html>