<?php
session_start();

// ✅ Define your Google reCAPTCHA secret key
$secretKey = "6LenrksrAAAAAH2TvbkIX9UVCFKuBACf2F8Z_aQ5";

// Verify CAPTCHA
$captcha = $_POST['g-recaptcha-response'];

if (empty($captcha)) {
    echo "❌ Please complete the CAPTCHA.";
    exit();
}

// Validate CAPTCHA with Google
$verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha");
$responseData = json_decode($verifyResponse);

if (!$responseData->success) {
    echo "❌ CAPTCHA verification failed.";
    exit();
}

// Database connection
$host = "localhost";
$user = "root"; // Change if needed
$pass = "";     // Change if needed
$db = "quickride";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// Basic check
if (empty($email) || empty($password)) {
    echo "❌ Please enter both email and password.";
    exit();
}

// Prepare and execute query
//Check if email exists in database
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
// If we found one user
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verify password
    if (password_verify($password, $user['password'])) {
        // ✅ Success: Set session data
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        // 🔁 Redirect based on role
        if ($user['role'] === 'admin') {
            header("Location: /QuickRide/admin/adminDashboard.php");
        } else {
            header("Location: /QuickRide/client/indexClient.php");
        }
        exit();
    } else {
        // ❌ Wrong password
        header("Location: account_not_found.php");
        exit();
    }
} else {
    // ❌ No user found
    header("Location: account_not_found.php");
    exit();
}

$stmt->close();
$conn->close();
?>
