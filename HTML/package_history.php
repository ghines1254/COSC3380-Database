<?php
require_once 'init.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

$trackingNumber = isset($_GET['tracking_number']) ? $_GET['tracking_number'] : '';
$selectedAttributes = isset($_POST['attributes']) ? $_POST['attributes'] : [];
$startDate = isset($_POST['startDate']) ? $_POST['startDate'] : '';
$endDate = isset($_POST['endDate']) ? $_POST['endDate'] : '';

// Define an array of all columns in PACKAGE_HISTORY
$allAttributes = [
    'Employee ID',
    'Location Type',
    'Location',
    'VIN',
];

// Initialize an empty array for params
$params = [];

// Create a function to build the SELECT clause based on selected attributes
function buildSelectClause($selectedAttributes) {
    $selectClause = 'package_id, time_scanned'; // Always include Package ID and Time Scanned
    foreach ($selectedAttributes as $attribute) {
        $selectClause .= ', ' . $attribute;
    }
    return $selectClause;
}

// Create a function to build the WHERE clause based on start and end dates
function buildWhereClause($startDate, $endDate, &$params) {
    $whereClause = '';
    if (!empty($startDate) && !empty($endDate)) {
        $whereClause = "WHERE time_scanned BETWEEN ? AND ?";
        $params[] = $startDate;
        $params[] = $endDate;
    }
    return $whereClause;
}

// Check if "Get Package History!" button is clicked
if (isset($_POST['getHistory'])) {
    // Build SELECT clause based on selected attributes
    $selectClause = buildSelectClause($selectedAttributes);
    
    // Build WHERE clause based on start and end dates
    $whereClause = buildWhereClause($startDate, $endDate, $params);
    
    // Prepare and execute the SQL query
    $query = "SELECT $selectClause FROM PACKAGE_HISTORY $whereClause";
    $stmt = $conn->prepare($query);
    
    // Check for query preparation errors
    if ($stmt === false) {
        die("Error preparing query: " . $conn->error);
    }
    
    // Bind parameters dynamically
    if ($params) {
        $paramTypes = str_repeat('s', count($params));
        if (!$stmt->bind_param($paramTypes, ...$params)) {
            die("Error binding parameters: " . $stmt->error);
        }
    }
    
    // Execute the query
    if (!$stmt->execute()) {
        die("Error executing query: " . $stmt->error);
    }
    
    $result = $stmt->get_result();
    
    $records = $result->num_rows > 0 ? $result->fetch_all(MYSQLI_ASSOC) : [];
    
    $stmt->close();
}

// Retrieve Tracking Info from the TRACKING_INFO table
$trackingInfo = [];
$query = "SELECT * FROM TRACKING_INFO WHERE tracking_number = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $trackingNumber);
if (!$stmt->execute()) {
    die("Error executing query: " . $stmt->error);
}
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $trackingInfo = $result->fetch_assoc();
}
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

    <!-- Display Tracking Info -->
    <h2>Tracking Info</h2>
    <table>
        <tbody>
            <tr>
                <td>On Truck</td>
                <td><?php echo htmlspecialchars($trackingInfo['on_truck']); ?></td>
            </tr>
            <tr>
                <td>Starting Location</td>
                <td><?php echo htmlspecialchars($trackingInfo['starting_location_id']); ?></td>
            </tr>
            <tr>
                <td>Received</td>
                <td><?php echo $trackingInfo['received'] ? 'YES' : 'NO'; ?></td>
            </tr>
            <tr>
                <td>Delivered By</td>
                <td><?php echo htmlspecialchars($trackingInfo['delivered_by']); ?></td>
            </tr>
            <tr>
                <td>Created On</td>
                <td><?php echo htmlspecialchars($trackingInfo['created_on']); ?></td>
            </tr>
            <tr>
                <td>Last Updated</td>
                <td><?php echo htmlspecialchars($trackingInfo['last_updated']); ?></td>
            </tr>
            <tr>
                <td>ETA</td>
                <td><?php echo htmlspecialchars($trackingInfo['eta']); ?></td>
            </tr>
        </tbody>
    </table>

    <!-- Display Date Selection -->
    <h2>Date Selection</h2>
    <form action="package_history.php" method="post">
        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" name="startDate" value="<?php echo htmlspecialchars($startDate); ?>">
        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" name="endDate" value="<?php echo htmlspecialchars($endDate); ?>">
        <input type="submit" name="getHistory" value="Get Package History!">
    </form>

    <!-- Display Package History Selection -->
    <h2>Package History</h2>
    <form action="package_history.php" method="post">
        <?php foreach ($allAttributes as $attribute): ?>
            <label>
                <input type="checkbox" name="attributes[]" value="<?php echo htmlspecialchars($attribute); ?>" <?php echo in_array($attribute, $selectedAttributes) ? 'checked' : ''; ?>>
                <?php echo htmlspecialchars($attribute); ?>
            </label>
        <?php endforeach; ?>
    </form>

    <!-- Display Package History -->
    <?php if (isset($records)): ?>
        <h2>Package History Results</h2>
        <table>
            <thead>
                <tr>
                    <?php foreach ($selectedAttributes as $attribute): ?>
                        <th><?php echo htmlspecialchars($attribute); ?></th>
                    <?php endforeach; ?>
                    <th>Package ID</th>
                    <th>Time Scanned</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record): ?>
                    <tr>
                        <?php foreach ($selectedAttributes as $attribute): ?>
                            <td><?php echo htmlspecialchars($record[$attribute]); ?></td>
                        <?php endforeach; ?>
                        <td><?php echo htmlspecialchars($record['package_id']); ?></td>
                        <td><?php echo htmlspecialchars($record['time_scanned']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
