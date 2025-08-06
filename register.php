<?php
// register.php

// Connect to MySQL
$conn = new mysqli("localhost", "root", "", "registration_system");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // secure password
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$country = $_POST['country'];
$newsletter = isset($_POST['newsletter']) ? 1 : 0;

// Insert into database
$sql = "INSERT INTO clients (email, password, first_name, last_name, gender, country, newsletter)
        VALUES ('$email', '$password', '$first_name', '$last_name', '$gender', '$country', $newsletter)";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
