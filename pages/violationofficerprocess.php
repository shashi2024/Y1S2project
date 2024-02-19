<?php
require "config.php";

session_start();


if (isset($_POST['license_no'])) {
    $licenseNo = $_POST['license_no'];
     $_SESSION['license_no'] =   $licenseNo;
}
// Update driver points
if (isset($_POST['number1']) || isset($_POST['number2'])) {
    $licenseNo = $_SESSION['license_no'];
    $pointsToAdd = isset($_POST['number1']) ? (int)$_POST['number1'] : 0;
    $pointsToReduce = isset($_POST['number2']) ? (int)$_POST['number2'] : 0;

    $sql = "UPDATE user_details SET driver_points = driver_points + $pointsToAdd, driver_points = driver_points + $pointsToReduce WHERE license_no = '$licenseNo'";

    $result = $conn->query($sql);
}

// Suspend license
if (isset($_POST['suspend_duration'])) {
    $licenseNo = $_SESSION['license_no'];
    $suspendDuration = (int)$_POST['suspend_duration'];

    $sql = "UPDATE user_details SET license_status = 'Suspended' , suspend_duration = $suspendDuration WHERE license_no = '$licenseNo'";

    $result = $conn->query($sql);
}

// Revoke license
if (isset($_POST['revoke_reason'])) {
    $licenseNo = $_SESSION['license_no'];
    $revokeReason = mysqli_real_escape_string($conn, $_POST['revoke_reason']);

    $sql = "UPDATE user_details SET license_status = 'Revoked', revoke_reason = '$revokeReason' WHERE license_no = '$licenseNo'";

    $result = $conn->query($sql);
}

// Check if the driving license number is provided in the session
if (isset($_SESSION['license_no'])) {
    $licenseNo = $_SESSION['license_no'];


    $sql = "SELECT name,license_no, driver_points, license_status, suspend_duration, revoke_reason FROM user_details WHERE license_no = '$licenseNo';";
    $result = $conn->query($sql);

    // Check if the query was successful and if a record was found
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the data as an associative array
        $row = mysqli_fetch_assoc($result);

        // Store the retrieved values in variables
        $name = $row['name'];
        $licenseNo = $row['license_no'];
        $driverPoints = $row['driver_points'];
        $licenseStatus = $row['license_status'];
        $suspendDuration = $row['suspend_duration'];
        $revokeReason = $row['revoke_reason'];

      }  // Display the retrieved data*/
    }
     
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
                <li><a href="officerhomepage.html">Home</a></li>
                <li><a href="profileo.php">Dashboard</a></li>
                <li><a href="user_management.php">User Management</a></li>
                <li><a href="licensemenagement.html">License  Management</a></li>
                <li><a href="officerviolation.php">Violation Management</a></li>
                <li><a href="#">Reports</a></li>
                <li class="dropdown" id = "left">
                    <a href="#"><img src="img/user.png" alt="user" id="userimg" height="25px" width="25px"></a>
                    <div class="dropdown-content">
                        <a href="logout.php">Logout</a>
                    </div>
                </li> 
                <li id = "left">
                <input type="text" name="Search" id="Search" placeholder="Search" class="image-placeholder">
                </li>
            </ul>
        </nav>
    </div>

    <div class="driving-license-search">
    <form action="violationofficerprocess.php" method="post">
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
  <!--Display retrive data -->
    <div class="container">
        <div class="box" id="box1">
            <img src="img/user.png" alt="user" id="userimg1" height="100px" width="100px"><br><br>
            <h3><strong>Name:</strong> <?php echo $name; ?></h3><br>
            <h3><strong>License Number:</strong> <?php echo $licenseNo; ?></h3><br>
            <h3><strong>Driver Points:</strong> <?php echo $driverPoints; ?></h3><br>
            <h3><strong>License Status:</strong> <?php echo $licenseStatus; ?></h3> <br>
            <?php if ($licenseStatus == 'Suspended'): ?>
                <h3><strong>Suspend Duration:</strong> <?php echo $suspendDuration; ?> days</h3><br>
            <?php endif; ?>
            <?php if ($licenseStatus == 'Revoked'): ?>
                <h3><strong>Revoke Reason:</strong> <?php echo $revokeReason; ?></h3><br>
            <?php endif; ?>
        </div>
        <div class="box" id="box2">
            <h2>Update Driver Points</h2><br><br><br><br><br>
            <form action="violationofficerprocess.php" method="post">
                <h3>Add Points</h3> <input type="number" name="number1" id="number1"  min="0" max="20"><br><br><br>
                <h3>Reduce Points</h3> <input type="number" name="number2" id="number2"  min="-20" max="0"><br><br>
                <input type="submit" value="Submit">
            </form>
        </div>
        
        <div class="box" id="box3">
            <form action="violationofficerprocess.php" method="post">
                <h3>Suspend License</h3>
                <select name="suspend_duration" id="suspend_duration">
                    <option value="1">One Day</option>
                    <option value="7">7 Days</option>
                    <option value="14">2 Weeks</option>
                    <option value="30">One Month</option>
                </select>
                <input type="submit" value="Suspend"><br><br><br>
            </form> 
            <form action="violationofficerprocess.php" method="post">
                <h3>Revoke License</h3><br>
                <input type="text" name="revoke_reason" id="revoke_reason" required>
                <input type="submit" value="Revoke"><br><br><br><br><br><br><br><br>

                <h1><?php echo "License : ".$licenseStatus; ?></h1>
            </form>
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

