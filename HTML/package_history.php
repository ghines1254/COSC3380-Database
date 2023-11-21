<?php
require_once 'init.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

$trackingNumber = isset($_GET['tracking_number']) ? $_GET['tracking_number'] : '';
$selectedAttribute = isset($_GET['attribute']) ? $_GET['attribute'] : '';

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

// Apply attribute filter if a specific attribute is selected
if (!empty($selectedAttribute)) {
    switch ($selectedAttribute) {
        case 'Employee ID':
            $query .= " AND ph.emp_id = ?";
            $packageHistoryHeader = "Scanned By Employee";
            break;
        case 'Location':
            $query .= " AND ph.location = ?";
            $packageHistoryHeader = "Location";
            break;
        case 'Starting Location':
            $query .= " AND ti.starting_location_id = ?";
            $packageHistoryHeader = "Starting Location";
            break;
        // Add more cases for other attributes as needed
    }
}

$params = [$trackingNumber]; // Starting with tracking number
$paramTypes = 's'; // Tracking number is a string

if (!empty($selectedAttribute)) {
    $params[] = $selectedAttribute; // Add the selected attribute to params
    $paramTypes .= 's'; // Adding a string type for the selected attribute
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
        <label for="attribute">Select Attribute:</label>
        <select id="attribute" name="attribute">
            <option value="">-- Select Attribute --</option>
            <option value="Employee ID">Employee ID</option>
            <option value="Location">Location</option>
            <option value="Starting Location">Starting Location</option>
            <!-- Add more options for other attributes as needed -->
        </select>
        <input type="submit" value="Filter">
    </form>

    <!-- Display Tracking Info -->
    <table>
        <caption>Tracking Info</caption>
        <thead>
            <tr>
                <th>On Truck</th>
                <th>Starting Location</th>
                <th>Received</th>
                <th>Delivered By Employee ID</th>
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
                    <td><?php echo ($record['received'] == 1) ? 'YES' : 'NO'; ?></td>
                    <td><?php echo htmlspecialchars($record['delivered_by']); ?></td>
                    <td><?php echo htmlspecialchars($record['created_on']); ?></td>
                    <td><?php echo htmlspecialchars($record['last_updated']); ?></td>
                    <td><?php echo htmlspecialchars($record['eta']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Display Package History -->
    <table>
        <caption>Package History</caption>
        <thead>
            <tr>
                <th>Package ID</th>
                <th><?php echo isset($packageHistoryHeader) ? $packageHistoryHeader : 'Scanned By Employee'; ?></th>
                <th>Location Type</th>
                <th>Location</th>
                <th>Truck Number</th>
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
</body>
</html>
