<?php
require "config.php";

session_start();

if (isset($_POST['license_no'])) {
    $licenseNo = $_POST['license_no'];
    $_SESSION['license_no'] = $licenseNo;
}

// Activate license
if (isset($_POST['activate_license'])) {
    $licenseNo = $_SESSION['license_no'];

    $sql = "UPDATE user_details SET license_status = 'Active', suspend_duration = NULL, revoke_reason = NULL WHERE license_no = '$licenseNo'";

    $result = $conn->query($sql);

    // Check if the license activation was successful
    if ($result) {
        // Redirect to the license management page
        header("Location: license_management.php");
        exit;
    }
}

// Check if the driving license number is provided in the session
if (isset($_SESSION['license_no'])) {
    $licenseNo = $_SESSION['license_no'];

    $sql = "SELECT name, license_no, driver_points, license_status, suspend_duration, revoke_reason FROM user_details WHERE license_no = '$licenseNo';";
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
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="viotaion.css">
    
    <title>LicenseXpress</title>
</head>
<body>
<header>
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
</header>

<div class="driving-license-search">
    <form action="license_management.php" method="post">
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
        <h3><strong>Name:</strong> <?php echo $name; ?></h3><br>
        <h3><strong>License Number:</strong> <?php echo $licenseNo; ?></h3><br>
        <h3><strong>Driver Points:</strong> <?php echo $driverPoints; ?></h3><br>
        <h3><strong>License Status:</strong> <?php echo $licenseStatus; ?></h3><br>
        <?php if ($licenseStatus == 'Suspended'): ?>
            <h3><strong>Suspend Duration:</strong> <?php echo $suspendDuration; ?> days</h3><br>
        <?php endif; ?>
        <?php if ($licenseStatus == 'Revoked'): ?>
            <h3><strong>Revoke Reason:</strong> <?php echo $revokeReason; ?></h3><br>
        <?php endif; ?>
    </div>
    <?php if ($licenseStatus == 'Suspended' || $licenseStatus == 'Revoked'): ?>
    <div class="box" id="box2">
        
            <h2>Activate License</h2><br><br><br><br><br>
            <form action="license_management.php" method="post">
                <input type="submit" name="activate_license" value="Activate" class="btn">
            </form>       
    </div>
    <?php endif; ?>
</div>


<footer id="footer">



<p>
    Copyright © 2023 - Department of Motor Traffic, Sri Lanka.<br> All Rights Reserved
    Designed & Developed By MLB_WE_01.01_01 <p id="date"></p>

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
