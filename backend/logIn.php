<?php
session_start();
include("database.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION["logged_in"] = true;
            $_SESSION["id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["name"] = $user["name"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["role"] = $user["role"]; 

            if ($user["role"] === "administrator") {
                header("Location: admin.php");
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No user found with that email.";
    }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login </title>
    <link rel="stylesheet" href="assets/css/styleLogIn.css">
</head>
<body>
<div class="wrapper">
    <div class="title">Login </div>
    <?php if (!empty($error)): ?>
        <div style="color: red; text-align: center; margin-bottom: 10px;"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    <form method="post" action="">
        <div class="field">
            <input type="text" name="email" required>
            <label>Email Address</label>
        </div>
        <div class="field">
            <input type="password" name="password" required>
            <label>Password</label>
        </div>
        <div class="content">
            <div class="checkbox">
                <input type="checkbox" id="remember-me">
                <label for="remember-me">Remember me</label>
            </div>
            <div class="pass-link">
                <a href="forgot-password.php">Forgot password?</a>
            </div>
        </div>
        <div class="field">
            <input type="submit" value="Login">
        </div>
        <div class="signup-link">
            Not a member? <a href="register.php">Signup now</a>
        </div>
    </form>
</div>
</body>
</html>
