<?php include 'db.php'; session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>My Rentals</title>
</head>
<body>
    <h2>My Rentals</h2>
    <table border="1">
        <tr>
            <th>Bike Name</th>
            <th>Rent Date</th>
            <th>Return Date</th>
            <th>Action</th>
        </tr>

        <?php
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT rentals.id AS rental_id, bikes.bike_name, rentals.rent_date, rentals.return_date 
                FROM rentals
                JOIN bikes ON rentals.bike_id = bikes.id
                WHERE rentals.user_id='$user_id'";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['bike_name'] . "</td>";
            echo "<td>" . $row['rent_date'] . "</td>";
            echo "<td>" . ($row['return_date'] ? $row['return_date'] : 'Not Returned') . "</td>";

            if (!$row['return_date']) {
                echo "<td><a href='return_bike.php?rental_id=" . $row['rental_id'] . "'>Return</a></td>";
            } else {
                echo "<td>Returned</td>";
            }

            echo "</tr>";
        }
        ?>
    </table
