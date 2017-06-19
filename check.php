<?php
include('conn.php');
session_start();
$user_check = $_SESSION['username'];
 echo $user_check;
$sql = "SELECT werknemers_username FROM werknemers WHERE username='$user_check' ";
$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 
$login_user=$row['username'];
 
$row['username'];
?>