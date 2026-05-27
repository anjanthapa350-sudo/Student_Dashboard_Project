<?php
$conn = new mysqli("localhost", "root", "", "studentdata");

$success = false;
$error = "";

// DB Connection check
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Registration Logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);
    $phone = $_POST['phone'] ?? '';
    $course = $_POST['course'] ?? '';

    $upload_dir = "upload/";
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $profilephoto = '';
    if (!empty($_FILES['profile_photo']['name'])) {
        $photo_name = preg_replace("/[^A-Za-z0-9_\-\.]/", "_", basename($_FILES['profile_photo']['name']));
        $target_path = $upload_dir . $photo_name;

        if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $target_path)) {
            $profilephoto = $photo_name;
        } else {
            $error = "❌ Error uploading file.";
        }
    }

    if (empty($error)) {
        $stmt = $conn->prepare("INSERT INTO info (full_name, email, password, phone, course, profilephoto) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $full_name, $email, $password, $phone, $course, $profilephoto);
        if ($stmt->execute()) {
            $success = true;
        } else {
            $error = "❌ Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration Status</title>
  <style>
    body {
      margin: 0;
      background: #121212;
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: #eee;
    }

    .card {
      background: #1f1f1f;
      padding: 40px;
      border-radius: 12px;
      text-align: center;
      max-width: 500px;
      width: 90%;
      box-shadow: 0 0 15px rgba(0,0,0,0.3);
    }

    h2 {
      color: #4fc3f7;
      margin-bottom: 20px;
    }

    .message {
      font-size: 1.1rem;
      margin-bottom: 25px;
    }

    .success {
      color: #4caf50;
    }

    .error {
      color: #f44336;
    }

    .btn {
      display: inline-block;
      background: #4fc3f7;
      color: #121212;
      padding: 12px 24px;
      text-decoration: none;
      font-weight: bold;
      border-radius: 6px;
      transition: background 0.3s ease;
    }

    .btn:hover {
      background: #03a9f4;
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>🎓 Student Portal</h2>

    <?php if ($success): ?>
      <p class="message success">✅ Registration successful!</p>
      <a class="btn" href="login.php">Go to Login</a>
    <?php else: ?>
      <p class="message error"><?php echo $error ?: "⚠️ Registration failed."; ?></p>
      <a class="btn" href="register.php">Try Again</a>
    <?php endif; ?>
  </div>
</body>
</html>
