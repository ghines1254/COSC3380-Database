<?php
require_once 'init.php';
?>

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
        $uniqueRandomNumber = random_int(1000000000, 9999999999);
        $formattedNumber = str_pad($uniqueRandomNumber, 10, '0', STR_PAD_LEFT);
        return $formattedNumber;
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

    $stmt = $conn->prepare("INSERT INTO CUSTOMER (customer_phone, customer_id, zip, state, street_address_1, city, first_name, last_name, email, PASSWORD) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");  
    $stmt->bind_param("ssssssssss", $phoneNum, $customerID, $zipcode, $state, $address1, $city, $firstName, $lastName, $email, $password );
    #$stmt->bind_param("ssssssssss", "8324208821", "0000000000", "77091", "TX", "6618 Apollo ST", "houston", "gwyneth", "hines", "ghines1254@gmail.com", "whatever" );
    echo "\n";
   
    if (!$stmt->execute()) {
        die("Error in executing the statement: " . $stmt->error);
    }
    echo "\n";
    var_dump($phoneNum, $customerID, $zipcode, $state, $address1, $city, $firstName, $lastName, $email, $password);
    echo "\n";

    echo "SQL Statement: " . $stmt->sqlstate;
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "Signup Page";
        header("Location: cutomer-portal-nofications-page.html");
        exit();
    } else {
        echo "Error inserting customer status or no changes made.";
        header("Location: cutomer-portal-nofications-page.html");
        exit();
    }

    $stmt->close();
    $conn->close();
 
}
else{
        header("Location: ../sign-up-page.php");
}

?>
