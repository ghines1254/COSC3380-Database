<?php
require_once "init.php";

// Function to fetch employee report
function fetchEmployeeReport($department_filter) {
    
    $departmentFilter = $_POST['department_filter'] ?? 'both';

    $whereClause = "";
    if ($departmentFilter == 'D1') {
        $whereClause = "WHERE e.dept = 'D1'";
    } elseif ($departmentFilter == 'D2') {
        $whereClause = "WHERE e.dept = 'D2'";
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
        $whereClause
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
