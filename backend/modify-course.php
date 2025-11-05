<?php
session_start();
include("database.php");
include("header.php");

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$course_id = $_GET['id'] ?? null;

if (!$course_id) {
    echo "Invalid course ID.";
    exit();
}

// Handle course update
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update'])) {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $lecturer_name = $_POST['lecturer_name'] ?? '';
    $state = $_POST['state'] ?? '';
    $lecturer_email = $_POST['lecturer_email'] ?? '';

    $stmt = $conn->prepare("UPDATE courses SET name = ?, description = ?, lecturer_name = ?, state = ?, lecturer_email = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $name, $description, $lecturer_name, $state, $lecturer_email, $course_id);

    if ($stmt->execute()) {
        echo "<script>alert('Course updated successfully!'); window.location.href='see-course.php';</script>";
        exit();
    } else {
        echo "Update failed: " . $conn->error;
    }
}

// Handle course deletion
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete'])) {
    $stmt1 = $conn->prepare("DELETE FROM user_courses WHERE course_id = ?");
    $stmt1->bind_param("i", $course_id);
    $stmt1->execute();

    $stmt2 = $conn->prepare("DELETE FROM courses WHERE id = ?");
    $stmt2->bind_param("i", $course_id);

    if ($stmt2->execute()) {
        echo "<script>alert('Course deleted successfully!'); window.location.href='see-course.php';</script>";
        exit();
    } else {
        echo "Delete failed: " . $conn->error;
    }
}

// Fetch course data
$stmt = $conn->prepare("SELECT * FROM courses WHERE id = ?");
$stmt->bind_param("i", $course_id);
$stmt->execute();
$result = $stmt->get_result();
$course = $result->fetch_assoc();

if (!$course) {
    echo "Course not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Course - Edutopia</title>
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-eduwell-style.css">
</head>

<body>

<!-- ***** Banner Start ***** -->
<section class="main-banner" id="top">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 align-self-center">
        <div class="header-text">
          <h6>Course Management</h6>
          <h2>Edit or <em>Delete</em> a Course</h2>
          <div class="main-button-gradient">
            <div class="scroll-to-section"><a href="#edit-course">Edit Now</a></div>
          </div>
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
<!-- ***** Banner End ***** -->

<!-- ***** Edit Section Start ***** -->
<section class="services" id="edit-course">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-heading text-center">
          <h6>Course Information</h6>
          <h4>Update or <em>Remove</em> Course</h4>
          <p>Make changes to course details or remove it entirely from the system.</p>
        </div>

       <div class="service-item p-5 shadow-lg rounded-4 mb-5 border border-light-subtle" style="background: linear-gradient(145deg, #ffffff, #f4f4f4);">
  <form method="post">
    <div class="mb-4">
      <label for="course_name" class="form-label fw-semibold text-primary">Course Name</label>
      <input type="text" name="name" id="course_name" class="form-control form-control-lg border-primary-subtle shadow-sm" required value="<?php echo htmlspecialchars($course['name']); ?>">
    </div>

    <div class="mb-4">
      <label for="description" class="form-label fw-semibold text-primary">Description</label>
      <textarea name="description" id="description" class="form-control form-control-lg border-primary-subtle shadow-sm" rows="4" required><?php echo htmlspecialchars($course['description']); ?></textarea>
    </div>

    <div class="mb-4">
      <label for="lecturer_name" class="form-label fw-semibold text-primary">Lecturer Name</label>
      <input type="text" name="lecturer_name" id="lecturer_name" class="form-control form-control-lg border-primary-subtle shadow-sm" required value="<?php echo htmlspecialchars($course['lecturer_name']); ?>">
    </div>

    <div class="mb-4">
      <label for="lecturer_email" class="form-label fw-semibold text-primary">Lecturer Email</label>
      <input type="email" name="lecturer_email" id="lecturer_email" class="form-control form-control-lg border-primary-subtle shadow-sm" required value="<?php echo htmlspecialchars($course['lecturer_email']); ?>">
    </div>

    <div class="mb-4">
      <label for="state" class="form-label fw-semibold text-primary">State</label>
      <select name="state" id="state" class="form-select form-select-lg border-primary-subtle shadow-sm" required>
        <?php
        $states = ["Lazarat","Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica",
        "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas",
        "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan",
        "Bolivia, Plurinational State of", "Bonaire, Sint Eustatius and Saba", "Bosnia and Herzegovina", "Botswana",
        "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso",
        "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Cayman Islands", "Central African Republic",
        "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo",
        "Congo, The Democratic Republic of the", "Cook Islands", "Costa Rica", "Croatia", "Cuba", "Curaçao", "Cyprus",
        "Czechia", "Côte d'Ivoire", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt",
        "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Falkland Islands (Malvinas)",
        "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Southern Territories",
        "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe",
        "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-Bissau", "Guyana", "Haiti",
        "Heard Island and McDonald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary",
        "Iceland", "India", "Indonesia", "Iran, Islamic Republic of", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy",
        "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati",
        "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan",
        "Lao People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein",
        "Lithuania", "Luxembourg", "Macao", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta",
        "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico",
        "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montenegro", "Montserrat",
        "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Caledonia", "New Zealand",
        "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "North Macedonia", "Northern Mariana Islands",
        "Norway", "Oman", "Pakistan", "Palau", "Palestine, State of", "Panama", "Papua New Guinea", "Paraguay", "Peru",
        "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Romania", "Russian Federation",
        "Rwanda", "Réunion", "Saint Barthélemy", "Saint Helena, Ascension and Tristan da Cunha",
        "Saint Kitts and Nevis", "Saint Lucia", "Saint Martin (French part)", "Saint Pierre and Miquelon",
        "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal",
        "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Sint Maarten (Dutch part)", "Slovakia", "Slovenia",
        "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "South Sudan",
        "Spain", "Sri Lanka", "Sudan", "Suriname", "Svalbard and Jan Mayen", "Sweden", "Switzerland",
        "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand",
        "Timor-Leste", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan",
        "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom",
        "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu",
        "Venezuela, Bolivarian Republic of", "Viet Nam", "Virgin Islands, British", "Virgin Islands, U.S.",
        "Wallis and Futuna", "Western Sahara", "Yemen", "Zambia", "Zimbabwe", "Åland Islands"
    ]; // Keep your original list here
        foreach ($states as $stateOption) {
            $selected = ($course['state'] === $stateOption) ? 'selected' : '';
            echo "<option value=\"$stateOption\" $selected>$stateOption</option>";
        }
        ?>
      </select>
    </div>

    <button type="submit" name="update" class="btn btn-success btn-lg w-100 mb-3 shadow-sm">
      ✅ Update Course
    </button>

    <button type="submit" name="delete" class="btn btn-danger btn-lg w-100 mb-3 shadow-sm" onclick="return confirm('Are you sure you want to delete this course?');">
      🗑️ Delete Course
    </button>

    <a href="see-course.php" class="btn btn-outline-secondary btn-lg w-100 shadow-sm">
      🔙 Back to Course List
    </a>
  </form>
</div>

</section>
<!-- ***** Edit Section End ***** -->

</body>
</html>
