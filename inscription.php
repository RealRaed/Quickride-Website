<?php
$message = "";

// Enable exceptions for mysqli
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "quickride";

    try {
        $conn = new mysqli($host, $user, $pass, $db);
        $conn->set_charset("utf8mb4");

        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();

        $message = "✅ Account created successfully!";
        $stmt->close();
        $conn->close();
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() === 1062) {
            $message = "❌ This email is already registered. Try logging in.";
        } else {
            $message = "❌ Database error: " . $e->getMessage();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>QuickRide - Sign Up</title>
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #121212;
      color: #fff;
    }
    .navbar {
      background: #000;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 40px;
    }
    .navbar a {
      color: white;
      text-decoration: none;
      margin: 0 15px;
      font-size: 14px;
    }
    .navbar a:hover {
      color: #00ff88;
    }
    .brand {
      font-weight: bold;
      font-size: 24px;
      color: white;
    }
    .brand span {
      color: #00ff88;
    }
    .form-container {
      max-width: 450px;
      margin: 80px auto;
      background: #1e1e1e;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0, 255, 136, 0.2);
    }
    .form-container h2 {
      margin-bottom: 30px;
      font-size: 26px;
      text-align: center;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
    }
    .form-group input {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      background: #2a2a2a;
      color: white;
    }
    .form-group input:focus {
      outline: none;
      background: #333;
    }
    .submit-btn {
      width: 100%;
      padding: 12px;
      background-color: #00ff88;
      color: #000;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s;
    }
    .submit-btn:hover {
      background-color: #00cc6e;
    }
    .footer {
      text-align: center;
      margin-top: 60px;
      font-size: 14px;
      color: #aaa;
    }
    .message {
      text-align: center;
      margin-top: 20px;
      font-weight: bold;
      color: #00ff88;
    }
  </style>
</head>
<body>

  <div class="navbar">
    <div class="brand">QUICK<span>RIDE</span></div>
    <div>
      <a href="index.php">Home</a>
      <a href="services.php">Services</a>
      <a href="car.php">Cars</a>
      <a href="contact.php">Contact</a>
      <a href="login.php">Login</a>
    </div>
  </div>

  <div class="form-container">
    <h2>Create Your Account</h2>
    <form method="POST" action="">
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required />
      </div>
      <div class="form-group">
        <label for="password">Create Password</label>
        <input type="password" id="password" name="password" required />
      </div>
      <button type="submit" class="submit-btn">Sign Up</button>
    </form>

    <?php if (!empty($message)): ?>
      <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>
  </div>

  <div class="footer">
    &copy; 2025 QuickRide. All rights reserved.
  </div>

</body>
</html>
