<?php

// Linking the configuration file
require 'config.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Save form data as sessions. Because this is a multy page form
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

    // expression patterns for validating the NIC formats
    $oldNicPattern = '/^\d{12}$/';
    $newNicPattern = '/^\d{4}\d{5}[VX]$/';

    // Check if the NIC matches either the old or new format
    if (preg_match($oldNicPattern, $_SESSION["NIC"]) || preg_match($newNicPattern, $_SESSION["NIC"])) {
        echo "NIC is valid.";

        // Redirect to the next page
        header("Location: newapplication2.html");
        exit();
    }
    else {
        echo "Invalid NIC format.<br>";
        echo 'Try again <br>';
        echo '<script>
        setTimeout(function() {
            window.location.href = "newapplication1.html";
        }, 3000); // Redirect after 3 seconds
        </script>';
        
    }
}

    
?>