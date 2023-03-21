<?php 
include('../inc/connection.php');
include('../inc/menu.php');

$sql1 = "SELECT party.name, ledger_trans.id, ledger_trans.cid,ledger_trans.challan_no,ledger_trans.received_amount
FROM ledger_trans
JOIN party ON party.id = ledger_trans.cid
GROUP BY ledger_trans.cid;";
$res1 = mysqli_query($con, $sql1);

// $sql2="select party.name,ledger_trans.cid from ledger_trans join party on party.id=ledger_trans.cid;";
// $res2=mysqli_query($con,$res2);
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
    <div class="hk-wrapper">

<section class="hk-sec-wrapper">

                                <div class="row">
                                    <div class="col-sm">
                                        <form class="needs-validation" method="post" novalidate>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <!-- <label for="validationCustom03">Product Name</label>
                <input type="text" class="form-control" id="validationCustom03" placeholder="Product Name" name="customername" required>
                <div class="invalid-feedback">Please provide a valid product name.</div> -->
                                                    <select name="customername" id="customername" class="form-control custom-select">
                                                        <option value="">Select Customer</option>
                                                        <?php
                                                        while ($id = mysqli_fetch_array($res1)) {
                                                        ?>
                                                            <option value="<?php echo $id['cid']; ?>"> <?php echo $id['name']; ?>
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
                            <?php if (isset($_POST['search'])) { ?>
                                <section class="hk-sec-wrapper">

                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="table-wrap">
                                                <table id="datable_1" class="table table-hover w-100 display pb-30">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Credit</th>
                                                            <th>Date</th>
                                                            <th>Description</th>
                                                            <th>Debit</th>
                                                            <th>Date</th>
                                                            <th>Challan No</th>
                                                            <!-- <th>Product</th> -->
                                                            <!-- <th>Pricing</th> -->

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php

                                                        $cnt = 1;
                                                        $name = $_POST['customername'];
                                                        // $ledger_qry= $con->query("select party.name,ledger_trans.id,ledger_trans.challan_no,ledger_trans.cid,ledger_trans.received_amount,ledger_trans.date from ledger_trans right join party on ledger_trans.cid=party.id where cid='$name'");
                                                        // $ledger=$ledger_qry->fetch_array();
                                                        $query="select party.name,ledger_trans.id,ledger_trans.challan_no,ledger_trans.cid,ledger_trans.received_amount,ledger_trans.date from ledger_trans right join party on ledger_trans.cid=party.id where cid=$name";
                                                        $res = mysqli_query($con, $query);
                                                        while ($row = mysqli_fetch_array($res)) {
                                                            
                                                        ?>
                                                            
                                                                <tr>
                                                                    <td><?php echo $cnt;?></td>
                                                                    <td><?php echo $row['received_amount']; ?></td>
                                                                    <td><?php echo $row['date']; ?></td>
                                                                    <td>Cash</td>
                                                                    <td>Cash</td>
                                                                    <td>Cash</td>
                                                                    <?php 
                                                                    $total=$row['cid'];
                                                                    $q1 = "select sum(amount) as tt  from sales where party_name=$total;";
                                                                    $r1 = mysqli_query($con, $q1);
                                                                    $row1 = mysqli_fetch_array($r1);
                                                                    ?>
                                                                    <td><?php echo $row1['tt']; ?></td>
                                                                    
                                                                </tr>

                                                            
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

    </div>
    
    </body>
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
    </html>
