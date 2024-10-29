<?php include 'db.php'; session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Bikes</title>
</head>
<body>
    <h2>Available Bikes</h2>
    <table border="1">
        <tr>
            <th>Bike Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php
        $sql = "SELECT * FROM bikes";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['bike_name'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";

            if ($row['status'] == 'available') {
                echo "<td><a href='rent_bike.php?bike_id=" . $row['id'] . "'>Rent</a></td>";
            } else {
                echo "<td>Rented</td>";
            }

            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
