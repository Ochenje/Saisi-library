<?php
$servername = "localhost";
$username = "root"; // Change if using a different database user
$password = ""; // Change if password is set
$database = "library_db"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
