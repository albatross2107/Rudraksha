<?php
session_start();
if(isset($POST['Logout'])){
    session_destroy();
    header("location: crm.php");
}
?>


<?php  

        $nameErr = $emailErr = $passErr = $phoneErr= "";
        $fname = $lname=$frname= $mrname=$bname= $email = $dob = $gender = $pass = $phone = "";

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["gender"]) ){
                $gender ="";
            }else {
                $gender = $_REQUEST["gender"];
            }


            if( empty($_REQUEST["dob"]) ){
                $dob = "";
            }else {
                $dob = $_REQUEST["dob"];
            }

            if( empty($_REQUEST["fname"]) ){
                $nameErr = "<p style='color:red'> * First  Name is required</p>";
            }else {
                $fname = $_REQUEST["fname"];
            }
            if( empty($_REQUEST["lname"]) ){
                $nameErr = "<p style='color:red'> * Last  Name is required</p>";
            }else {
                $fname = $_REQUEST["lname"];
            }
            if( empty($_REQUEST["frname"]) ){
                $nameErr = "<p style='color:red'> * Father's  Name is required</p>";
            }else {
                $frname = $_REQUEST["frname"];
            }
            if( empty($_REQUEST["mrname"]) ){
                $nameErr = "<p style='color:red'> * Mother's  Name is required</p>";
            }else {
                $mrname = $_REQUEST["bname"];
            }
            if( empty($_REQUEST["frname"]) ){
                $nameErr = "<p style='color:red'> * Blood group is required</p>";
            }else {
                $frname = $_REQUEST["bname"];
            }

            if( empty($_REQUEST["phone"]) ){
                $phoneErr = "<p style='color:red'> * phone is required</p>";
                $phone = "";
            }else {
                $phone = $_REQUEST["phone"];
            }

            if( empty($_REQUEST["email"]) ){
                $emailErr = "<p style='color:red'> * Email is required</p> ";
            }else{
                $email = $_REQUEST["email"];
            }

            if( empty($_REQUEST["pass"]) ){
                $passErr = "<p style='color:red'> * Password is required</p> ";
            }else{
                $pass = $_REQUEST["pass"];
            }


            if( !empty($name) && !empty($email) && !empty($pass) && !empty($phone) ){

                // database connection
                require_once "../connection.php";

                $sql_select_query = "SELECT email FROM employee WHERE email = '$email' ";
                $r = mysqli_query($conn , $sql_select_query);

                if( mysqli_num_rows($r) > 0 ){
                    $emailErr = "<p style='color:red'> * Email Already Register</p>";
                } else{

                    $sql = "INSERT INTO employee( name , email , password , dob, gender , phone ) VALUES( '$name' , '$email' , '$pass' , '$dob' , '$gender', '$phone' )  ";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                     $fame =$lname=$frname=$mrname=$bname= $email = $dob = $gender = $pass = $phone = "";
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'manage-employee.php');
                            $('#linkBtn').text('View Employees');
                            $('#addMsg').text('Employee Added Successfully!');
                            $('#closeBtn').text('Add More?');
                        })
                     </script>
                     ";
                    }
                    
                }

            }
        }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Admin Panel</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="adminpanel.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            
                        </li>
                        <li>
                            <a href="chart.php">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="./cvms/index.php">
                            <i class="fa-solid fa-user"></i>RMS</a>
                        </li>
                      
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            
                        </li>
                        <li>
                            <a href="chart.php">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li
                        <li>
                            <a href="./addemployee.php">
                            <i class="fa-solid fa-user"></i>Employee Master</a>
                            <ul aria-expanded="false">
                            <li><a href="./addemployee.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Add Employee</span></a></li>
                            <!--<li><a href="./manageemployee.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Manage Employee</span></a></li>-->
                            <!-- <li><a href="./"> <i class="fa fa-bar-chart menu-icon"></i><span class="nav-text">Salary Table</span></a></li> -->

                            </ul>
                        </li>
                        
                        <!--
                        <li>
                            <a href="./cvms/index.php">
                            <i class="fa-solid fa-user"></i>RMS</a>
                        </li>
-->
                        
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                    
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Your name</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">Name</a>
                                                    </h5>
                                                    <span class="email">abc@example.com</span>
                                                </div>
                                            </div>
                                            <form method="POST">
                                            <div class="account-dropdown__footer" name="Logout">
                                                <a href="crm.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <br>
            <br>
            <br>
            <div class="card login-form mb-0">
            <div class="card-body pt-4 shadow">                       
                                    
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="empform">
                                <h4 class="text-center">Work Experience</h4>
                                <br>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="currentcompany">Company Name</label>
                                        <input type="text" class="form-control" id="currentcompany" placeholder="Enter your Company Name" value>
                                        </div>
                                        <div class="form-group">
                                        <label for="designation">Designation</label>
                                        <select id="designation" class="form-control">
                                            <option>Select</option>
                                            <option>NA</option>
                                            <option>Branch Manager</option>
                                            <option>Custom Manager</option>
                                            <option>Operation Manager</option>
                                            <option>Admin Manager</option>
                                            <option>Sales Manager</option>
                                            <option>Relationship Manager</option>
                                            <option>HR Manager</option>
                                            <option>Receptionist</option>
                                            <option>Guard</option>
                                            <option>Support Staff</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="department">Department</label>
                                        <input type="text" class="form-control" id="department" placeholder="Enter your Department" value>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="experience">Experience</label>
                                        <select id="experience" class="form-control">
                                            <option>Select</option>
                                            <option>No Experience</option>
                                            <option>0-2 Years</option>
                                            <option>2-4 Years</option>
                                            <option>4-6 Years</option>
                                            <option>6-8 Years</option>
                                            <option>8-10 Years</option>
                                            <option>10+ Years</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="package">Package</label>
                                        <input type="text" class="form-control" id="package" placeholder="Enter your Salary Package" value>
                                        </div>
                                        <div class="form-group">
                                        <label for="salary">Take Off Salary</label>
                                        <input type="text" class="form-control" id="salary" placeholder="Enter your Salary" value>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                
                                <h4 class="text-center">Bank Details</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="accountHolderName">Account Holder Name</label>
                                        <input type="text" class="form-control" id="accountHolderName" placeholder="Enter account holder name" value>
                                    </div>
                                    <div class="form-group">
                                        <label for="bankName">Bank Name</label>
                                        <input type="text" class="form-control" id="bankName" placeholder="Enter your Bank name" value>
                                    </div>
                                    <div class="form-group">
                                        <label for="accountNumber">Account Number</label>
                                        <input type="text" class="form-control" id="accountNumber" placeholder="Enter your account number" value>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ifscCode">IFSC Code</label>
                                        <input type="text" class="form-control" id="ifscCode" placeholder="Enter your IFSC Code" value>
                                    </div>
                                    <div class="form-group">
                                        <label for="branchName">Branch Name</label>
                                        <input type="text" class="form-control" id="branchName" placeholder="Enter your Bank Branch" value>
                                    </div>
                                    <div class="form-group">
                                        <label for="paymentType">Payment Type</label>
                                        <select id="paymentType" class="form-control">
                                        <option>Select</option>
                                        <option>NEFT</option>
                                        <option>UPI</option>
                                        </select>
                                    </div>
                                    </div>
                                
                                </div>

                               
                                  </form>

                                 <div class="form-row">
                                
                                    <div class="form-group col-md-6">
                                      <button class="btn btn-outline-primary"><a href="./addemp1.php">Previous</a></button><br>
                                    </div>
                                    <div class="form-group col-md-6">
                                     <button class="btn btn-outline-primary float-right"><a href="">Submit</a></button>
                                    </div>
                                </div>


                            </div>
    </div>
                        </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
           

    </div>


    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
<script
      src="https://kit.fontawesome.com/deb4d1b812.js"
      crossorigin="anonymous"
    ></script>
    <!-- Main JS-->
    <script src="js/main.js"></script>


    <script>
        $('.btn-outline-primary').hover(function() {
            $(this).find('a').css('color', 'white');
        }, function() {
            $(this).find('a').css('color', '');
        });
    </script>

</body>

</html>
<!-- end document-->
