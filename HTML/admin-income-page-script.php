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

    // Query to fetch sales data
    $query = "
        SELECT
            s.product_id,
            isp.product_name,
            isp.product_description,
            s.product_price,
            s.date_of_sale
        FROM SALES s
        LEFT JOIN IN_STORE_PRODUCTS isp ON s.product_id = isp.product_id;
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
