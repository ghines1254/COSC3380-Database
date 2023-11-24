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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Tracking History</title>
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="tracking-page.css">
</head>
<body>
    <div class="tracking-page">
        <!-- Placeholder for Navigation Bar -->
        <div class="navigation-bar-light34">
            <!-- Navbar content like logo, links, login button goes here -->
        </div>

        <!-- Sidebar with Menu -->
        <div class="frame-wrapper30">
            <!-- Sidebar content with menu items goes here -->
        </div>

        <!-- Main Content Area -->
        <div class="portal-centering-frame22">
            <div class="customer-portal-outline9">
                <div class="frame-parent76">
                    <!-- Replace 'Tracking Packages' header with dynamic package ID -->
                    <div class="welcome-to-your-portal-page-wrapper27">
                        <b class="welcome-to-your29">Package History for Package: <?php echo htmlspecialchars($packageId); ?></b>
                    </div>
                    
                    <!-- Main tracking area now contains the PHP generated tables -->
                    <div class="tracking-outline1">
                        <!-- Tracking Information Table -->
                        <h3>Tracking Information</h3>
                        <table border="1">
                            <?php foreach ($trackingInfo as $column => $value): ?>
                            <tr>
                                <th><?php echo $columnDisplayNameMap[$column] ?? $column; ?></th>
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
                                <?php foreach ($columnDisplayNameMap as $columnName => $displayName): ?>
                                <option value="<?php echo $columnName; ?>" <?php echo ($attribute == $columnName) ? 'selected' : ''; ?>>
                                    <?php echo $displayName; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>

                            <input type="hidden" name="tracking_number" value="<?php echo htmlspecialchars($packageId); ?>">
                            <input type="submit" value="Filter">
                        </form>

                        <!-- Package History Table -->
                        <h3>Package History</h3>
                        <table border="1">
                            <tr>
                                <?php foreach ($columnDisplayNameMap as $columnName => $displayName): ?>
                                <th><?php echo $displayName; ?></th>
                                <?php endforeach; ?>
                            </tr>
                            <?php while ($row = $packageHistoryResult->fetch_assoc()): ?>
                            <tr>
                                <?php foreach ($columnDisplayNameMap as $columnName => $displayName): ?>
                                <td>
                                    <?php
                                    if ($columnName == 'location') {
                                        switch ($row[$columnName]) {
                                            case '1': echo 'Post Office 1'; break;
                                            case '2': echo 'Post Office 2'; break;
                                            case '3': echo 'Distribution Center'; break;
                                            case '4': echo 'Transit Facility'; break;
                                            case '5': echo 'Delivered'; break;
                                            default: echo htmlspecialchars($row[$columnName]);
                                        }
                                    } else {
                                        echo htmlspecialchars($row[$columnName]);
                                    }
                                    ?>
                                </td>
                                <?php endforeach; ?>
                            </tr>
                            <?php endwhile; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
