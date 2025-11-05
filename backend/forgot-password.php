<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Forgot Password | CodeLab</title>
      <link rel="stylesheet" href="assets/css/styleLogIn.css">
   </head>

   <?php
 include("database.php");
 
 ?>
   <body class="login-page">
      <div class="wrapper">
         <div class="title">
            Forgot Password
         </div>
         <form action="process-forgot-password.php" method="POST">
            <div class="field">
               <input type="email" name="email" required>
               <label>Email Address</label>
            </div>
            <div class="field">
               <input type="submit" value="Send Reset Link">
            </div>
            <div class="signup-link">
               Back to <a href="login.php">Login</a>
            </div>
         </form>
      </div>
   </body>
</html>
