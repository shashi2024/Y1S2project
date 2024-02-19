<?php



// Linking the configuration file
require 'config.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Save form data as sessions
    $_SESSION["NIC"] = $_POST["NIC"];
    $_SESSION["surname"] = $_POST["surname"];
    $_SESSION["OtherNames"] = $_POST["OtherNames"];
    $_SESSION["NOC"] = $_POST["NOC"];
    $_SESSION["Gender"] = $_POST["Gender"];
    $_SESSION["DOB"] = $_POST["DOB"];
    $_SESSION["height"] = $_POST["height"];
    $_SESSION["BloodGroup"] = $_POST["BloodGroup"];
    $_SESSION["Address"] = $_POST["Address"];
    $_SESSION["DivisionalSec"] = $_POST["DivisionalSec"];
    $_SESSION["PhoneNumber"] = $_POST["PhoneNumber"];
    $_SESSION["OldLicense"] = $_POST["OldLicense"];


    // Regular expression patterns for validating the NIC formats
    $oldNicPattern = '/^\d{9}[VX]$/';
    $newNicPattern = '/^\d{12}$/';
    $drivingLicensePattern = '/^[A-Z]{2}\d{9}$/';

    // Check if the NIC matches either the old or new format
    if (preg_match($oldNicPattern, $_SESSION["NIC"]) || preg_match($newNicPattern, $_SESSION["NIC"])) {

        // Redirect to the next page
        header("Location: updateapplication2.html");
        exit();

    }
    else {
        echo "Invalid NIC format.";

        echo 'Try again <br>';
        echo '<script>
        setTimeout(function() {
            window.location.href = "updateapplication1.html";
        }, 3000); // Redirect after 3 seconds
        </script>';
    }
}

    
?>