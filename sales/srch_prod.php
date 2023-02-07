<?php
session_start();
error_reporting(0);
include('../inc/connection.php');

$sql1 = "select * from product";
$res1 = mysqli_query($con, $sql1);
$sql2 = "select * from party";
$res2 = mysqli_query($con, $sql2);

if (strlen($_SESSION['aid'] == 0)) {
    header('location:../login.php');
} else {
    include('../inc/menu.php');
    // code for Cart 
    if (!empty($_GET["action"])) {
        switch ($_GET["action"]) {

                //code for adding product in cart
            case "add":
                if (!empty($_POST["quantity"])) {
                    $pid = $_GET["pid"];
                    $result = mysqli_query($con, "SELECT * FROM product WHERE id='$pid'");
                    while ($productByCode = mysqli_fetch_array($result)) {
                        $itemArray = array($productByCode["id"] => array('catname' => $productByCode["category"], 'box_no' => $_POST["box_no"], 'bobin' => $_POST["bobin"], 'quantity' => $_POST["quantity"], 'name' => $productByCode["name"], 'price' => $productByCode["price"], 'code' => $productByCode["id"]));
                        if (!empty($_SESSION["cart_item"])) {
                            if (in_array($productByCode["id"], array_keys($_SESSION["cart_item"]))) {
                                foreach ($_SESSION["cart_item"] as $k => $v) {
                                    if ($productByCode["id"] == $k) {
                                        if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                            $_SESSION["cart_item"][$k]["quantity"] = 0;
                                        }
                                        $_SESSION["cart_item"][$k]["quantity"] = $_REQUEST["quantity"];
                                    }
                                }
                            } else {
                                $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                            }
                        } else {
                            $_SESSION["cart_item"] = $itemArray;
                        }
                    }
                }
                break;

                // code for removing product from cart
            case "remove":
                if (!empty($_SESSION["cart_item"])) {
                    foreach ($_SESSION["cart_item"] as $k => $v) {
                        if ($_GET["code"] == $k)
                            unset($_SESSION["cart_item"][$k]);
                        if (empty($_SESSION["cart_item"]))
                            unset($_SESSION["cart_item"]);
                    }
                }
                break;
                // code for if cart is empty
            case "empty":
                unset($_SESSION["cart_item"]);
                break;
        }
    }

    //Code for Checkout
    if (isset($_POST['checkout'])) {
        $pid = $_SESSION['productid'];
        $challan_no = $_POST['challan_no'];
        $party_name = $_POST['party_name'];
        $box_no = $_POST['box_no'];
        $bobin = $_POST['bobin'];
        $quantity = $_POST['quantity'];
        $rate = $_POST['rate'];
        $amount = $_POST['amount'];
        $pmode = $_POST['paymentmode'];
        $value = array_combine($pid, $quantity);
        
        foreach ($value as $pdid => $qty1) {
            $product_name = $_POST['product_name'][$pdid];
            $bobin = $_POST['bobin'][$pdid];
            $box_no = $_POST['box_no'][$pdid];
            $amount = $_POST['amount'][$pdid];
            $rate = $_POST['rate'][$pdid];
            $q = "insert into sales(productid,challan_no,party_name,product_name,box_no,bobin,quantity,rate,amount,pymnt_mode) values('$pdid','$challan_no','$party_name','$product_name','$box_no','$bobin','$qty1','$rate','$amount','$pmode')";
            $query = mysqli_query($con, $q);
        }
    
        echo '<script>alert("Challan genrated successfully. Challan number is "+"' . $challan_no . '")</script>';
        unset($_SESSION["cart_item"]);
        $_SESSION['challan'] = $challan_no;
        // echo "<script>window.location.href='srch_prod.php'</script>";
    }

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

        <!-- Top Navbar -->
        <?php //include_once('includes/navbar.php');
// include_once('includes/sidebar.php');
?>



        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->



        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <!-- <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
<li class="breadcrumb-item"><a href="#">Search</a></li>
<li class="breadcrumb-item active" aria-current="page">Product</li>
                </ol>
            </nav> -->
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">
                <!-- Title -->
                <!-- <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Search Product</h4>
                </div> -->
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
                                                <!-- <label for="validationCustom03">Product Name</label>
                <input type="text" class="form-control" id="validationCustom03" placeholder="Product Name" name="productname" required>
                <div class="invalid-feedback">Please provide a valid product name.</div> -->
                                                <select name="productname" id="productname"
                                                    class="form-control custom-select">
                                                    <option value="">Select Product</option>
                                                    <?php
                        while ($id = mysqli_fetch_array($res1)) {
                        ?>
                                                    <option value="<?php echo $id['id']; ?>"> <?php echo $id['name']; ?>
                                                    </option>
                                                    <?php
                        }
                        ?>
                                                </select>
                                            </div>
                                        </div>


                                        <button class="btn btn-primary" type="submit" name="search">search</button>
                                    </form>
                                </div>
                            </div>
                        </section>
                        <!--code for search result -->
                        <?php if(isset($_POST['search'])){?>
                        <section class="hk-sec-wrapper">

                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <table id="datable_1" class="table table-hover w-100 display pb-30">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Box No</th>
                                                    <th>Bobin</th>
                                                    <th>Weight</th>
                                                    <th>Rate</th>
                                                    <!-- <th>Product</th> -->
                                                    <!-- <th>Pricing</th> -->
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
$name=$_POST['productname'];
$query = mysqli_query($con, "select * from product where id=$name");
$cnt=1;
while($row=mysqli_fetch_array($query))
{    
?>
                                                <form method="post"
                                                    action="srch_prod.php?action=add&pid=<?php echo $row["id"]; ?>">
                                                    <tr>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td><?php echo $row['name']; ?> &nbsp;
                                                            (<?php echo $row['category']; ?>)</td>


                                                        <!-- <td><?php //echo $row['category']; 
                                                                                ?></td> -->
                                                        <!-- <td><?php //echo $row['ProductName']; 
                                                                                ?></td>
                                                                    <td><?php //echo $row['ProductPrice']; 
                                                                        ?></td> -->
                                                        <td><input type="text" class="product-quantity" name="box_no"
                                                                value="1" size="3" /></td>
                                                        <td><input type="text" class="product-quantity" name="bobin"
                                                                value="1" size="3" /></td>
                                                        <td><input type="text" class="product-quantity" name="quantity"
                                                                value="1" size="3" /></td>
                                                        <td><input type="text" class="product-quantity"
                                                                name="ProductPrice" value="<?php echo $row['price']; ?>"
                                                                size="3" /></td>
                                                        <td>
                                                            <input type="submit" value="Add to Cart"
                                                                class="btnAddAction" />
                                                        </td>
                                                    </tr>

                                                </form>
                                                <?php 
$cnt++;
} ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <?php } ?>


                        <form class="needs-validation" method="post" novalidate>

                            <!--- Shopping Cart ---->
                            <section class="hk-sec-wrapper">

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="table-wrap">
                                            <h4>Shopping Cart</h4>
                                            <hr />

                                            <a id="btnEmpty" href="srch_prod.php?action=empty">Empty Cart</a>
                                            <?php
                                                if (isset($_SESSION["cart_item"])) {
                                                    $total_quantity = 0;
                                                    $total_price = 0;
                                                ?>
                                            <table id="datable_1" class="table table-hover w-100 display pb-30"
                                                border="1">
                                                <tbody>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Category</th>
                                                        <!-- <th>Company</th> -->
                                                        <th width="10%">Box No</th>
                                                        <th width="10%">Bobin</th>
                                                        <th width="5%">Weight</th>
                                                        <th width="10%">Rate</th>
                                                        <th width="10%">Amount</th>
                                                        <th width="5%">Remove</th>
                                                    </tr>
                                                    <?php
                                                            $productid = array();
                                                            foreach ($_SESSION["cart_item"] as $item) {
                                                                $item_price = ($item["quantity"] * $item["price"]);
                                                                array_push($productid, $item['code']);

                                                            ?>
                                                    <!-- New code added -->
                                                    <input type="hidden" value="<?php echo $item['name']; ?>"
                                                        name="product_name[<?php echo $item['code']; ?>]">
                                                    <input type="hidden" value="<?php echo $item['box_no']; ?>"
                                                        name="box_no[<?php echo $item['code']; ?>]">
                                                    <input type="hidden" value="<?php echo $item['bobin']; ?>"
                                                        name="bobin[<?php echo $item['code']; ?>]">
                                                    <input type="hidden" value="<?php echo $item['quantity']; ?>"
                                                        name="quantity[<?php echo $item['code']; ?>]">
                                                    <input type="hidden"
                                                        value="<?php echo number_format($item["price"], 2); ?>"
                                                        name="rate[<?php echo $item['code']; ?>]">
                                                    <input type="hidden" value="<?php echo $item_price; ?>"
                                                        name="amount[<?php echo $item['code']; ?>]">
                                                    <!-- <input type="hidden" value="<?php //echo $item['quantity']; 
                                                                                                    ?>" name="quantity[<?php //echo $item['code']; 
                                                                                                                        ?>]"> -->
                                                    <!-- End of new code added -->

                                                    <tr>
                                                        <td><?php echo $item["name"]; ?></td>
                                                        <td><?php echo $item["catname"]; ?></td>
                                                        <!-- <td><?php //echo $item["compname"]; 
                                                                                ?></td> -->
                                                        <td><?php echo $item["box_no"]; ?></td>
                                                        <td><?php echo $item["bobin"]; ?></td>
                                                        <td><?php echo number_format($item["quantity"], 3); ?></td>
                                                        <td><?php echo number_format($item["price"], 2); ?></td>
                                                        <td><?php echo number_format($item_price, 2); ?></td>
                                                        <td><a href="srch_prod.php?action=remove&code=<?php echo $item["code"]; ?>"
                                                                class="btnRemoveAction"><img src="../IMG/delete.png"
                                                                    height="20px" width="20px" alt="Remove Item" /></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                                $total_quantity += $item["quantity"];
                                                                $total_price += ($item["price"] * $item["quantity"]);
                                                            }
                                                            $_SESSION['productid'] = $productid;
                                                            ?>

                                                    <tr>
                                                        <td colspan="4" align="right">Total:</td>
                                                        <td colspan="2"><?php echo number_format($total_quantity, 3); ?>
                                                        </td>
                                                        <td colspan=>
                                                            <strong><?php echo number_format($total_price, 2); ?></strong>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="validationCustom03">Challan No</label>
                                                    <input type="text" class="form-control" id="validationCustom03"
                                                        placeholder="Challan No" name="challan_no" required>
                                                    <div class="invalid-feedback">Please provide a valid customer name.
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-10">
                                                    <label for="validationCustom03">Customer Name</label>
                                                    <!-- <input type="text" class="form-control" id="validationCustom03" placeholder="Customer Name" name="party_name" required>
                                                        <div class="invalid-feedback">Please provide a valid customer name.
                                                        </div> -->

                                                    <select name="party_name" id="party_name"
                                                        class="form-control custom-select">
                                                        <option value="">Select Name</option>
                                                        <?php
                                                                while ($id = mysqli_fetch_array($res2)) {
                                                                ?>
                                                        <option value="<?php echo $id['id']; ?>">
                                                            <?php echo $id['name']; ?></option>
                                                        <?php
                                                                }
                                                                ?>
                                                    </select>

                                                </div>

                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="validationCustom03">Payment Mode</label>
                                                    <div class="custom-control custom-radio mb-10">
                                                        <input type="radio" class="custom-control-input"
                                                            id="customControlValidation2" name="paymentmode"
                                                            value="cash" required>
                                                        <label class="custom-control-label"
                                                            for="customControlValidation2">Cash</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mb-10">
                                                        <input type="radio" class="custom-control-input"
                                                            id="customControlValidation3" name="paymentmode"
                                                            value="credit" required>
                                                        <label class="custom-control-label"
                                                            for="customControlValidation3">Credit</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-10">
                                                    <button class="btn btn-primary" type="submit"
                                                        name="checkout">Checkout</button>
                                                </div>
                                            </div>
                        </form>

                        <?php
                                                } else {
                        ?>
                        <div style="color:red" align="center">Your Cart is Empty</div>
                        <?php
                                                }
                        ?>
                    </div>
                </div>
            </div>
            </section>

        </div>
    </div>
    </div>




    </div>
    <!-- /Main Content -->

    </div>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
    <script src="dist/js/jquery.slimscroll.js"></script>
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>
    <script src="dist/js/init.js"></script>
    <script src="dist/js/validation-data.js"></script>
    <style type="text/css">
    #btnEmpty {
        background-color: #ffffff;
        border: #d00000 1px solid;
        padding: 5px 10px;
        color: #d00000;
        float: right;
        text-decoration: none;
        border-radius: 3px;
        margin: 10px 0px;
    }
    </style>

</body>

</html>
<?php
}
?>

<?php
include('../inc/footer.php');
?>