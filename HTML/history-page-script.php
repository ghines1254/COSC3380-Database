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

$query = "SELECT tracking_number FROM PACKAGE";
$result = $conn->query($query);
// Check for errors
if (!$result) {
    die("Error retrieving data: " . $conn->error);
}
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['tracking_number']}</td>";
    echo "<td>{$row['delivery_status']}</td>";
    echo "<td>{$row['date_of_delivery']}</td>";
    echo "</tr>";
}

// Close connection
$stmt->close();
$conn->close();
?>