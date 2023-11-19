<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Include your database connection script
require_once 'init.php';

function fetchPackageHistory($startDate, $endDate) {
    global $conn; // Ensure $conn is accessible if defined in 'init.php'

    // Prepare the SQL query
    $stmt = $conn->prepare("
        SELECT tracking_number, sender_full_name, sender_full_address, 
               receiver_full_name, receiver_full_address, status, updated_at
        FROM PACKAGE
        WHERE updated_at BETWEEN ? AND ?
    ");
    $stmt->bind_param("ss", $startDate, $endDate);
    $stmt->execute();
    $result = $stmt->get_result();

    $packageHistory = [];
    while ($row = $result->fetch_assoc()) {
        $packageHistory[] = $row;
    }

    $stmt->close();
    return $packageHistory;
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['startDate'], $_POST['endDate'])) {
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    // Fetch package history
    $packageHistory = fetchPackageHistory($startDate, $endDate);
    // Store the results in the session to display on the admin page
    $_SESSION['packageHistory'] = $packageHistory;
}
?>
