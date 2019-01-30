<?php

$servername = $_POST['servername']; // your host(server) name
$dbname = $_POST['dbname'];  // your database name
$username = $_POST['username'];  // your username
$password = $_POST['password'];  // your password

$conn = new mysqli($servername, $username, $password, $dbname); // Create connection
if ($conn->connect_error) {     // Check connection
    die("Connection failed");
} 
?>