<?php
require_once 'init.php';
?>

<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_info'])) {
    // Redirect to the login page if the user is not logged in
    header('Location: login-page.php');
    exit();
}

$user_info = $_SESSION['user_info'];

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

$currentUserID = $user_info['customer_id'];
$stmt = $conn->prepare("SELECT first_name, last_name, street_address_1, street_address_2, city, state, zip, email, customer_phone FROM CUSTOMER where customer_id = ?");
$stmt->bind_param("s", $currentUserID);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $street_address_1, $street_address_2, $OGcity, $OGstate, $zip, $OGemail, $customer_phone);
$stmt->fetch();
$stmt->close();

if($_SERVER["REQUEST_METHOD"] === "POST")
{


    $customerID = $user_info['customer_id'];
    $firstName = $_POST['first_name'];
    if ($firstName == ""){
        $firstName = $first_name;
    }
    $lastName = $_POST['last_name'];
    if ($lastName == ""){
        $lastName = $first_name;
    }
    $address1 = $_POST['street_address_1'];
    if ($address1 == ""){
        $address1 = $street_address_1;
    }
    $address2 = $_POST['street_address_2'];
    if ($address2 == ""){
        $address2 = $street_address_2;
    }
    $city = $_POST['city'];
    if ($city == ""){
        $city = $OGcity;
    }
    $state = $_POST['state'];
    if ($state == ""){
        $state = $OGstate;
    }
    $zipcode = $_POST['zip'];
    if ($zipcode == ""){
        $zipcode = $zip;
    }
    $email = $_POST['email'];
    if ($email == ""){
        $email = $OGemail;
    }
    $phoneNum = $_POST['phone'];
    if ($phoneNum== ""){
        $phoneNum = $customer_phone;
    }

    $stmt = $conn->prepare("UPDATE CUSTOMER
                            SET customer_phone = ?, zip = ?, state = ?, street_address_1 = ?, city = ?, first_name = ?, last_name = ?, email = ?, street_address_2 = ?
                            WHERE customer_id = ?");  
    if (!$stmt) {
        die("Error in preparing the statement: " . $conn->error);
    }

    $stmt->bind_param("ssssssssss", $phoneNum, $zipcode, $state, $address1, $city, $firstName, $lastName, $email, $address2, $customerID);

    if (!$stmt->execute()) {
        die("Error executing the statement: " . $stmt->error);
    }

    if ($stmt->affected_rows > 0) {
        header("Location: ../account-page.php");
    } else {
        header("Location: ../account-page.php");
    }
    $stmt->close();
    $conn->close();
 
}
else{
        header("Location: ../account-page.php");
}

?>
