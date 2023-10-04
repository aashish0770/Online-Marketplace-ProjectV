<?php

$servername = "localhost"; 
$username = "root"; 
$password = "";
$dbname = "marketplace"; 

// Create connection object
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection status
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>