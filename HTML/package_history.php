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

<h3>Tracking Information</h3>
<table border="1">
    <!-- Display the tracking information with customized column names and values -->
    <?php foreach ($trackingInfo as $column => $value): ?>
        <tr>
            <th>
                <?php
                switch ($column) {
                    case 'package_id': echo 'Package Number'; break;
                    case 'on_truck': echo 'Out for Delivery?'; break;
                    case 'starting_location_id': echo 'Starting Location'; break;
                    case 'received': echo 'Package Received by Post Office'; break;
                    case 'delivered_by': echo 'Delivered By'; break;
                    case 'created_on': echo 'Package Created On'; break;
                    case 'last_updated': echo 'Last Updated'; break;
                    case 'eta': echo 'Estimated Delivery'; break;
                    default: echo htmlspecialchars($column);
                }
                ?>
            </th>
            <td>
                <?php
                switch ($column) {
                    case 'on_truck': echo $value == '1' ? 'Yes' : 'Not yet'; break;
                    case 'received': echo $value == '1' ? 'Yes' : 'No'; break;
                    case 'starting_location_id': echo $value == 'PO1' ? 'Post Office 1' : ($value == 'PO2' ? 'Post Office 2' : htmlspecialchars($value)); break;
                    default: echo htmlspecialchars($value);
                }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<!-- Form for filters -->
<form method="GET">
    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date" value="<?php echo htmlspecialchars($startDate); ?>">

    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date" value="<?php echo htmlspecialchars($endDate); ?>">

    <label for="attribute">Attribute:</label>
    <select id="attribute" name="attribute">
        <option value="">Select an attribute</option>
        <?php foreach ($columnDisplayNameMap as $columnName => $displayName): ?>
            <option value="<?php echo $columnName; ?>" <?php echo ($attribute == $columnName) ? 'selected' : ''; ?>>
                <?php echo $displayName; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <input type="hidden" name="tracking_number" value="<?php echo htmlspecialchars($packageId); ?>">
    <input type="submit" value="Filter">
</form>

<h3>Package History</h3>
<table border="1">
    <!-- Customized headers for package history -->
    <tr>
        <th>Package ID</th> <!-- Always show Package ID -->
        <?php if (!empty($attribute) && $attribute != 'location'): ?>
            <th><?php echo $columnDisplayNameMap[$attribute] ?? $attribute; ?></th> <!-- Show the selected attribute with a friendly name -->
        <?php else: ?>
            <!-- If no attribute is selected or if it's 'location', show all columns with friendly names -->
            <?php foreach ($columnDisplayNameMap as $columnName => $displayName): ?>
                <th><?php echo $displayName; ?></th>
            <?php endforeach; ?>
            <th>Location</th> <!-- Add Location header -->
        <?php endif; ?>
        <th>Time Scanned</th> <!-- Always show Time Scanned -->
    </tr>
    <!-- Display the package history with the customized column names and values -->
    <?php while ($row = $packageHistoryResult->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['package_id']); ?></td> <!-- Always show Package ID -->
            <?php if (!empty($attribute) && $attribute != 'location'): ?>
                <!-- Show the selected attribute value -->
                <td><?php echo htmlspecialchars($row[$attribute]); ?></td>
            <?php else: ?>
                <!-- If no attribute is selected or if it's 'location', show all column values -->
                <?php foreach ($columnDisplayNameMap as $columnName => $displayName): ?>
                    <td><?php echo htmlspecialchars($row[$columnName]); ?></td>
                <?php endforeach; ?>
                <!-- Translate the location to the human-readable format -->
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
            <?php endif; ?>
            <td><?php echo htmlspecialchars($row['time_scanned']); ?></td> <!-- Always show Time Scanned -->
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
