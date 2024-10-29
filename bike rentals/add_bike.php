<?php include 'db.php'; session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Bike</title>
</head>
<body>
    <h2>Add a New Bike</h2>
    <form method="POST" action="">
        <input type="text" name="bike_name" placeholder="Bike Name" required><br>
        <button type="submit" name="add_bike">Add Bike</button>
    </form>

    <?php
    if (isset($_POST['add_bike'])) {
        $bike_name = $_POST['bike_name'];
        $sql = "INSERT INTO bikes (bike_name) VALUES ('$bike_name')";
        if ($conn->query($sql) === TRUE) {
            echo "Bike added successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>
</body>
</html>
