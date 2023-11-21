<?php
require_once 'init.php';

// Retrieve the tracking number and filter parameters from the GET parameters
$trackingNumber = isset($_GET['tracking_number']) ? $_GET['tracking_number'] : '';
$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : '';
$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : '';
$employeeId = isset($_GET['employeeId']) ? $_GET['employeeId'] : '';

// base query
$query = "SELECT * FROM PACKAGE_HISTORY WHERE package_id = ?";

// Add conditions based on filters
$params = [$trackingNumber]; // Start with tracking number
$paramTypes = 's'; // Tracking number is a string

if (!empty($startDate) && !empty($endDate)) {
    $query .= " AND time_scanned BETWEEN ? AND ?";
    $params[] = $startDate;
    $params[] = $endDate;
    $paramTypes .= 'ss'; // Two string parameters for dates
}

if (!empty($employeeId)) {
    $query .= " AND emp_id = ?";
    $params[] = $employeeId;
    $paramTypes .= 's'; // Another string for employee ID
}

// Prepare the SQL statement
$stmt = $conn->prepare($query);

// Dynamic binding of parameters
$stmt->bind_param($paramTypes, ...$params);

// Execute the query
$stmt->execute();

// Fetch the results
$result = $stmt->get_result();

// Check if records are found
if ($result->num_rows > 0) {
    // Fetch all records as an associative array
    $historyRecords = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $historyRecords = array();
}

// Don't close the statement and connection yet if we may use them again after form submission
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Package History</title>
    <!-- add stylesheet here -->
</head>
<body>
    <h1>Package History for Tracking Number: <?php echo htmlspecialchars($trackingNumber); ?></h1>

    <!-- Filter Form -->
    <form action="package_history.php" method="get">
        <input type="hidden" name="tracking_number" value="<?php echo htmlspecialchars($trackingNumber); ?>">
        
        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" name="startDate" value="<?php echo htmlspecialchars($startDate); ?>">
        
        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" name="endDate" value="<?php echo htmlspecialchars($endDate); ?>">
        
        <label for="employeeId">Employee ID:</label>
        <input type="text" id="employeeId" name="employeeId" value="<?php echo htmlspecialchars($employeeId); ?>">
        
        <input type="submit" value="Filter">
    </form>

    <!-- Table of Package History Records -->
    <?php if (count($historyRecords) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Location Type</th>
                    <th>Location</th>
                    <th>Time Scanned</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($historyRecords as $record): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($record['emp_id']); ?></td>
                        <td><?php echo htmlspecialchars($record['location_type']); ?></td>
                        <td><?php echo htmlspecialchars($record['location']); ?></td>
                        <td><?php echo htmlspecialchars($record['time_scanned']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No history records found for this tracking number.</p>
    <?php endif; ?>

    <?php
    $stmt->close();
    $conn->close();
    ?>
</body>
</html>
