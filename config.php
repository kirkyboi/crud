<?php
$servername = "localhost";
$username = "kirkpagaspas";
$password = "kirkpagaspas";
$dbname = "kirk";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
