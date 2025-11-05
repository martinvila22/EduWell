<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: LogIn.php");
    exit();
}

include("database.php");
include("header.php");

// Fetch user info from database
$username = $_SESSION['username'];
$query = "SELECT name, surname, email, phone FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($name, $surname, $email, $phone);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="User Profile">
  <meta name="author" content="Edutopia">
  <title>Profile - Edutopia</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-eduwell-style.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/lightbox.css">
</head>

<body>

  <!-- ***** Banner Start ***** -->
  <section class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="header-text">
            <h6>Hello, <?php echo htmlspecialchars($name); ?>!</h6>
            <h2>This is your <em>Profile</em> page</h2>
            <div class="main-button-gradient">
              <div class="scroll-to-section"><a href="#profile-section">View Details</a></div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-image">
            <img src="assets/images/profile.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Banner End ***** -->

  <!-- ***** Profile Section Start ***** -->
  <section class="services" id="profile-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="section-heading text-center">
            <h6>Your Profile Information</h6>
            <h4><em>Account</em> Details</h4>
            <p>Below is your personal information pulled from your account record.</p>
          </div>

          <div class="service-item text-center p-5 mb-5 shadow-lg rounded-4 border border-light-subtle" style="background: linear-gradient(135deg, #ffffff, #f4f4f4);">
  <h4 class="mb-4 text-primary fw-bold">👤 Profile Details</h4>

  <p class="mb-2"><strong class="text-secondary">Name:</strong> <?php echo htmlspecialchars($name); ?></p>
  <p class="mb-2"><strong class="text-secondary">Surname:</strong> <?php echo htmlspecialchars($surname); ?></p>
  <p class="mb-2"><strong class="text-secondary">Email:</strong> <?php echo htmlspecialchars($email); ?></p>
  <p class="mb-4"><strong class="text-secondary">Phone:</strong> <?php echo htmlspecialchars($phone); ?></p>

  <div class="text-button mt-4">
    <a href="edit_profile.php" class="btn btn-outline-success px-4 py-2 rounded-pill shadow-sm fw-semibold">
      ✏️ Edit Profile
    </a>
  </div>
</div>

<div class="text-center">
  <a href="change-password.php" class="btn btn-outline-primary me-3 px-4 py-2 rounded-pill shadow-sm">
    🔒 Change Password
  </a>
  <a href="logout.php" class="btn btn-outline-danger px-4 py-2 rounded-pill shadow-sm">
    🚪 Logout
  </a>
</div>


        </div>
      </div>
    </div>
  </section>
  <!-- ***** Profile Section End ***** -->

</body>
</html>
