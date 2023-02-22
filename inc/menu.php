<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      background-image: url(background-img.jpg);
      background-size: cover;
      background-attachment: fixed;
    }

    .navbar {
      height: 50px;
      width: 100%;
      padding: 19px 30px;
      background-color: #000;
      position: relative;
    }

    .navbar .nav-header {
      display: inline;
    }

    .navbar .nav-header .nav-logo {
      display: inline-block;
      margin-top: -7px;
    }

    .navbar .nav-links {
      display: inline;
      float: right;
      font-size: 18px;
    }

    .navbar .nav-links .loginBtn {
      display: inline-block;
      padding: 5px 15px;
      margin-left: 20px;
      font-size: 17px;
      color: rgb(9, 14, 90);
    }

    .navbar .nav-links a {
      padding: 10px 12px;
      text-decoration: none;
      font-weight: 550;
      color: white;
    }

    /* Hover effects */
    .navbar .nav-links a:hover {
      background-color: rgba(0, 0, 0, 0.3);
    }

    /* responsive navbar toggle button */
    .navbar #nav-check,
    .navbar .nav-btn {
      display: none;
    }

    @media (max-width:700px) {
      .navbar .nav-btn {
        display: inline-block;
        position: absolute;
        top: 0px;
        right: 0px;
      }

      .navbar .nav-btn label {
        display: inline-block;
        width: 80px;
        height: 70px;
        padding: 25px;
      }

      .navbar .nav-btn label span {
        display: block;
        height: 10px;
        width: 25px;
        border-top: 3px solid #eee;
      }

      .navbar .nav-btn label:hover,
      .navbar #nav-check:checked~.nav-btn label {
        background-color: rgb(9, 14, 90);
        transition: all 0.5s ease;
      }

      .navbar .nav-links {
        position: absolute;
        display: block;
        text-align: center;
        width: 50%;
        background-color: rgb(9, 14, 90);
        transition: all 0.3s ease-in;
        overflow-y: hidden;
        top: 70px;
        right: 0px;
      }

      .navbar .nav-links a {
        display: block;
      }

      /* when nav toggle button not checked */
      .navbar #nav-check:not(:checked)~.nav-links {
        height: 0px;
      }

      /* when nav toggle button is checked */
      .navbar #nav-check:checked~.nav-links {
        height: calc(100vh - 70px);
        overflow-y: auto;
      }

      .navbar .nav-links .loginBtn {
        padding: 10px 40px;
        margin: 20px;
        font-size: 18px;
        font-weight: bold;
        color: rgb(9, 14, 90);
      }

      /* Responsive dropdown code */
      .navbar .nav-links .dropdown,
      .navbar .nav-links .dropdown2 {
        float: none;
        width: 100%;
      }

      .navbar .nav-links .drop-content,
      .navbar .nav-links .drop-content2 {
        position: relative;
        background-color: rgb(220, 220, 250);
        top: 0px;
        left: 0px;
      }

      /* Text color */
      .navbar .nav-links .drop-content a {
        color: rgb(9, 14, 90);
      }

    }

    /* Dropdown menu CSS code */
    .dropdown {
      position: relative;
      display: inline-block;
    }

    .drop-content,
    .drop-content2 {
      display: none;
      position: absolute;
      background-color: #000;
      min-width: 200px;
      font-size: 16px;
      top: 34px;
      z-index: 1;
      box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.4);
    }

    /* on hover show dropdown */
    .dropdown:hover .drop-content,
    .dropdown2:hover .drop-content2 {
      display: block;
    }

    /* drondown links */
    .drop-content a {
      padding: 12px 10px;
      border-bottom: 1px solid rgb(197, 197, 250);
      display: block;
      transition: all 0.5s ease !important;
    }

    .dropBtn .drop-content a:hover {
      background-color: rgb(230, 230, 230);
    }

    .dropdown:hover .dropBtn,
    .dropdown2:hover .dropBtn2 {
      background-color: rgba(0, 0, 0, 0.3);
    }

    .dropdown2 .drop-content2 {
      position: absolute;
      left: 120px;
      top: 126px;
    }

    .dropBtn2 i {
      margin-left: 15px;
    }

    .righ1 {
      position: absolute;
      right: 20px;
    }
  </style>
</head>

<body>
  <div class="navbar">

    <!-- responsive navbar toggle button -->
    <input type="checkbox" id="nav-check">
    <div class="nav-btn">
      <label for="nav-check">
        <span></span>
        <span></span>
        <span></span>
      </label>
    </div>

    <!-- Navbar items -->
    <div class="nav-links">
      <a href="../main.php">Home</a>
      <a href="../customer/view_cust.php">Customer</a>
      <a href="../supplier/view_supplier.php">Supplier</a>
      <a href="../product/view_prod.php">Product</a>
      <a href="../sales/srch_prod.php">Sales</a>
      <a href="../purchase/purch_prod.php">Purchase</a>
      <!-- <a href="#">Purc. Invoice</a> -->
      <div class="dropdown">
        <a class="dropBtn" href="#">Invoice
          <i class="fas fa-angle-down"></i>
        </a>
        <div class="drop-content">
          <a href="../sales/view_inv.php">Sales Invoice</a>
          <a href="../purchase/view_purch_inv.php">Purchase Invoice</a>
        </div>
      </div>

      <a href="#">Account Ledger</a>

      <div class="dropdown">
        <a class="dropBtn" href="#">Pending Payment
          <i class="fas fa-angle-down"></i>
        </a>
        <div class="drop-content">
          <a href="../transaction/view_pending_payment.php">Sales Pending</a>
          <a href="../purchase/view_purch_inv.php">Purchase Pending</a>
        </div>
      </div>

      <!-- <a href="../transaction/view_pending_payment.php">Pending Payment</a> -->
      <!-- <a href="#">Reports</a> -->

      <div class="dropdown">
        <a class="dropBtn" href="#">Reports
          <i class="fas fa-angle-down"></i>
        </a>
        <div class="drop-content">
          <a href="../reports/salereport.php">Sales Reports</a>
          <a href="../reports/bwreport.php">B/W Sales Reports</a>
          <a href="../reports/bwreport.php">Purchase Reports</a>
          <a href="../reports/bwreport.php">B/W Purchase Reports</a>
          <!-- <a href="#">WordPress</a>
 
          <div class="dropdown2">
            <a class="dropBtn2" href="#">More
              <i class="fas fa-angle-right"></i>
            </a>
            <div class="drop-content2">
              <a href="#">HTML</a>
              <a href="#">CSS</a>
              <a href="#">JavaScript</a>
              <a href="#">jQuery</a>
            </div>
          </div> -->
        </div>
      </div>



      <!-- <a href="#">Blogs</a>
      <a href="#">Contact</a> -->
      <!-- <button class="loginBtn">Login</button> -->
      <div class="dropdown" style="position: absolute; right:95px;">
        <a class="dropBtn" href="#">Account
          <i class="fas fa-angle-down"></i>
        </a>
        <div class="drop-content">
          <a href="../account/profile.php">Manage Account</a>
          <a href="../account/change_password.php">Change Password</a>
          <a href="../logout.php">Logout</a>

          <!-- Creating sub menu Dropdown -->
          <!-- <div class="dropdown2">
            <a class="dropBtn2" href="#">More
              <i class="fas fa-angle-right"></i>
            </a>
            <div class="drop-content2">
              <a href="#">HTML</a>
              <a href="#">CSS</a>
              <a href="#">JavaScript</a>
              <a href="#">jQuery</a>
            </div>
          </div> -->
        </div>
      </div>
    </div>

  </div>
</body>

</html>