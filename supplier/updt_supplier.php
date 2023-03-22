<?php
include('../inc/connection.php');

$sql = "select*from supplier where id=" . $_GET['id'];
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_object($res);
if (isset($_REQUEST['btnsubmit'])) {
	$q = "update party set
		name='" . $_REQUEST['name'] . "',
		city='" . $_REQUEST['city'] . "',
		area='" . $_REQUEST['area'] . "',
		state='" . $_REQUEST['state'] . "',
		pan_no='" . $_REQUEST['pan_no'] . "',
		adhar_no='" . $_REQUEST['adhar_no'] . "',
		gstin='" . $_REQUEST['gstin'] . "',
		address='" . $_REQUEST['address'] . "',
		pin='" . $_REQUEST['pin'] . "',
		mo_no='" . $_REQUEST['mo_no'] . "',
		email='" . $_REQUEST['email'] . "',
		website='" . $_REQUEST['website'] . "'		
        where id=" . $_GET['id'];
	mysqli_query($con, $q);
	header("location:view_supplier.php");
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Avalon Metalic</title>
    <link rel="icon" href="../IMG/logo.png" type="image/x-icon">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="css/montserrat-font.css">
    <link rel="stylesheet" type="text/css"
        href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body class="form-v10">
    <div class="page-content">
        <div class="form-v10-content">
            <form class="form-detail" action="#" method="post" id="myform">
                <div class="form-left">
                    <h2>General Infomation</h2>
                    <div class="form-row form-row-1">
                        <input type="text" name="name" id="name" class="input-text" placeholder="Name"
                            value="<?php echo $row->name; ?>" required>
                    </div>
                    <div class="form-group">
                        <div class="form-row form-row-1">
                            <input type="text" name="city" id="city" class="input-text" placeholder="City"
                                value="<?php echo $row->city; ?>" required>
                        </div>
                        <div class="form-row form-row-2">
                            <input type="text" name="area" id="area" class="input-text" placeholder="Area"
                                value="<?php echo $row->area; ?>" required>
                        </div>
                    </div>
                    <div class="form-row form-row-2">
                        <input type="text" name="state" id="state" class="input-text" placeholder="State"
                            value="<?php echo $row->state; ?>" required>
                    </div>
                    <div class="form-row">
                        <input type="text" name="pan_no" class="company" id="pan_no" placeholder="Pan No"
                            value="<?php echo $row->pan_no; ?>">
                    </div>
                    <div class="form-row">
                        <input type="text" name="adhar_no" class="company" id="adhar_no" placeholder="Adhar No"
                            value="<?php echo $row->adhar_no; ?>">
                    </div>
                    <div class="form-row">
                        <input type="text" name="gstin" class="company" id="gstin" placeholder="GSTIN No"
                            value="<?php echo $row->gstin; ?>">
                    </div>
                </div>


                <div class="form-right">
                    <h2>Contact Details</h2>

                    <div class="form-row">
                        <input type="text" name="address" class="additional" id="address" placeholder="Address"
                            value="<?php echo $row->address; ?>" required>
                    </div>

                    <div class="form-row">
                        <input type="text" name="pin" class="additional" id="pin" placeholder="Pin Code"
                            value="<?php echo $row->pin; ?>">
                    </div>

                    <div class="form-row form-row-2">
                        <input type="text" name="mo_no" class="phone" id="mo_no" placeholder="Mobile Number"
                            value="<?php echo $row->mo_no; ?>" required>
                    </div>

                    <div class="form-row">
                        <input type="text" name="email" id="email" class="input-text"
                            pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email"
                            value="<?php echo $row->email; ?>">
                    </div>
                    <div class="form-row">
                        <input type="text" name="website" class="additional" id="website" placeholder="Website"
                            value="<?php echo $row->website; ?>">
                    </div>

                    <div class="form-row-last">
                        <input type="submit" name="btnsubmit" class="register" value="Update">
                        <a href="view_supplier.php"> <input type="button" name="btnback" class="register" value="Back">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php
include('../inc/footer.php');
?>