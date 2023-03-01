<?php


if(isset($_POST["submit"])){
  $name=$_POST["name"];
  $age=$_POST["age"];
  $gender=$_POST["gender"];
  $phone_no=$_POST["phone_no"];
  $email=$_POST["email"];
  $city=$_POST["city"];
  $state=$_POST["state"];
  $profession=$_POST["profession"];
  $teabrand=$_POST["teabrand"];
  $teacups_perday=$_POST["teacups_perday"];
  $quality_product=$_POST["quality_product"];
  $price_perkg=$_POST["price_perkg"];
  $quantity_permonth=$_POST["quantity_permonth"];
  $taste=$_POST["taste"];
  $gift=$_POST["gift"];
  

  $conn= mysqli_connect("localhost", "root", "", "rudra");
  $query="INSERT INTO survey VALUES('', NOW(), '$name', '$age', '$gender', '$phone_no', '$email', '$city', '$state', '$profession', '$teabrand', '$teacups_perday', '$quality_product', '$price_perkg', '$quantity_permonth', '$taste', '$gift')";
  mysqli_query($conn, $query);


}
?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rudraksha Welfare Foundation</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,400;0,500;1,300&family=Lora:ital,wght@0,500;0,600;1,400;1,600&family=Roboto:wght@500&family=Urbanist:wght@200;300;400;500;600&family=Varela+Round&display=swap"
    rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
    integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
<header>
      <section class="section-1">
        <img src="./Images/Website Header Strip.png" alt="" style="align-items: center; width: 100%;">
        
      </section>
      <center><video height="100%" width="100%" autoplay loop muted>
        <source src="VISION STATEMENT ANIMATION.mp4" type="video/mp4">  
      </video></center>
      <nav
        class="navbar navbar-expand-sm navbar-dark bg-dark mb-0"  
      >
        <div class="container-fluid">
          <button
            class="navbar-toggler"
            type="button"            
            data-toggle="collapse"
            data-target="#navbarNavDropdown"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <div class="ps-3">
                <li class="nav-item">
                  <a class="nav-link"      
                    href="index.html"
                    style="
                      font-family: 'Open Sans', sans-serif;
                      color: white;
                    ">Home</a>
                </li>
              </div>
              <div class="ps-3">
                <li class="nav-item">
                  <a class="nav-link"
                    href="agenda.html"                                       
                    style="
                      font-family: 'Open Sans', sans-serif;                     
                      color: white;"
                    >Agenda</a
                  >
                </li>
              </div>
              <div class="ps-3">
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="aboutus.html"                   
                    style="
                      font-family: 'Open Sans', sans-serif;
                      
                      color: white;
                    "
                    >About Us</a
                  >
                </li>
              </div>
              <div class="ps-3">
                <li class="nav-item">
                  <a
                    class="nav-link"                    
                    href="vision.html"                   
                    style="
                      font-family: 'Open Sans', sans-serif;
                      color: white;
                    "
                    >Vision</a
                  >
                </li>
              </div>
              <div class="ps-3">
                <li class="nav-item">
                  <a
                    class="nav-link"                   
                    href="corevalues.html"                    
                    style="
                      font-family: 'Open Sans', sans-serif;                      
                      color: white;
                    "
                    >Core Values</a
                  >
                </li>
              </div>
              <div class="ps-3">
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="mission.html"              
                    style="
                      font-family: 'Open Sans', sans-serif;
                      color: white;
                    "
                    >Mission</a
                  >
                </li>
              </div>
              <div class="ps-3">
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="navbarDropdownMenuLink"                   
                    data-bs-toggle="dropdown"
                    role="button"                   
                    aria-expanded="false"
                    style="                      
                      font-family: 'Open Sans', sans-serif;  
                      color: white;"
                  >
                    Projects
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                      <a class="dropdown-item" href="pr1.html">1. Art, Literature, Culture & Religion</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="pr2.html">2. Blood Donation</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="pr3.html">3. Drug De-Addiction</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="pr4.html">4. Environment Armour</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="pr5.html">5. Gender Justice</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="pr6.html">6. Gracious Justice</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="pr7.html">7. Human Rights</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="pr8.html"
                        >8. Old Age, Orphanage & Blind Home</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="pr9.html"
                        >9. Sports Training Support</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="pr10.html"
                        >10. True Eternal Warriors</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="pr11.html"
                        >11. Training & Skill Enhancement</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="pr12.html"
                        >12. True Wisdom Devotees</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="pr13.html"
                        >13. Vigour and Vitality</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="pr14.html"
                        >14. Voiceless Souls Protectin</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="pr15.html"
                        >15. Women Empowerment</a
                      >
                    </li>
                  </ul>
                </li>
              </div>
              <div class="ps-3">
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"                   
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    style="
                      
                      font-family: 'Open Sans', sans-serif;
                      
                      color: white;
                    "
                  >
                    Orniogram
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="orniogram.html">Orniogram</a></li>
                    <li><a class="dropdown-item" href="management.html">Management</a></li>
                    <li>
                      <a class="dropdown-item" href="codeofconduct.html">Code of Conduct</a>
                    </li>
                  </ul>
                </li>
              </div>
              <div class="ps-3">
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    style="
                     
                      font-family: 'Open Sans', sans-serif;
                      
                      color: white;
                    "
                  >
                    Career
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="recruitment.html">Recruitments</a></li>
                    <li>
                      <a class="dropdown-item" href="#">Interview form</a>
                    </li>
                    <li><a class="dropdown-item" href="#">Joining form</a></li>
                  </ul>
                </li>
              </div>
              <div class="ps-3">
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"                   
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    style="
                      
                      font-family: 'Open Sans', sans-serif;
                      
                      color: white;
                    "
                  >
                    Login
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Numero</a></li>
                    <li><a class="dropdown-item" href="#">Employee</a></li>
                    <li><a class="dropdown-item" href="#">RMS</a></li>
                  </ul>
                </li>
              </div>
              <div class="ps-3">
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="refundpolicy.html"                                      
                    style="
                      font-family: 'Open Sans', sans-serif;
                      
                      color: white;
                      
                    "
                    >Refund Policy</a
                  >
                </li>
              </div>
              <div class="ps-3">
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="crm.php"                                      
                    style="
                      font-family: 'Open Sans', sans-serif;                     
                      color: white;
                    "
                    >CRM</a
                  >
                </li>
              </div>
              <div class="ps-3">
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="faq.html"                   
                    style="
                      font-family: 'Open Sans', sans-serif;                     
                      color: white;
                    "
                    >FAQ</a
                  >
                </li>
              </div>
              <div class="ps-3">
                <li class="nav-item">
                  <a
                    class="nav-link"                  
                    href="#"                   
                    style="
                      font-family: 'Open Sans', sans-serif;                                          
                      color: white;
                    "
                    >Contact Us</a
                  >
                </li>
              </div>
              <div class="ps-3">
                <li class="nav-item">
                  <a
                    class="nav-link"              
                    href="survey.html"
                    style="
                      font-family: 'Open Sans', sans-serif;
                      color: white;
                    "
                    >Survey</a
                  >
                </li>
              </div>
            </ul>
          </div>
        </div>
      </nav>
    </header>


  <img src="./Images/survey-subbanner.jpg" class="surveyimg">
  <div class="projects survey">
    <div class="survey-heading"> <h2>YOUR TEA TASTE SURVEY FORM</h2></div>
    
  </div>
  <div class="recmain container">
    <div class="recdiv1heading">
      <h4 class="perhead">General Information</h4>
      <hr>
    </div>
    <form method="POST">
      <div class="surveydiv1">
        <div>
          <label for="name">Name</label>
          <input type="text" required class="form-control" name="name" id="name" placeholder="Enter your name" value>
        </div>



        <div>
          <label for="age">Age</label>
          <input type="text" class="form-control"  name="age" placeholder="0" value>
        </div>

        <div>
          <label for="gender">Gender</label>
          <select name="gender" id="gender" class="form-control">
            <option>Select</option>
            <option>Male</option>
            <option>Female</option>
            <option>TG</option>
            <option>Others</option>
          </select>
        </div>
        <div>
          <label for="phone_no">Phone Number</label>
          <input type="number" class="form-control" name="phone_no" placeholder="Enter Phone No.">
        </div>
        <div>
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Enter your Email" value>
        </div>
      </div>


      <div class="surveydiv2">
        <div>
          <label for="city">City</label>
          <input type="text" class="form-control" id="city" name="city" placeholder="Enter your City" value>
        </div>
        <div>
          <label for="state">State</label>
          <input type="text" class="form-control" id="state" name="state" placeholder="Enter your State" value>
        </div>

        <div>
          <label for="profession">Profession</label>
          <select name="profession" id="profession" class="form-control">
            <option>Select</option>
            <option>Student</option>
            <option>CA</option>
            <option>Doctor</option>
            <option>Defence</option>
            <option>Police
            </option>
            <option>Accountant</option>
            <option>Sales Force</option>
            <option>Banker</option>
            <option>BuisnessMan</option>
            <option>Teacher</option>
            <option>Govt. Services</option>
            <option>Sports man</option>
            <option>Engineer</option>
            <option>IT Professional</option>
            <option>Professor</option>
            <option>House Wife</option>
            <option>Advocate</option>
            <option>Retried</option>
            <option>Daily Wage</option>
          </select>
        </div>
        <div>
          <label for="teabrand">Your Favourite Tea </label>
          <select name="teabrand" id="teabrand" class="form-control">
            <option>Select</option>
            <option>TATA</option>
            <option>Wagh Bakri</option>
            <option>Lipton</option>
            <option>Brooke Bond</option>
            <option>Society
            </option>
            <option>Pataka</option>
            <option>ATCO</option>
            <option>Any other local Brand</option>

          </select>
        </div>
        <div> <label for="teacups_perday">Tea Cups/Day</label>
          <select name="teacups_perday" id="product" class="form-control">
            <option>Select</option>

            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5
            </option>
            <option>6</option>



          </select>
        </div>


      </div>
      <div class="surveydiv3">
        <div>
          <label for="quality_product">Tea Quality Product</label>
          <select name="quality_product" id="product" class="form-control">
            <option>Select</option>

            <option>Premium</option>
            <option>Normal</option>
            <option>Strong</option>
            <option>Flavored
            </option>



          </select>
        </div>

        <div>
          <label for="price_perkg">Price/Kg</label>
          <select name="price_perkg" id="price" class="form-control">
            <option>Select(INR)</option>
            <option>Rs.225</option>
            <option>Rs.250</option>
            <option>Rs.275</option>
            <option>Rs.300</option>
            <option>Rs.325</option>
            <option>Rs.350
            </option>
            <option>Rs.375
            </option>
            <option>Rs.400
            </option>
            <option>Rs.425
            </option>
            <option>Rs.450
            </option>
            <option>Rs.475
            </option>
            <option>Rs.500
            </option>
            <option>Rs.525
            </option>
            <option>Rs.550
            </option>
            <option>Rs.575
            </option>
            <option>Rs.600
            </option>
            <option>Rs.625
            </option>
            <option>Rs.650
            </option>


          </select>
        </div>
        <div>
          <label for="quantity_permonth">Quantity/Month</label>
          <select name="quantity_permonth" id="quantity" class="form-control">
            <option>Select</option>
            <option>500g</option>
            <option>750g</option>
            <option>1000g</option>
            <option>1500g</option>
            <option>2000g
            </option>



          </select>
        </div>

        <div>
          <label for="taste">Your Favourite Taste</label>
          <select name="taste" id="taste" class="form-control">
            <option>Select</option>
            <option>Strong</option>
            <option>Normal</option>
            <option>Aroma</option>
            <option>Elaichi</option>
            <option>Masala
            </option>



          </select>
        </div>
        
        <div>
          
          <label for="gift"> Freebies with brand</label>
          <select name="gift" id="gift" class="form-control">
            <option>Select</option>
            <option>Spoon</option>
            <option>Cup</option>
            <option>Mug</option>
            <option>Biscuit
            </option>
            <option>Toy</option>
            <option>No Gifts</option>
          </select>
        </div>
        <div class="submit">
          <button type="submit" name="submit" value="submit" class="btn btn-outline-primary">Submit</button>
        </div>
        
      </div>
      
      
      </form>





  </div>





  <script>
    function FindAge() {
      var day = document.getElementById("dob").value;
      var DOB = new Date(day);
      var today = new Date();
      var Age = today.getTime() - DOB.getTime();
      Age = Math.floor(Age / (1000 * 60 * 60 * 24 * 365.25));
      document.getElementById("age").value = Age;

    }
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/deb4d1b812.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</body>

</html>