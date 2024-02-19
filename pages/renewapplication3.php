<?php

// Linking the configuration file
require 'config.php';

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
$OldLicense = $_SESSION["OldLicense"] ;



$BirthCertificate = '';
$NICfile = '';
$Photofile = '';
$Medicalfile = '';
$Old_License = '';


// Check if a BirthCertificate file was uploaded
if (isset($_FILES['Birth_Certificate']) && $_FILES['Birth_Certificate']['error'] === UPLOAD_ERR_OK) {
    $BirthCertificate = $NIC . '_' . $_FILES['Birth_Certificate']['name']; // Get the file name
    $targetDirectory = 'RE_BirthCertificate/';
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
    $targetDirectory = 'RE_NIC/';
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
    $targetDirectory = 'RE_Photo/';
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
    $targetDirectory = 'RE_Medical/';
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

// Check if a old license file was uploaded
if (isset($_FILES['OldLicense']) && $_FILES['OldLicense']['error'] === UPLOAD_ERR_OK) {
    $Old_License = $NIC . '_' . $_FILES['OldLicense']['name']; // Get the file name
    $targetDirectory = 'RE_OldLicense/';
    $targetFile = $targetDirectory . basename($Old_License);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['OldLicense']['tmp_name'], $targetFile)) {
        echo 'Old License uploaded successfully.<br>';
    } else {
        echo 'Failed to upload Old License<br>';
    }
} else {
    echo 'No file uploaded.<br>';
}


// Insert data into the database
$sql = "INSERT INTO renewapplication (NIC, surname, OtherNames, NOC, Gender, DOB, height, BloodGroup, Address, DivisionalSec, PhoneNumber, OldLicense, selected_options, Birth_Certificate, NIC_File, Photo, Medical, OldLicense_File) VALUES ('$NIC', '$surname', '$OtherNames', '$NOC', '$Gender', '$DOB', '$height', '$BloodGroup', '$Address', '$DivisionalSec', '$PhoneNumber', '$OldLicense', '$selected_options', '$BirthCertificate', '$NICfile', '$Photofile', '$Medicalfile', '$Old_License')";

if (mysqli_query($conn, $sql)) {
    echo 'Data inserted successfully.<br>';

    echo '<script>
    setTimeout(function() {
        window.location.href = "renewDrivingLicesne.html";
    }, 4000); // Redirect after 4 seconds
    </script>';

} else {
    echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

?>
