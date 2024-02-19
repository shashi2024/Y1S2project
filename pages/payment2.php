<?php
// Linking the configuration file
require 'config.php';

// Initialize session
session_start();
$cid = '';

// Access the form data from session variables
$NIC = $_SESSION['NIC'];
$Amount = $_SESSION['Amount'];
$type = $_SESSION['type'];
$Name = $_POST['Name'];
$_SESSION['cid'] = $_POST['cid'];
$_SESSION['cvc'] = $_POST['cvc'];
$cid = $_SESSION['cid'];


// Regular expression patterns for validating the NIC formats
$cardPattern = '/^\d{16}$/';
$cvcPattern = '/^\d{3}$/';


// Check if the patterns matches 
if (preg_match($cardPattern, $_SESSION["cid"]) && preg_match($cvcPattern, $_SESSION["cvc"])) {

    // Insert the payment details into the database
    $insert_query = "INSERT INTO onlinepayments (Date, NIC, cid, type, Amount, Name)
    VALUES (CURRENT_TIMESTAMP, '$NIC', '$cid', '$type', '$Amount', '$Name')";

    if ($conn->query($insert_query)) {
        echo "Payment inserted successfully<br>";
        echo '<script>
        setTimeout(function() {
        window.location.href = "payments.php";
        }, 4000); // Redirect after 4 seconds
        </script>';
    } else {
        echo "Error: " . $conn->error;
        echo '<script>
        setTimeout(function() {
        window.location.href = "payments.php";
        }, 4000); // Redirect after 4 seconds
        </script>';
    }
    exit();

}
else {
    echo "Invalid Card number or cvc format.";
    echo 'Try again <br>';
    echo '<script>
    setTimeout(function() {
        window.location.href = "onlinepayment.html";
    }, 3000); // Redirect after 3 seconds
    </script>';
}



// Close the database connection
$conn->close();
?>
