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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $packageId = $_POST['packageId'];
    $newStatus = $_POST['newStatus'];

    // Prepare and execute the update query
    $stmt = $conn->prepare("UPDATE PACKAGE SET status = ? WHERE tracking_number = ?");
    $stmt->bind_param("ss", $newStatus, $packageId);
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

