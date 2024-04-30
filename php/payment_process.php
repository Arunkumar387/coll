<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $semesterFees = $_POST["semester-fees"];
    $busFees = $_POST["bus-fees"];
    $examFees = $_POST["exam-fees"];

    // Validate form data
    if (!empty($semesterFees) && !empty($busFees) && !empty($examFees)) {
        // Process payment (Replace this with your payment processing logic)
        $totalAmount = $semesterFees + $busFees + $examFees;
        $paymentStatus = "Success"; // For demonstration purposes, assume payment is successful

        // Display payment status
        if ($paymentStatus == "Success") {
            echo "<h2>Payment Successful!</h2>";
            echo "<p>Total Amount Paid: $" . $totalAmount . "</p>";
        } else {
            echo "<h2>Payment Failed!</h2>";
            echo "<p>Please try again later.</p>";
        }
    } else {
        // If form data is missing
        echo "<h2>Error!</h2>";
        echo "<p>Please fill in all fields.</p>";
    }
}
?>
