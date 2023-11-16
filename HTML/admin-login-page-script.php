<?php
// Database connection logic here

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
            // Admin authentication successful
            // Redirect or start session, etc.
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

