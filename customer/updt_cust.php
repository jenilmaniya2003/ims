<?php
include('../inc/connection.php');

$sql = "select*from party where id=" . $_GET['id'];
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_object($res);
if (isset($_REQUEST['btnsubmit'])) {
	$q = "update party set
		name='" . $_REQUEST['name'] . "',
		alias='" . $_REQUEST['alias'] . "',
		city='" . $_REQUEST['city'] . "',
		area='" . $_REQUEST['area'] . "',
		state='" . $_REQUEST['state'] . "',
		pan_no='" . $_REQUEST['pan_no'] . "',
		adhar_no='" . $_REQUEST['adhar_no'] . "',
		gstin='" . $_REQUEST['gstin'] . "',
		con_per_name='" . $_REQUEST['con_per_name'] . "',
		address='" . $_REQUEST['address'] . "',
		pin='" . $_REQUEST['pin'] . "',
		mo_no='" . $_REQUEST['mo_no'] . "',
		phone_no='" . $_REQUEST['phone_no'] . "',
		fax='" . $_REQUEST['fax'] . "',
		email='" . $_REQUEST['email'] . "',
		website='" . $_REQUEST['website'] . "'		
        where id=" . $_GET['id'];
	mysqli_query($con, $q);
	header("location:view_cust.php");
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
<<<<<<< HEAD
	<div class="page-content">
		<div class="form-v10-content">
			<form class="form-detail" action="#" method="post" id="myform">
				<div class="form-left">
					<h2>General Infomation</h2>
					<div class="form-row form-row-1">
						<input type="text" name="name" id="name" class="input-text" placeholder="Name" value="<?php echo $row->name; ?>" required autocomplete="off">
					</div>
					<div class="form-row form-row-1">
						<input type="text" name="alias" id="alias" class="input-text" placeholder="Alias" value="<?php echo $row->alias; ?>" autocomplete="off">
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="city" id="city" class="input-text" placeholder="City" value="<?php echo $row->city; ?>" required autocomplete="off">
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="area" id="area" class="input-text" placeholder="Area" value="<?php echo $row->area; ?>" required autocomplete="off">
						</div>
					</div>
					<div class="form-row form-row-2">
						<input type="text" name="state" id="state" class="input-text" placeholder="State" value="<?php echo $row->state; ?>" required autocomplete="off">
					</div>
					<div class="form-row">
						<input type="text" name="pan_no" class="company" id="pan_no" placeholder="Pan No" value="<?php echo $row->pan_no; ?>" autocomplete="off">
					</div>
					<div class="form-row">
						<input type="text" name="adhar_no" class="company" id="adhar_no" placeholder="Adhar No" value="<?php echo $row->adhar_no; ?>" autocomplete="off">
					</div>
					<div class="form-row">
						<input type="text" name="gstin" class="company" id="gstin" placeholder="GSTIN No" value="<?php echo $row->gstin; ?>" autocomplete="off">
					</div>
				</div>


				<div class="form-right">
					<h2>Contact Details</h2>
					<div class="form-row">
						<input type="text" name="con_per_name" class="street" id="con_per_name" placeholder="Contact Person Name" value="<?php echo $row->con_per_name; ?>" required autocomplete="off">
					</div>
					<div class="form-row">
						<input type="text" name="address" class="additional" id="address" placeholder="Address" value="<?php echo $row->address; ?>" required autocomplete="off">
					</div>

					<div class="form-row">
						<input type="text" name="pin" class="additional" id="pin" placeholder="Pin Code" value="<?php echo $row->pin; ?>" autocomplete="off">
					</div>
=======
    <div class="page-content">
        <div class="form-v10-content">
            <form class="form-detail" action="#" method="post" id="myform">
                <div class="form-left">
                    <h2>General Infomation</h2>
                    <div class="form-row form-row-1">
                        <input type="text" name="name" id="name" class="input-text" placeholder="Name"
                            value="<?php echo $row->name; ?>" required>
                    </div>
                    <div class="form-row form-row-1">
                        <input type="text" name="alias" id="alias" class="input-text" placeholder="Alias"
                            value="<?php echo $row->alias; ?>">
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
                        <input type="text" name="con_per_name" class="street" id="con_per_name"
                            placeholder="Contact Person Name" value="<?php echo $row->con_per_name; ?>" required>
                    </div>
                    <div class="form-row">
                        <input type="text" name="address" class="additional" id="address" placeholder="Address"
                            value="<?php echo $row->address; ?>" required>
                    </div>

                    <div class="form-row">
                        <input type="text" name="pin" class="additional" id="pin" placeholder="Pin Code"
                            value="<?php echo $row->pin; ?>">
                    </div>
>>>>>>> 6328fc7510423e68eedd9bf90e516bed4aaf17f1

                    <div class="form-row form-row-2">
                        <input type="text" name="mo_no" class="phone" id="mo_no" placeholder="Mobile Number"
                            value="<?php echo $row->mo_no; ?>" required>
                    </div>

<<<<<<< HEAD
					<div class="form-row form-row-2">
						<input type="text" name="mo_no" class="phone" id="mo_no" placeholder="Mobile Number" value="<?php echo $row->mo_no; ?>" required autocomplete="off">
					</div>
=======
                    <div class="form-row form-row-2">
                        <input type="text" name="phone_no" class="phone" id="phone_no" placeholder="Phone Number"
                            value="<?php echo $row->phone_no; ?>">
                    </div>
>>>>>>> 6328fc7510423e68eedd9bf90e516bed4aaf17f1

                    <div class="form-row">
                        <input type="text" name="fax" class="additional" id="fax" placeholder="Fax"
                            value="<?php echo $row->fax; ?>">
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

<<<<<<< HEAD
					<div class="form-row form-row-2">
						<input type="text" name="phone_no" class="phone" id="phone_no" placeholder="Phone Number" value="<?php echo $row->phone_no; ?>" autocomplete="off">
					</div>

					<div class="form-row">
						<input type="text" name="fax" class="additional" id="fax" placeholder="Fax" value="<?php echo $row->fax; ?>" autocomplete="off">
					</div>
					<div class="form-row">
						<input type="text" name="email" id="email" class="input-text" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email" value="<?php echo $row->email; ?>" autocomplete="off">
					</div>
					<div class="form-row">
						<input type="text" name="website" class="additional" id="website" placeholder="Website" value="<?php echo $row->website; ?>" autocomplete="off">
					</div>

					<div class="form-row-last">
						<input type="submit" name="btnsubmit" class="register" value="Update">
						<a href="view_cust.php"> <input type="button" name="btnback" class="register" value="Back"></a>
					</div>
				</div>
			</form>
		</div>
	</div>
=======
                    <div class="form-row-last">
                        <input type="submit" name="btnsubmit" class="register" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </div>
>>>>>>> 6328fc7510423e68eedd9bf90e516bed4aaf17f1
</body>

</html>

<?php
include('../inc/footer.php');
?>