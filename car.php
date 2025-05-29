<?php

session_start();


include 'config.php';

$sql = "SELECT * FROM cars WHERE availability = 'Available'";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Carbook - Car Listing</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="index.php">Quick<span>Ride</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
  <li class="nav-item"><a href="/QuickRide/client/indexClient.php" class="nav-link">Home</a></li>
  <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
        <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
        <li class="nav-item active"><a href="car.php" class="nav-link">Cars</a></li>
        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
<?php else: ?>
  <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
  <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
        <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
        <li class="nav-item active"><a href="car.php" class="nav-link">Cars</a></li>
        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
  <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
  <li class="nav-item"><a href="inscription.php" class="nav-link">Inscription</a></li>
<?php endif; ?>

        

      </ul>
    </div>
  </div>
</nav>
<!-- END nav -->


    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Choose Your Car</h1>
          </div>
        </div>
      </div>
    </section>

	<section class="ftco-section bg-light">
  <div class="container">
    <div class="row">
      <?php while($row = $result->fetch_assoc()): ?>
        <?php $image = !empty($row['image']) ? $row['image'] : 'images/default.jpg'; ?>
        <div class="col-md-4">
          <div class="car-wrap rounded ftco-animate">
            <div class="img rounded d-flex align-items-end" style="background-image: url('<?php echo $image; ?>');"></div>
            <div class="text">
              <h2 class="mb-0">
                <a href="car-single.php?id=<?php echo (int)$row['id']; ?>">
                  <?php echo htmlspecialchars($row['model']); ?>
                </a>
              </h2>
              <div class="d-flex mb-3">
                <span class="cat"><?php echo htmlspecialchars($row['brand']); ?></span>
                <p class="price ml-auto"><?php echo (int)$row['price_per_day']; ?> DT<span>/day</span></p>
              </div>
              <p class="d-flex mb-0 d-block">
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
  <a href="client/payment.php?car_id=<?php echo (int)$row['id']; ?>" class="btn btn-primary py-2 mr-1">Book now</a>
<?php else: ?>
  <a href="login.php" class="btn btn-primary py-2 mr-1">Book now</a>
<?php endif; ?>

              </p>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>



    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a href="#" class="logo">Quick<span>Ride</span></a></h2>
              <p>Whether you're heading out for a weekend getaway, a business trip, or just need a ride around town, we've got the perfect vehicle for you.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="about.php" class="py-2 d-block">About</a></li>
                <li><a href="car.php" class="py-2 d-block">Best Price Guarantee</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Customer Support</h2>
              <ul class="list-unstyled">
                <li><a href="faq.php" class="py-2 d-block">FAQ</a></li>
                <li><a href="contact.php" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Avenue de la République, Hammamet 8050, Nabeul, Tunisia </span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">Quickride@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
