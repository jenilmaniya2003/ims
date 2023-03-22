<?php
include('../inc/connection.php');
if (isset($_REQUEST['btnsubmit'])) {
    $q = "insert into supplier set
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
		";
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
                        <input type="text" name="name" id="name" class="input-text" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <div class="form-row form-row-1">
                            <input type="text" name="city" id="city" class="input-text" placeholder="City" required>
                        </div>
                        <div class="form-row form-row-2">
                            <input type="text" name="area" id="area" class="input-text" placeholder="Area" required>
                        </div>
                    </div>
                    <div class="form-row form-row-2">
                        <input type="text" name="state" id="state" class="input-text" placeholder="State" required>
                    </div>
                    <div class="form-row">
                        <input type="text" name="pan_no" class="company" id="pan_no" placeholder="Pan No">
                    </div>
                    <div class="form-row">
                        <input type="text" name="adhar_no" class="company" id="adhar_no" placeholder="Adhar No">
                    </div>
                    <div class="form-row">
                        <input type="text" name="gstin" class="company" id="gstin" placeholder="GSTIN No">
                    </div>
                </div>

                <div class="form-right">
                    <h2>Contact Details</h2>
                    <div class="form-row">
                        <input type="text" name="address" class="additional" id="address" placeholder="Address">
                    </div>

                    <div class="form-row">
                        <input type="text" name="pin" class="additional" id="pin" placeholder="Pin Code" required>
                    </div>

                    <div class="form-row form-row-2">
                        <input type="text" name="mo_no" class="phone" id="mo_no" placeholder="Mobile Number" required>
                    </div>

                    <div class="form-row">
                        <input type="text" name="email" id="email" class="input-text"
                            pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email">
                    </div>
                    <div class="form-row">
                        <input type="text" name="website" class="additional" id="website" placeholder="Website">
                    </div>

                    <div class="form-row-last">
                        <input type="submit" name="btnsubmit" class="register" value="Register">
                        <a href="view_supplier.php"><input type="button" name="btnback" class="register"
                                value="Back"></a>
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