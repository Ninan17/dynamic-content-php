<?php
// Add this to the top of your PHP file for development:
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
$servername = "localhost";
$username = "root";  // MySQL root user
$password = "root123";  // Blank password since you don't have a password
$dbname = "bike_rentals";  // Your correct database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
    print "Successful";
?>
