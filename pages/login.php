<?php
require "config.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") 
{

    $nic = $_POST['Nic'];
    $password = $_POST['Passsword'];
      
    $sql = "SELECT * FROM users WHERE Nic = '$nic' and password ='$password'";
    
    $result = $conn->query($sql);
    
    $user = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            $_SESSION['nic'] =   $nic;
            
            if ($user['usertype'] == 'user') {
                header('Location: registereduser.html');
            } 
            elseif ($user['usertype'] == 'police') {
                header('Location: policehomepage.html');
            } 
            elseif ($user['usertype'] == 'officer') {
                header('Location: officerhomepage.html');
            }
        else
        {
            echo "<script>alert('Invalid Password');window.location.href='login.html';</script>";
            exit();
        } 
    }
}    

?>