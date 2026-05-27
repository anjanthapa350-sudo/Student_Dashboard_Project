<?php
session_start();
include "db.php";

// Ensure uploads folder exists
if (!is_dir("uploads")) {
    mkdir("uploads", 0777, true);
}

// Check if user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION["user_id"];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"] ?? '';
    $email = $_POST["email"] ?? '';
    $phone = $_POST["phone"] ?? '';
    $course = $_POST["course"] ?? '';

    $photo_sql = "";
    $profile_photo = '';

    if (!empty($_FILES["photo"]["name"])) {
        $filename = basename($_FILES["photo"]["name"]);
        $safe_name = preg_replace("/[^A-Za-z0-9_.-]/", "_", $filename);
        $target_path = "uploads/" . $safe_name;

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_path)) {
            $profile_photo = $safe_name;
            $photo_sql = ", profilephoto=?";
        } else {
            $error = "❌ Error uploading profile photo.";
        }
    }

    $sql = "UPDATE info SET full_name=?, email=?, phone=?, course=? $photo_sql WHERE id=?";
    $stmt = $conn->prepare($sql);

    if ($photo_sql) {
        $stmt->bind_param("sssssi", $name, $email, $phone, $course, $profile_photo, $id);
    } else {
        $stmt->bind_param("ssssi", $name, $email, $phone, $course, $id);
    }

    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "❌ Failed to update: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch current user data
$result = $conn->query("SELECT * FROM info WHERE id=$id");
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Profile</title>
    <style>
        body {
            background: #121212;
            color: #eee;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }

        .container {
            background: #1e1e1e;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.4);
            max-width: 500px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #f0c330;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: none;
            background: #2c2c2c;
            color: #fff;
        }

        button {
            width: 100%;
            background: #4fc3f7;
            color: #121212;
            padding: 12px;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #03a9f4;
        }

        .error {
            color: #f44336;
            text-align: center;
        }

        .profile-img {
            display: block;
            margin: 0 auto 20px;
            border-radius: 50%;
            border: 2px solid #f0c330;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Update Your Profile</h2>

    <?php if (!empty($user['profilephoto'])): ?>
        <img src="uploads/<?php echo htmlspecialchars($user['profilephoto']); ?>" class="profile-img">
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="name" value="<?php echo htmlspecialchars($user['full_name']); ?>" placeholder="Full Name" required>
        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" placeholder="Email" required>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" placeholder="Phone" required>
        <input type="text" name="course" value="<?php echo htmlspecialchars($user['course']); ?>" placeholder="Course" required>
        <input type="file" name="photo" accept="image/*">
        <button type="submit">Update</button>
    </form>
</div>

</body>
</html>
