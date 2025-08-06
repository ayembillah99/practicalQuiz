<?php
$conn = new mysqli("localhost", "root", "", "registration_system");
if ($conn->connect_error) die("Connection failed");

$id = $_POST['id'];
$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$country = $_POST['country'];

$sql = "UPDATE clients SET 
          email='$email', 
          first_name='$first_name', 
          last_name='$last_name', 
          gender='$gender', 
          country='$country' 
        WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: view.php");
} else {
    echo "Error updating record: " . $conn->error;
}
