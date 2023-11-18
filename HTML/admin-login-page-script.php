<?php
require_once 'init.php'; // Assuming this initializes your environment

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
    $adminEmail = $_POST['adminEmail']; // Assuming the form field for admin email is named 'adminEmail'
    $adminPassword = $_POST['adminPassword']; // Assuming the form field for admin password is named 'adminPassword'

    // Validate and sanitize inputs
    // ...

    // Prepare and execute the query for admin login
    $stmt = $conn->prepare("SELECT emp_password FROM EMPLOYEE WHERE email = ?"); // Replace 'EMPLOYEE' and 'emp_password' with your admin table and column names
    $stmt->bind_param("s", $adminEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($adminPassword === $row['emp_password']) { // Replace 'emp_password' with the actual admin password column name
            // Admin authentication successful
            header("Location: admin-portal-nofications-page.html"); // Redirect to the admin portal page
            exit;
        } else {
            alert("Invalid password.");
        }
    } else {
        alert("Admin email not found.");
    }

    $stmt->close();
    $conn->close();
}
?>
