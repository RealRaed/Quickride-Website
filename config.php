<?php
$host = "localhost";
$user = "root";
$pass = ""; // Use your password if you have one
$db   = "quickride"; 

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
