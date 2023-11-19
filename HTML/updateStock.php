<?php
require_once "init.php";
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $productId = $_POST['productId'];
    $action = $_POST['action'];



    if ($action === 'increment'){
    $query = "UPDATE IN_STORE_PRODUCTS SET stock_remaining = stock_remaining+1 WHERE product_id = $product_id";
    }
    if ($action === 'decrement'){
    $query = "UPDATE IN_STORE_PRODUCTS SET stock_remaining = stock_remaining-1 WHERE product_id = $product_id";
    }

    $result = $conn->query($query);
   
    if ($result) {
        echo "Stock updated successfully";
    } else {
        echo "Error updating stock: " . $conn->error;
    }

    $conn->close();

} else {
    echo "Invalid request method";
}
}
?>