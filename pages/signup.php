<?php

require "config.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
// Establish a database connection
// Get the form data
$nic = $_POST['Nic'];
$name = $_POST['Name'];
$phoneNo = $_POST['Phone_no'];
$password = $_POST['Passsword'];
$confirmPassword = $_POST['Confirm_Passsword'];
// Check if NIC already exists in the database
$existingQuery = "SELECT * FROM users WHERE Nic = '$nic'";
$existingResult = $conn->query($existingQuery);


if ($existingResult->num_rows > 0) {
    // NIC already registered
    
    echo "<script>alert('NIC number already registered!'); window.location.href='signup.html';</script>";
    exit();
}
//Check if phone_number already exists in the database
$existingQueryp = "SELECT * FROM users WHERE phone_no = '$phoneNo'";
$existingResultp = $conn->query($existingQueryp);


if ($existingResultp->num_rows > 0) {
    // NIC already registered
    
    echo "<script>alert('Phone number already registered!'); window.location.href='signup.html';</script>";
    exit();
}

if ($password !== $confirmPassword) {
    die("Passwords must match");
}

$pattern = "/^(?:\d{9}[VvXx]|\d{10})$/";
$newNicPattern = '/^\d{12}$/';
// Check if the NIC matches either the old or new pattern
if (!preg_match($pattern, $nic) && !preg_match($newNicPattern, $nic)) {
    // NIC is in an invalid format
    echo "<script>alert('Invalid NIC'); window.location.href='signup.html';</script>";
}


$password_hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (nic, name, phone_no, password,usertype) VALUES ('$nic', '$name', '$phoneNo', '$password','user')";

if ($conn->query($sql)) {
    echo "<script>alert('Registration successful'); window.location.href='login.html';</script>";

} else {
    echo "Error: " .  $conn->error;
}

// Close the database connection
$conn->close();
}
?>
