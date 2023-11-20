<?php
require_once 'init.php';


function getEmployeeList($con)
{
$query = "SELECT idnum, first_name, last_name, department FROM EMPLOYEE";
$result = $conn->query($query);

if ($result) {
    $employees = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($employees);
} else {
    echo json_encode(["error" => "Failed to fetch employee data"]);
}

$conn->close();
}

?>
