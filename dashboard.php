<?php
session_start();
include "db.php";

// ✅ Redirect to login if not logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// ✅ Fetch user info
$id = $_SESSION["user_id"];
$sql = "SELECT * FROM info WHERE id=$id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard - Student Portal</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #121212;
      color: #eee;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    header {
      background: #1f1f1f;
      padding: 20px 40px;
      box-shadow: 0 2px 10px rgba(255, 255, 255, 0.1);
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

    nav a:hover {
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

    nav a:hover::after {
      width: 100%;
    }

    main {
      flex-grow: 1;
      max-width: 900px;
      margin: 60px auto;
      padding: 20px;
    }

    .card {
      background: #1e1e1e;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.3);
      margin-bottom: 30px;
    }

    .card h2 {
      color: #f0c330;
      margin-bottom: 10px;
    }

    .card p {
      color: #ccc;
      font-size: 16px;
      line-height: 1.6;
    }

    img.profile-pic {
      width: 150px;
      height: auto;
      border-radius: 8px;
      margin-bottom: 15px;
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
    <a href="homepage.php">Home</a>
    <a href="logout.php">Logout</a>
    <a href="dashboard.php">Dashboard</a>
  </nav>
</header>

<main>
  <div class="card">
    <h2>👋 Welcome, <?php echo htmlspecialchars($user['full_name']); ?>!</h2>
    <?php if (!empty($user['profile_photo'])): ?>
      <img src="uploads/<?php echo htmlspecialchars($user['profile_photo']); ?>" class="profile-pic" alt="Profile Photo">
    <?php endif; ?>
    <p>This is your dashboard. Here you can manage your profile, view your enrolled courses, and track your academic progress.</p>
  </div>

  <div class="card">
    <h2>📚 Enrolled Course</h2>
    <p>
      Course Name: <strong><?php echo htmlspecialchars($user['course']); ?></strong><br>
      Duration: <strong>6 Months</strong><br>
      Instructor: <strong>Prof. Anjan Thapa</strong>
    </p>
  </div>

  <div class="card">
    <h2>📄 Your Profile Info</h2>
    <p>
      Full Name: <strong><?php echo htmlspecialchars($user['full_name']); ?></strong><br>
      Email: <strong><?php echo htmlspecialchars($user['email']); ?></strong><br>
      Phone: <strong><?php echo htmlspecialchars($user['phone']); ?></strong><br>
    </p>
    <p><a href="update.php" style="color:#f0c330;">Update Profile</a></p>
  </div>
</main>

<footer>
  <p>🚀 &copy; 2025 ANJAN THAPA | All rights reserved | IIMS UniversityStudent Dashboard © <?php echo date("Y"); ?></p>
</footer>

</body>
</html>
