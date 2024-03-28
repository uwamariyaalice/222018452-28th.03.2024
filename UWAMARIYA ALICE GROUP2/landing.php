<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Connect to database (replace dbname, username, password with actual credentials)
$connection = new mysqli("localhost", "root", "", "mytest");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$user_id = $_SESSION['user_id'];

// Retrieve user's email from the database
$sql = "SELECT email FROM user WHERE id='$user_id'";
$result = $connection->query($sql);

if ($result->num_rows == 1) {
 $row = $result->fetch_assoc();
    $email = $row['email'];
} else {
    $email = "Unknown";
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h2>Welcome <?php echo $email; ?></h2>
    <!-- You can add more content here -->
    <a href="write_message.php">Write a Message</a>
    <br><br>
    <a href="update_profile.html">Update Profile</a>
</body>
</html>