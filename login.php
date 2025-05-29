
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login – QuickRide</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css"> <!-- Link to the CSS below -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-container {
      text-align: center;
      max-width: 350px;
      width: 100%;
    }

    .login-container img {
      width: 100px;
      border-radius: 50%;
      margin: 20px 0;
    }

    .login-container h2 {
      font-weight: 600;
      margin-bottom: 10px;
    }

    .form-group {
      margin: 20px 0;
      text-align: left;
    }

    .form-group label {
      font-size: 0.9rem;
      color: #888;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      font-size: 1rem;
      border: none;
      border-bottom: 2px solid #ccc;
      outline: none;
      transition: border-color 0.3s;
    }

    .form-group input:focus {
      border-color: #27ae60;
    }

    .login-btn {
      background: #27ae60;
      color: #fff;
      padding: 12px 20px;
      font-size: 1rem;
      border: none;
      border-radius: 30px;
      width: 100%;
      margin-top: 10px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      cursor: pointer;
      transition: background 0.3s;
    }

    .login-btn:hover {
      background: #219150;
    }

    .helper-links {
      margin-top: 20px;
      font-size: 0.85rem;
      color: #777;
    }

    .helper-links a {
      color: #27ae60;
      text-decoration: none;
      font-weight: 500;
    }

    .helper-links a:hover {
      text-decoration: underline;
    }

    .home-btn {
      display: inline-block;
      margin-bottom: 20px;
      padding: 10px 18px;
      background: #27ae60;
      color: #fff;
      text-decoration: none;
      border-radius: 30px;
      font-size: 0.95rem;
      transition: background 0.3s;
      box-shadow: 0 6px 14px rgba(0, 0, 0, 0.1);
    }

    .home-btn:hover {
      background: #219150;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <a href="index.php" class="home-btn">← Back to Home</a>
    <h2>Welcome</h2>
    <form action="auth.php" method="POST">
      <div class="form-group">
        <label for="email">Username</label>
        <input type="email" name="email" id="email" placeholder="raedboukadida@gmail.com" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password" required>
      </div>
       <div class="g-recaptcha" data-sitekey="6LenrksrAAAAAJO1esjoAoNwrpJCZohwgi8ylk-r"></div>
      <button type="submit" class="login-btn">LOGIN</button>
    </form>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <div class="helper-links">
      <p>Don't have an account? <a href="inscription.php">Sign up</a></p>
    </div>
  </div>
</body>
</html>
