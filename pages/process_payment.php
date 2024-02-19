<?php 
// Linking the configuration file
require 'config.php';

// Initialize session
session_start();

// Save form data to session variables
$_SESSION['NIC'] = $_POST['NIC'];
$_SESSION['Amount'] = $_POST['Amount'];
$_SESSION['type'] = $_POST['type'];

// expression patterns for validating the NIC formats
$oldNicPattern = '/^\d{12}$/';
$newNicPattern = '/^\d{4}\d{5}[VX]$/';

// Check if the NIC matches either the old or new format
if (preg_match($oldNicPattern, $_SESSION["NIC"]) || preg_match($newNicPattern, $_SESSION["NIC"])) {
    echo "NIC is valid.";

    // Redirect based on the submit value
    if ($_POST['submit'] == 'Online') {
      header('Location: onlinepayment.html');
    exit();
    } elseif ($_POST['submit'] == 'Offline Payments') {
      header('Location: offlinepayments.html');
    exit();
    }
}
else {
    echo "Invalid NIC format.<br>";
    echo 'Try again <br>';
    echo '<script>
        setTimeout(function() {
            window.location.href = "payments.php";
        }, 3000); // Redirect after 3 seconds
        </script>';
}


 
?>
