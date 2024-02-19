<?php
require "config.php";

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="viotaion.css">
    
    <title>Licensexpress</title>
</head>
<body>
<div class="header">
        <div class="logo-container">
            <img src="img/logo.jpg" alt="Website Logo" height="50px" width="50px">
            <h1>LicenseXpress</h1>
        </div>
        <nav>
            <ul>
                <li><a href="policehomepage.html">Home</a></li>
                <li><a href="profilep.php">Dashboard</a></li>
                <li><a href="violation1.php">Violation Management</a></li>
                <li><a href="#">Reports</a></li>
                <li class="dropdown" id="left">
                    <a href="#"><img src="img/user.png" alt="user" id="userimg" height="25px" width="25px"></a>
                    <div class="dropdown-content">
                        <a href="logout.php">Logout</a>
                    </div>
                </li> 
                <li id="left">
                    <input type="search" name="Search" id="Search" placeholder="Search" class="image-placeholder">
                </li>
            </ul>
        </nav>
    </div>
  <!-- getting nic number -->
    <div class="driving-license-search">
    <form action="vilation.php" method="post">
        <ul style="list-style-type: none;">
            <li id="left">
                <input type="submit" value="Search" name="search_btn">
            </li>
            <li id="left">
                <input type="search" name="license_no" id="license_no" placeholder="Enter Driving License No" class="image-placeholder">
            </li>
        </ul>
    </form>
</div>
<div class="container">
        <div class="box" id="box1">
            <img src="img/user.png" alt="user" id="userimg1" height="100px" width="100px"><br><br>
            <h3><strong>Name:</strong></h3><br>
            <h3><strong>License Number:</strong></h3><br>
            <h3><strong>Driver Points:</strong> </h3><br>
            <h3><strong>License Status:</strong></h3> <br>
        </div>

 <div class="box" id="box2">
 </div>
        
 <div class="box" id="box3">
</div>
</div>
    <footer id="footer">

        <p>
            Copyright © 2023 - Department of Motor Traffic, Sri Lanka.
            <br> All Rights Reserved
            Designed & Developed By MLB_WE_01.01_01
            <p id="date"></p>
        </p>
        <script>
            var currentDate = new Date();
            var options = { day: 'numeric', month: 'long', year: 'numeric' };
            var formattedDate = currentDate.toLocaleString('en-US', options);

            document.getElementById('date').innerText = formattedDate;
        </script>
    </footer>
</body>
</html>
?>
