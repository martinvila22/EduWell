<?php
session_start();
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $instructor_name = mysqli_real_escape_string($conn, $_POST['instructor_name']);
    $instructor_email = mysqli_real_escape_string($conn, $_POST['instructor_email']);
    $course_name = mysqli_real_escape_string($conn, $_POST['course_name']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);

    
    $sql = "INSERT INTO courses (name, lecturer_name, description, course, state, lecturer_email)
            VALUES ('$course_name', '$instructor_name', '$description', '$course', '$state', '$instructor_email')";

    if (mysqli_query($conn, $sql)) {
        $course_id = mysqli_insert_id($conn); 

        
        if (isset($_SESSION['id'])) {
            $user_id = $_SESSION['id'];

            
            $link_sql = "INSERT INTO user_courses (user_id, course_id) VALUES ('$user_id', '$course_id')";
            if (mysqli_query($conn, $link_sql)) {
                echo "<script>alert('Course added and linked to user successfully!'); window.location.href='index.php';</script>";
                exit;
            } else {
                echo "<p style='color: red;'>Course added, but failed to link user: " . mysqli_error($conn) . "</p>";
            }
        } else {
            echo "<p style='color: red;'>Course added, but user not logged in to link course.</p>";
        }
    } else {
        echo "<p style='color: red;'>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Create a New Course</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;700&display=swap">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to right, #e0eafc, #cfdef3);
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        h2 {
            margin-bottom: 25px;
            font-size: 28px;
            color: #333;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 12px;
            font-size: 16px;
            transition: 0.3s ease;
        }

        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: #7a9cc6;
            box-shadow: 0 0 8px rgba(122, 156, 198, 0.2);
        }

        button {
            background-color: #5a8dee;
            color: white;
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #3b6dc7;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #5a8dee;
            font-weight: 500;
        }

        .back-link:hover {
            text-decoration: underline;
        }

		.form-container {
    max-width: 500px;
    margin: auto;
    padding: 2em;
    background: #fefefe;
    border-radius: 12px;
    box-shadow: 0 0 12px rgba(0,0,0,0.1);
    font-family: 'Segoe UI', sans-serif;
}

.form-container h2 {
    text-align: center;
    margin-bottom: 1.5em;
    color: #333;
}

.form-container label {
    display: block;
    margin-top: 1em;
    font-weight: 600;
}

.form-container input[type="text"],
.form-container select,
.form-container textarea {
    width: 100%;
    padding: 0.8em;
    margin-top: 0.4em;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 1em;
    box-sizing: border-box;
}

.form-container select {
    appearance: none;
    background-color: #fff;
    cursor: pointer;
}

.form-container button {
    margin-top: 1.5em;
    padding: 0.8em;
    width: 100%;
    background: #4CAF50;
    color: white;
    border: none;
    font-size: 1.1em;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s;
}

.form-container button:hover {
    background: #45a049;
}

.back-link {
    display: block;
    text-align: center;
    margin-top: 1em;
    color: #555;
    text-decoration: none;
}
.form-container {
    max-width: 500px;
    margin: auto;
    padding: 2em;
    background: #fefefe;
    border-radius: 12px;
    box-shadow: 0 0 12px rgba(0,0,0,0.1);
    font-family: 'Segoe UI', sans-serif;
}

.form-container h2 {
    text-align: center;
    margin-bottom: 1.5em;
    color: #333;
}

.form-container label {
    display: block;
    margin-top: 1em;
    font-weight: 600;
}

.form-container input[type="text"],
.form-container select,
.form-container textarea {
    width: 100%;
    padding: 0.8em;
    margin-top: 0.4em;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 1em;
    box-sizing: border-box;
}

.form-container select {
    appearance: none;
    background-color: #fff;
    cursor: pointer;
}

.form-container button {
    margin-top: 1.5em;
    padding: 0.8em;
    width: 100%;
    background: #4CAF50;
    color: white;
    border: none;
    font-size: 1.1em;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s;
}

.form-container button:hover {
    background: #45a049;
}

.back-link {
    display: block;
    text-align: center;
    margin-top: 1em;
    color: #555;
    text-decoration: none;
}


    </style>
</head>
<body>

<div class="form-container">
    <h2>🎓 Add a New Course</h2>
    <form action="" method="post">
        <label for="name">👤 Instructor's Full Name</label>
        <input type="text" id="instructor_name" name="instructor_name" placeholder="e.g. Dr. Emily Watson" required>
		<label for="name">Instructor's email</label>
        <input type="text" id="instructor_email" name="instructor_email" placeholder="e.g Web Developement by EduWell" required>
        <label for="name">Course's Full Name</label>
        <input type="text" id="course_name" name="course_name" placeholder="e.g Web Developement by EduWell" required>
		

        <label for="course">📘 Select a Course</label>
        <select id="course" name="course" required>
            <option value="" disabled selected>-- Choose a Course --</option>
            <option value="Introduction to Data Science">Introduction to Data Science</option>
            <option value="Web Development Fundamentals">Web Development Fundamentals</option>
            <option value="Machine Learning Basics">Machine Learning Basics</option>
            <option value="Database Design">Database Design</option>
            <option value="Cybersecurity Essentials">Cybersecurity Essentials</option>
            <option value="Mobile App Development">Mobile App Development</option>
            <option value="Cloud Computing">Cloud Computing</option>
            <option value="Software Engineering">Software Engineering</option>
        </select>

        <label for="description">📝 Short Description</label>
        <textarea id="description" name="description" rows="4" placeholder="Write a brief description of the course..." required></textarea>

        <label for="state">🌍 Choose a State</label>
        <select id="state" name="state" required>
        <option value="" disabled selected>-- Choose a State --</option>
        <option>&Aring;land Islands</option>
			<option>Afghanistan</option>
			<option>Akrotiri</option>
			<option>Albania</option>
			<option>Algeria</option>
			<option>American Samoa</option>
			<option>Andorra</option>
			<option>Angola</option>
			<option>Anguilla</option>
			<option>Antarctica</option>
			<option>Antigua and Barbuda</option>
			<option>Argentina</option>
			<option>Armenia</option>
			<option>Aruba</option>
			<option>Ashmore and Cartier Islands</option>
			<option>Australia</option>
			<option>Austria</option>
			<option>Azerbaijan</option>
			<option>Bahrain</option>
			<option>Bangladesh</option>
			<option>Barbados</option>
			<option>Bassas Da India</option>
			<option>Belarus</option>
			<option>Belgium</option>
			<option>Belize</option>
			<option>Benin</option>
			<option>Bermuda</option>
			<option>Bhutan</option>
			<option>Bolivia</option>
			<option>Bosnia and Herzegovina</option>
			<option>Botswana</option>
			<option>Bouvet Island</option>
			<option>Brazil</option>
			<option>British Indian Ocean Territory</option>
			<option>British Virgin Islands</option>
			<option>Brunei</option>
			<option>Bulgaria</option>
			<option>Burkina Faso</option>
			<option>Burma</option>
			<option>Burundi</option>
			<option>Cambodia</option>
			<option>Cameroon</option>
			<option>Canada</option>
			<option>Cape Verde</option>
			<option>Caribbean Netherlands</option>
			<option>Cayman Islands</option>
			<option>Central African Republic</option>
			<option>Chad</option>
			<option>Chile</option>
			<option>China</option>
			<option>Christmas Island</option>
			<option>Clipperton Island</option>
			<option>Cocos &#x28;Keeling&#x29; Islands</option>
			<option>Colombia</option>
			<option>Comoros</option>
			<option>Cook Islands</option>
			<option>Coral Sea Islands</option>
			<option>Costa Rica</option>
			<option>Cote D&#x27;Ivoire</option>
			<option>Croatia</option>
			<option>Cuba</option>
			<option>Cura&ccedil;ao</option>
			<option>Cyprus</option>
			<option>Czech Republic</option>
			<option>Democratic Republic of the Congo</option>
			<option>Denmark</option>
			<option>Dhekelia</option>
			<option>Djibouti</option>
			<option>Dominica</option>
			<option>Dominican Republic</option>
			<option>Ecuador</option>
			<option>Egypt</option>
			<option>El Salvador</option>
			<option>Equatorial Guinea</option>
			<option>Eritrea</option>
			<option>Estonia</option>
			<option>Ethiopia</option>
			<option>Europa Island</option>
			<option>Falkland Islands &#x28;Islas Malvinas&#x29;</option>
			<option>Faroe Islands</option>
			<option>Federated States of Micronesia</option>
			<option>Fiji</option>
			<option>Finland</option>
			<option>France</option>
			<option>French Guiana</option>
			<option>French Polynesia</option>
			<option>French Southern and Antarctic Lands</option>
			<option>Gabon</option>
			<option>Gaza Strip</option>
			<option>Georgia</option>
			<option>Germany</option>
			<option>Ghana</option>
			<option>Gibraltar</option>
			<option>Glorioso Islands</option>
			<option>Greece</option>
			<option>Greenland</option>
			<option>Grenada</option>
			<option>Guadeloupe</option>
			<option>Guam</option>
			<option>Guatemala</option>
			<option>Guernsey</option>
			<option>Guinea</option>
			<option>Guinea-bissau</option>
			<option>Guyana</option>
			<option>Haiti</option>
			<option>Heard Island and Mcdonald Islands</option>
			<option>Holy See &#x28;Vatican City&#x29;</option>
			<option>Honduras</option>
			<option>Hong Kong</option>
			<option>Hungary</option>
			<option>Iceland</option>
			<option>India</option>
			<option>Indonesia</option>
			<option>Iran</option>
			<option>Iraq</option>
			<option>Ireland</option>
			<option>Isle of Man</option>
			<option>Israel</option>
			<option>Italy</option>
			<option>Jamaica</option>
			<option>Jan Mayen</option>
			<option>Japan</option>
			<option>Jersey</option>
			<option>Jordan</option>
			<option>Juan De Nova Island</option>
			<option>Kazakhstan</option>
			<option>Kenya</option>
			<option>Kiribati</option>
			<option>Kosovo</option>
			<option>Kuwait</option>
			<option>Kyrgyzstan</option>
			<option>Laos</option>
			<option>Latvia</option>
			<option>Lebanon</option>
			<option>Lesotho</option>
			<option>Liberia</option>
			<option>Libya</option>
			<option>Liechtenstein</option>
			<option>Lithuania</option>
			<option>Luxembourg</option>
			<option>Macau</option>
			<option>Macedonia</option>
			<option>Madagascar</option>
			<option>Malawi</option>
			<option>Malaysia</option>
			<option>Maldives</option>
			<option>Mali</option>
			<option>Malta</option>
			<option>Marshall Islands</option>
			<option>Martinique</option>
			<option>Mauritania</option>
			<option>Mauritius</option>
			<option>Mayotte</option>
			<option>Mexico</option>
			<option>Moldova</option>
			<option>Monaco</option>
			<option>Mongolia</option>
			<option>Montenegro</option>
			<option>Montserrat</option>
			<option>Morocco</option>
			<option>Mozambique</option>
			<option>Myanmar</option>
			<option>Namibia</option>
			<option>Nauru</option>
			<option>Navassa Island</option>
			<option>Nepal</option>
			<option>Netherlands Antilles</option>
			<option>Netherlands</option>
			<option>New Caledonia</option>
			<option>New Zealand</option>
			<option>Nicaragua</option>
			<option>Niger</option>
			<option>Nigeria</option>
			<option>Niue</option>
			<option>Norfolk Island</option>
			<option>North Korea</option>
			<option>Northern Mariana Islands</option>
			<option>Norway</option>
			<option>Oman</option>
			<option>Pakistan</option>
			<option>Palau</option>
			<option>Palestine</option>
			<option>Panama</option>
			<option>Papua New Guinea</option>
			<option>Paracel Islands</option>
			<option>Paraguay</option>
			<option>Peru</option>
			<option>Philippines</option>
			<option>Pitcairn Islands</option>
			<option>Poland</option>
			<option>Portugal</option>
			<option>Puerto Rico</option>
			<option>Qatar</option>
			<option>Republic of the Congo</option>
			<option>Reunion</option>
			<option>Romania</option>
			<option>Russia</option>
			<option>Rwanda</option>
			<option>Saint Barth&Atilde;&copy;lemy</option>
			<option>Saint Helena</option>
			<option>Saint Kitts and Nevis</option>
			<option>Saint Lucia</option>
			<option>Saint Martin</option>
			<option>Saint Pierre and Miquelon</option>
			<option>Saint Vincent and the Grenadines</option>
			<option>Samoa</option>
			<option>San Marino</option>
			<option>Sao Tome and Principe</option>
			<option>Saudi Arabia</option>
			<option>Senegal</option>
			<option>Serbia</option>
			<option>Seychelles</option>
			<option>Sierra Leone</option>
			<option>Singapore</option>
			<option>Sint Maarten</option>
			<option>Slovakia</option>
			<option>Slovenia</option>
			<option>Solomon Islands</option>
			<option>Somalia</option>
			<option>South Africa</option>
			<option>South Georgia and the South Sandwich Islands</option>
			<option>South Korea</option>
			<option>South Sudan</option>
			<option>Spain</option>
			<option>Spratly Islands</option>
			<option>Sri Lanka</option>
			<option>Sudan</option>
			<option>Suriname</option>
			<option>Svalbard</option>
			<option>Swaziland</option>
			<option>Sweden</option>
			<option>Switzerland</option>
			<option>Syria</option>
			<option>Taiwan</option>
			<option>Tajikistan</option>
			<option>Tanzania</option>
			<option>Thailand</option>
			<option>The Bahamas</option>
			<option>The Gambia</option>
			<option>Timor-leste</option>
			<option>Togo</option>
			<option>Tokelau</option>
			<option>Tonga</option>
			<option>Trinidad and Tobago</option>
			<option>Tromelin Island</option>
			<option>Tunisia</option>
			<option>Turkey</option>
			<option>Turkmenistan</option>
			<option>Turks and Caicos Islands</option>
			<option>Tuvalu</option>
			<option>Uganda</option>
			<option>Ukraine</option>
			<option>United Arab Emirates</option>
			<option>United Kingdom</option>
			<option>United States</option>
			<option>Uruguay</option>
			<option>Uzbekistan</option>
			<option>Vanuatu</option>
			<option>Venezuela</option>
			<option>Vietnam</option>
			<option>Virgin Islands</option>
			<option>Wake Island</option>
			<option>Wallis and Futuna</option>
			<option>West Bank</option>
			<option>Western Sahara</option>
			<option>Yemen</option>
			<option>Zambia</option>
			<option>Zimbabwe</option>
        </select>

        <button type="submit">Create Course</button>
    </form>
    <a href="/edu/index.php" class="back-link">← Back to Homepage</a>
</div>


</body>
</html>
