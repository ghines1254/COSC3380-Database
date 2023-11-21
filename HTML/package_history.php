<?php
require_once 'init.php';

$packageId = isset($_GET['tracking_number']) ? $_GET['tracking_number'] : '';
$startDate = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$endDate = isset($_GET['end_date']) ? $_GET['end_date'] : '';
$attribute = isset($_GET['attribute']) ? $_GET['attribute'] : '';

// Fetch the static tracking information
$queryTrackingInfo = "SELECT * FROM TRACKING_INFO WHERE package_id = ?";
$stmt = $conn->prepare($queryTrackingInfo);
$stmt->bind_param("s", $packageId);
$stmt->execute();
$trackingInfoResult = $stmt->get_result();
$trackingInfo = $trackingInfoResult->fetch_assoc();

// Construct the query for package history with optional filters
$queryPackageHistory = "SELECT * FROM PACKAGE_HISTORY WHERE package_id = ?";
if (!empty($startDate) && !empty($endDate)) {
    $queryPackageHistory .= " AND time_scanned BETWEEN ? AND ?";
}
if (!empty($attribute)) {
    $queryPackageHistory .= " AND ? IS NOT NULL";
}

$stmtHistory = $conn->prepare($queryPackageHistory);
if (!empty($startDate) && !empty($endDate) && !empty($attribute)) {
    $stmtHistory->bind_param("sss", $packageId, $startDate, $endDate, $attribute);
} elseif (!empty($startDate) && !empty($endDate)) {
    $stmtHistory->bind_param("sss", $packageId, $startDate, $endDate);
} elseif (!empty($attribute)) {
    $stmtHistory->bind_param("ss", $packageId, $attribute);
} else {
    $stmtHistory->bind_param("s", $packageId);
}
$stmtHistory->execute();
$packageHistoryResult = $stmtHistory->get_result();

// HTML and PHP mix to display the results
?>
<!DOCTYPE html>
<html>
<head>
    <title>Package History</title>
    <!-- Your styles and scripts here -->
</head>
<body>
<h2>Tracking History for Package: <?php echo htmlspecialchars($packageId); ?></h2>

<h3>Tracking Information</h3>
<table>
    <!-- Display the tracking information -->
    <?php foreach ($trackingInfo as $column => $value): ?>
        <tr>
            <th><?php echo htmlspecialchars($column); ?></th>
            <td><?php echo htmlspecialchars($value); ?></td>
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
        <!-- Populate this with options for your attributes -->
        <option value="">Select an attribute</option>
        <!-- ... Other options ... -->
    </select>

    <input type="hidden" name="tracking_number" value="<?php echo htmlspecialchars($packageId); ?>">
    <input type="submit" value="Filter">
</form>

<h3>Package History</h3>
<table>
    <!-- Headers for package history -->
    <tr>
        <th>Package ID</th>
        <th><?php echo !empty($attribute) ? htmlspecialchars($attribute) : 'Attribute'; ?></th>
        <th>Time Scanned</th>
    </tr>
    <!-- Display the package history -->
    <?php while ($row = $packageHistoryResult->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['package_id']); ?></td>
            <td><?php echo !empty($attribute) ? htmlspecialchars($row[$attribute]) : 'Value'; ?></td>
            <td><?php echo htmlspecialchars($row['time_scanned']); ?></td>
        </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
