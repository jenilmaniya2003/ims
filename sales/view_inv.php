<?php
session_start();
include('../inc/connection.php');
include('../inc/menu.php');


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

        <div class="data_table">
            <form method="post">
                <table id="example" class="table table-striped table-bordered display">
                    <thead class="table-dark">
                        <tr>
                        <tr>

                            <th style="text-align: center;">Sr.No</th>
                            <th style="text-align: center;">Challan No</th>
                            <th style="text-align: center;">Party Name</th>
                            <th style="text-align: center;">Date</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cnt = 1;
                        $query = "SELECT party.name, sales.id, sales.challan_no, sales.date, sales.product_name, sales.quantity, sales.rate, sales.amount
                        FROM sales
                        JOIN party ON party.id = sales.party_name
                        GROUP BY sales.challan_no;
                         ";
                        $res = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($res)) {
                        ?>
                            <tr>

                                <td style="text-align: center;"><?= $cnt; ?></td>
                                <td style="text-align: center;"><?= $row['challan_no']; ?></td>
                                <td style="text-align: center;"><?= $row['name']; ?></td>
                                <td style="text-align: center;"><?= $row['date']; ?></td>
                                <td style="text-align: center;">
                                    <a href="del_inv.php?id=<?php echo $row['challan_no']; ?>" onclick="return confirm('Are You Sure??');"><img src="../IMG/delete.png" height="20px" width="25px"></a>&nbsp;
                                    <a href="print.php?id=<?php echo $row['challan_no']; ?>"><img src="../IMG/print.png" height="25px" width="25PX"></a>
                                </td>
                            </tr>
                        <?php
                            $cnt++;
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