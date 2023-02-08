<?php
session_start();
//error_reporting(0);
include('../inc/connection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:index.php');
  } else{
// Add product Code
if(isset($_POST['submit']))
{
//Getting Post Values
$catname=$_POST['category']; 
$opening_stock=$_POST['opening_stock'];   
$pname=$_POST['productname'];
$pprice=$_POST['productprice'];
$query=mysqli_query($con,"insert into product (name,category,opening_stock,price) values('$pname','$catname','$opening_stock','$pprice')"); 
if($query){
echo "<script>alert('Product added successfully.');</script>";   
echo "<script>window.location.href='add_prod.php'</script>";
} else{
echo "<script>alert('Something went wrong. Please try again.');</script>";   
echo "<script>window.location.href='add_prod.php'</script>";    
}
}

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Add Product</title>
    <link href="../vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="../vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="../dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    
    
	<!-- HK Wrapper -->
	<div class="hk-wrapper">

<!-- Top Navbar -->
<?php include_once('../inc/menu.php'); ?>
       


        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->



        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
           
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Add Product</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
<section class="hk-sec-wrapper">

<div class="row">
<div class="col-sm">
<form class="needs-validation" method="post" novalidate>
                
<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Product Name</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Product Name" name="productname" required>
<div class="invalid-feedback">Please provide a valid product name.</div>
</div>
</div>   

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Category</label>
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
<div class="invalid-feedback">Please select a category.</div>
</div>
</div>


 <div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Opening Stock</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Opening Stock" name="opening_stock" required>
<div class="invalid-feedback">Please provide a valid opening stock.</div>
</div>
</div>   

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Product Price</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Product Price" name="productprice" required>
<div class="invalid-feedback">Please provide a valid product price.</div>
</div>
</div>

<button class="btn btn-primary" type="submit" name="submit">Submit</button>
<button class="btn btn-danger" type="reset" name="reset">Reset</button>
</form>
</div>
</div>
</section>
                     
</div>
</div>
</div>


            <!-- Footer -->
<?php include_once('../inc/footer.php');?>
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