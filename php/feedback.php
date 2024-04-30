<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Feedback</title>
    <style>
        /* Add your CSS styling here */
    </style>
</head>
<body>
    <h2>Student Feedback Form</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $feedback = $_POST["feedback"];

        // Save feedback to database or file
        // Example:
        // $file = fopen("feedback.txt", "a");
        // fwrite($file, "Name: $name\nEmail: $email\nFeedback: $feedback\n\n");
        // fclose($file);

        echo "<p>Thank you for your feedback, $name!</p>";
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="feedback">Feedback:</label><br>
        <textarea id="feedback" name="feedback" rows="4" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
