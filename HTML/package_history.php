
<?php
require_once 'init.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);


$trackingNumber = isset($_GET['tracking_number']) ? $_GET['tracking_number'] : '';
$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : '';
$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : '';
$employeeId = isset($_GET['employeeId']) ? $_GET['employeeId'] : '';

$query = "
    SELECT 
        ph.package_id, ph.emp_id, ph.location_type, ph.location, ph.vin, ph.time_scanned,
        ti.on_truck, ti.starting_location_id, ti.received, ti.delivered_by, ti.created_on, ti.last_updated, ti.eta
    FROM 
        PACKAGE_HISTORY ph
    LEFT JOIN 
        TRACKING_INFO ti ON ph.package_id = ti.package_id
    WHERE 
        ph.package_id = ?";

if (!empty($startDate) && !empty($endDate)) {
    $query .= " AND ph.time_scanned BETWEEN ? AND ?";
}

if (!empty($employeeId)) {
    $query .= " AND ph.emp_id = ?";
}

$params = [$trackingNumber]; // Starting with tracking number
$paramTypes = 's'; // Tracking number is a string

if (!empty($startDate) && !empty($endDate)) {
    $params[] = $startDate;
    $params[] = $endDate;
    $paramTypes .= 'ss'; // Adding string types for dates
}

if (!empty($employeeId)) {
    $params[] = $employeeId;
    $paramTypes .= 's'; // Adding a string type for employee ID
}

$stmt = $conn->prepare($query);
$stmt->bind_param($paramTypes, ...$params);
$stmt->execute();
$result = $stmt->get_result();


$records = $result->num_rows > 0 ? $result->fetch_all(MYSQLI_ASSOC) : [];

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Package History</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="tracking-page.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
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

    <?php if ($records): ?>
        <table>
            <caption>Package History</caption>
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
        <table>
            <caption>Tracking Info</caption>
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
                <?php foreach ($records as $record): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($record['on_truck']); ?></td>
                        <td><?php echo htmlspecialchars($record['starting_location_id']); ?></td>
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
        <p>No history records found for this tracking number.</p>
    <?php endif; ?>
</body>
</html>
