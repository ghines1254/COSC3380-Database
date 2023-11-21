<?php
// Include the database initialization file
require_once 'init.php';

// Retrieve the tracking number and filter parameters from the GET parameters
$trackingNumber = isset($_GET['tracking_number']) ? $_GET['tracking_number'] : '';
$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : '';
$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : '';
$employeeId = isset($_GET['employeeId']) ? $_GET['employeeId'] : '';

// Start with the base query
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
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    
    <!-- Include the global styles -->
    <link rel="stylesheet" href="global.css" />
    
    <!-- Include the tracking page styles -->
    <link rel="stylesheet" href="tracking-page.css" />
    
    <!-- Fonts -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@400;500;600;700;800;900&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap"
    />
    
    <!-- Inline styles for troubleshooting -->
    <style>
        /* Apply basic styles directly to ensure they load */
        body {
            font-family: var(--font-lexend), sans-serif;
            background-color: var(--lightmain);
            color: var(--darktext);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid var(--color-gainsboro);
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: var(--lightsecond);
        }
        tr:nth-child(even) {
            background-color: var(--gray-8);
        }
    </style>
</head>
<body>
    <div class="tracking-page">
        <!-- Removed for brevity -->

        <!-- Table of Package History Records -->
        <?php if (count($historyRecords) > 0): ?>
            <!-- Inline styles added for diagnostic purposes -->
            <table style="margin-top: 20px;">
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

        <!-- Removed for brevity -->
    </div>
</body>
</html>
