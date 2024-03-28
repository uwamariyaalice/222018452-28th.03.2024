<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.html");
    exit();
}

$connection = new mysqli("localhost", "root", "", "mytest");
if($connection->connect_error){
    die("Connection failed: " . $connection->connect_error);
}

$user_id = $_SESSION['user_id'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    
    // Assuming $isCompleted variable is defined somewhere else in the code
    $isCompleted = ''; // Assign value accordingly

    $sql = "UPDATE profile SET firstname='$firstname', lastname='$lastname', isCompleted='$isCompleted' WHERE userid='$user_id'";
    if($connection->query($sql) === TRUE){
        echo "Profile updated successfully";
        header("Location: indexes.html");
        exit();
    } else {
        echo "Error updating Profile: " . $connection->error;
    }
}
