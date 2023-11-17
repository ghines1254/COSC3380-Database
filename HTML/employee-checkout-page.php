<?php
require once 'init.php';
require once 'connection.php';

$query = "SELECT product_id, product_name, product_price, stock_remaining FROM IN_STORE_PRODUCTS";

$result = $conn->query($query);

if (!$result) 
{
    die("Error retrieving product information: " . $conn->error);
}

while ($row = $result->fetch_assoc()) 
{
    echo "<div>";
    echo "<span>{$row['product_name']}</span>";
    echo "<span>Stock: {$row['stock_remaining']}</span>";
    echo "<button onclick=\"updateStock({$row['product_id']}, 'increment')\">+</button>";
    echo "<button onclick=\"updateStock({$row['product_id']}, 'decrement')\">-</button>";
    echo "</div>";
}

$conn->close();
?>