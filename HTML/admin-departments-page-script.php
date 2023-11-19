<?php

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

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

function fetchAllPackages() {
    global $conn; // Use the database connection from init.php

    $query = "SELECT tracking_number, sender_full_name, sender_full_address, receiver_full_name, receiver_full_address, status FROM PACKAGE";
    $result = $conn->query($query);

    if ($result === false) {
        // Query failed: handle error here
        die("Error: " . $conn->error);
    }

    $packages = [];
    while ($row = $result->fetch_assoc()) {
        $packages[] = $row;
    }

    return $packages;
}
?>
