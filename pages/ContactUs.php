<?php
require "config.php";


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $details = $_POST["details"];

    // Prepare and execute the SQL statement to insert data into the table
    $sql = "INSERT INTO contacts (first_name, last_name, contact_No, email, details)
            VALUES ('$first_name', '$last_name', '$contact', '$email', '$details')";

    if ($conn->query($sql) === true) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data: " . $conn->error;
    }

    // Redirect to the same page
    header("Location: ContactUs.html");  
    exit();
}

// Close the database connection
$conn->close();
?>
