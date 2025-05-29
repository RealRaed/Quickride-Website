<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit;
}

// DB connection
$conn = new mysqli("localhost", "root", "", "quickride");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle availability toggle
if (isset($_GET['id']) && isset($_GET['action'])) {
    $carId = (int)$_GET['id'];
    $newStatus = $_GET['action'] === 'make_available' ? 'Available' : 'Unavailable';

    $stmt = $conn->prepare("UPDATE cars SET availability = ? WHERE id = ?");
    $stmt->bind_param("si", $newStatus, $carId);
    $stmt->execute();
    $stmt->close();

    header("Location: manageCars.php");
    exit;
}

// Handle price update
if (isset($_POST['update_price'])) {
    $carId = (int)$_POST['car_id'];
    $newPrice = floatval($_POST['new_price']);

    if ($newPrice > 0) {
        $stmt = $conn->prepare("UPDATE cars SET price_per_day = ? WHERE id = ?");
        $stmt->bind_param("di", $newPrice, $carId);
        $stmt->execute();
        $stmt->close();

        header("Location: manageCars.php");
        exit;
    }
}

// Fetch all cars
$result = $conn->query("SELECT * FROM cars");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Cars - Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            font-size: 20px;
            margin-bottom: 15px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            font-size: 14px;
        }

        th, td {
            padding: 8px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #333;
            color: white;
        }

        img {
            width: 70px;
            border-radius: 4px;
        }

        .available {
            color: green;
            font-weight: bold;
        }

        .unavailable {
            color: red;
            font-weight: bold;
        }

        .btn {
            padding: 4px 8px;
            font-size: 13px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-available {
            background-color: green;
            color: white;
        }

        .btn-unavailable {
            background-color: red;
            color: white;
        }

        input[type="number"] {
            width: 70px;
            padding: 2px;
            font-size: 13px;
        }

        form.price-form {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }
    </style>
</head>
<body>

<a href="adminDashboard.php" class="GoBack">Go Back</a>
<h1>Manage Car Availability & Pricing</h1>

<table>
    <tr>
        <th>Image</th>
        <th>Brand</th>
        <th>Model</th>
        <th>Year</th>
        <th>Price/Day (DT)</th>
        <th>Availability</th>
        <th>Actions</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><img src="../<?= htmlspecialchars($row['image']) ?>" alt="car"></td>
            <td><?= htmlspecialchars($row['brand']) ?></td>
            <td><?= htmlspecialchars($row['model']) ?></td>
            <td><?= htmlspecialchars($row['year']) ?></td>
            <td>
                <form method="POST" action="manageCars.php" class="price-form">
                    <input type="hidden" name="car_id" value="<?= $row['id'] ?>">
                    <input type="number" name="new_price" value="<?= $row['price_per_day'] ?>" step="0.01">
                    <button type="submit" name="update_price" class="btn">Save</button>
                </form>
            </td>
            <td class="<?= $row['availability'] === 'Available' ? 'available' : 'unavailable' ?>">
                <?= htmlspecialchars($row['availability']) ?>
            </td>
            <td>
                <?php if ($row['availability'] === 'Available'): ?>
                    <a href="?id=<?= $row['id'] ?>&action=make_unavailable" class="btn btn-unavailable">Mark Unavailable</a>
                <?php else: ?>
                    <a href="?id=<?= $row['id'] ?>&action=make_available" class="btn btn-available">Mark Available</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endwhile; ?>

</table>

</body>
</html>

<?php $conn->close(); ?>
