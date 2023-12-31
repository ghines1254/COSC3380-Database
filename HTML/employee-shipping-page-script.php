<?php
session_start(); 

if (!isset($_SESSION['emp_info'])) {
  // Redirect to login page if user is not logged in
  header('Location: employee-login-page.php');
  exit();
}

$emp_info = $_SESSION['emp_info'];

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

  
   
    $trackingNumber = substr(uniqid(), 0, 6); 


    $stmt = $conn->prepare("SELECT customer_id FROM CUSTOMER WHERE email = ?");
    $stmt->bind_param("s", $email);

    if(!$stmt->execute()){
      echo "Customer not in system";
      exit();
    }

    //Grab results
    $stmt->bind_result($customer_id);
    $stmt->fetch();
    if($customer_id == NULL){
      echo "Customer not in system, create account";
      exit();
    }
    $stmt->close();

    

    // Insert receiver info into RECEIVER table
    $stmt = $conn->prepare("INSERT INTO RECEIVER (fname, lname, middle_initial, address_line_1, address_line_2, city, state, zip_code, email, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $receiver_fname, $receiver_lname, $receiver_middle_initial, $receiver_address_line_1, $receiver_address_line_2, $receiver_city, $receiver_state, $receiver_zip_code, $receiver_email, $receiver_phone);
    $stmt->execute();

    // Combine full addresses and names for sender and receiver
    $sender_full_address = $street_address_1 . ' ' . $street_address_2 . ', ' . $city . ', ' . $state . ' ' . $zip;
    $sender_full_name = $first_name . ' ' . $middle_initial . ' ' . $last_name;

    $receiver_full_address = $receiver_address_line_1 . ' ' . $receiver_address_line_2 . ', ' . $receiver_city . ', ' . $receiver_state . ' ' . $receiver_zip_code;
    $receiver_full_name = $receiver_fname . ' ' . $receiver_middle_initial . ' ' . $receiver_lname;





  // Insert combined data, tracking number, and sender's email into PACKAGE table
    $stmt = $conn->prepare("INSERT INTO PACKAGE (tracking_number, sender_full_address, sender_full_name, receiver_full_address, receiver_full_name, sender_email) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $trackingNumber, $sender_full_address, $sender_full_name, $receiver_full_address, $receiver_full_name, $email);
    $stmt->execute();
    // ... bind additional parameters for PACKAGE table ...
    // After successfully executing the INSERT query for PACKAGE table

    //Returning Customer, add to package list
    $stmt = $conn->prepare("INSERT INTO Customer_To_Package (customer_id, package_id) VALUES (?, ?)");
    $stmt->bind_param("ss", $customer_id, $trackingNumber);
    $stmt->execute();

    $_SESSION['trackingNumber'] = $trackingNumber;
    $startingPostOffice = "PO1";
    $receivedTrue = 1;
    $stmt = $conn->prepare("INSERT INTO TRACKING_INFO (package_id, starting_location_id, received) VALUES(?,?,?)");
    $stmt->bind_param("sss",$trackingNumber, $startingPostOffice, $receivedTrue);
    $stmt->execute();

    //add shipment to SALES table
    $packageProductID = "P0000";
    $packagePrice = 5.99;
    $currentBranch = $emp_info['branch_id'];
    $stmt = $conn->prepare("INSERT INTO SALES (product_id, product_price, branch_id) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $packageProductID, $packagePrice, $currentBranch);
    $stmt->execute();

    // Redirect or confirm successful submission
    header("Location: employee-shipping-page-confimration.php"); // Redirect to a confirmation page
    exit;
}

$conn->close();
?>
