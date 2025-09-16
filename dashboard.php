<?php
session_start();
include 'db.php';

if ($_SESSION['role'] != 'admin') {
    header('Location: login.php');
}

$sql = "SELECT * FROM inventory";
$result = $conn->query($sql);
?>

<h1>Admin Dashboard</h1>

<a href="logout.php">Logout</a>

<h2>Inventory List</h2>
<table>
    <tr>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><a href="edit_inventory.php?id=<?php echo $row['id']; ?>">Edit</a></td>
    </tr>
    <?php } ?>
</table>

<h2>Add New Item</h2>
<form action="add_inventory.php" method="POST">
    <input type="text" name="name" placeholder="Item Name" required>
    <input type="number" name="quantity" placeholder="Quantity" required>
    <input type="number" name="price" placeholder="Price" required>
    <button type="submit">Add Item</button>
</form>
