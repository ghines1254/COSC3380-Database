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

// Get all columns from PACKAGE_HISTORY to use in the filter dropdown
$columnsQuery = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'Post_Office_Schema' AND TABLE_NAME = 'PACKAGE_HISTORY'";
$columnsResult = $conn->query($columnsQuery);
$columns = $columnsResult->fetch_all(MYSQLI_ASSOC);

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
        <option value="">Select an attribute</option>
        <?php foreach ($columns as $column): ?>
            <option value="<?php echo $column['COLUMN_NAME']; ?>" <?php echo ($attribute == $column['COLUMN_NAME']) ? 'selected' : ''; ?>>
                <?php echo $column['COLUMN_NAME']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <input type="hidden" name="tracking_number" value="<?php echo htmlspecialchars($packageId); ?>">
    <input type="submit" value="Filter">
</form>

<h3>Package History</h3>
<table border="1">
    <!-- Headers for package history -->
    <tr>
        <?php foreach ($columns as $column): ?>
            <th><?php echo htmlspecialchars($column['COLUMN_NAME']); ?></th>
        <?php endforeach; ?>
    </tr>
    <!-- Display the package history -->
    <?php while ($row = $packageHistoryResult->fetch_assoc()): ?>
        <tr>
            <?php foreach ($columns as $column): ?>
                <td><?php echo htmlspecialchars($row[$column['COLUMN_NAME']]); ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
