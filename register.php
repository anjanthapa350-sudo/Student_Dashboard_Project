<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | Studentdata</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --primary-color: #1f1f1f;
            --accent-color: #f0c330;
            --bg-color: #121212;
            --text-color: #eee;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: var(--bg-color);
            color: var(--text-color);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background: var(--primary-color);
            padding: 20px 40px;
            box-shadow: 0 2px 10px rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--accent-color);
        }

        nav a {
            color: #ccc;
            text-decoration: none;
            margin-left: 25px;
            font-weight: 500;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: var(--accent-color);
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .form-card {
            background: #1e1e1e;
            padding: 30px;
            border-radius: 16px;
            width: 100%;
            max-width: 480px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
        }

        .form-card h2 {
            color: var(--accent-color);
            margin-bottom: 20px;
            text-align: center;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: none;
            border-radius: 8px;
            background: #2c2c2c;
            color: #fff;
        }

        button {
            width: 100%;
            padding: 12px;
            background: var(--accent-color);
            color: #1f1f1f;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background: #e6b800;
        }

        footer {
            background: var(--primary-color);
            color: #777;
            text-align: center;
            padding: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">🎓 Studentdata</div>
    <nav>
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>
        <a href="dashboard.php">Dashboard</a>
    </nav>
</header>

<main>
    <div class="form-card">
        <h2>Register New Student</h2>
        <form method="POST" action="register_process.php" enctype="multipart/form-data">
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <input type="text" name="course" placeholder="Course" required>
            <input type="file" name="profile_photo" accept="image/*">
            <button type="submit">Register</button>
        </form>
    </div>
</main>

<footer>
    &copy; 2025 ANJAN THAPA | All rights reserved | IIMS University<?php echo date("Y"); ?> Studentdata Portal
</footer>

</body>
</html>
