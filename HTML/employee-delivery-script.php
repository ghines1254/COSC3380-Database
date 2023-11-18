<?php
require_once 'init.php';



// Database connection details
$host = "34.68.154.206";
$database = "Post_Office_Schema";
$user = "root";
$password = "umapuma";

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trackingNumber = $_POST['trackingNumber'];
    $newStatus = $_POST['newStatus'];

    
    $stmt = $conn->prepare("UPDATE PACKAGE SET status = ? WHERE tracking_number = ?");
    $stmt->bind_param("ss", $newStatus, $trackingNumber);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Package status updated successfully.";
    } else {
        echo "Error updating package status or no changes made.";
    }

    $stmt->close();
    $conn->close();
}
?>
