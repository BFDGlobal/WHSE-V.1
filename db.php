<?php
$host = 'localhost'; // Change if hosted elsewhere
$user = 'root';      // MySQL username
$pass = '';          // MySQL password
$db = 'inventory_system'; // Database name

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
