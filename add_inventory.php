<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "INSERT INTO inventory (name, quantity, price) VALUES ('$name', '$quantity', '$price')";
    if ($conn->query($sql) === TRUE) {
        echo "New item added!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
