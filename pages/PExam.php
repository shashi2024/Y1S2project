<?php
require "config.php";
if ($_SERVER["REQUEST_METHOD"] === "POST")

session_start();


    $fullName = $_POST["fullName"];
    $examCenter = $_POST["examCenter"];
    $nicNumber = $_POST["nicNumber"];
    $examDate = $_POST["examDate"];
    $emailAddress = $_POST["emailAddress"];
    $timeSlot = $_POST["timeSlot"];
    $phoneNumber = $_POST["phoneNumber"];


    $pattern = "/^(?:\d{9}[VvXx]|\d{10})$/";
    $newNicPattern = '/^\d{12}$/';
    
    // Check if the NIC matches either the old or new pattern
    if (!preg_match($pattern, $nicNumber) && !preg_match($newNicPattern, $nicNumber)) {
        // NIC is in an invalid format
        echo "<script>alert('Invalid NIC'); window.location.href='signup.html';</script>";
    }


$sql = "INSERT INTO pexam_data (fullName, examCenter, nicNumber, examDate, emailAddress, timeSlot, phoneNumber)
VALUES ('$fullName', '$examCenter', '$nicNumber', '$examDate', '$emailAddress', '$timeSlot', '$phoneNumber')";

if ($conn->query($sql)) {
echo "<script>alert('Record inserted successfully');window.location.href='PExam.html';</script>";


} else {
echo "Error inserting record: " . $conn->error;
}
?>