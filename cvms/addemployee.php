<?php
session_start();
if(isset($POST['Logout'])){
    session_destroy();
    header("location: crm.php");
}
?>


<?php  

        $fErr =$lErr=$frErr=$mrErr=$bgErr= $emailErr = $passErr = $phoneErr= "";
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
                $fErr = "<p style='color:red'> * First  Name is required</p>";
            }else {
                $fname = $_REQUEST["fname"];
            }
            if( empty($_REQUEST["mname"]) ){
                $mErr = "<p style='color:red'> * Middle  Name is required</p>";
            }else {
                $mname = $_REQUEST["mname"];
            }
            if( empty($_REQUEST["lname"]) ){
                $lErr = "<p style='color:red'> * Last  Name is required</p>";
            }else {
                $lname = $_REQUEST["lname"];
            }
            if( empty($_REQUEST["frname"]) ){
                $frErr = "<p style='color:red'> * Father's  Name is required</p>";
            }else {
                $frname = $_REQUEST["frname"];
            }
            if( empty($_REQUEST["mrname"]) ){
                $nameErr = "<p style='color:red'> * Mother's  Name is required</p>";
            }else {
                $mrname = $_REQUEST["bname"];
            }
            if( empty($_REQUEST["frname"]) ){
                $bgrr = "<p style='color:red'> * Blood group is required</p>";
            }else {
                $frname = $_REQUEST["bname"];
            }

            if( empty($_REQUEST["phone"]) ){
                $phoneErr = "<p style='color:red'> * phone  number is required</p>";
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
                            <a href="../adminpanel.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            
                        </li>
                        <li>
                            <a href="chart.php">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-address-card-o menu-icon"></i>Employee Master</a>
                                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                        <li>
                                            <a href="./cvms/addemployee.php"><i class="fa-solid fa-plus"></i>Add Employee</a>
                                        </li>  
                                        <li><a href="manageemployee.php"><i class="fa fa-tasks menu-icon"></i>Manage Employee</a>
                                    </li>   
                                    </ul>
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
                            <a class="js-arrow" href="../adminpanel.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            
                        </li>
                        <li>
                            <a href="../chart.php">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        
                        
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-address-card-o menu-icon"></i>Employee Master</a>
                                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                        <li>
                                            <a href="./cvms/addemployee.php"><i class="fa-solid fa-plus"></i>Add Employee</a>
                                        </li>  
                                        <li><a href="./manageemployee.php"><i class="fa fa-tasks menu-icon"></i>Manage Employee</a>
                                    </li>   
                                    </ul>
                        </li>
                    </ul>    
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
            <div class="card login-form mb-4">
            <div class="card-body pt-4">                       
                                    <h4 class="text-center">Add New Employee</h4>
                                    <br>
                                    <br>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="empform">
                            
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="fname">First Name:</label>
                                        <input type="text" class="form-control" value="<?php echo $fname; ?>" name="fname" >
                                        <?php echo $fErr; ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="mname">Middle Name:</label>
                                        <input type="text" class="form-control" value="<?php echo $fname; ?>" name="mname" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="lname">Last Name:</label>
                                        <input type="text" class="form-control" value="<?php echo $lname; ?>" name="lname" >
                                        <?php echo $lErr; ?>
                                    </div>
                                    </div>

                                    <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="frname">Father's Name:</label>
                                        <input type="text" class="form-control" value="<?php echo $frname; ?>" name="frname" >
                                        <?php echo $frErr; ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="mrname">Mother's Name:</label>
                                        <input type="text" class="form-control" value="<?php echo $mrname; ?>" name="mrname" >
                                        <?php echo $mrErr; ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="bname">Blood Group:</label>
                                        <input type="text" class="form-control" value="<?php echo $bname; ?>" name="bname" >
                                        <?php echo $bgErr; ?>
                                    </div>
                                    </div>

                                    

                                    <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" value="<?php echo $email; ?>" name="email" >     
                                        <?php echo $emailErr; ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="phone">Phone Number:</label>
                                        <input class="form-control" value="<?php echo $phone; ?>" name="phone" >  
                                        <?php echo $phoneErr; ?>            
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="parent_phone">Parent's Phone Number:</label>
                                        <input class="form-control" value="<?php echo $phone; ?>" name="parent_phone" >  
                                        <?php echo $phoneErr; ?>            
                                    </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="dob">Date-of-Birth:</label>
                                            <input type="date" class="form-control" value="<?php echo $dob; ?>" name="dob" id="dob" >  
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="age">Age:</label>
                                            <input type="text" class="form-control" readonly id="age" onmousemove="FindAge()" name="age" placeholder="Your Age" value>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4 ">
                                            <label class="mr-3">Gender:</label>
                                            <div class="form-inline">
                                                <div class="form-check mr-3">
                                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Male" ){ echo "checked"; } ?>  value="Male"  selected>
                                                    <label class="form-check-label">Male</label>
                                                </div>
                                                <div class="form-check mr-3">
                                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Female" ){ echo "checked"; } ?>  value="Female">
                                                    <label class="form-check-label">Female</label>
                                                </div>
                                                <div class="form-check mr-3">
                                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Other" ){ echo "checked"; } ?>  value="Other">
                                                    <label class="form-check-label">TG</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="resume">Resume:</label>
                                            <input type="file" class="form-control-file" id="resume" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="profile-photo">Profile Photo:</label>
                                            <input type="file" class="form-control-file" id="profile-photo" required>
                                        </div>
                                    </div>

                                    
                                <br>
                                <button class="btn btn-outline-primary float-right"><a href="./addemp1.php">Next</a></button>
                                </form>
                            
                        
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <script>
  function FindAge(){
    var day=document.getElementById("dob").value;
    var DOB=new Date(day);
    var today=new Date();
    var Age=today.getTime()-DOB.getTime();
    Age=Math.floor(Age/(1000*60*60*24*365.25));
    document.getElementById("age").value=Age;
    
}
</script>
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
