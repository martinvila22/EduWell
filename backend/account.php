
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>Account Dashboard</title>
  <link rel="stylesheet" href="assets/css/styleAccount.css">
</head>
<body>

<?php
 include("database.php");
 include("header.php");
 ?>
 
  <div class="wrapper">
    <div class="title">My Account</div>
    <div class="account-content">
      <p><strong>Name:</strong> <span id="client-name">John Doe</span></p>
      <p><strong>Email:</strong> <span id="client-email">john@example.com</span></p>
      <button onclick="editAccount()">Edit Account</button>
    </div>
    <div class="edit-form" style="display: none;">
      <form id="edit-form">
        <div class="field">
          <input type="text" id="edit-name" required>
          <label for="edit-name">Name</label>
        </div>
        <div class="field">
          <input type="email" id="edit-email" required>
          <label for="edit-email">Email</label>
        </div>
        <div class="field">
          <input type="submit" value="Save Changes">
        </div>
      </form>
    </div>
  </div>

  <script src="assets/js/account.js"></script>
</body>
</html>
