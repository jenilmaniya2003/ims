<!DOCTYPE html>
<html>

<head>
	<style>
		* {
			margin: 0px;
			padding: 0px;
		}

		.ulmenu {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #333;
		}

		li {
			float: left;
			font-family: 'Courier New', Courier, monospace;
		}

		.left {
			float: right;
			color: white;
			cursor: pointer
		}

		li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		li a:hover {
			background-color: #111;
		}
	</style>
</head>

<body>
	<ul class="ulmenu">

		<li><a href='../main.php'>Home</a></li>
		<li><a href='../customer/view_cust.php'>Customer</a></li>
		<li><a href='../product/view_prod.php'>Products</a></li>
		<li><a href='#'>Sales Challan</a></li>
		<li><a href='#'>Purchase Invoice</a></li>
		<li><a href='#'>A/c. Ledger</a></li>
		<li><a href='#'>Pending Payment</a></li>
		<li><a href='../reports/salereport.php'>Sales Report</a></li>
		<li><a href='../reports/bwreport.php'>B/W Report</a></li>
		<li class="left"><a herf="../../logout.php">Log Out</a></li>

	</ul>
</body>

</html>