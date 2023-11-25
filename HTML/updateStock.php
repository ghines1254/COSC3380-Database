<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "init.php";
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $productId = $_POST['productId'];
    $action = $_POST['action'];
    $priceQuery = "SELECT product_price FROM IN_STORE_PRODUCTS WHERE product_id = ?";
    $priceStmt = $conn->prepare($priceQuery);
    $priceStmt->bind_param('s', $productId);
    $priceStmt->execute();

    $priceResult = $priceStmt->get_result();
    $priceRow = $priceResult->fetch_assoc();
    $price = $priceRow['product_price'];

    

    if ($action === 'increment') {
        $updateQuery = "UPDATE IN_STORE_PRODUCTS SET stock_remaining = stock_remaining + 1 WHERE product_id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param('s', $productId);  
        $stmt->execute();
   
        if ($stmt->affected_rows > 0) {
        $updatedStock = getUpdatedStock($conn, $productId);
        echo $updatedStock;
        } else {
        $error_message = $conn->error;
        echo "Error updating stock: " . $error_message;
        echo "@error_message:$error_message";
    }
    $conn->close();
        
    } elseif ($action === 'decrement') {
        $updateQuery = "UPDATE IN_STORE_PRODUCTS SET stock_remaining = stock_remaining - 1 WHERE product_id = ?";
        $salesQuery = "INSERT INTO SALES(product_id, product_price, branch_id, date_of_sale) VALUES (?, ?, ?, now())";
        $branchId = $_SESSION['branch_id'];

        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param('s', $productId);  
        $stmt->execute();
   
        if ($stmt->affected_rows > 0) {
            $salesStmt = $conn->prepare($salesQuery);
            $salesStmt->bind_param('sss', $productId, $price, $branchId);
            $salesStmt->execute();
            $updatedStock = getUpdatedStock($conn, $productId);
            echo $updatedStock;
        } else {
        $error_message = $conn->error;
        echo "Error updating stock: " . $error_message;
        echo "@error_message:$error_message";
    }
    $conn->close();
        
    }

} else {
    echo "Invalid request method";
}

function getUpdatedStock($conn, $productId) {
    $selectQuery = "SELECT stock_remaining FROM IN_STORE_PRODUCTS WHERE product_id = ?";
    $stmt = $conn->prepare($selectQuery);
    $stmt->bind_param('s', $productId);
    $stmt->execute();
    $stmt->bind_result($updatedStock);
    $stmt->fetch();
    $stmt->close();
    return $updatedStock;
}
?>
