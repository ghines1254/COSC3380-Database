<?php
require_once 'init.php';

$trackingNumber = isset($_GET['tracking_number']) ? $_GET['tracking_number'] : '';
$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : '';
$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : '';
$employeeId = isset($_GET['employeeId']) ? $_GET['employeeId'] : '';

// Define the JOIN query to fetch from both tables
$query = "
    SELECT 
        ph.package_id, ph.emp_id, ph.location_type, ph.location, ph.vin, ph.time_scanned,
        ti.on_truck, ti.starting_location, ti.received, ti.delivered_by, ti.created_on, ti.last_updated, ti.eta
    FROM 
        PACKAGE_HISTORY ph
    LEFT JOIN 
        TRACKING_INFO ti ON ph.package_id = ti.package_id
    WHERE 
        ph.package_id = ?";

// Additional filter conditions can be added to the WHERE clause of your SQL query here

$stmt = $conn->prepare($query);
$stmt->bind_param('s', $trackingNumber);
$stmt->execute();
$result = $stmt->get_result();

$records = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $records[] = $row;
    }
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Package History</title>
    <link rel="stylesheet" href="style.css">
    <!-- Make sure to replace 'style.css' with the actual CSS file name -->
</head>
<body>
    <h1>Package History for Tracking Number: <?php echo htmlspecialchars($trackingNumber); ?></h1>
    <!-- Your existing form for filters -->
    <!-- ... -->

    <?php if (count($records) > 0): ?>
        <h2>Package History</h2>
        <table>
            <!-- Headers for PACKAGE_HISTORY -->
            <thead>
                <tr>
                    <th>Package ID</th>
                    <th>Employee ID</th>
                    <th>Location Type</th>
                    <th>Location</th>
                    <th>VIN</th>
                    <th>Time Scanned</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data for PACKAGE_HISTORY -->
                <?php foreach ($records as $record): ?>
                <tr>
                    <td><?php echo htmlspecialchars($record['package_id']); ?></td>
                    <td><?php echo htmlspecialchars($record['emp_id']); ?></td>
                    <td><?php echo htmlspecialchars($record['location_type']); ?></td>
                    <td><?php echo htmlspecialchars($record['location']); ?></td>
                    <td><?php echo htmlspecialchars($record['vin']); ?></td>
                    <td><?php echo htmlspecialchars($record['time_scanned']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Tracking Info</h2>
        <table>
            <!-- Headers for TRACKING_INFO -->
            <thead>
                <tr>
                    <th>On Truck</th>
                    <th>Starting Location</th>
                    <th>Received</th>
                    <th>Delivered By</th>
                    <th>Created On</th>
                    <th>Last Updated</th>
                    <th>ETA</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data for TRACKING_INFO -->
                <?php foreach ($records as $record): ?>
                <tr>
                    <td><?php echo htmlspecialchars($record['on_truck']); ?></td>
                    <td><?php echo htmlspecialchars($record['starting_location']); ?></td>
                    <td><?php echo htmlspecialchars($record['received']); ?></td>
                    <td><?php echo htmlspecialchars($record['delivered_by']); ?></td>
                    <td><?php echo htmlspecialchars($record['created_on']); ?></td>
                    <td><?php echo htmlspecialchars($record['last_updated']); ?></td>
                    <td><?php echo htmlspecialchars($record['eta']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No records found for this tracking number.</p>
    <?php endif; ?>
</body>
</html>
