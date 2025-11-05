<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Registration Form | CodingLab</title>
  <link rel="stylesheet" href="assets/css/styleRegister.css">
</head>
<body>

<?php
include("database.php");
session_start();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['name'] ?? '');
  $surname = htmlspecialchars($_POST['surname'] ?? '');
  $username = htmlspecialchars($_POST['username'] ?? '');
  $email = htmlspecialchars($_POST['email'] ?? '');
  $phone = htmlspecialchars($_POST['phone'] ?? '');
  $password = $_POST['password'] ?? '';
  $password2 = $_POST['password2'] ?? '';
  $gender = htmlspecialchars($_POST['gender'] ?? '');
  $role=htmlspecialchars("user");

  if ($password !== $password2) {
    $message = '<div style="color: red; font-weight: bold; background-color: #ffe5e5; padding: 10px; border-radius: 5px; border: 1px solid #ff4d4d;">
       Oops! Your passwords don’t match. Please try again. 
    </div>';
  } else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
      $stmt = $conn->prepare("INSERT INTO users (name, surname, username, email, phone, password, gender,role) VALUES (?, ?, ?, ?, ?, ?, ?,?)");
$stmt->bind_param("ssssssss", $name, $surname, $username, $email, $phone, $hashed_password, $gender,$role);
      $stmt->execute();
      $_SESSION['id'] = $conn->insert_id;
      $_SESSION['username'] = $username;
      $_SESSION['email'] = $email;
      $_SESSION['name'] = $name; 
      $_SESSION['logged_in'] = true;

      $message = '<div style="color: green; font-weight: bold; background-color: #e5ffe5; padding: 10px; border-radius: 5px; border: 1px solid #4dff4d; text-align: center; margin-top: 10px;">
         ✅ Passwords match! Registration successful. Redirecting...
      </div>';
      echo $message;
      header("Refresh: 2; URL=index.php");
      exit();
    } catch (mysqli_sql_exception $e) {
      $message = '<div style="color: red; font-weight: bold;">❌ Database error: ' . $e->getMessage() . '</div>';
    }
  }
}
?>


<div class="container">
  <div class="title">Registration</div>
  <div class="content">
    <form action="" method="POST">
      <div class="user-details">
        <div class="input-box">
          <span class="details">Name</span>
          <input type="text" name="name" placeholder="Enter your name" required>
        </div>
        <div class="input-box">
          <span class="details">Surname</span>
          <input type="text" name="surname" placeholder="Enter your surname" required>
        </div>
        <div class="input-box">
          <span class="details">Username</span>
          <input type="text" name="username" placeholder="Enter your username" required>
        </div>
        <div class="input-box">
          <span class="details">Email</span>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="input-box">
          <span class="details">Phone Number</span>
          <input type="text" name="phone" placeholder="Enter your number" required>
        </div>
        <div class="input-box">
          <span class="details">Password</span>
          <input type="password" name="password" placeholder="Enter your password" required>
        </div>
        <div class="input-box">
          <span class="details">Confirm Password</span>
          <input type="password" name="password2" placeholder="Confirm your password" required>
        </div>
      </div>
      <div class="gender-details">
        <input type="radio" name="gender" id="dot-1" value="Male">
        <input type="radio" name="gender" id="dot-2" value="Female">
        <input type="radio" name="gender" id="dot-3" value="Prefer not to say">
        <span class="gender-title">Gender</span>
        <div class="category">
          <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
          </label>
        </div>
      </div>
      <div class="button">
        <input type="submit" value="Register">
      </div>
    </form>

    <!-- Display message here -->
    <?php echo $message; ?>
  </div>
</div>

</body>
</html>
