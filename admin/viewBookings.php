<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit;
}

// Connect to DB
$conn = new mysqli("localhost", "root", "", "quickride");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all bookings + car info
$sql = "SELECT b.id, b.car_id, b.client_id, b.booking_date, c.brand, c.model
        FROM bookings b
        JOIN cars c ON b.car_id = c.id
        ORDER BY b.booking_date DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Bookings - Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f5f5f5;
        }

        h1 {
            margin-bottom: 20px;
        }

        .logout {
            float: right;
            background-color: #333;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 13px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            font-size: 14px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #444;
            color: white;
        }
        .GoBack {
            float: right;
            background-color: #333;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 13px;
            margin-bottom: 15px;
        }


        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
<a href="adminDashboard.php" class="GoBack">Go Back</a>
<h1>Bookings History</h1>

<table>
    <tr>
        <th>Booking ID</th>
        <th>Car</th>
        <th>Client ID</th>
        <th>Booking Date</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['brand'] . ' ' . $row['model'] ?></td>
            <td><?= $row['client_id'] ?></td>
            <td><?= $row['booking_date'] ?></td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>

<?php $conn->close(); ?>
