<?php
require_once 'connection.php';

$query = "SELECT first_name, last_name, idnum, dept FROM EMPLOYEE";
$result = $conn->query($query);

// Check for errors
if (!$result) {
    die("Error retrieving employee information: " . $conn->error);
}

$employees = $result->fetch_all(MYSQLI_ASSOC);
$jsonResponse = json_encode($employees);

header('Content-Type: application/json');
echo $jsonResponse;

$conn->close();
?>