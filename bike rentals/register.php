<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="register">Register</button>
    </form>

    <?php
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>
</body>
</html>
