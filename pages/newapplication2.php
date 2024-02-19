<?php

// Linking the configuration file
require 'config.php';

//start session to store data
session_start();

$NIC = $_SESSION["NIC"]; 
$surname = $_SESSION["surname"];
$OtherNames = $_SESSION["OtherNames"] ;
$NOC = $_SESSION["NOC"];
$Gender = $_SESSION["Gender"] ;
$DOB = $_SESSION["DOB"];
$height = $_SESSION["height"] ;
$BloodGroup = $_SESSION["BloodGroup"] ;
$Address = $_SESSION["Address"];
$DivisionalSec = $_SESSION["DivisionalSec"] ;
$PhoneNumber = $_SESSION["PhoneNumber"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Handle multiple checkbox selections
    $selected_options = [];
    $checkboxes = array("A1", "A", "B1", "B", "C1", "C", "CE", "D", "DE", "G1", "G", "J", "PT");

    //check the full resulted array

    foreach ($checkboxes as $checkbox) {
        if (isset($_POST[$checkbox])) {
            $selected_options[] = $_POST[$checkbox];
        }
    }

    $_SESSION["selected_options"] = implode(", ", $selected_options); //because $_session expects string value we need to convert it.

    // Redirect to the next page
    header("Location: newapplication3.html");
    exit();
}
?>
