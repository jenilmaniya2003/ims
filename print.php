<?php
session_start();
include('inc/connection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:index.php');
} else {
    // include('inc/menu.php');


    $sql = "select * from sales where challan_no=" . $_GET['id'];
    $result = mysqli_query($con, $sql);
    $a = "select date from sales where challan_no= " . $_GET['id'];
    $b = mysqli_query($con, $a);
    while ($r = $b->fetch_assoc()) {
        $date = $r['date'] . "<br>";
    }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // alert('print for CTRL+P');
            // $(document).ready(function() {
            //     Swal.fire('Press CTRL+P to Print the Bill:)')
            // });

            $(document).ready(function() {
                $("#hide").click(function() {
                    $("#p1").hide();
                    window.print();
                    {
                        setTimeout(function() {
                            location.reload();
                        }, 1);
                    }
                });

            });
        </script>
        <style>
            @page {
                size: A4;
                margin: 0;
            }

            @media print {

                html,
                body {
                    width: 210mm;
                    height: 297mm;
                }

                /* ... the rest of the rules ... */
            }

            body {
                background: #EEE;
                /* font-size:0.9em !important; */
            }

            .bigfont {
                font-size: 3rem !important;
            }

            .invoice {
                width: 970px !important;
                margin: 50px auto;
            }

            .logo {
                float: left;
                padding-right: 10px;
                margin: 10px auto;
            }

            dt {
                float: left;
            }

            dd {
                float: left;
                clear: right;
            }

            .customercard {
                min-width: 65%;
            }

            .itemscard {
                min-width: 98.5%;
                margin-left: 0.5%;
            }

            .logo {
                /* max-width: 5rem; */
                margin-top: -0.25rem;
            }

            .invDetails {
                margin-top: 0rem;
            }

            .pageTitle {
                margin-bottom: -1rem;
            }
        </style>
    </head>

    <body>

        <?php
        $sql1 = "select party_name from sales where challan_no=" . $_GET['id'];
        $result5 = mysqli_query($con, $sql1);
        $result6 = array($result5);

        foreach ($result6 as $res) {
            while ($row = mysqli_fetch_object($res)) {
                $party_name = $row->party_name;
            }
        }
        $cust_qry = $con->query("SELECT sales.party_name, sales.challan_no,sales.date,party.name,party.address, party.mo_no,party.city,party.gstin,party.email,party.con_per_name FROM sales RIGHT JOIN party ON sales.party_name=party.id WHERE party_name='$party_name'");
        $customer = $cust_qry->fetch_array();

        ?>
        <div class="container invoice" id="content">

            <div class="invoice-header">
                <div class="ui left aligned grid">
                    <div class="row">
                        <div class="left floated left aligned six wide column" style="margin: 20px;">
                            <div class="ui">
                                <div id="hide">
                                    <button id="p1" class="btn btn-flat btn-success">
                                        Print
                                    </button>
                                </div>
                                <h1 class="ui header pageTitle">Invoice <small class="ui sub header"></small>
                                </h1>
                                <h4 class="ui sub header invDetails">Challan NO: <?php echo $_GET['id']; ?> <br>
                                    Challan Date: <?php echo $date; ?></h4>
                            </div>
                        </div>
                        <div class="right floated left aligned four wide column">
                            <div class="ui">
                                <div>
                                    <img class="logo" height="100px" width="100px" src="IMG/logo.png" style="position: absolute; right: 0px; top: 50px;" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui segment cards">
                <div class="ui card">
                    <div class="content">
                        <div class="header">Company Details</div>
                    </div>
                    <div class="content">
                        <?php

                        $adminid = $_SESSION['aid'];
                        $query = mysqli_query($con, "select * from admin where id='$adminid'");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <ul>
                                <!-- <li> <strong> Name: Avalon Metalic </strong> </li> -->
                                <li> <strong> Name: <?php echo $row['name']; ?> </strong> </li>
                                <!-- <li><strong> Address: </strong> Bhatiawadi, near Phool Market,Surat</li> -->
                                <li><strong> Address: </strong> <?php echo $row['address']; ?> </li>
                                <!-- <li><strong> Phone: </strong> +91 8238564354</li> -->
                                <li><strong> Phone: </strong> <?php echo $row['mobile_no']; ?></li>
                                <!-- <li><strong> Email: </strong> avalonmetalic@gmail.com</li> -->
                                <li><strong> Email: </strong> <?php echo $row['email']; ?></li>
                                <!-- <li><strong> Contact: </strong> Uttam Vachhani</li> -->
                                <li><strong> Contact: </strong> <?php echo $row['contact'];  ?></li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
                <div class="ui card customercard">
                    <div class="content">
                        <div class="header">Customer Details</div>
                    </div>


                    <div class="content">
                        <ul>
                            <li> <strong> Name: <?php echo $customer['name']; ?> </strong> </li>
                            <li><strong> Address: </strong> <?php echo $customer['address']; ?></li>
                            <li><strong> City: </strong> <?php echo $customer['city']; ?></li>
                            <li><strong> Mobile No: </strong> <?php echo $customer['mo_no']; ?></li>
                            <li><strong> Email: </strong> <?php echo $customer['email']; ?></li>
                            <li><strong> Contact Person Name: </strong> <?php echo $customer['con_per_name']; ?></li>
                            <li><strong> GSTIN No: </strong> <?php echo $customer['gstin']; ?></li>
                        </ul>
                    </div>
                </div>

                <div class="ui segment itemscard">
                    <div class="content">
                        <table class="ui celled table">
                            <thead>
                                <tr>
                                    <th>Item / Details</th>
                                    <th class="text-center colfix">Box No</th>
                                    <th class="text-center colfix">Bobin</th>
                                    <th class="text-center colfix">Weight</th>
                                    <th class="text-center colfix">Rate</th>
                                    <th class="text-center colfix">Amount</th>
                                </tr>
                            </thead>
                            <?php
                            $result1 = array($result);
                            foreach ($result1 as $res) {
                                while ($row = mysqli_fetch_object($res)) {
                            ?>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php echo $row->product_name; ?>
                                            </td>
                                            <td class="text-right">
                                                <?php echo $row->box_no; ?>
                                            </td>
                                            <td class="text-right">
                                                <?php echo $row->bobin; ?>
                                            </td>
                                            <td class="text-right">
                                                <?php echo number_format($row->quantity, 3); ?>
                                            </td>
                                            <td class="text-right">
                                                <?php echo number_format($row->rate, 2); ?>
                                            </td>
                                            <td class="text-right">
                                                <?php //echo $row->quantity * $row->rate; 
                                                ?>
                                                <?php echo number_format($row->amount, 2); ?>
                                        </tr>
                                    </tbody>
                            <?php
                                }
                            }
                            ?>
                            <tfoot class="full-width">
                                <tr>
                                    <th> Total: </th>
                                    <th colspan="3"></th>
                                    <!-- <th colspan="1"> $500 </th> -->
                                    <?php
                                    $q = "select sum(rate) as tt  from sales where challan_no=" . $_GET['id'];
                                    $r = mysqli_query($con, $q);
                                    $row = mysqli_fetch_array($r);
                                    ?>
                                    <th colspan="1" style="text-align: right;"><?php echo number_format($row['tt'], 2); ?> </th>
                                    <?php
                                    $q1 = "select sum(amount) as tt  from sales where challan_no=" . $_GET['id'];
                                    $r1 = mysqli_query($con, $q1);
                                    $row = mysqli_fetch_array($r1);
                                    ?>
                                    <th colspan="1" style="text-align: right;"> <?php echo  number_format($row['tt'], 2); ?> </th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>

                <div class="ui card">
                    <div class="content center aligned text segment">
                        <small class="ui header"> Receiver's Sign</small>

                        <!-- <p class="bigfont"> $5000.25 </p> -->

                    </div>
                </div>
                <div class="ui card">
                    <!-- <div class="content">
                        <div class="header">Payment Details</div>
                    </div> -->
                    <div class="content">
                        <!-- <p> <strong> Account Name: </strong> "RJCA" </p>
                        <p> <strong> BSB: </strong> 111-111 </p>
                        <p> <strong>Account Number: </strong> 1234101 </p> -->
                    </div>
                </div>
                <div class="ui card">
                    <div class="content center aligned text segment">
                        <small class="ui header">For,AVALON METALIC</small>
                    </div>
                    <div class="content" style="height: 80px;">
                        <small style="position: absolute;right: 85px;top: 110px;">(Authorised Signatory)</small>
                    </div>

                </div>

            </div>
        </div>
    </body>

    </html>
<?php } ?>