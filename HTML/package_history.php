<?php
require_once 'init.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

$trackingNumber = isset($_GET['tracking_number']) ? $_GET['tracking_number'] : '';
$selectedAttribute = isset($_GET['attribute']) ? $_GET['attribute'] : '';
$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : '';
$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : '';

// Define an array of attributes available in both "Tracking Info" and "Package History"
$attributes = [
    'Employee ID',
    'Location',
    'Starting Location',
    // Add more attributes as needed
];

// Initialize an empty array for params
$params = [];

// Create a function to build the WHERE clause based on the selected attribute
function buildWhereClause($selectedAttribute, &$params) {
    switch ($selectedAttribute) {
        case 'Employee ID':
            $whereClause = " WHERE ph.emp_id = ?";
            break;
        case 'Location':
            $whereClause = " WHERE ph.location = ?";
            break;
        case 'Starting Location':
            $whereClause = " WHERE ti.starting_location_id = ?";
            break;
        // Add more cases for other attributes as needed
        default:
            $whereClause = "";
    }
    // Add selected attribute to params
    $params[] = $selectedAttribute;
    return $whereClause;
}

$query = "
    SELECT 
        ph.package_id, ph.emp_id, ph.location_type, ph.location, ph.vin, ph.time_scanned,
        ti.on_truck, ti.starting_location_id, ti.received, ti.delivered_by, ti.created_on, ti.last_updated, ti.eta
    FROM 
        PACKAGE_HISTORY ph
    LEFT JOIN 
        TRACKING_INFO ti ON ph.package_id = ti.package_id";

// Apply attribute filter if a specific attribute is selected
if (!empty($selectedAttribute)) {
    $whereClause = buildWhereClause($selectedAttribute, $params);
    $query .= $whereClause;
}

// Apply date filters for the "Package History" section
if (!empty($startDate) && !empty($endDate)) {
    if (strpos($query, 'WHERE') !== false) {
        $query .= " AND ph.time_scanned BETWEEN ? AND ?";
    } else {
        $query .= " WHERE ph.time_scanned BETWEEN ? AND ?";
    }
    // Add start and end dates to params
    $params[] = $startDate;
    $params[] = $endDate;
}

$stmt = $conn->prepare($query);

// Bind parameters dynamically
if ($params) {
    $paramTypes = str_repeat('s', count($params));
    $stmt->bind_param($paramTypes, ...$params);
}

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
    <style>
        /* Add CSS styles for hiding columns */
        .hidden-column {
            display: none;
        }
    </style>
</head>
<body>
    <h1>Package History for Tracking Number: <?php echo htmlspecialchars($trackingNumber); ?></h1>

    <!-- Filter Form -->
    <form action="package_history.php" method="get">
        <input type="hidden" name="tracking_number" value="<?php echo htmlspecialchars($trackingNumber); ?>">
        <label for="attribute">Select Attribute:</label>
        <select id="attribute" name="attribute">
            <option value="">-- Select Attribute --</option>
            <?php foreach ($attributes as $attribute): ?>
                <option value="<?php echo htmlspecialchars($attribute); ?>" <?php echo ($selectedAttribute == $attribute) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($attribute); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" name="startDate" value="<?php echo htmlspecialchars($startDate); ?>">
        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" name="endDate" value="<?php echo htmlspecialchars($endDate); ?>">
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
                <?php if (!empty($selectedAttribute)): ?>
                    <th><?php echo htmlspecialchars($selectedAttribute); ?></th>
                <?php endif; ?>
                <th class="hidden-column">Employee ID</th>
                <th class="hidden-column">Location</th>
                <th class="hidden-column">Starting Location</th>
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
                    <?php if (!empty($selectedAttribute)): ?>
                        <td><?php echo htmlspecialchars($record[$selectedAttribute]); ?></td>
                    <?php endif; ?>
                    <td class="hidden-column"><?php echo htmlspecialchars($record['emp_id']); ?></td>
                    <td class="hidden-column"><?php echo htmlspecialchars($record['location']); ?></td>
                    <td class="hidden-column"><?php echo htmlspecialchars($record['starting_location_id']); ?></td>
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
