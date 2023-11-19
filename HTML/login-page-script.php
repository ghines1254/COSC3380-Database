<?php
session_start();
require_once 'init.php';
?>

<?php

function getCustomerInfo($email) {
    $connection = connectToDatabase();

    $stmt = $connection->prepare("SELECT customer_id, first_name, email FROM CUSTOMER WHERE email = ?");
    $stmt->bind_param("s", $email);
    if (!$stmt->execute()) {
        die("Error in executing the statement: " . $stmt->error);
    }
    $stmt->execute();
    echo "SQL Statement: " . $stmt->sqlstate;
    $stmt->bind_result($customer_id, $first_name, $email);

    $stmt->fetch();

    $stmt->close();
    $connection->close();

    return ['customer_id' => $customer_id, 'first_name' => $first_name, 'email' => $email];
}

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
            $user_info = getCustomerInfo($email);
            echo $user_info[0] . " " . $user_info[1] . " " . $user_info[2];
            $_SESSION['user_info'] = $user_info;

            echo "\n redirecting now";
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
