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
        <aside class="menu-sidebar d-none d-lg-block" style="background-color: #E0FFFF;">
            
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
                        </li>
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
            <header class="header-desktop" style="background-color: #ADD8E6;">
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
            <div class="card login-form mb-4">
            <div class="card-body pt-4  justify-content-between ">                       
                                    
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="empform ">
                               
                                
                                <br>
                                <h4 class="text-center pb-3 text-info border-bottom">Higher Qualification Details</h4>
                                <br>

                                <div id="education-details">
                                <div id="education-details1">
                                

                                <div class="row justify-content-center" >
                                    
                                    <div class="col-md-3 ">
                                        <div class="form-group">
                                            <label for="education">Education:</label>
                                                <select class="form-control">
                                                    <option>Select</option>
                                                    <option>Under-Graduate</option>
                                                    <option>Graduate</option>
                                                    <option>Post-Graduate</option>
                                                </select>
                                            </div> 
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label for="degree">Degree:</label>
                                                <select id="degree" class="form-control">
                                                    <option>Select</option>
                                                    <option>NA</option>
                                                    <option>BE/BTech</option>
                                                    <option>BCom</option>
                                                    <option>Bsc</option>
                                                    <option>BA</option>
                                                    <option>LAW</option>
                                                    <option>BBA</option>
                                                    <option>BCA</option>
                                                </select>
                                            </div>
                                    </div>

                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                                <label for="collegename">College Name:</label>
                                                <input type="text" class="form-control" id="collegename" placeholder="Enter your College Name">
                                        </div>
                                    </div>
                                    

                                </div>
                                <div class="row justify-content-center" >
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                <label for="uniname">University Name:</label>
                                                <input type="text" class="form-control" id="uniname" placeholder="Enter your University Name">
                                        </div>
                                    </div>

                                    <div class="col-md-3 ">
                                    <div class="form-group">
                                        <label>Branch:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>State:</label>
                                            <select class="form-control">
                                                <option value="">Select State</option>
                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                <option value="Assam">Assam</option>
                                                <option value="Bihar">Bihar</option>
                                                <option value="Chhattisgarh">Chhattisgarh</option>
                                                <option value="Goa">Goa</option>
                                                <option value="Gujarat">Gujarat</option>
                                                <option value="Haryana">Haryana</option>
                                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                <option value="Jharkhand">Jharkhand</option>
                                                <option value="Karnataka">Karnataka</option>
                                                <option value="Kerala">Kerala</option>
                                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                <option value="Maharashtra">Maharashtra</option>
                                                <option value="Manipur">Manipur</option>
                                                <option value="Meghalaya">Meghalaya</option>
                                                <option value="Mizoram">Mizoram</option>
                                                <option value="Nagaland">Nagaland</option>
                                                <option value="Odisha">Odisha</option>
                                                <option value="Punjab">Punjab</option>
                                                <option value="Rajasthan">Rajasthan</option>
                                                <option value="Sikkim">Sikkim</option>
                                                <option value="Tamil Nadu">Tamil Nadu</option>
                                                <option value="Telangana">Telangana</option>
                                                <option value="Tripura">Tripura</option>
                                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                <option value="Uttarakhand">Uttarakhand</option>
                                                <option value="West Bengal">West Bengal</option>
                                            </select>
                                            
                                    </div>
                                    </div>
                                   
                                    


                                </div>
                                <div class="row justify-content-center" >
                                <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Joining Date:</label>
                                        <div class="input-group date" id="start-time-picker" data-target-input="nearest">
                                            <input type="date" class="form-control datetimepicker-input" data-target="#start-time-picker"/>
                                            <div class="input-group-append" data-target="#start-time-picker" data-toggle="datetimepicker">
                                            
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Graduation date:</label>
                                        <div class="input-group date" id="end-time-picker" data-target-input="nearest">
                                            <input type="date" class="form-control datetimepicker-input" data-target="#end-time-picker"/>
                                            <div class="input-group-append" data-target="#end-time-picker" data-toggle="datetimepicker">
                                            
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                               
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Marks (%):</label>
                                        <input type="text" class="form-control ">
                                    </div>
                                </div>


                                </div>
                                <div class="form-row justify-content-center">
                                
                                <div class="form-group col-md-5">
                                    
                                </div>

                                <div class="form-group col-md-5">
                                    <button  class="btn btn-outline-primary btn-sm float-right remove-education" type="button">Remove</button> 
                                    <button  class="btn btn-outline-primary btn-sm float-right add-education" type="button">&nbsp; &nbsp;  Add &nbsp; &nbsp;</button>
                                </div>

                                </div>
                                <br>
                                <br>
                              </div>
                              </div>

                                <h4 class="text-center pb-3 text-info border-bottom">Higher Secondary Qualification Details</h4>
                                <br>
                                     <div class="row justify-content-center" >
                                    
                                    <div class="col-md-3 ">
                                    <div class="form-group">
                                        <label>Institution Name:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    </div>

                                    <div class="col-md-4">
                                    <div class="form-group">
                                        <label>School Board:</label>
                                        <select class="form-control">
                                        <option>Select</option>
                                        <option>State Boards</option>
                                        <option>Central Board of Secondary Education (CBSE)</option>
                                        <option>Indian Certificate of Secondary Education (ICSE)</option>
                                        <option>Council for the Indian School Certificate Examination (CISCE)</option>
                                        <option>National Institute of Open Schooling (NIOS)</option>
                                        <option>International Baccalaureate (IB)</option>
                                        <option>Cambridge International Examinations (CIE)</option>
                                        <option value="1">CENTRAL BOARD OF SECONDARY EDUCATION, NEW DELHI</option>
                                        <option value="2">NATIONAL INSTITUTE OF OPEN SCHOOLING, NEW DELHI</option>
                                        <option value="3">COUNCIL FOR THE INDIAN SCHOOL CERTIFICATE EXAMINATIONS, NEW DELHI</option>
                                        <option value="4">BOARD OF INTERMEDIATE EDUCATION, ANDHRA PRADESH</option>
                                        <option value="5">BOARD OF SECONDARY EDUCATION, ANDHRA PRADESH</option>
                                        <option value="6">A.P. OPEN SCHOOL SOCIETY, ANDHRA PRADESH</option>
                                        <option value="7">ASSAM HIGHER SECONDARY EDUCATION COUNCIL, ASSAM</option>
                                        <option value="8">BOARD OF SECONDARY EDUCATION, ASSAM</option>
                                        <option value="9">BIHAR SCHOOL EXAMINATION BOARD, BIHAR</option>
                                        <option value="10">BIHAR BOARD OF OPEN SCHOOLING AND EXAMINATION (BBOSE), BIHAR</option>
                                        <option value="11">CHHATISGARH BOARD OF SECONDARY EDUCATION, CHHATISGARH</option>
                                        <option value="12">CHHATISGARH STATE OPEN SCHOOL, CHHATISGARH</option>
                                        <option value="13">GOA BOARD OF SECONDARY AND HIGHER SECONDARY EDUCATION, GOA</option>
                                        <option value="14">GUJARAT SECONDARY AND HIGHER SECONDARY EDUCATION BOARD, GUJARAT</option>
                                        <option value="15">BOARD OF SCHOOL EDUCATION, HARYANA</option>
                                        <option value="16">H. P. BOARD OF SCHOOL EDUCATION, HIMACHAL PRADESH</option>
                                        <option value="17">THE J & K STATE BOARD OF SCHOOL EDUCATION, JAMMU</option>
                                        <option value="18">JHARKHAND ACADEMIC COUNCIL,RANCHI</option>
                                        <option value="19">GOVT. OF KARNATAKA DEPT. OF PRE-UNIVERSITY EDUCATION, KARNATAKA</option>
                                        <option value="20">KARNATAKA SECONDARY EDUCATION, EXAMINATION BOARD, KARNATAKA</option>
                                        <option value="21">KERALA BOARD OF PUBLIC EXAMINATION, KERALA</option>
                                        <option value="22">KERALA BOARD OF HIGHER SECONDARY EDUCATION, KERALA</option>
                                        <option value="23">BOARD OF VOCATIONAL HIGHER SECONDARY EDUCATION, KERALA</option>
                                        <option value="24">MAHARASHTRA STATE BOARD OF SECONDARY AND HIGHER SECONDARY EDUCATION, MAHARASHTRA</option>
                                        <option value="25">BOARD OF SECONDARY EDUCATION, MADHYA PRADESH</option>
                                        <option value="26">M. P. STATE OPEN SCHOOL EDUCATION BOARD, MADHYA PRADESH</option>
                                        <option value="27">BOARD OF SECONDARY EDUCATION, MANIPUR</option>
                                        <option value='28'>COUNCIL OF HIGHER SECONDARY EDUCATION, MANIPUR</option>
                                        <option value="29">MEGHALAYA BOARD OF SCHOOL EDUCATION, MEGHALAYA</option>
                                        <option value="30">MIZORAM BOARD OF SCHOOL EDUCATION, MIZORAM</option>
                                        <option value="31">NAGALAND BOARD OF SCHOOL EDUCATION, NAGALAND</option>
                                        <option value="32">COUNCIL OF HIGHER SECONDARY EDUCATION, ODISHA</option>
                                        <option value="33">BOARD OF SECONDARY EDUCATION, ODISHA</option>
                                        <option value="34">PUNJAB SCHOOL EDUCATION BOARD, PUNJAB</option>
                                        <option value="35">RAJASTHAN BOARD OF SECONDARY EDUCATION, RAJASTHAN</option>
                                        <option value="36">RAJASTHAN STATE OPEN SCHOOL, RAJASTHAN</option>
                                        <option value="37">STATE BOARD OF SCHOOL EXAMINATIONS (SEC.) & BOARD OF HIGHER SECONDARY, TAMIL NADU</option>
                                        <option value="38">BOARD OF SECONDARY EDUCATION, TELANGANA STATE</option>
                                        <option value="39">TELANGANA STATE BOARD OF INTERMEDIATE EDUCATION, TELANGANA</option>
                                        <option value="40">TELANGANA OPEN SCHOOL SOCIETY, TELANGANA</option>
                                        <option value="41">TRIPURA BOARD OF SECONDARY EDUCATION, TRIPURA</option>
                                        <option value="42">U.P. BOARD OF HIGH SCHOOL & INTERMEDIATE EDUCATION, UTTAR PRADESH</option>
                                        <option value="43">BOARD OF SCHOOL EDUCATION, UTTARAKHAND</option>
                                        <option value="44">WEST BENGAL BOARD OF SECONDARY EDUCATION, WEST BENGAL</option>
                                        <option value="45">WEST BENGAL COUNCIL OF HIGHER SECONDARY EDUCATION, WEST BENGAL</option>
                                        <option value="46">THE WEST BENGAL COUNCIL OF RABINDRA OPEN SCHOOLING, WEST BENGAL</option>
                                        <option value="47">WEST BENGAL STATE COUNCIL OF TECHNICAL & VOCATIONAL EDUCATION & SKILL DEVELOPMENT, WEST BENGAL</option>
                                        <option value="48">MAHARISHI PATANJALI SANSKRIT SANSTHAN, NEW DELHI</option>
                                        <option value="49">URDU EDUCATION BOARD, NEW DELHI</option>
                                        <option value="50">BIHAR SANSKRIT SHIKSHA BOARD, BIHAR</option>
                                        <option value="51">U.P. BOARD OF SEC. SANSKRIT EDUCATION SANSKRIT BHAWAN, UTTAR PRADESH</option>
                                        <option value="52">ASSAM SANSKRIT BOARD, ASSAM</option>
                                        <option value="53">JAMIA MILIA ISLAMIA, NEW DELHI</option>
                                        <option value="54">UTTRAKHAND SANSKRIT SHIKSHA PARISHAD, UTTRAKHAND</option>
                                        <option value="55">STATE MADRASSA EDUCATION BOARD, ASSAM</option>
                                        <option value="56">BIHAR STATE MADRASA EDUCATION BOARD, BIHAR</option>
                                        <option value="57">WEST BENGAL BOARD OF MADRASAH EDUCATION, WEST BENGAL</option>
                                        <option value="58">CHHATTISGARH MADRASA BOARD, CHHATTISGARH</option>
                                        <option value="59">UTTARAKHAND MADRASA EDUCATION BOARD, UTTARAKHAND</option>
                                        <option value="60">ALIGARH MUSLIM UNIVERSITY BOARD OF SECONDARY & SR. SECONDARY EDUCATION, UTTAR PARDESH</option>
                                        <option value="61">INDIAN COUNCIL FOR HINDI & SANSKRIT EDUCATION, NEW DELHI</option>
                                        <option value="62">DAYALBAGH EDUCATIONAL INSTITUTE, AGRA</option>
                                        <option value="63">BANASTHALI VIDYAPITH P.O., RAJASTHAN</option>
                                        <option value="64">BHUTAN COUNCIL FOR SCHOOL EXAMINATIONS & ASSESSMENT, BHUTAN</option>
                                        <option value="65">CAMBRIDGE ASSESSMENT INTERNATIONAL EXAMINATIONS, UK</option>
                                        <option value="66">CHHATTISGARH SANSKRIT BOARD, RAIPUR</option>
                                        <option value="67">MAURITIUS EXAMINATION SYNDICATE, MAURITIUS</option>
                                        <option value="68">NATIONAL EXAMINATIONS BOARD, NEPAL</option>

                                        </select>
                                    </div>
                                    </div>

                                    <div class="col-md-3 ">
                                    <div class="form-group">
                                        <label>State:</label>
                                        <select class="form-control">
                                                <option value="">Select State</option>
                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                <option value="Assam">Assam</option>
                                                <option value="Bihar">Bihar</option>
                                                <option value="Chhattisgarh">Chhattisgarh</option>
                                                <option value="Goa">Goa</option>
                                                <option value="Gujarat">Gujarat</option>
                                                <option value="Haryana">Haryana</option>
                                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                <option value="Jharkhand">Jharkhand</option>
                                                <option value="Karnataka">Karnataka</option>
                                                <option value="Kerala">Kerala</option>
                                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                <option value="Maharashtra">Maharashtra</option>
                                                <option value="Manipur">Manipur</option>
                                                <option value="Meghalaya">Meghalaya</option>
                                                <option value="Mizoram">Mizoram</option>
                                                <option value="Nagaland">Nagaland</option>
                                                <option value="Odisha">Odisha</option>
                                                <option value="Punjab">Punjab</option>
                                                <option value="Rajasthan">Rajasthan</option>
                                                <option value="Sikkim">Sikkim</option>
                                                <option value="Tamil Nadu">Tamil Nadu</option>
                                                <option value="Telangana">Telangana</option>
                                                <option value="Tripura">Tripura</option>
                                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                <option value="Uttarakhand">Uttarakhand</option>
                                                <option value="West Bengal">West Bengal</option>
                                            </select>
                                    </div>
                                    </div>
                                    

                                </div>
                                <div class="row justify-content-center" >
                                <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Joining Date:</label>
                                        <div class="input-group date" id="start-time-picker" data-target-input="nearest">
                                            <input type="date" class="form-control datetimepicker-input" data-target="#start-time-picker"/>
                                            <div class="input-group-append" data-target="#start-time-picker" data-toggle="datetimepicker">
                                            
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Graduation Date:</label>
                                        <div class="input-group date" id="end-time-picker" data-target-input="nearest">
                                            <input type="date" class="form-control datetimepicker-input" data-target="#end-time-picker"/>
                                            <div class="input-group-append" data-target="#end-time-picker" data-toggle="datetimepicker">
                                            
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Marks (%):</label>
                                        <input type="text" class="form-control ">
                                    </div>
                                    </div>


                                </div>
                                <br>
                                <br>

                                <h4 class="text-center pb-3 text-info border-bottom">Secondary Education Qualification Details</h4>
                                <br>
                            
                                <div class="row justify-content-center" >
                                    
                                    <div class="col-md-3 ">
                                    <div class="form-group">
                                        <label>Institution Name:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    </div>

                                    <div class="col-md-4">
                                    <div class="form-group">
                                        <label>School Board:</label>
                                        <select class="form-control">
                                        <option>Select</option>
                                        <option>State Boards</option>
                                        <option>Central Board of Secondary Education (CBSE)</option>
                                        <option>Indian Certificate of Secondary Education (ICSE)</option>
                                        <option>Council for the Indian School Certificate Examination (CISCE)</option>
                                        <option>National Institute of Open Schooling (NIOS)</option>
                                        <option>International Baccalaureate (IB)</option>
                                        <option>Cambridge International Examinations (CIE)</option>
                                        <option value="1">CENTRAL BOARD OF SECONDARY EDUCATION, NEW DELHI</option>
                                        <option value="2">NATIONAL INSTITUTE OF OPEN SCHOOLING, NEW DELHI</option>
                                        <option value="3">COUNCIL FOR THE INDIAN SCHOOL CERTIFICATE EXAMINATIONS, NEW DELHI</option>
                                        <option value="4">BOARD OF INTERMEDIATE EDUCATION, ANDHRA PRADESH</option>
                                        <option value="5">BOARD OF SECONDARY EDUCATION, ANDHRA PRADESH</option>
                                        <option value="6">A.P. OPEN SCHOOL SOCIETY, ANDHRA PRADESH</option>
                                        <option value="7">ASSAM HIGHER SECONDARY EDUCATION COUNCIL, ASSAM</option>
                                        <option value="8">BOARD OF SECONDARY EDUCATION, ASSAM</option>
                                        <option value="9">BIHAR SCHOOL EXAMINATION BOARD, BIHAR</option>
                                        <option value="10">BIHAR BOARD OF OPEN SCHOOLING AND EXAMINATION (BBOSE), BIHAR</option>
                                        <option value="11">CHHATISGARH BOARD OF SECONDARY EDUCATION, CHHATISGARH</option>
                                        <option value="12">CHHATISGARH STATE OPEN SCHOOL, CHHATISGARH</option>
                                        <option value="13">GOA BOARD OF SECONDARY AND HIGHER SECONDARY EDUCATION, GOA</option>
                                        <option value="14">GUJARAT SECONDARY AND HIGHER SECONDARY EDUCATION BOARD, GUJARAT</option>
                                        <option value="15">BOARD OF SCHOOL EDUCATION, HARYANA</option>
                                        <option value="16">H. P. BOARD OF SCHOOL EDUCATION, HIMACHAL PRADESH</option>
                                        <option value="17">THE J & K STATE BOARD OF SCHOOL EDUCATION, JAMMU</option>
                                        <option value="18">JHARKHAND ACADEMIC COUNCIL,RANCHI</option>
                                        <option value="19">GOVT. OF KARNATAKA DEPT. OF PRE-UNIVERSITY EDUCATION, KARNATAKA</option>
                                        <option value="20">KARNATAKA SECONDARY EDUCATION, EXAMINATION BOARD, KARNATAKA</option>
                                        <option value="21">KERALA BOARD OF PUBLIC EXAMINATION, KERALA</option>
                                        <option value="22">KERALA BOARD OF HIGHER SECONDARY EDUCATION, KERALA</option>
                                        <option value="23">BOARD OF VOCATIONAL HIGHER SECONDARY EDUCATION, KERALA</option>
                                        <option value="24">MAHARASHTRA STATE BOARD OF SECONDARY AND HIGHER SECONDARY EDUCATION, MAHARASHTRA</option>
                                        <option value="25">BOARD OF SECONDARY EDUCATION, MADHYA PRADESH</option>
                                        <option value="26">M. P. STATE OPEN SCHOOL EDUCATION BOARD, MADHYA PRADESH</option>
                                        <option value="27">BOARD OF SECONDARY EDUCATION, MANIPUR</option>
                                        <option value='28'>COUNCIL OF HIGHER SECONDARY EDUCATION, MANIPUR</option>
                                        <option value="29">MEGHALAYA BOARD OF SCHOOL EDUCATION, MEGHALAYA</option>
                                        <option value="30">MIZORAM BOARD OF SCHOOL EDUCATION, MIZORAM</option>
                                        <option value="31">NAGALAND BOARD OF SCHOOL EDUCATION, NAGALAND</option>
                                        <option value="32">COUNCIL OF HIGHER SECONDARY EDUCATION, ODISHA</option>
                                        <option value="33">BOARD OF SECONDARY EDUCATION, ODISHA</option>
                                        <option value="34">PUNJAB SCHOOL EDUCATION BOARD, PUNJAB</option>
                                        <option value="35">RAJASTHAN BOARD OF SECONDARY EDUCATION, RAJASTHAN</option>
                                        <option value="36">RAJASTHAN STATE OPEN SCHOOL, RAJASTHAN</option>
                                        <option value="37">STATE BOARD OF SCHOOL EXAMINATIONS (SEC.) & BOARD OF HIGHER SECONDARY, TAMIL NADU</option>
                                        <option value="38">BOARD OF SECONDARY EDUCATION, TELANGANA STATE</option>
                                        <option value="39">TELANGANA STATE BOARD OF INTERMEDIATE EDUCATION, TELANGANA</option>
                                        <option value="40">TELANGANA OPEN SCHOOL SOCIETY, TELANGANA</option>
                                        <option value="41">TRIPURA BOARD OF SECONDARY EDUCATION, TRIPURA</option>
                                        <option value="42">U.P. BOARD OF HIGH SCHOOL & INTERMEDIATE EDUCATION, UTTAR PRADESH</option>
                                        <option value="43">BOARD OF SCHOOL EDUCATION, UTTARAKHAND</option>
                                        <option value="44">WEST BENGAL BOARD OF SECONDARY EDUCATION, WEST BENGAL</option>
                                        <option value="45">WEST BENGAL COUNCIL OF HIGHER SECONDARY EDUCATION, WEST BENGAL</option>
                                        <option value="46">THE WEST BENGAL COUNCIL OF RABINDRA OPEN SCHOOLING, WEST BENGAL</option>
                                        <option value="47">WEST BENGAL STATE COUNCIL OF TECHNICAL & VOCATIONAL EDUCATION & SKILL DEVELOPMENT, WEST BENGAL</option>
                                        <option value="48">MAHARISHI PATANJALI SANSKRIT SANSTHAN, NEW DELHI</option>
                                        <option value="49">URDU EDUCATION BOARD, NEW DELHI</option>
                                        <option value="50">BIHAR SANSKRIT SHIKSHA BOARD, BIHAR</option>
                                        <option value="51">U.P. BOARD OF SEC. SANSKRIT EDUCATION SANSKRIT BHAWAN, UTTAR PRADESH</option>
                                        <option value="52">ASSAM SANSKRIT BOARD, ASSAM</option>
                                        <option value="53">JAMIA MILIA ISLAMIA, NEW DELHI</option>
                                        <option value="54">UTTRAKHAND SANSKRIT SHIKSHA PARISHAD, UTTRAKHAND</option>
                                        <option value="55">STATE MADRASSA EDUCATION BOARD, ASSAM</option>
                                        <option value="56">BIHAR STATE MADRASA EDUCATION BOARD, BIHAR</option>
                                        <option value="57">WEST BENGAL BOARD OF MADRASAH EDUCATION, WEST BENGAL</option>
                                        <option value="58">CHHATTISGARH MADRASA BOARD, CHHATTISGARH</option>
                                        <option value="59">UTTARAKHAND MADRASA EDUCATION BOARD, UTTARAKHAND</option>
                                        <option value="60">ALIGARH MUSLIM UNIVERSITY BOARD OF SECONDARY & SR. SECONDARY EDUCATION, UTTAR PARDESH</option>
                                        <option value="61">INDIAN COUNCIL FOR HINDI & SANSKRIT EDUCATION, NEW DELHI</option>
                                        <option value="62">DAYALBAGH EDUCATIONAL INSTITUTE, AGRA</option>
                                        <option value="63">BANASTHALI VIDYAPITH P.O., RAJASTHAN</option>
                                        <option value="64">BHUTAN COUNCIL FOR SCHOOL EXAMINATIONS & ASSESSMENT, BHUTAN</option>
                                        <option value="65">CAMBRIDGE ASSESSMENT INTERNATIONAL EXAMINATIONS, UK</option>
                                        <option value="66">CHHATTISGARH SANSKRIT BOARD, RAIPUR</option>
                                        <option value="67">MAURITIUS EXAMINATION SYNDICATE, MAURITIUS</option>
                                        <option value="68">NATIONAL EXAMINATIONS BOARD, NEPAL</option>

                                        </select>
                                    </div>
                                    </div>

                                    <div class="col-md-3 ">
                                    <div class="form-group">
                                        <label>State:</label>
                                        <select class="form-control">
                                                <option value="">Select State</option>
                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                <option value="Assam">Assam</option>
                                                <option value="Bihar">Bihar</option>
                                                <option value="Chhattisgarh">Chhattisgarh</option>
                                                <option value="Goa">Goa</option>
                                                <option value="Gujarat">Gujarat</option>
                                                <option value="Haryana">Haryana</option>
                                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                <option value="Jharkhand">Jharkhand</option>
                                                <option value="Karnataka">Karnataka</option>
                                                <option value="Kerala">Kerala</option>
                                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                <option value="Maharashtra">Maharashtra</option>
                                                <option value="Manipur">Manipur</option>
                                                <option value="Meghalaya">Meghalaya</option>
                                                <option value="Mizoram">Mizoram</option>
                                                <option value="Nagaland">Nagaland</option>
                                                <option value="Odisha">Odisha</option>
                                                <option value="Punjab">Punjab</option>
                                                <option value="Rajasthan">Rajasthan</option>
                                                <option value="Sikkim">Sikkim</option>
                                                <option value="Tamil Nadu">Tamil Nadu</option>
                                                <option value="Telangana">Telangana</option>
                                                <option value="Tripura">Tripura</option>
                                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                <option value="Uttarakhand">Uttarakhand</option>
                                                <option value="West Bengal">West Bengal</option>
                                            </select>
                                    </div>
                                    </div>
                                    

                                </div>
                                <div class="row justify-content-center" >
                                <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Joining Date:</label>
                                        <div class="input-group date" id="start-time-picker" data-target-input="nearest">
                                            <input type="date" class="form-control datetimepicker-input" data-target="#start-time-picker"/>
                                            <div class="input-group-append" data-target="#start-time-picker" data-toggle="datetimepicker">
                                            
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Graduation Date:</label>
                                        <div class="input-group date" id="end-time-picker" data-target-input="nearest">
                                            <input type="date" class="form-control datetimepicker-input" data-target="#end-time-picker"/>
                                            <div class="input-group-append" data-target="#end-time-picker" data-toggle="datetimepicker">
                                            
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Marks (%):</label>
                                        <input type="text" class="form-control ">
                                    </div>
                                    </div>


                                </div>
                                <br>

                                <br>
                                <div class="form-row justify-content-center">
                                
                                <div class="form-group col-md-5">
                                    <button  class="btn btn-outline-primary float-left"><a href="./addemployee.php">Previous</a></button>
                                </div>

                                <div class="form-group col-md-5">
                                    <button  class="btn btn-outline-primary float-right"><a href="./addemp2.php">Next</a></button> <br>
                                </div>

                                </div>
    
    </div>
                                  </form>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script>
        $(document).ready(function() {
            // Add education details
            $(document).on("click", ".add-education", function() {
                var html =  `<div id="education-details1">
                               <h4 class="text-center pb-3 border-bottom"></h4>
                                <br>

                                <div class="row justify-content-center" >
                                    
                                    <div class="col-md-3 ">
                                        <div class="form-group">
                                            <label for="education">Education:</label>
                                                <select class="form-control">
                                                    <option>Select</option>
                                                    <option>Under-Graduate</option>
                                                    <option>Graduate</option>
                                                    <option>Post-Graduate</option>
                                                </select>
                                            </div> 
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label for="degree">Degree:</label>
                                                <select id="degree" class="form-control">
                                                    <option>Select</option>
                                                    <option>NA</option>
                                                    <option>BE/BTech</option>
                                                    <option>BCom</option>
                                                    <option>Bsc</option>
                                                    <option>BA</option>
                                                    <option>LAW</option>
                                                    <option>BBA</option>
                                                    <option>BCA</option>
                                                </select>
                                            </div>
                                    </div>

                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                                <label for="collegename">College Name:</label>
                                                <input type="text" class="form-control" id="collegename" placeholder="Enter your College Name">
                                        </div>
                                    </div>
                                    

                                </div>
                                <div class="row justify-content-center" >
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                <label for="uniname">University Name:</label>
                                                <input type="text" class="form-control" id="uniname" placeholder="Enter your University Name">
                                        </div>
                                    </div>

                                    <div class="col-md-3 ">
                                    <div class="form-group">
                                        <label>Branch:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>State:</label>
                                            <select class="form-control">
                                                <option value="">Select State</option>
                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                <option value="Assam">Assam</option>
                                                <option value="Bihar">Bihar</option>
                                                <option value="Chhattisgarh">Chhattisgarh</option>
                                                <option value="Goa">Goa</option>
                                                <option value="Gujarat">Gujarat</option>
                                                <option value="Haryana">Haryana</option>
                                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                <option value="Jharkhand">Jharkhand</option>
                                                <option value="Karnataka">Karnataka</option>
                                                <option value="Kerala">Kerala</option>
                                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                <option value="Maharashtra">Maharashtra</option>
                                                <option value="Manipur">Manipur</option>
                                                <option value="Meghalaya">Meghalaya</option>
                                                <option value="Mizoram">Mizoram</option>
                                                <option value="Nagaland">Nagaland</option>
                                                <option value="Odisha">Odisha</option>
                                                <option value="Punjab">Punjab</option>
                                                <option value="Rajasthan">Rajasthan</option>
                                                <option value="Sikkim">Sikkim</option>
                                                <option value="Tamil Nadu">Tamil Nadu</option>
                                                <option value="Telangana">Telangana</option>
                                                <option value="Tripura">Tripura</option>
                                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                <option value="Uttarakhand">Uttarakhand</option>
                                                <option value="West Bengal">West Bengal</option>
                                            </select>
                                    </div>
                                    </div>
                                   
                                    


                                </div>
                                <div class="row justify-content-center" >
                                <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Joining Date:</label>
                                        <div class="input-group date" id="start-time-picker" data-target-input="nearest">
                                            <input type="date" class="form-control datetimepicker-input" data-target="#start-time-picker"/>
                                            <div class="input-group-append" data-target="#start-time-picker" data-toggle="datetimepicker">
                                            
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Graduation Date:</label>
                                        <div class="input-group date" id="end-time-picker" data-target-input="nearest">
                                            <input type="date" class="form-control datetimepicker-input" data-target="#end-time-picker"/>
                                            <div class="input-group-append" data-target="#end-time-picker" data-toggle="datetimepicker">
                                            
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                               
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Marks (%):</label>
                                        <input type="text" class="form-control ">
                                    </div>
                                </div>


                                </div>
                                <div class="form-row justify-content-center">
                                
                                <div class="form-group col-md-5">
                                    
                                </div>

                                <div class="form-group col-md-5">
                                    <button  class="btn btn-outline-primary btn-sm float-right remove-education" type="button">Remove</button> 
                                    <button  class="btn btn-outline-primary btn-sm float-right add-education" type="button">&nbsp; &nbsp;  Add &nbsp; &nbsp;</button>
                                </div>

                                </div>
                                <br>
                                <br>
                              </div>`
                $("#education-details").append(html);
            });

            // Remove education details
            $(document).on("click", ".remove-education", function() {
                $(this).closest("#education-details1").remove();
            });
        });
        
    </script>

</body>

</html>
<!-- end document-->
