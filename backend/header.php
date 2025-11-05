<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header class="header-area header-sticky">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="main-nav">
          
          <a href="index.php" class="logo">
            <img src="assets/images/templatemo-eduwell.png" alt="EduWell Template">
          </a>
         
          <ul class="nav">
            <li><a href="index.php">Home</a></li>
            <li class="scroll-to-section"><a href="index.php#services">Services</a></li>
            <li class="scroll-to-section"><a href="index.php#courses">Courses</a></li>
            <li class="has-sub">
              <a href="javascript:void(0)">Actions</a>
              <ul class="sub-menu">
                <li><a href="create.php">Create course</a></li>
                <li><a href="see-course.php">See course</a></li>
                <li><a href="see-course.php">Update Course</a></li>
                <li><a href="see-course.php">Delete Course</a></li>
              </ul>
            </li>
            <li><a href="about-us.php">About Us</a></li>
            <li ><a href="contact-us.php">Contact Us</a></li>

            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
              <li class="has-sub">
                <a href="javascript:void(0)">👤 <?php echo htmlspecialchars($_SESSION['name']); ?></a>
                <ul class="sub-menu">
                  <li><a href="profile.php">Profile</a></li>
                  <li><a href="logout.php">Logout</a></li>
                </ul>
              </li>
            <?php else: ?>
              <li class="has-sub">
                <a href="javascript:void(0)">LogIn</a>
                <ul class="sub-menu">
                  <li><a href="LogIn.php">Log In</a></li>
                  <li><a href="register.php">Register</a></li>
                </ul>
              </li>
            <?php endif; ?>
          </ul>
          <a class='menu-trigger'>
            <span>Menu</span>
          </a>
          <!-- ***** Menu End ***** -->
        </nav>
      </div>
    </div>
  </div>
</header>
