<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Student Gateway</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #121212;
      color: #eee;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .login-box {
      background: #1f1f1f;
      padding: 40px;
      border-radius: 12px;
      width: 100%;
      max-width: 400px;
    }
    h2 {
      color: #f0c330;
      text-align: center;
      margin-bottom: 20px;
    }
    input[type="email"],
    input[type="password"],
    input[type="submit"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border: none;
      border-radius: 6px;
    }
    input[type="email"], input[type="password"] {
      background: #2c2c2c;
      color: #fff;
    }
    input[type="submit"] {
      background-color: #f0c330;
      font-weight: bold;
      color: #1f1f1f;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Login to Student Gateway</h2>
    <form action="loginprocess.php" method="POST">
      <input type="email" name="email" placeholder="Enter your email" required>
      <input type="password" name="password" placeholder="Enter your password" required>
      <input type="submit" value="Login">
    </form>
  </div>
</body>
</html>
