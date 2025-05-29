<?php
include 'db.php';

session_start();

$success = '';
$error = '';

// Check if redirected with success
if (isset($_GET['success']) && $_GET['success'] == '1') {
    $success = "Message sent successfully.";
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $conn->real_escape_string($_POST['name'] ?? '');
    $email = $conn->real_escape_string($_POST['email'] ?? '');
    $subject = $conn->real_escape_string($_POST['subject'] ?? '');
    $message = $conn->real_escape_string($_POST['message'] ?? '');

    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        $sql = "INSERT INTO contact_form (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
        if ($conn->query($sql) === TRUE) {
            // Redirect after successful insert to prevent resubmission
            header("Location: contact.php?success=1");
            exit;
        } else {
            $error = "Database error: " . $conn->error;
        }
    } else {
        $error = "All fields are required.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact Us</title>
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

<!-- Navbar -->
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
        <li class="nav-item "><a href="car.php" class="nav-link">Cars</a></li>
        <li class="nav-item active"><a href="contact.php" class="nav-link">Contact</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
<?php else: ?>
  <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
  <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
        <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
        <li class="nav-item "><a href="car.php" class="nav-link">Cars</a></li>
        <li class="nav-item active"><a href="contact.php" class="nav-link">Contact</a></li>
  <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
  <li class="nav-item"><a href="inscription.php" class="nav-link">Inscription</a></li>
<?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<!-- Hero section -->
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
        <h1 class="mb-3 bread">Contact Us</h1>
      </div>
    </div>
  </div>
</section>

<!-- Contact form section -->
<section class="ftco-section contact-section">
  <div class="container">
    <div class="row d-flex mb-5 contact-info">
      <!-- Contact info blocks if needed -->
    </div>
    <div class="row">
      <div class="col-md-8 block-9 mb-md-5">
        <?php if ($success): ?>
          <div class="alert alert-success"><?php echo $success; ?></div>
        <?php elseif ($error): ?>
          <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="contact.php" method="POST" class="bg-light p-5 contact-form">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
          </div>
          <div class="form-group">
            <input type="text" name="subject" class="form-control" placeholder="Subject" required>
          </div>
          <div class="form-group">
            <textarea name="message" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
          </div>
        </form>
      </div>
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

<!-- Scripts and footer if any -->
</body>
</html>
