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
            s.date_of_sale,
            p0000_counts.p0000sum,
            p1000_counts.p1000sum,
            p1001_counts.p1001sum,
            p1002_counts.p1002sum,
            p1003_counts.p1003sum,
            p1004_counts.p1004sum,
            p1005_counts.p1005sum,
            p1006_counts.p1006sum,
            p1007_counts.p1007sum
        FROM
            SALES s
            LEFT JOIN IN_STORE_PRODUCTS isp ON s.product_id = isp.product_id
            CROSS JOIN (
                SELECT COUNT(*) AS p0000sum FROM SALES WHERE product_id = 'P0000'
            ) AS 00000_counts
            CROSS JOIN (
                SELECT COUNT(*) AS p1000sum FROM SALES WHERE product_id = 'P1000'
            ) AS p1000_counts
            CROSS JOIN (
                SELECT COUNT(*) AS p1001sum FROM SALES WHERE product_id = 'P1001'
            ) AS p1001_counts
            CROSS JOIN (
                SELECT COUNT(*) AS p1002sum FROM SALES WHERE product_id = 'P1002'
            ) AS p1002_counts
            CROSS JOIN (
                SELECT COUNT(*) AS p1003sum FROM SALES WHERE product_id = 'P1003'
            ) AS p1003_counts
            CROSS JOIN (
                SELECT COUNT(*) AS p1004sum FROM SALES WHERE product_id = 'P1004'
            ) AS p1004_counts
            CROSS JOIN (
                SELECT COUNT(*) AS p1005sum FROM SALES WHERE product_id = 'P1005'
            ) AS p1005_counts
            CROSS JOIN (
                SELECT COUNT(*) AS p1006sum FROM SALES WHERE product_id = 'P1006'
            ) AS p1006_counts
            CROSS JOIN (
                SELECT COUNT(*) AS p1007sum FROM SALES WHERE product_id = 'P1007'
            ) AS p1007_counts;";

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
