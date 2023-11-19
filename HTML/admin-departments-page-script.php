<?php
// Database connection details
$host = "34.68.154.206";
$database = "Post_Office_Schema";
$user = "root";
$password = "umapuma";

// Function to fetch employee report
function fetchEmployeeReport() {
    global $host, $user, $password, $database;

    // Create connection
    $conn = new mysqli($host, $user, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch employee data
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
    $employees = [];

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $employees[] = $row;
        }
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
    return $employees;
}
?>
