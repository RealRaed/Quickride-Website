<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // No password by default
$dbname = 'quickride';

// Create connection
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// echo "Connected successfully"; // Optional
?>
