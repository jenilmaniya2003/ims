<?php
session_start();
include('../inc/connection.php');
include('../inc/menu.php');

if (isset($_POST['prod_delete_multiple_btn'])) {
    $all_id = $_POST['product_delete_id'];
    $extract_id = implode(',', $all_id);
    // echo $extract_id;

    $query = "DELETE FROM sales where id IN($extract_id)";
    $query_run = mysqli_query($con, $query);
    // if ($query_run) {
    //     $_SESSION['status'] = "Data Delete";
    //     header('location:view_prod.php');
    // } else {
    //     $_SESSION['status'] = "Data not delete";
    //     header('location:view_prod.php');
    // }
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
    

</head>

<body>

    <div class="container">
        <!-- <div class="row"> -->
        <!-- <div class="col-12"> -->
        <div class="data_table">
            <form method="post">
                <table id="example" class="table table-striped table-bordered display">
                    <thead class="table-dark">
                        <tr>
                        <tr>
                            <th style="width: 90px; text-align:center;">
                                <button type="submit" name="prod_delete_multiple_btn"
                                    class="btn btn-danger">Delete</button>
                                <input type="checkbox" id="chkAll">
                            </th>
                            <th>Sr.No</th>
                            <th>Challan No</th>
                            <th>Party Name</th>
                            <th>Date</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cnt = 1;
                        $query = "select party.name,sales.id,sales.challan_no,sales.date,sales.product_name,sales.quantity,sales.rate,sales.amount from sales join party on party.id=sales.party_name;";
                        $res = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($res)) {
                        // if (mysqli_num_rows($res) > 0) {

                        //     foreach ($res as $row) {
                        ?>
                                <tr>
                                <td style="width: 10px; text-align:center;">
                                <input type="checkbox" name="product_delete_id[]" value="<?= $row['id']; ?>"
                                    class="tblChk">
                            </td>
                                    <td style="text-align: center;"><?= $cnt; ?></td>
                                    <td style="text-align: center;"><?= $row['challan_no']; ?></td>
                                    <td style="text-align: center;"><?= $row['name']; ?></td>
                                    <td style="text-align: center;"><?= $row['date']; ?></td>
                                    <td style="text-align: center;"><?= $row['product_name']; ?></td>
                                    <td style="text-align: center;"><?= $row['quantity']; ?></td>
                                    <td style="text-align: center;"><?= $row['rate']; ?></td>
                                    <td style="text-align: center;"><?= $row['amount']; ?></td>
                                    <td>
                                        <a href="#?id=<?php echo $row['id']; ?>"><img src="../IMG/edit.png" height="25px" width="30PX"></a>&nbsp;
                                        <a href="#?id=<?php echo $row['id']; ?>" onclick="return confirm('Are You Sure??');"><img src="../IMG/delete.png" height="20px" width="25px"></a>&nbsp;
                                        <a href="../print.php?id=<?php echo $row['challan_no']; ?>"><img src="../IMG/print.png" height="25px" width="25PX" ></a>
                                    </td>
                                </tr>
                            <?php
                                $cnt++;
                            }
                        // } 
                        //else {
                            ?>
                            <!-- <tr>
                                <td colspan="5">No Record Found</td>
                            </tr> -->
                        <?php

                        //}
                        ?>

                    </tbody>
                </table>
            </form>
        </div>
    </div>
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