<?php
session_start();
include 'db.php';

if ($_SESSION['role'] != 'client') {
    header('Location: login.php');
}

$sql = "SELECT * FROM inventory";
$result = $conn->query($sql);
?>

<h1>Client Dashboard</h1>

<a href="logout.php">Logout</a>

<h2>Available Inventory</h2>
<table>
    <tr>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Order Quantity</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><input type="number" name="quantity" min="1" max="<?php echo $row['quantity']; ?>" placeholder="Order quantity"></td>
        <td><button onclick="placeOrder(<?php echo $row['id']; ?>)">Order</button></td>
    </tr>
    <?php } ?>
</table>

<script>
function placeOrder(itemId) {
    let quantity = prompt("Enter quantity to order:");
    if (quantity) {
        window.location.href = "order.php?item_id=" + itemId + "&quantity=" + quantity;
    }
}
</script>
