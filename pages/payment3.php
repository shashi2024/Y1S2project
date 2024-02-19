<?php
// Linking the configuration file
require 'config.php';

// Initialize session
session_start();

// Access the form data from session variables
$NIC = $_SESSION['NIC'];
$Amount = $_SESSION['Amount'];
$type = $_SESSION['type'];



// Check if a file was uploaded
if (isset($_FILES['slip']) && $_FILES['slip']['error'] === UPLOAD_ERR_OK) {
    $file = $NIC . '_' . $_FILES['slip']['name']; // Get the file name
    $targetDirectory = 'uploads/';
    $targetFile = $targetDirectory . basename($file);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['slip']['tmp_name'], $targetFile)) {
        echo 'File uploaded successfully.<br>';
    } else {
        echo 'Failed to upload file.<br>';
    }
} else {
    echo 'No file uploaded.<br>';
}

// Insert data into the database
$sql = "INSERT INTO offlinepayments (NIC, Amount, Type, File , Date) VALUES ('$NIC', '$Amount', '$type', '$file' , CURRENT_TIMESTAMP)";

if (mysqli_query($conn, $sql)) {
    echo 'Data inserted successfully.<br>';
    echo '<script>
    setTimeout(function() {
        window.location.href = "payments.php";
    }, 4000); // Redirect after 4 seconds
    </script>';
} else {
    echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>