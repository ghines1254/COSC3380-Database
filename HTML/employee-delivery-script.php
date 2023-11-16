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

// Handle POST request for status update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $packageId = $_POST['packageId'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE PACKAGE SET status = ? WHERE tracking_number = ?");
    $stmt->bind_param("ss", $status, $packageId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Status updated successfully";
    } else {
        echo "Error or no change in status";
    }

    $stmt->close();
    $conn->close();
    exit;
}

// Handle GET request for fetching status
if (isset($_GET['tracking_number'])) {
    $trackingNumber = $_GET['tracking_number'];

    $stmt = $conn->prepare("SELECT status FROM PACKAGE WHERE tracking_number = ?");
    $stmt->bind_param("s", $trackingNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(array('status' => $row['status']));
    } else {
        echo json_encode(array('status' => 'not_found'));
    }

    $stmt->close();
    $conn->close();
}
?>

