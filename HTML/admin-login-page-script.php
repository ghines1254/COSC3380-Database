<?php
// Database connection details
$host = "34.68.154.206";
$database = "Post_Office_Schema";
$user = "root";
$password = "umapuma";

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminEmail = $_POST['adminEmail'];
    $adminPassword = $_POST['adminPassword'];

    // Validate and sanitize inputs
    // ...

    // Prepare and execute the query for admin login
    $stmt = $conn->prepare("SELECT emp_password FROM EMPLOYEE WHERE email = ?"); 
    $stmt->bind_param("s", $adminEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($adminPassword === $row['admin_password']) {
            // Redirect to admin portal notifications page
            header("Location: ./admin-portal-notifications-page.html");
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Admin email not found.";
    }

    $stmt->close();
    $conn->close();
}
?>
