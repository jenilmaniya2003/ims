<?php
session_start();
error_reporting(0);
include('../inc/connection.php');

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

if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    include('../inc/menu.php');
    $fdate = $_POST['fromdate'];
    $tdate = $_POST['todate'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
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
            <h4> Report from <?php echo $fdate ?> to <?php echo $tdate ?></h4>
            <div class="data_table">
                <form method="post">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                            <th style="width: 90px; text-align:center;">
                                <button type="submit" name="prod_delete_multiple_btn"
                                    class="btn btn-danger">Delete</button>
                                <input type="checkbox" id="chkAll">
                            </th>
                                <th>#</th>
                                <th>Month / Year</th>
                                <th>Sale Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rno = mt_rand(10000, 99999);
                            $query = mysqli_query($con, "select month(date) as mnth,year(date) as yearr,sum(amount) as tt  from sales where date(date) between '$fdate' and '$tdate' group by mnth,yearr");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                <td style="width: 10px; text-align:center;">
                                <input type="checkbox" name="product_delete_id[]" value="<?= $row['id']; ?>"
                                    class="tblChk">
                            </td>
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo $row['mnth'] . "/" . $row['yearr']; ?></td>
                                    <td><?php echo $row['tt']; ?></td>
                                </tr>
                            <?php
                                $cnt++;
                            } ?>

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
            // getCheckRecords();
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
<?php } ?>

<?php
	include('../inc/footer.php');
?>