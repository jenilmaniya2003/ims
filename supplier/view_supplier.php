<?php
session_start();
include('../inc/connection.php');
include('../inc/menu.php');

if (isset($_POST['prod_delete_multiple_btn'])) {
    $all_id = $_POST['product_delete_id'];
    $extract_id = implode(',', $all_id);

    $query = "DELETE FROM supplier where id IN($extract_id)";
    $query_run = mysqli_query($con, $query);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Avalon Metalic</title>
    <link rel="icon" href="../IMG/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/datatables.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/buttons.dataTables.min.css">

    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.buttons.min.js"></script>
    <script src="../assets/js/jszip.min.js"></script>
    <script src="../assets/js/buttons.html5.min.js"></script>
    <script src="../assets/js/buttons.colVis.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>


    <style>
        .img1 {
            position: fixed;
            bottom: 60px;
            right: 60px;
        }
    </style>

</head>

<body>
    <div class="container ">
        <a href="add_supplier.php">
            <img src="../IMG/add.png" height="40px" width="40px" alt="" class="img1">
        </a>
        <div class="data_table">
            <form method="post">
                <table id="example" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 90px; text-align:center;">
                                <button type="submit" name="prod_delete_multiple_btn" class="btn btn-danger">Delete</button>
                                <input type="checkbox" id="chkAll">
                            </th>
                            <th>Sr.</th>
                            <th>Name</th>
                            <th>Area</th>
                            <th>City</th>
                            <th>Mobile No</th>
                            <th>View More</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cnt = 1;
                        $query = "SELECT * FROM supplier";
                        $res = mysqli_query($con, $query);
                        if (mysqli_num_rows($res) > 0) {

                            foreach ($res as $row) {
                        ?>
                                <tr>
                                    <td style="width: 10px; text-align:center;">
                                        <input type="checkbox" name="product_delete_id[]" value="<?= $row['id']; ?>" class="tblChk">
                                    </td>
                                    <td style="text-align: center;" class="see"><?= $cnt; ?></td>
                                    <td style="text-align: center;"><?= $row['name']; ?></td>
                                    <td style="text-align: center;"><?= $row['area']; ?></td>
                                    <td style="text-align: center;"><?= $row['city']; ?></td>
                                    <td style="text-align: center;"><?= $row['mo_no']; ?></td>
                                    <td style="text-align: center;"> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['id'] ?>">View</button>
                                    </td>
                                    <td>
                                        <a href="updt_supplier.php?id=<?php echo $row['id']; ?>"><img src="../IMG/edit.png" height="25px" width="30PX"></a>&nbsp;
                                        <a href="del_supplier.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are You Sure Do You Want to Delete?? ');"><img src="../IMG/delete.png" height="20px" width="20px"></a>&nbsp;
                                    </td>
                                </tr>

                                <div id="myModal<?php echo $row['id'] ?>" class="modal fade bd-example-modal-lg" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="contactModalLabel">Customer Information</h5>

                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="name">Name</label>
                                                                <input type="text" class="form-control" id="name" placeholder="No Data Available" value="<?php echo $row['name'] ?>" readonly>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="city">City</label>
                                                                <input type="text" class="form-control" id="city" placeholder="No Data Available" value="<?php echo $row['city'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="area">Area</label>
                                                                <input type="text" class="form-control" id="area" placeholder="No Data Available" value="<?php echo $row['area'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="state">State</label>
                                                                <input type="text" class="form-control" id="state" placeholder="No Data Available" value="<?php echo $row['state'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="gstin">GSTIN</label>
                                                                <input type="text" class="form-control" id="gstin" placeholder="No Data Available" value="<?php echo $row['gstin'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="panno">Pan No.</label>
                                                                <input type="text" class="form-control" id="panno" placeholder="No Data Available" value="<?php echo $row['pan_no'] ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="adharno">Aadhar No.</label>
                                                                <input type="text" class="form-control" id="adharno" placeholder="No Data Available" value="<?php echo $row['adhar_no'] ?>" readonly>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="address">Address</label>
                                                                <input type="text" class="form-control" id="address" placeholder="No Data Available" value="<?php echo $row['address'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="pin">PIN</label>
                                                                <input type="text" class="form-control" id="pin" placeholder="No Data Available" value="<?php echo $row['pin'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="mobile_no">Mobile No.</label>
                                                                <input type="text" class="form-control" id="mobile_no" placeholder="No Data Available" value="<?php echo $row['mo_no'] ?>" readonly>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="text" class="form-control" id="email" placeholder="No Data Available" value="<?php echo $row['email'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="website">Website</label>
                                                                <input type="text" class="form-control" id="website" placeholder="No Data Available" value="<?php echo $row['website'] ?>" readonly>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            <?php
                                            $cnt++;
                                        }
                                    } else {
                                            ?>
                                            <tr>
                                                <td colspan="5">No Record Found</td>
                                            </tr>
                                        <?php
                                    }
                                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#chkAll").change(function() {
                debugger;
                if ($(this).prop('checked')) {
                    $('.tblChk').not(this).prop('checked', true);
                } else {
                    $('.tblChk').not(this).prop('checked', false);
                }
            })
        });
    </script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/datatables.min.js"></script>
    <script src="../assets/js/pdfmake.min.js"></script>
    <script src="../assets/js/vfs_fonts.js"></script>
    <script src="../assets/js/custom.js"></script>

</body>

</html>

<?php
include('../inc/footer.php');
?>