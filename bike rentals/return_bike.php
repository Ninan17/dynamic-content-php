<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['rental_id'])) {
    $rental_id = $_GET['rental_id'];

    // Mark the bike as available and update the rental record
    $rental = $conn->query("SELECT * FROM rentals WHERE id='$rental_id'")->fetch_assoc();
    $bike_id = $rental['bike_id'];

    $conn->query("UPDATE bikes SET status='available' WHERE id='$bike_id'");
    $conn->query("UPDATE rentals SET return_date=NOW() WHERE id='$rental_id'");

    header("Location: my_rentals.php");
}
?>
