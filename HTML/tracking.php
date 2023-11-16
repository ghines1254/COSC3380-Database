<?php
require_once 'init.php';
?>

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