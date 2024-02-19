<?php

require 'config.php';
$sql = "CREATE DATABASE IF NOT EXISTS driving2";

$conn->query($sql) ;


// Switch to the created database
$conn->select_db("driving2");

// Create the users table
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nic VARCHAR(12),
    name VARCHAR(50),
    phone_no VARCHAR(15),
    password VARCHAR(50),
    usertype VARCHAR(20)
)";

$conn->query($sql) ;


// Create the user_details table
$sql = "CREATE TABLE IF NOT EXISTS user_details (
    nic VARCHAR(10) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    license_no VARCHAR(255) NOT NULL,
    driver_points INT NOT NULL,
    license_status VARCHAR(255) NOT NULL,
    suspend_duration INT,
    revoke_reason VARCHAR(255)
)";

$conn->query($sql) ;


// Create the exam_data table
$sql = "CREATE TABLE IF NOT EXISTS exam_data (
    id INT(11) NOT NULL,
    fullName VARCHAR(255) NOT NULL,
    examCenter VARCHAR(255) NOT NULL,
    nicNumber VARCHAR(12) NOT NULL,
    examDate DATE NOT NULL,
    emailAddress VARCHAR(255) NOT NULL,
    timeSlot VARCHAR(255) NOT NULL,
    phoneNumber VARCHAR(10) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

$conn->query($sql) ;


// Create the pexam_data table
$sql = "CREATE TABLE IF NOT EXISTS pexam_data (
    id INT(11) NOT NULL,
    fullName VARCHAR(255) NOT NULL,
    examCenter VARCHAR(255) NOT NULL,
    nicNumber VARCHAR(12) NOT NULL,
    examDate DATE NOT NULL,
    emailAddress VARCHAR(255) NOT NULL,
    timeSlot VARCHAR(255) NOT NULL,
    phoneNumber VARCHAR(10) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
$conn->query($sql) ;


// Create the contacts table
$sql = "CREATE TABLE IF NOT EXISTS contacts (
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    contact_No VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL,
    details TEXT NOT NULL
)";

$conn->query($sql) ;


// Create the newapplication table
$sql = "CREATE TABLE IF NOT EXISTS newapplication (
    NIC VARCHAR(20) NOT NULL PRIMARY KEY,
    surname VARCHAR(50) NOT NULL,
    OtherNames VARCHAR(50) NOT NULL,
    NOC VARCHAR(20) NOT NULL,
    Gender VARCHAR(10) NOT NULL,
    DOB DATE NOT NULL,
    height DECIMAL(5, 2) NOT NULL,
    BloodGroup VARCHAR(10) NOT NULL,
    Address VARCHAR(100) NOT NULL,
    DivisionalSec VARCHAR(100) NOT NULL,
    PhoneNumber VARCHAR(15) NOT NULL,
    selected_options VARCHAR(100) NOT NULL,
    Birth_Certificate VARCHAR(100) NOT NULL,
    NIC_File VARCHAR(100) NOT NULL,
    Photo VARCHAR(100) NOT NULL,
    Medical VARCHAR(100) NOT NULL
)";

$conn->query($sql) ;


// Create the onlinepayments table
$sql = "CREATE TABLE IF NOT EXISTS onlinepayments (
    NIC VARCHAR(12) NOT NULL,
    Date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    cid VARCHAR(18) DEFAULT NULL,
    type VARCHAR(255) DEFAULT NULL,
    Amount DECIMAL(10, 2) DEFAULT NULL,
    Name VARCHAR(255) DEFAULT NULL
)";

$conn->query($sql) ;


// Create the offlinepayments table
$sql = "CREATE TABLE IF NOT EXISTS offlinepayments (
    NIC VARCHAR(12) NOT NULL,
    Amount DECIMAL(10, 2) DEFAULT NULL,
    Type VARCHAR(20) DEFAULT NULL,
    File VARCHAR(255) DEFAULT NULL,
    Date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()
)";

$conn->query($sql) ;


// Create the renewapplication table
$sql = "CREATE TABLE IF NOT EXISTS renewapplication (
    NIC VARCHAR(20) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    OtherNames VARCHAR(50) NOT NULL,
    NOC VARCHAR(20) NOT NULL,
    Gender VARCHAR(10) NOT NULL,
    DOB DATE NOT NULL,
    height DECIMAL(5, 2) NOT NULL,
    BloodGroup VARCHAR(10) NOT NULL,
    Address VARCHAR(100) NOT NULL,
    DivisionalSec VARCHAR(100) NOT NULL,
    PhoneNumber VARCHAR(15) NOT NULL,
    OldLicense VARCHAR(10) NOT NULL,
    selected_options VARCHAR(100) NOT NULL,
    Birth_Certificate VARCHAR(100) NOT NULL,
    NIC_File VARCHAR(100) NOT NULL,
    Photo VARCHAR(100) NOT NULL,
    Medical VARCHAR(100) NOT NULL,
    OldLicense_File VARCHAR(10) NOT NULL
)";

$conn->query($sql) ;


// Create the updateapplication table
$sql = "CREATE TABLE IF NOT EXISTS updateapplication (
    NIC VARCHAR(20) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    OtherNames VARCHAR(50) NOT NULL,
    NOC VARCHAR(20) NOT NULL,
    Gender VARCHAR(10) NOT NULL,
    DOB DATE NOT NULL,
    height DECIMAL(5, 2) NOT NULL,
    BloodGroup VARCHAR(10) NOT NULL,
    Address VARCHAR(100) NOT NULL,
    DivisionalSec VARCHAR(100) NOT NULL,
    PhoneNumber VARCHAR(15) NOT NULL,
    OldLicense VARCHAR(10) NOT NULL,
    selected_options VARCHAR(100) NOT NULL,
    Birth_Certificate VARCHAR(100) NOT NULL,
    NIC_File VARCHAR(100) NOT NULL,
    Photo VARCHAR(100) NOT NULL,
    Medical VARCHAR(100) NOT NULL,
    OldLicense_File VARCHAR(10) NOT NULL
)";

$conn->query($sql) ;


$sql ="CREATE TABLE IF NOT EXISTS medical (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(255) NOT NULL,
    medicalCenter VARCHAR(255) NOT NULL,
    nicNumber VARCHAR(20) NOT NULL,
    medicalDate DATE NOT NULL,
    timeSlot TIME NOT NULL,
    phoneNumber VARCHAR(20) NOT NULL
)";

$conn->query($sql) ;


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">
    <title>Licensexpress</title>
</head>
<body>
    <div class="header"> <!--navigation-->
        <div class="logo-container">
            <img src="img/logo.jpg" alt="Website Logo" height="50px" width="50px">
            <h1>LicenseXpress</h1>
        </div>
        <nav>
            <ul>
                <li><a href="homepageuser.php">Home</a></li>
                <li><a href="AboutUs.html">About Us</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Eservices</a>
                    <div class="dropdown-content">
                        <a href="practiceexam.php">Practice Exam</a>
                    </div>
                </li>
                <li><a href="FAQ.html">FAQs</a></li>
                <li><a href="ContactUs.html">Contact Us</a></li>
                <li id = "left"><a href="#"><img src="img/user.png" alt="user" id="userimg" height="25px" width="25px"></a></li>
                <li id = "left"><a href="signup.html">Sign Up</a></li>
                <li id = "left"><a href="login.html">Login</a></li>
                <li id = "left">
                    <input type="text" name="Search" id="Search" placeholder="Search" class="image-placeholder">
                </li>
            </ul>
        </nav>
    </div>
    <!--Slideshow-->
    <div class="slideshow-container">
        <div class="mySlides">
            <img src="img/home3.avif" alt="Slide 1">
        </div>

        <div class="mySlides">
            <img src="img/home1.jpg" alt="Slide 2">
        </div>

        <div class="mySlides">
            <img src="img/home2.jpg" alt="Slide 3">
        </div>

        <div class="mySlides">
            <img src="img/home5.jpg" alt="Slide 4">
        </div>

        <!-- Previous and Next buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <footer id="footer">
        
        <p>
            Copyright © 2023 - Department of Motor Traffic, Sri Lanka.<br> All Rights Reserved
            Designed & Developed By MLB_WE_01.01_01 <p id="date"></p>
        
        </p><!--displaydate-->
        <script>
            var currentDate = new Date();
            var options = { day: 'numeric', month: 'long', year: 'numeric' };
            var formattedDate = currentDate.toLocaleString('en-US', options);

            document.getElementById('date').innerText = formattedDate;
        </script>
        <!--displayslideshow-->
        <script>
            var slideIndex = 0;
            showSlides();
    
            function showSlides() {
                var slides = document.getElementsByClassName("mySlides");
                for (var i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
    
                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1;
                }
    
                slides[slideIndex - 1].style.display = "block";
                setTimeout(showSlides, 2000); // Change slide every 2 seconds
            }
    
            function plusSlides(n) {
                slideIndex += n;
                var slides = document.getElementsByClassName("mySlides");
    
                if (slideIndex > slides.length) {
                    slideIndex = 1;
                } else if (slideIndex < 1) {
                    slideIndex = slides.length;
                }
    
                for (var i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
    
                slides[slideIndex - 1].style.display = "block";
            }
        </script>
    </footer>

</body>
</html>
