<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $user_id = $_SESSION['user_id'];
    $item_id = $_GET['item_id'];
    $quantity = $_GET['quantity'];

    // Check if there is enough stock
    $sql = "SELECT * FROM inventory WHERE id = '$item_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row['quantity'] >= $quantity) {
        // Place the order
        $sql = "INSERT INTO orders (user_id, inventory_id, quantity) VALUES ('$user_id', '$item_id', '$quantity')";
        $conn->query($sql);

        // Update inventory
        $new_quantity = $row['quantity'] - $quantity;
        $sql = "UPDATE inventory SET quantity = '$new_quantity' WHERE id = '$item_id'";
        $conn->query($sql);

        echo "Order placed successfully!";
    } else {
        echo "Not enough stock!";
    }
}
?>
