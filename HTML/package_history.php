<?php
require_once 'init.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

$trackingNumber = isset($_GET['tracking_number']) ? $_GET['tracking_number'] : '';
$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : '';
$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : '';
$employeeId = isset($_GET['employeeId']) ? $_GET['employeeId'] : '';

// New query to fetch data for the tracking info
$queryTrackingInfo = "
    SELECT 
        ti.starting_location_id,
        CASE 
            WHEN ti.received = 1 THEN 'YES'
            ELSE 'NO'
        END AS received_status,
        ti.delivered_by AS delivered_by_employee_id,
        ti.created_on,
        ti.last_updated,
        ti.eta
    FROM 
        PACKAGE_HISTORY ph
    LEFT JOIN 
        TRACKING_INFO ti ON ph.package_id = ti.package_id
    WHERE 
        ph.package_id = ?";

if (!empty($startDate) && !empty($endDate)) {
    $queryTrackingInfo .= " AND ph.time_scanned BETWEEN ? AND ?";
}

if (!empty($employeeId)) {
    $queryTrackingInfo .= " AND ph.emp_id = ?";
}

$paramsTrackingInfo = [$trackingNumber]; // Starting with tracking number
$paramTypesTrackingInfo = 's'; // Tracking number is a string

if (!empty($startDate) && !empty($endDate)) {
    $paramsTrackingInfo[] = $startDate;
    $paramsTrackingInfo[] = $endDate;
    $paramTypesTrackingInfo .= 'ss'; // Adding string types for dates
}

if (!empty($employeeId)) {
    $paramsTrackingInfo[] = $employeeId;
    $paramTypesTrackingInfo .= 's'; // Adding a string type for employee ID
}

$stmtTrackingInfo = $conn->prepare($queryTrackingInfo);
if (!$stmtTrackingInfo) {
    die("Prepare failed: " . mysqli_error($conn));
}

$stmtTrackingInfo->bind_param($paramTypesTrackingInfo, ...$paramsTrackingInfo);
$stmtTrackingInfo->execute();
$resultTrackingInfo = $stmtTrackingInfo->get_result();

$trackingInfo = $resultTrackingInfo->num_rows > 0 ? $resultTrackingInfo->fetch_assoc() : null;

// New query to fetch data for package history
$queryPackageHistory = "
    SELECT 
        ph.package_id, ph.emp_id AS scanned_by_employee, ph.location_type, ph.location,
        ph.vin AS truck_number, ph.time_scanned
    FROM 
        PACKAGE_HISTORY ph
    WHERE 
        ph.package_id = ?";

$stmtPackageHistory = $conn->prepare($queryPackageHistory);
$stmtPackageHistory->bind_param('s', $trackingNumber);
$stmtPackageHistory->execute();
$resultPackageHistory = $stmtPackageHistory->get_result();

$packageHistory = $resultPackageHistory->num_rows > 0 ? $resultPackageHistory->fetch_all(MYSQLI_ASSOC) : [];

$stmtTrackingInfo->close();
$stmtPackageHistory->close();
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
        <label for="employeeId">Delivered By:</label>
        <select id="employeeId" name="employeeId">
            <option value="">All</option>
            <?php
            // Fetch the list of employees who have delivered packages
            $queryEmployees = "SELECT DISTINCT delivered_by FROM TRACKING_INFO";
            $resultEmployees = $conn->query($queryEmployees);
            
            if ($resultEmployees->num_rows > 0) {
                while ($row = $resultEmployees->fetch_assoc()) {
                    $employee = $row['delivered_by'];
                    $selected = $employeeId == $employee ? 'selected' : '';
                    echo "<option value=\"$employee\" $selected>$employee</option>";
                }
            }
            ?>
        </select>
        <input type="submit" value="Filter">
    </form>

    <?php if ($trackingInfo): ?>
        <!-- Tracking Info Table -->
        <table>
            <caption>Tracking Info</caption>
            <thead>
                <tr>
                    <th>Starting Location</th>
                    <th>Received</th>
                    <th>Delivered By Employee ID</th>
                    <th>Created On</th>
                    <th>Last Updated</th>
                    <th>ETA</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo htmlspecialchars($trackingInfo['starting_location_id']); ?></td>
                    <td><?php echo htmlspecialchars($trackingInfo['received_status']); ?></td>
                    <td><?php echo htmlspecialchars($trackingInfo['delivered_by_employee_id']); ?></td>
                    <td><?php echo htmlspecialchars($trackingInfo['created_on']); ?></td>
                    <td><?php echo htmlspecialchars($trackingInfo['last_updated']); ?></td>
                    <td><?php echo htmlspecialchars($trackingInfo['eta']); ?></td>
                </tr>
            </tbody>
        </table>
    <?php endif; ?>

    <?php if ($packageHistory): ?>
        <!-- Package History Table -->
        <table>
            <caption>Package History</caption>
            <thead>
                <tr>
                    <th>Package ID</th>
                    <th>Scanned By Employee</th>
                    <th>Location Type</th>
                    <th>Location</th>
                    <th>Truck Number</th>
                    <th>Time Scanned</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($packageHistory as $record): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($record['package_id']); ?></td>
                        <td><?php echo htmlspecialchars($record['scanned_by_employee']); ?></td>
                        <td><?php echo htmlspecialchars($record['location_type']); ?></td>
                        <td><?php echo htmlspecialchars($record['location']); ?></td>
                        <td><?php echo htmlspecialchars($record['truck_number']); ?></td>
                        <td><?php echo htmlspecialchars($record['time_scanned']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No history records found for this tracking number.</p>
    <?php endif; ?>
</body>
</html>
