<?php
require_once 'init.php'; // Assuming this initializes your environment

// Database connection details
$host = "34.68.154.206";
$database = "Post_Office_Schema";
$user = "root";
$password = "umapuma";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminEmail = $_POST['adminEmail'];
    $adminPassword = $_POST['adminPassword'];

    // Validate and sanitize inputs

   if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($adminPassword, $row['emp_password'])) {
            // Admin authentication successful
            $response = array('success' => true, 'message' => 'Login successful');
        } else {
            // Incorrect password
            $response = array('success' => false, 'message' => 'Invalid password');
        }
    } else {
        // Admin email not found
        $response = array('success' => false, 'message' => 'Admin email not found');
    }

    // Close database connections
    $stmt->close();
    $conn->close();

    // Send JSON response back to the client
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>