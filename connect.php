<?php
$host = "sql105.infinityfree.com";  
$user = "if0_40469942";             
$pass = "group3Classics";     
$db   = "if0_40469942_cse335_classicbooks";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

