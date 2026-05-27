<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Studentdata</title>
<style>
  * {
    box-sizing: border-box;
  }
  body {
    margin: 0;
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    background: #121212;
    color: #eee;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }

  header {
    background: #1f1f1f;
    padding: 20px 40px;
    box-shadow: 0 2px 10px rgba(255 255 255 / 0.1);
  }

  nav {
    display: flex;
    justify-content: flex-end; 
    gap: 50px;
    font-weight: 600;
  }

  nav a {
    color: #aaa;
    text-decoration: none;
    font-size: 18px;
    position: relative;
    padding-bottom: 4px;
    transition: color 0.3s ease;
  }

  nav a:hover,
  nav a:focus {
    color: #f0c330;
  }

  nav a::after {
    content: '';
    position: absolute;
    width: 0%;
    height: 2px;
    background: #f0c330;
    left: 0;
    bottom: 0;
    transition: width 0.3s ease;
  }

  nav a:hover::after,
  nav a:focus::after {
    width: 100%;
  }

  main {
    flex-grow: 1;
    max-width: 720px;
    margin: 80px auto;
    padding: 0 20px;
    text-align: center;
  }

  main h1 {
    font-size: 3rem;
    margin-bottom: 1rem;
    color: #f0c330;
  }

  main p {
    font-size: 1.25rem;
    line-height: 1.6;
    color: #ccc;
    max-width: 600px;
    margin: 0 auto;
  }

  footer {
    background: #1f1f1f;
    color: #777;
    text-align: center;
    padding: 20px 10px;
    font-size: 14px;
    border-top: 1px solid #333;
  }
</style>
</head>
<body>

<header>
  <nav>
    <a href="home.php">Home</a>
    <a href="register.php">Register</a>
    <a href="login.php">Login</a>
    <a href="dashboard.php">Dashboard</a>
  </nav>
</header>

<main>
  <h1>Welcome to the Student Gateway</h1>
  <p>Manage your academic records, update your profile, and stay connected with your course progress — all in one place.</p>
</main>

<footer>
  <p>🚀 Trusted by students</p>
</footer>

</body>
</html>
