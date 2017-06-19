<?php 
$servername = "bobbroersen.me";
$username = "root";
$password = "Welkom01!";
$dbname = "pot";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>