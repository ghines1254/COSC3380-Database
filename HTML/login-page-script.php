<?php
//require_once 'init.php'
require_once "makeCustomerSession";
?>
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

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate and sanitize inputs
    // ...

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT PASSWORD FROM CUSTOMER WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password === $row['PASSWORD']) {

            // Start Customer Session & Save Information
            $user_info = getCustomerInfo($email);
            $_SESSION['user_info'] = $user_info;
            // FOR TESTING PURPOSES REDIRECTING TO ACOUNT PAGE
            // Redirect to customer portal notifications page
            header("Location: account-page.php");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Email not found.";
    }

    $stmt->close();
    $conn->close();
    exit();
}
?>
