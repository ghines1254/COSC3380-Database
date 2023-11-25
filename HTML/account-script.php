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

if($_SERVER["REQUEST_METHOD"] === "POST")
{


    $customerID = $user_info['customer_id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $address1 = $_POST['street_address_1'];
    $address2 = $_POST['street_address_2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zip'];
    $email = $_POST['email'];
    $phoneNum = $_POST['phone'];

    $stmt = $conn->prepare("UPDATE CUSTOMER
                            SET customer_phone = ?, zip = ?, state = ?, street_address_1 = ?, city = ?, first_name = ?, last_name = ?, email = ?, street_address_2
                            WHERE customer_id = ?");  
    $stmt->bind_param("sssssssss", $phoneNum, $zipcode, $state, $address1, $city, $firstName, $lastName, $email, $address2);
   
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "edited properly";
        exit();
    } else {
        echo "Error inserting customer status or no changes made.";
    }
    $stmt->close();
    $conn->close();
 
}
else{
        header("Location: ../account-page.php");
}

?>
