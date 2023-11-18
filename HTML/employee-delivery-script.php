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
    $trackingNumber = $_POST['trackingNumber'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE PACKAGE SET status = ? WHERE tracking_number = ?");
    if (!$stmt) {
        echo "Prepare statement failed: " . $conn->error;
        exit;
    }
    $stmt->bind_param("ss", $status, $trackingNumber);
    if (!$stmt->execute()) {
        echo "Execution failed: " . $stmt->error;
    } else {
        if ($stmt->affected_rows > 0) {
            echo "Status updated successfully";
        } else {
            echo "Error or no change in status";
        }
    }

    $stmt->close();
    $conn->close();
}

// Handle GET request for fetching status
elseif (isset($_GET['tracking_number'])) {
    $trackingNumber = $_GET['tracking_number'];

    $stmt = $conn->prepare("SELECT status FROM PACKAGE WHERE tracking_number = ?");
    if (!$stmt) {
        echo "Prepare statement failed: " . $conn->error;
        exit;
    }
    $stmt->bind_param("s", $trackingNumber);
    if (!$stmt->execute()) {
        echo "Execution failed: " . $stmt->error;
    } else {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo json_encode(array('status' => $row['status']));
        } else {
            echo json_encode(array('status' => 'not_found'));
        }
    }

    $stmt->close();
    $conn->close();
}
?>
