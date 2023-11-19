<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "init.php";
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $productId = $_POST['productId'];
    $action = $_POST['action'];



    if ($action === 'increment'){
    $query = "UPDATE IN_STORE_PRODUCTS SET stock_remaining = stock_remaining+1 WHERE product_id = ?";
    }
    if ($action === 'decrement'){
    $query = "UPDATE IN_STORE_PRODUCTS SET stock_remaining = stock_remaining-1 WHERE product_id = ?";
    }

    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $productId);  
    $stmt->execute();
   
    if ($stmt->affected_rows > 0) {
        echo "Stock updated successfully";
    } else {
        echo "Error updating stock: " . $conn->error;
    }

    $conn->close();

} else {
    echo "Invalid request method";
}

?>
