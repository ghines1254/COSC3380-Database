<?php

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
    function get_unique_id() 
    {
        $uniqueRandomNumber = random_int(1000000000, 9999999999) . time();
        return $uniqueRandomNumber;
    }


    $customerID = get_unique_id();
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $address1 = $_POST['address-line-1'];
    $address2 = $_POST['address-line-2'];
    $city = $_POST['city1'];
    $state = $_POST['state'];
    $zipcode = $_POST['zip'];
    $email = $_POST['email'];
    $phoneNum = $_POST['phone1'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO CUSTOMER (customer_phone, customer_id, zip, state, street_address, city, first_name, last_name, email, created_on, PASSWORD) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");  
    $stmt->bind_param("sssssssssss", $phoneNum, $customerID, $zipcode, $state, $address1, $city, $firstName, $lastName, $email, date("Y-M-D"), $password );
    $stmt->execute();
   
    if ($stmt->affected_rows > 0) {
        echo "Signup Page";
    } else {
        echo "Error inserting customer status or no changes made.";
    }
    $stmt->close();
    $conn->close();
 
}
else{
        header("Location: ../sign-up-page.php");
}

?>
