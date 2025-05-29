<?php 
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - QuickRide</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 100px;
            background-color: #f0f0f0;
        }

        h1 {
            margin-bottom: 40px;
            font-size: 28px;
        }

        .dashboard-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .card {
            background-color: white;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 200px;
            text-align: center;
            transition: 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 16px rgba(0,0,0,0.15);
        }

        .card a {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 6px;
            display: inline-block;
            margin-top: 15px;
            font-weight: bold;
        }

        .logout {
            position: absolute;
            top: 20px;
            right: 30px;
            background-color: #333;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 13px;
        }
    </style>
</head>
<body>

<a href="logout.php" class="logout">Logout</a>

<h1>Welcome Admin</h1>

<div class="dashboard-container">
    <div class="card">
        <h2>Manage Cars</h2>
        <a href="manageCars.php">Go</a>
    </div>
    <div class="card">
        <h2>View Messages</h2>
        <a href="viewMessages.php">Go</a>
    </div>
    <div class="card">
        <h2>View Bookings</h2>
        <a href="viewBookings.php">Go</a>
    </div>
</div>

</body>
</html>
