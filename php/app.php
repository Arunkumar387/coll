<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "student_admission";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize message variable
$message = "";

// Form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $highSchool = $_POST['highSchool'];
    $graduationYear = $_POST['graduationYear'];
    $gpa = $_POST['gpa'];
    $activities = $_POST['activities'];
    $nationality = $_POST['Nationality'];
    $religion = $_POST['Religion'];
    $caste = $_POST['Caste'];
    $community = $_POST['community'];

    $sql = "INSERT INTO students (firstName, lastName, dob, gender, email, phone, address, highSchool, graduationYear, gpa, activities, nationality, religion, caste, community)
            VALUES ('$firstName', '$lastName', '$dob', '$gender', '$email', '$phone', '$address', '$highSchool', '$graduationYear', '$gpa', '$activities', '$nationality', '$religion', '$caste', '$community')";

    if (mysqli_query($conn, $sql)) {
        $message = "New record created successfully";
    } else {
        $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Admission Application</title>
    <link rel="stylesheet" href="css/application.css">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
        <!-- Personal Information -->
        <fieldset>
            <legend>Personal Information</legend>
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required> <br>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required> <br>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required> <br>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="" disabled selected> --SELECT--</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </fieldset>

        <!-- Contact Information -->
        <fieldset>
            <legend>Contact Information</legend>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required> <br>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required> <br>

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4" required></textarea>
        </fieldset>

        <!-- Academic Information -->
        <fieldset>
            <legend>Academic Information</legend>
            <label for="highSchool">High School:</label>
            <input type="text" id="highSchool" name="highSchool" required>

            <label for="graduationYear">Year of Graduation:</label>
            <input type="number" id="graduationYear" name="graduationYear" required>

            <label for="gpa">High School GPA:</label>
            <input type="text" id="gpa" name="gpa" required>
        </fieldset>

        <!-- Extracurricular Activities -->
        <fieldset>
            <legend>Extracurricular Activities</legend>
            <label for="activities">List of Activities:</label>
            <textarea id="activities" name="activities" rows="4"></textarea>
        </fieldset>

        <!-- Additional Information -->
        <fieldset>
            <legend>Additional Information</legend>
            <label for="Nationality">Nationality:</label>
            <select id="Nationality" name="Nationality" required>
                <option value="indian">Indian</option>
                <option value="others">Others</option>
            </select>
            <label for="Religion">Religion:</label>
            <select id="Religion" name="Religion" required>
                <option value="" disabled selected> --SELECT--</option>
                <option value="Hindu">Hindu</option>
                <option value="Christian">Christian</option>
                <option value="Muslim">Muslim</option>
            </select>
            <label for="Caste">Caste:</label>
            <input type="text" id="Caste" name="Caste" required>
            <label for="community">Community:</label>
            <select id="community" name="community" required>
                <option value="" disabled selected> --SELECT--</option>
                <option value="BC">BC</option>
                <option value="BCC">BCC</option>
                <option value="BCM">BCM</option>
                <option value="DNC">DNC</option>
                <option value="MBC">MBC</option>
                <option value="OC">OC</option>
                <option value="SC">SC</option>
                <option value="SCA">SCA</option>
                <option value="ST">ST</option>
            </select>
        </fieldset>

        <!-- Submit Button -->
        <div class="button">
            <input type="submit" id="submit" value="Submit Application">
        </div>
    </form>

    <!-- Display message after form submission -->
    <?php if (!empty($message)) { ?>
        <script>
            alert("<?php echo $message; ?>");
        </script>
    <?php } ?>
</body>
</html>
