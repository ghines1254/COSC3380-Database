<?php
// Database connection details

require_once "connection.php";

// Get tracking number from URL parameter
$trackingNumber = $_GET['tracking_number'];

// Prepare and execute the query
$stmt = $conn->prepare("SELECT status FROM PACKAGE WHERE tracking_number = ?");
$stmt->bind_param("s", $trackingNumber);
$stmt->execute();
$result = $stmt->get_result();

// Check if a result is returned
if ($result->num_rows > 0) {
    // Fetch result
    $row = $result->fetch_assoc();
    echo json_encode(array('status' => $row['status']));
} else {
    echo json_encode(array('status' => 'not_found'));
}

// Close connection
$stmt->close();
$conn->close();
?>
