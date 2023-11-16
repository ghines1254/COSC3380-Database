<?php
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
    $packageId = $_POST['packageId'];
    $status = $_POST['status'];

    // Database update query
    $stmt = $conn->prepare("UPDATE PACKAGE SET status = ? WHERE package_id = ?");
    $stmt->bind_param("si", $status, $packageId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status";
    }

    $stmt->close();
    $conn->close();
}
?>

