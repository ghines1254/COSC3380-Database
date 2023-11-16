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

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    function get_unique_id() 
    {
        $uniqueRandomNumber = random_int(1000000000, 9999999999) . time();
        return $uniqueRandomNumber;
    }


    $customerID = get_unique_id();
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $middleInitial = $_POST['middleinitial'];
    $address1 = $_POST['address-line-1'];
    $address2 = $_POST['address-line-2'];
    $city = $_POST['city1'];
    $state = $_POST['state'];
    $zipcode = $_POST['zip'];
    $email = $_POST['email'];
    $phoneNum = $_POST['phone1'];
    $password = $_POST['password'];

    try
    {
        require_once "connection.php";

        $query = "INSERT INTO CUSTOMER (customer_phone, customer_id, zip, state, street_address, city, first_name, last_name, email, PASSWORD) VALUES (phoneNum, customerID, zipcode, state, address1, city, firstName, lastName, email, password);";
   
        $stmt = $conn->prepare("INSERT INTO CUSTOMER (customer_phone, customer_id, zip, state, street_address, city, first_name, last_name, email, PASSWORD) VALUES (phoneNum, customerID, zipcode, state, address1, city, firstName, lastName, email, password);");  
        $stmt->execute();
   
    }catch (Exception $e){
        echo "Error: " . $e->getMessage();
    }
}
else{
        header("Location: ../sign-up-page.php");
}

?>