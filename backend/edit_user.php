<?php
include("database.php");

$id = $_GET['id'] ?? null;
if (!$id) {
    die("User ID not specified.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $courses = $_POST['courses'] ?? [];

    
    $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, role = ?, phone = ?, gender = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $username, $email, $role, $phone, $gender, $id);
    $stmt->execute();

    
    $conn->query("DELETE FROM user_Courses WHERE user_id = $id");
    foreach ($courses as $course_id) {
        $stmt = $conn->prepare("INSERT INTO user_Courses (user_id, course_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $id, $course_id);
        $stmt->execute();
    }

    header("Location: admin.php");
    exit();
}


$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

// Get only the courses this user manages
$userCoursesRes = $conn->query("SELECT c.id, c.name FROM courses c 
    INNER JOIN user_Courses uc ON c.id = uc.course_id 
    WHERE uc.user_id = $id");
$managedCourses = $userCoursesRes->fetch_all(MYSQLI_ASSOC);
$managedCourseIds = array_column($managedCourses, 'id');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #ece9e6, #ffffff);
            margin: 0;
            padding: 0;
        }

        .form-container {
            max-width: 650px;
            margin: 60px auto;
            background: #fff;
            padding: 40px 50px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            transition: box-shadow 0.3s ease;
        }

        .form-container:hover {
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #ff6f00;
            font-size: 2.4em;
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-top: 20px;
            font-weight: 600;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 12px 15px;
            margin-top: 8px;
            border-radius: 10px;
            border: 1px solid #ccc;
            background-color: #fafafa;
            transition: all 0.2s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        select:focus {
            outline: none;
            border-color: #ff6f00;
            background-color: #fff;
        }

        .checkbox-group {
            margin-top: 15px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .checkbox-group label {
            font-weight: 500;
            background-color: #f9f9f9;
            padding: 8px 12px;
            border-radius: 8px;
            transition: background-color 0.2s ease;
            cursor: pointer;
        }

        .checkbox-group label:hover {
            background-color: #f1f1f1;
        }

        input[type="checkbox"] {
            margin-right: 10px;
            transform: scale(1.2);
            accent-color: #ff6f00;
        }

        .form-actions {
            text-align: center;
            margin-top: 35px;
        }

        input[type="submit"] {
            background: linear-gradient(to right, #ff6f00, #ffa726);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background: linear-gradient(to right, #ff8f00, #fb8c00);
        }

        a.back-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: #ff6f00;
            text-decoration: none;
            font-weight: 500;
        }

        a.back-link:hover {
            text-decoration: underline;
        }
    </style>
    <!-- Optional: Add a Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
<div class="form-container">
    <h1>Edit User</h1>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>">

        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>">

        <label>Role:</label>
        <select name="role">
            <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
            <option value="administrator" <?= $user['role'] === 'administrator' ? 'selected' : '' ?>>Administrator</option>
        </select>

        <label>Phone:</label>
        <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>">

        <label>Gender:</label>
        <select name="gender">
            <option value="Male" <?= $user['gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
            <option value="Female" <?= $user['gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
            <option value="Other" <?= $user['gender'] === 'Other' ? 'selected' : '' ?>>Other</option>
        </select>

        <label>Courses this user manages:</label>
        <div class="checkbox-group">
            <?php foreach ($managedCourses as $course): ?>
                <label>
                    <input type="checkbox" name="courses[]" value="<?= $course['id'] ?>" checked>
                    <?= htmlspecialchars($course['name']) ?>
                </label>
            <?php endforeach; ?>
        </div>

        <div class="form-actions">
            <input type="submit" value="Save">
        </div>
    </form>
    <a class="back-link" href="admin.php">← Back to Admin Panel</a>
</div>
</body>
</html>
