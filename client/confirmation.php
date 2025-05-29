<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login.php");
    exit();
}

// Validate car_id
if (!isset($_GET['car_id'])) {
    echo "No car selected.";
    exit();
}

$car_id = (int)$_GET['car_id'];
$client_id = $_SESSION['user_id'];

include '../config.php';

// Save booking in database
$stmt = $conn->prepare("INSERT INTO bookings (car_id, client_id, booking_date) VALUES (?, ?, NOW())");
$stmt->bind_param("ii", $car_id, $client_id);
$stmt->execute();

// Update car availability
$update = $conn->prepare("UPDATE cars SET availability = 'Unavailable' WHERE id = ?");
$update->bind_param("i", $car_id);
$update->execute();

$stmt->close();
$update->close();
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Booking Confirmed - QuickRide</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <style>
    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
    }
    .confirmation-box {
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      max-width: 550px;
      margin: 80px auto;
      text-align: center;
      box-shadow: 0 0 25px rgba(0,0,0,0.1);
    }
    .confirmation-box h2 {
      color: #28a745;
      margin-bottom: 20px;
    }
    .confirmation-box .icon {
      font-size: 60px;
      color: #28a745;
    }
    .btn-home {
      background-color: #007bff;
      color: white;
      margin-top: 25px;
      padding: 10px 25px;
    }
    .btn-home:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

<div class="confirmation-box">
  <div class="icon">✅</div>
  <h2>Booking Confirmed!</h2>
  <p>Your payment was successful and your car has been reserved.</p>
  <a href="indexClient.php" class="btn btn-home">Back to Home</a>
</div>

<script src="../js/bootstrap.min.js"></script>
</body>
</html>
