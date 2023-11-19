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

function fetchEmployeeReport() {
    global $conn;

    $query = "
        SELECT 
            e.idnum, 
            e.first_name, 
            e.last_name, 
            e.sex, 
            e.birthdate, 
            e.city, 
            e.state, 
            e.zipcode, 
            e.dept, 
            e.created_on,
            COUNT(ti.delivered_by) AS packages_delivered
        FROM EMPLOYEE e
        LEFT JOIN TRACKING_INFO ti ON e.idnum = ti.delivered_by
        GROUP BY e.idnum
    ";
    $result = $conn->query($query);

    if ($result === false) {
        die("Error: " . $conn->error);
    }

    $employees = [];
    while ($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }

    return $employees;
}

$employeeData = []; // Initialize as empty array

// Check if the generate report button has been clicked
if (isset($_POST['generate_report'])) {
    $employeeData = fetchEmployeeReport();
}
?>
