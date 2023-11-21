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
    'Package ID',
    'Employee ID',
    'Location Type',
    'Location',
    'VIN',
    'Time Scanned',
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
    
    // Bind parameters dynamically
    if ($params) {
        $paramTypes = str_repeat('s', count($params));
        $stmt->bind_param($paramTypes, ...$params);
    }
    
    $stmt->execute();
    $result = $stmt->get_result();
    
    $records = $result->num_rows > 0 ? $result->fetch_all(MYSQLI_ASSOC) : [];
    
    $stmt->close();
}

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
    <!-- Replace with your code to display "Tracking Info" here -->

    <!-- Display Package History Selection -->
    <h2>Package History</h2>
    <form action="package_history.php" method="post">
        <?php foreach ($allAttributes as $attribute): ?>
            <label>
                <input type="checkbox" name="attributes[]" value="<?php echo htmlspecialchars($attribute); ?>" <?php echo in_array($attribute, $selectedAttributes) ? 'checked' : ''; ?>>
                <?php echo htmlspecialchars($attribute); ?>
            </label>
        <?php endforeach; ?>
        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" name="startDate" value="<?php echo htmlspecialchars($startDate); ?>">
        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" name="endDate" value="<?php echo htmlspecialchars($endDate); ?>">
        <input type="submit" name="getHistory" value="Get Package History!">
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
