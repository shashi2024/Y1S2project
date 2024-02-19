<?php
$conn=new mysqli("localhost","root","","driving2");
// Check connection
if($conn->connect_error){
die("Connection failed: " . $conn->connect_error);
}
?>