<?php
// This page is shown when login credentials are invalid or account doesn't exist
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Not Found</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: #f3f4f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .container h1 {
            color: #dc2626;
            font-size: 28px;
            margin-bottom: 16px;
        }

        .container p {
            color: #6b7280;
            margin-bottom: 24px;
        }

        .container a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3b82f6;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .container a:hover {
            background-color: #2563eb;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Account Not Found</h1>
    <p>The account you entered does not exist. Please check your details or sign up if you’re new.</p>
    <a href="login.php">Try Again</a> |
    <a href="inscription.php">Create Account</a>
</div>

</body>
</html>
