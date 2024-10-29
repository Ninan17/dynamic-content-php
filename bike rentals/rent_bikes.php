<?php
include 'db.php';
session_start();
// echo "its good";
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['bike_id'])) {
    $bike_id = $_GET['bike_id'];
    $user_id = $_SESSION['user_id'];

    // Update bike status and create a rental record
    $conn->query("UPDATE bikes SET status='rented' WHERE id='$bike_id'");
    $conn->query("INSERT INTO rentals (user_id, bike_id) VALUES ('$user_id', '$bike_id')");

    header("Location: bikes.php");
}
?>
