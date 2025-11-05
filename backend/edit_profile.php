<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: LogIn.php");
    exit();
}

include("database.php");
include("header.php");

$username = $_SESSION['username'];


$update_success = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    $query = "UPDATE users SET name = ?, surname = ?, email = ?, phone = ? WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $name, $surname, $email, $phone, $username);

    if ($stmt->execute()) {
        $update_success = true;
    } else {
        $update_success = false;
    }

    $stmt->close();
}


$query = "SELECT name, surname, email, phone FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($name, $surname, $email, $phone);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Edit Profile - Edutopia</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-eduwell-style.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/lightbox.css">
</head>

<body>

<section class="main-banner" id="top">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 align-self-center">
        <div class="header-text">
          <h6>Edit Your Profile</h6>
          <h2><em>Update</em> Your Information</h2>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="right-image">
          <img src="assets/images/banner-right-image.png" alt="">
        </div>
      </div>
    </div>
  </div>
</section>

<section class="services" id="profile-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-heading text-center">
          <h6>Profile Editor</h6>
          <h4><em>Update</em> Your Details</h4>
          <p>Use the form below to update your account information.</p>
        </div>

        <?php if ($update_success === true): ?>
          <div class="alert alert-success text-center">Profile updated successfully!</div>
        <?php elseif ($update_success === false): ?>
          <div class="alert alert-danger text-center">There was an error updating your profile. Please try again.</div>
        <?php endif; ?>

        <div class="service-item p-5 mb-5 shadow rounded" style="background-color: #f9f9f9;">
          <form method="post" action="">
            <div class="form-group mb-3">
              <label for="name"><strong>Name</strong></label>
              <input type="text" class="form-control" id="name" name="name" required value="<?php echo htmlspecialchars($name); ?>">
            </div>

            <div class="form-group mb-3">
              <label for="surname"><strong>Surname</strong></label>
              <input type="text" class="form-control" id="surname" name="surname" required value="<?php echo htmlspecialchars($surname); ?>">
            </div>

            <div class="form-group mb-3">
              <label for="email"><strong>Email</strong></label>
              <input type="email" class="form-control" id="email" name="email" required value="<?php echo htmlspecialchars($email); ?>">
            </div>

            <div class="form-group mb-4">
              <label for="phone"><strong>Phone</strong></label>
              <input type="text" class="form-control" id="phone" name="phone" required value="<?php echo htmlspecialchars($phone); ?>">
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary">Update Profile</button>
              <a href="profile.php" class="btn btn-secondary">Cancel</a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</section>

</body>
</html>
