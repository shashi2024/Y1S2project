<?php
require "config.php";

// Delete user
if (isset($_GET['delete_user_id'])) {
    $nic = $_GET['delete_user_id'];

    $sql = "DELETE FROM user_details WHERE nic = '$nic'";

    $result = $conn->query($sql);

    // Check if the user deletion was successful
    if ($result) {
        // Redirect to the user management page
        header("Location: user_management.php");
        exit;
    }
}

// Edit user
if (isset($_GET['edit_user_id'])) {
    $nic = $_GET['edit_user_id'];

    // Fetch the user details
    $sql = "SELECT * FROM user_details WHERE nic = '$nic'";
    $result = $conn->query($sql);

    // Check if a record was found
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the data as an associative array
        $row = mysqli_fetch_assoc($result);

        // Store the retrieved values in variables
        $name = $row['name'];
        $licenseNo = $row['license_no'];
        $driverPoints = $row['driver_points'];
        // ...
    }
}

// Update user details
if (isset($_POST['update_user'])) {
    $nic = $_POST['nic'];
    $name = $_POST['name'];
    $licenseNo = $_POST['license_no'];
    $driverPoints = $_POST['driver_points'];
    // ...

    $sql = "UPDATE user_details SET name = '$name', license_no = '$licenseNo', driver_points = '$driverPoints' WHERE nic = '$nic'";

    $result = $conn->query($sql);

    // Check if the user details update was successful
    if ($result) {
        // Redirect to the user management page
        header("Location: user_management.php");
        exit;
    }
}

// Retrieve all users
$sql = "SELECT * FROM user_details";
$result = $conn->query($sql);

// Check if the query was successful and if records were found
if ($result && mysqli_num_rows($result) > 0) {
    // Fetch all the users as an associative array
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="usermangement.css">
 
    <title>User Management</title>
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
  <!-- usermangement -->
    <div class="user-management-container">
        <h2>User Management</h2>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>License No</th>
                    <th>Driver Points</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['license_no']; ?></td>
                            <td><?php echo $user['driver_points']; ?></td>
                            <td>
                                <a href="user_management.php?edit_user_id=<?php echo $user['nic']; ?>">Edit</a>
                                <a href="user_management.php?delete_user_id=<?php echo $user['nic']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No users found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <?php if (isset($_GET['edit_user_id'])): ?>
            <h2>Edit User</h2>

            <form action="user_management.php" method="post">
                <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?php echo $name; ?>"><br>
                <label for="license_no">License No:</label>
                <input type="text" name="license_no" id="license_no" value="<?php echo $licenseNo; ?>"><br>
                <label for="driver_points">Driver Points:</label>
                <input type="text" name="driver_points" id="driver_points" value="<?php echo $driverPoints; ?>"><br>
               

                <input type="submit" name="update_user" value="Update User">
            </form>
        <?php endif; ?>
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
