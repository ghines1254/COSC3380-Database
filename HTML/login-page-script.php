<?php
require_once 'init.php';
require_once "makeCustomerSession.php";

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    session_start();
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
            // Redirect to customer portal notifications page
            $user_info = getCustomerInfo($row[$email]);
            $_SESSION['user_info'] = $user_info;
            header("Location: customer-portal-nofications-page.php");
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Email not found.";
    }

    $stmt->close();
    $conn->close();
}
?>
