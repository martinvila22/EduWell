<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: LogIn.php");
    exit();
}

include("database.php");
include("header.php");

$username = $_SESSION['username'];
$message = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    $query = "SELECT password FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();
    $stmt->close();

    if (!password_verify($currentPassword, $hashedPassword)) {
        $message = "Current password is incorrect.";
    } elseif ($newPassword !== $confirmPassword) {
        $message = "New passwords do not match.";
    } elseif (strlen($newPassword) < 6) {
        $message = "New password must be at least 6 characters long.";
    } else {
        $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $updateQuery = "UPDATE users SET password = ? WHERE username = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("ss", $newHashedPassword, $username);
        if ($updateStmt->execute()) {
            $message = "Password updated successfully.";
        } else {
            $message = "Error updating password.";
        }
        $updateStmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Change Password - Edutopia</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-eduwell-style.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/lightbox.css">
</head>
<body>


<section class="services" id="change-password">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-heading text-center">
          <h6>Account Settings</h6>
          <h4><em>Change</em> Password</h4>
          <p>Securely update your account password below.</p>
        </div>

        <div class="service-item text-center p-5 mb-5 shadow rounded" style="background-color: #f9f9f9;">
          <?php if ($message): ?>
            <div class="alert alert-info"><?php echo htmlspecialchars($message); ?></div>
          <?php endif; ?>

          <form method="post" action="">
            <div class="mb-3 text-start">
              <label for="current_password" class="form-label">Current Password</label>
              <input type="password" name="current_password" id="current_password" class="form-control" required>
            </div>

            <div class="mb-3 text-start">
              <label for="new_password" class="form-label">New Password</label>
              <input type="password" name="new_password" id="new_password" class="form-control" required>
            </div>

            <div class="mb-4 text-start">
              <label for="confirm_password" class="form-label">Confirm New Password</label>
              <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
            </div>

            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary">Update Password</button>
              <a href="profile.php" class="btn btn-outline-secondary">Cancel</a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</section>

</body>
</html>
