<?php
require_once 'init.php';

$packageId = isset($_GET['tracking_number']) ? $_GET['tracking_number'] : '';
$startDate = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$endDate = isset($_GET['end_date']) ? $_GET['end_date'] : '';
$attribute = isset($_GET['attribute']) ? $_GET['attribute'] : '';

// Define a mapping of database column names to user-friendly display names
$columnDisplayNameMap = [
    'emp_id' => 'Employee ID',
    'location' => 'Location',
    'time_scanned' => 'Time Scanned',
    'vin' => 'Truck No.',
    // Other attributes can be added here
];

// Fetch the static tracking information
$queryTrackingInfo = "SELECT * FROM TRACKING_INFO WHERE package_id = ?";
$stmt = $conn->prepare($queryTrackingInfo);
$stmt->bind_param("s", $packageId);
$stmt->execute();
$trackingInfoResult = $stmt->get_result();
$trackingInfo = $trackingInfoResult->fetch_assoc();

// Fetch package history data
$queryPackageHistory = "SELECT * FROM PACKAGE_HISTORY WHERE package_id = ?";
$parameters = [$packageId];

if (!empty($startDate) && !empty($endDate)) {
    $queryPackageHistory .= " AND time_scanned BETWEEN ? AND ?";
    array_push($parameters, $startDate, $endDate);
}

$stmtHistory = $conn->prepare($queryPackageHistory);
$stmtHistory->bind_param(str_repeat("s", count($parameters)), ...$parameters);
$stmtHistory->execute();
$packageHistoryResult = $stmtHistory->get_result();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Package History</title>
    <!-- Include your stylesheet links and other head elements here -->
</head>
<body>
<h2>Tracking History for Package: <?php echo htmlspecialchars($packageId); ?></h2>

<h3>Package History</h3>
<table border="1">
    <!-- Customized headers for package history -->
    <tr>
        <th>Package ID</th> <!-- Always show Package ID -->
        <?php if ($attribute == 'location'): ?>
            <!-- Show the Location header when 'Location' is selected -->
            <th>Location</th>
        <?php elseif (!empty($attribute)): ?>
            <!-- Show the selected attribute with a friendly name -->
            <th><?php echo $columnDisplayNameMap[$attribute] ?? $attribute; ?></th>
        <?php else: ?>
            <!-- If no attribute is selected, show all columns -->
            <th>Employee ID</th>
            <th>Location</th>
            <th>Time Scanned</th>
            <th>Truck No.</th>
        <?php endif; ?>
        <?php if (empty($attribute) || $attribute == 'location'): ?>
            <!-- Always show Time Scanned when no attribute or 'Location' is selected -->
            <th>Time Scanned</th>
        <?php endif; ?>
    </tr>
    <!-- Display the package history with the customized column names and values -->
    <?php while ($row = $packageHistoryResult->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['package_id']); ?></td> <!-- Always show Package ID -->
            <?php if ($attribute == 'location'): ?>
                <!-- Show human-readable 'Location' value when 'Location' is selected -->
                <td><?php
                    switch ($row['location']) {
                        case '1': echo 'Post Office 1'; break;
                        case '2': echo 'Post Office 2'; break;
                        case '3': echo 'Distribution Center'; break;
                        case '4': echo 'Transit Facility'; break;
                        case '5': echo 'Delivered'; break;
                        default: echo htmlspecialchars($row['location']);
                    }
                ?></td>
                <td><?php echo htmlspecialchars($row['time_scanned']); ?></td> <!-- Always show Time Scanned -->
            <?php elseif (!empty($attribute)): ?>
                <!-- Show the selected attribute value -->
                <td><?php echo htmlspecialchars($row[$attribute]); ?></td>
            <?php else: ?>
                <!-- If no attribute is selected, show all column values -->
                <td><?php echo htmlspecialchars($row['emp_id']); ?></td>
                <td><?php
                    switch ($row['location']) {
                        case '1': echo 'Post Office 1'; break;
                        case '2': echo 'Post Office 2'; break;
                        case '3': echo 'Distribution Center'; break;
                        case '4': echo 'Transit Facility'; break;
                        case '5': echo 'Delivered'; break;
                        default: echo htmlspecialchars($row['location']);
                    }
                ?></td>
                <td><?php echo htmlspecialchars($row['time_scanned']); ?></td>
                <td><?php echo htmlspecialchars($row['vin']); ?></td>
            <?php endif; ?>
        </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
