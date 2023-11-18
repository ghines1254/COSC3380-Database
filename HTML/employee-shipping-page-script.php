



<?php
session_start(); // Start the session at the beginning of the script


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);




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
    // Extract sender information
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_initial = $_POST['middle_initial'];
    $street_address_1 = $_POST['street_address_1'];
    $street_address_2 = $_POST['street_address_2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $email = $_POST['email'];
    $customer_phone = $_POST['customer_phone'];

    // Extract receiver information
    $receiver_fname = $_POST['fname'];
    $receiver_lname = $_POST['lname'];
    $receiver_middle_initial = $_POST['receiver_middle_initial'];
    $receiver_address_line_1 = $_POST['address_line_1'];
    $receiver_address_line_2 = $_POST['address_line_2'];
    $receiver_city = $_POST['receiver_city'];
    $receiver_state = $_POST['receiver_state'];
    $receiver_zip_code = $_POST['zip_code'];
    $receiver_email = $_POST['receiver_email'];
    $receiver_phone = $_POST['receiver_phone'];

  
    // Insert sender info into CUSTOMER table
    $stmt = $conn->prepare("INSERT INTO CUSTOMER (first_name, last_name, middle_initial, street_address_1, street_address_2, city, state, zip, email, customer_phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $first_name, $last_name, $middle_initial, $street_address_1, $street_address_2, $city, $state, $zip, $email, $customer_phone);
    $stmt->execute();

    // Insert receiver info into RECEIVER table
    $stmt = $conn->prepare("INSERT INTO RECEIVER (fname, lname, middle_initial, address_line_1, address_line_2, city, state, zip_code, email, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $receiver_fname, $receiver_lname, $receiver_middle_initial, $receiver_address_line_1, $receiver_address_line_2, $receiver_city, $receiver_state, $receiver_zip_code, $receiver_email, $receiver_phone);
    $stmt->execute();

    // Combine full addresses and names for sender and receiver
    $sender_full_address = $street_address_1 . ' ' . $street_address_2 . ', ' . $city . ', ' . $state . ' ' . $zip;
    $sender_full_name = $first_name . ' ' . $middle_initial . ' ' . $last_name;

    $receiver_full_address = $receiver_address_line_1 . ' ' . $receiver_address_line_2 . ', ' . $receiver_city . ', ' . $receiver_state . ' ' . $receiver_zip_code;
    $receiver_full_name = $receiver_fname . ' ' . $receiver_middle_initial . ' ' . $receiver_lname;


    // Generate unique tracking number
    $trackingNumber = substr(uniqid(), 0, 6); // Adjust the second parameter as needed


   // Insert combined data and tracking number into PACKAGE table
    $stmt = $conn->prepare("INSERT INTO PACKAGE (tracking_number, sender_full_address, sender_full_name, receiver_full_address, receiver_full_name) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $trackingNumber, $sender_full_address, $sender_full_name, $receiver_full_address, $receiver_full_name);
    $stmt->execute();
    // ... bind additional parameters for PACKAGE table ...
    

    // Redirect or confirm successful submission
    header("Location: employee-shipping-page-confimration.php"); // Redirect to a confirmation page
    exit;
}

$conn->close();
?>
