<?php
session_start();

if (!isset($_GET['car_id'])) {
    echo "Invalid request.";
    exit();
}

$carId = (int) $_GET['car_id'];

include '../config.php';
$sql = "SELECT * FROM cars WHERE id = $carId";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "Car not found.";
    exit();
}

$car = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Secure Payment - QuickRide</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <style>
    body {
      background-color: #f7f7f7;
      font-family: Arial, sans-serif;
    }
    .payment-box {
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      max-width: 500px;
      margin: 50px auto;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    .payment-box h2 {
      margin-bottom: 20px;
    }
    .paypal-logo {
      width: 180px;
      margin: 20px 0;
    }
    .btn-confirm {
      background-color: #0070ba;
      color: white;
      border: none;
    }
    .btn-confirm:hover {
      background-color: #005c9d;
    }
  </style>
</head>
<body>

<div class="payment-box text-center">
  <h2>Pay for Your Ride</h2>
  <p><strong><?php echo htmlspecialchars($car['brand'] . " " . $car['model']); ?></strong></p>
  <p>Price per day: <strong>$<?php echo (int)$car['price_per_day']; ?></strong></p>

<img src="images/fake-D17.png" alt="D17" style="width: 100px; height: auto;">


  <p>This is a simulation of a payment page. Click below to confirm booking.</p>
  
  <a href="confirmation.php?car_id=<?php echo $carId; ?>" class="btn btn-confirm btn-block py-2 mt-4">Confirm with D17</a>
</div>

<script src="../js/bootstrap.min.js"></script>
</body>
</html>
