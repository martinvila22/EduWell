<?php
include("database.php");
include('header.php');

$user_id = $_SESSION['id'];


$query = "
    SELECT c.id, c.name, c.description, c.lecturer_name, c.lecturer_email, c.state
    FROM courses c 
    JOIN user_courses uc ON c.id = uc.course_id 
    WHERE uc.user_id = '$user_id'"; 

$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0):
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Available Courses">
  <meta name="author" content="Edutopia">
  <title>Your Courses - Edutopia</title>
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
          <h6>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h6>
          <h2>Explore Your <em>Courses</em></h2>
          <div class="main-button-gradient">
            <div class="scroll-to-section"><a href="#course-section">View Your Courses</a></div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="right-image">
          <img src="assets/images/studying students.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ***** Banner End ***** -->

<!-- ***** Course Section Start ***** -->
<section class="services" id="course-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="section-heading text-center">
          <h6>Your Courses</h6>
          <h4><em>Available</em> Courses</h4>
          <p>Browse through the courses you're enrolled in.</p>
        </div>

       
        <?php while ($course = mysqli_fetch_assoc($result)): ?>
  <div class="service-item text-center p-5 mb-5 rounded-4 shadow-lg border border-light-subtle" style="background: linear-gradient(135deg, #ffffff, #f1f1f1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
    <h4 class="mb-3 text-primary fw-bold">
      Name: <?php echo htmlspecialchars($course['name']); ?>
    </h4>
    <p class="mb-1 text-secondary">
      <strong>Lecturer Name:</strong> <?php echo htmlspecialchars($course['lecturer_name']); ?>
    </p>
    <p class="mb-1 text-secondary">
      <strong>Lecturer Email:</strong> <?php echo htmlspecialchars($course['lecturer_email']); ?>
    </p>
    <p class="mb-1 text-secondary">
      <strong>State of Operation:</strong> <?php echo htmlspecialchars($course['state']); ?>
    </p>
    <p class="mb-3 text-muted">
      <?php echo htmlspecialchars($course['description']); ?>
    </p>
    <div class="text-button mt-4">
      <a href="modify-course.php?id=<?php echo $course['id']; ?>" class="btn btn-outline-primary px-4 py-2 rounded-pill shadow-sm fw-semibold">
        ✏️ Modify Course
      </a>
    </div>
  </div>
<?php endwhile; ?>


      </div>
    </div>
  </div>
</section>


</body>
</html>
<?php
else:
  echo "<p>You are not enrolled in any courses.</p>";
endif;
?>

<?php

mysqli_close($conn);
?>
