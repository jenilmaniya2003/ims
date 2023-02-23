<?php
session_start();
include('../inc/connection.php');
include('../inc/menu.php');



if (isset($_POST['prod_delete_multiple_btn'])) {
    $all_id = $_POST['product_delete_id'];
    $extract_id = implode(',', $all_id);
    // echo $extract_id;

    $query = "DELETE FROM product where id IN($extract_id)";
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
    <style>
        .img1 {
            position: fixed;
            bottom: 60px;
            right: 60px;
        }
    </style>
</head>

<body>

    <div class="container">
        <a href="add_prod.php">
            <img src="../IMG/add.png" height="40px" width="40px" alt="" class="img1">
        </a>
        <div class="data_table">
            <form method="post">
                <table id="example" class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 90px; text-align:center;">
                                <button type="submit" name="prod_delete_multiple_btn" class="btn btn-danger">Delete</button>
                                <input type="checkbox" id="chkAll">
                            </th>
                            <th style="text-align: center;">Sr.No</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Category</th>
                            <th style="text-align: center;">Price</th>
                            <th style="text-align: center;">Stock</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cnt = 1;
                        $query = "SELECT * FROM product";
                        $res = mysqli_query($con, $query);
                        //while ($row = mysqli_fetch_array($res)) {
                        if (mysqli_num_rows($res) > 0) {

                            foreach ($res as $row) {
                        ?>
                                <tr>
                                    <td style="width: 10px; text-align:center;">
                                        <input type="checkbox" name="product_delete_id[]" value="<?= $row['id']; ?>" class="tblChk">
                                    </td>
                                    <td style="text-align: center;"><?= $cnt; ?></td>
                                    <td style="text-align: center;"><?= $row['name']; ?></td>
                                    <td style="text-align: center;"><?= $row['category']; ?></td>
                                    <td style="text-align: center;"><?= $row['price']; ?></td>
                                    <td style="text-align: center;"><?= $row['opening_stock']; ?></td>
                                    <td>
                                        <a href="updt_prod.php?id=<?php echo $row['id']; ?>"><img src="../IMG/edit.png" height="25px" width="30PX"></a>&nbsp;
                                        <a href="del_prod.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are You Sure?');"><img src="../IMG/delete.png" height="20px" width="20px"></a>
                                    </td>
                                </tr>
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
<?php
include('../inc/footer.php');
?>