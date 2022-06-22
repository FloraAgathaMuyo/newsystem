<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/all.min.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/custom.css">

  <title>Service Management System</title>
</head>

<body>
  <!-- Start Navigation -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-success pl-5 fixed-top">
    <a href="index.php" class="navbar-brand">DJ Refrigeration & Air Conditioning Repair Shop</a>
    <span class="navbar-text">A new cooling experience</span>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myMenu">
      <ul class="navbar-nav pl-5 custom-nav">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#Services" class="nav-link">Services</a></li>
        <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
        <li class="nav-item"><a href="Requester/RequesterLogin.php" class="nav-link">Login</a></li>
        <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
      </ul>
    </div>
  </nav> <!-- End Navigation -->

  <!-- Start Header Jumbotron-->
  <header class="jumbotron back-image" style="background-image: url(images/bgphoto1.jpg);">
    <div class="myclass mainHeading">
      <h1 class="text-uppercase text-success font-weight-bold">Welcome to <br> DJ Repair Shop</h1>
      <p class="font-italic">A new cooling experience</p>
      <a href="Requester/RequesterLogin.php" class="btn btn-primary mr-4">Login</a>
      <a href="#registration" class="btn btn-danger mr-4">Sign Up</a>
    </div>
  </header> <!-- End Header Jumbotron -->

  <div class="container">
    <!--Introduction Section-->
    <div class="jumbotron">
      <h3 class="text-center">DJ Repair Shop Services</h3>
      <p>
      DJR&ACRS Services is one of Quezon City's Refrigeration & Air Conditioning Repair Shop offering
        wide array of services. We focus on repairing, maintaining or cleaning your air conditioners services. Our sole mission is “To provide quality air conditioning care
        services to keep the appliances working great so customers will be happy and smiling”.

        With our well-equipped repairing shop and fully trained mechanics, we
        provide quality services with excellent packages that are designed to offer you great savings.

        Now you can book your service online by doing Registration.
      </p>

    </div>
  </div>
  <!--Introduction Section End-->
  <!-- Start Services -->
  <div class="container text-center border-bottom" id="Services">
    <h2>Our Services</h2>
    <div class="row mt-4">
      <div class="col-sm-4 mb-4">
        <a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
        <h4 class="mt-4">Online Assistance</h4>
      </div>
      <div class="col-sm-4 mb-4">
        <a href="#"><i class="fas fa-sliders-h fa-8x text-success"></i></a>
        <h4 class="mt-4">Air Conditioner Maintenance/Clean</h4>
      </div>
      <div class="col-sm-4 mb-4">
        <a href="#"><i class="fas fa-cogs fa-8x text-success"></i></a>
        <h4 class="mt-4">Air Conditioner Repair</h4>
      </div>
    </div>
  </div> <!-- End Services -->

  <!-- Start Registration  -->
  <?php include('userRegistration.php') ?>
  <!-- End Registration  -->

  <!-- Start Happy Customer  -->
  <div class="jumbotron bg-success" id="Customer">
    <!-- Start Happy Customer Jumbotron -->
    <div class="container">
      <!-- Start Customer Container -->
      <h2 class="text-center text-white">System Developers</h2>
      <div class="row mt-5">
        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 1st Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/avatar1.jpeg" class="img-fluid" style="border-radius: 100px;">
              <h4 class="card-title">Loren Pangasian</h4>
              <p class="card-text">Year & Section: BSCS-3A <br> School ID: 194-0180 <br> Email address: pangasian.l.bscs@gmail.com </p>
            </div>
          </div>
        </div> <!-- End Customer 1st Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 2nd Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/avatar2.jpg" class="img-fluid" style="border-radius: 100px;">
              <h4 class="card-title">Wilmer Pinonggan</h4>
              <p class="card-text">Year & Section: BSCS-3A <br> School ID: 194-0151 <br> Email address: pinonggan.w.bscs@gmail.com </p>
            </div>
          </div>
        </div> <!-- End Customer 2nd Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 3rd Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/avatar3.jpeg" class="img-fluid" style="border-radius: 100px;">
              <h4 class="card-title">Flora Agatha Muyo</h4>
              <p class="card-text">Year & Section: BSCS-3A <br> School ID: 194-0131 <br> Email address: muyo.f.bscs@gmail.com </p>
            </div>
          </div>
        </div> <!-- End Customer 3rd Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 4th Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/avatar4.jpeg" class="img-fluid" style="border-radius: 100px;">
              <h4 class="card-title">Jhonmar Abadillos</h4>
              <p class="card-text">Year & Section: BSCS-3A <br> School ID: 194-0115 <br> Email address: abadillos.j.bscs@gmail.com </p>
            </div>
          </div>
        </div> <!-- End Customer 4th Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 5th Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/avatar5.jpg" class="img-fluid" style="border-radius: 100px;">
              <h4 class="card-title">Christian Jay Gonzales</h4>
              <p class="card-text">Year & Section: BSCS-3A <br> School ID: 194-0179 <br> Email address: gonzales.c.bscs@gmail.com </p>
            </div>
          </div>
        </div> <!-- End Customer 5th Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 6th Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/avatar6.jpg" class="img-fluid" style="border-radius: 100px;">
              <h4 class="card-title">Adrian Reyes</h4>
              <p class="card-text">Year & Section: BSCS-3A <br> School ID: 194-0322 <br> Email address: reyes.a.bscs@gmail.com </p>
            </div>
          </div>
        </div> <!-- End Customer 6th Column-->
      </div> <!-- End Customer Row-->
    </div> <!-- End Customer Container -->
  </div> <!-- End Customer Jumbotron -->

  <!--Start Contact Us-->
  <div class="container" id="Contact">
    <!--Start Contact Us Container-->
    <h2 class="text-center mb-4">Contact US</h2> <!-- Contact Us Heading -->
    <div class="row">

      <!--Start Contact Us Row-->
      <?php include('contactform.php'); ?>
      <!-- End Contact Us 1st Column -->

      <div class="col-md-4 text-center">
        <!-- Start Contact Us 2nd Column-->
        <strong>Our SHOP:</strong> <br>
        Batasan-San Mateo Rd, <br>
        Quezon City, <br>
        1126 Metro Manila <br>
      </div> <!-- End Contact Us 2nd Column-->
    </div> <!-- End Contact Us Row-->
  </div> <!-- End Contact Us Container-->
  <!-- End Contact Us -->

  <!-- Start Footer-->
  <footer class="container-fluid bg-dark text-white mt-5" style="border-top: 3px solid #0099ff;">
    <div class="container">
      <!-- Start Footer Container -->
      <div class="row py-3">
        <!-- Start Footer Row -->
        <div class="col-md-6">
          <!-- Start Footer 1st Column -->
          <span class="pr-2">Follow Us: </span>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fas fa-rss"></i></a>
        </div> <!-- End Footer 1st Column -->

        <div class="col-md-6 text-right">
          <!-- Start Footer 2nd Column -->
          <small> Designed by Someone &copy; 2018.
          </small>
          <small class="ml-2"><a href="Admin/login.php">Admin Login</a></small>
          <small class="ml-2"><a href="Technician/login.php">Technician Login</a></small>
        </div> <!-- End Footer 2nd Column -->
      </div> <!-- End Footer Row -->
    </div> <!-- End Footer Container -->
  </footer> <!-- End Footer -->

  <!-- Boostrap JavaScript -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/all.min.js"></script>
</body>

</html>