<?php
require "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();

    $fullName = $_POST["fname"];
    $medicalCenter = $_POST["center"];
    $nicNumber = $_POST["id"];
    $medicalDate = $_POST["date"];
    $timeSlot = $_POST["time"];
    $phoneNumber = $_POST["phone"];

    $pattern = "/^(?:\d{9}[VvXx]|\d{10})$/";
    $newNicPattern = '/^\d{12}$/';

    // Check if the NIC matches either the old or new pattern
    if (!preg_match($pattern, $nicNumber) && !preg_match($newNicPattern, $nicNumber)) {
        // NIC is in an invalid format
        echo "<script>alert('Invalid NIC'); window.location.href='signup.html';</script>";
    }


    $sql = "INSERT INTO medical (fullName, medicalCenter, nicNumber, medicalDate, timeSlot, phoneNumber)
    VALUES ('$fullName', '$medicalCenter', '$nicNumber', ' $medicalDate', '$timeSlot', '$phoneNumber')";

    if ($conn->query($sql)) {
        echo "<script>alert('Record inserted successfully'); window.location.href='WExam.html';</script>";
    } else {
        echo "Error inserting record: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
