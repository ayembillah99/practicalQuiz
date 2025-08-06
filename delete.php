<?php
$conn = new mysqli("localhost", "root", "", "registration_system");
$id = $_GET['id'];
$conn->query("DELETE FROM clients WHERE id=$id");
header("Location: view.php");
