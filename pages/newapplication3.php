<?php

// Linking the configuration file
require 'config.php';

//start of the session
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
$selected_options  = $_SESSION["selected_options"];

//define variables gonna use to save the path
$BirthCertificate = '';
$NICfile = '';
$Photofile = '';
$Medicalfile = '';


// Check if a BirthCertificate file was uploaded
if (isset($_FILES['Birth_Certificate']) && $_FILES['Birth_Certificate']['error'] === UPLOAD_ERR_OK) {
    $BirthCertificate = $NIC . '_' . $_FILES['Birth_Certificate']['name']; // Get the file name
    $targetDirectory = 'NEW_BirthCertificate/';
    $targetFile = $targetDirectory . basename($BirthCertificate);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['Birth_Certificate']['tmp_name'], $targetFile)) {
        echo 'Birth Certificate uploaded successfully.<br>';
    } else {
        echo 'Failed to upload Birth Certificate.<br>';
    }
} else {
    echo 'No file uploaded.<br>';
}

// Check if a NIC file was uploaded
if (isset($_FILES['NIC']) && $_FILES['NIC']['error'] === UPLOAD_ERR_OK) {
    $NICfile = $NIC . '_' . $_FILES['NIC']['name']; // Get the file name
    $targetDirectory = 'NEW_NIC/';
    $targetFile = $targetDirectory . basename($NICfile);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['NIC']['tmp_name'], $targetFile)) {
        echo 'NIC uploaded successfully.<br>';
    } else {
        echo 'Failed to upload NIC.<br>';
    }
} else {
    echo 'No file uploaded.<br>';
}

// Check if a Photo file was uploaded
if (isset($_FILES['Photo']) && $_FILES['Photo']['error'] === UPLOAD_ERR_OK) {
    $Photofile = $NIC . '_' . $_FILES['Photo']['name']; // Get the file name
    $targetDirectory = 'NEW_Photo/';
    $targetFile = $targetDirectory . basename($Photofile);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['Photo']['tmp_name'], $targetFile)) {
        echo 'Photo uploaded successfully.<br>';
    } else {
        echo 'Failed to upload Photo.<br>';
    }
} else {
    echo 'No file uploaded.<br>';
}

// Check if a Photo file was uploaded
if (isset($_FILES['Medical']) && $_FILES['Medical']['error'] === UPLOAD_ERR_OK) {
    $Medicalfile = $NIC . '_' . $_FILES['Medical']['name']; // Get the file name
    $targetDirectory = 'NEW_Medical/';
    $targetFile = $targetDirectory . basename($Medicalfile);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['Medical']['tmp_name'], $targetFile)) {
        echo 'Medical uploaded successfully.<br>';
    } else {
        echo 'Failed to upload Medical.<br>';
    }
} else {
    echo 'No file uploaded.<br>';
}


// Insert data into the database
$sql = "INSERT INTO newapplication (NIC, surname, OtherNames,  NOC ,Gender , DOB  , height ,  BloodGroup,  Address ,DivisionalSec ,PhoneNumber ,selected_options ,Birth_Certificate ,NIC_File,Photo, Medical   ) VALUES ('$NIC', '$surname', '$OtherNames', '$NOC' , '$Gender' , '$DOB', '$height','$BloodGroup', '$Address', '$DivisionalSec', '$PhoneNumber ', '$selected_options' , '$BirthCertificate' , '$NICfile' , '$Photofile', ' $Medicalfile')";

if (mysqli_query($conn, $sql)) {
    echo 'Data inserted successfully.<br>';

    echo '<script>
        setTimeout(function() {
            window.location.href = "newDrivingLicesne.html";
        }, 4000); // Redirect after 4 seconds
    </script>';
} else {
    echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
    echo 'Try again <br>';
    echo '<script>
        setTimeout(function() {
            window.location.href = "newapplication1.html";
        }, 4000); // Redirect after 4 seconds
    </script>';
}

// Close the database connection
mysqli_close($conn);

?>
