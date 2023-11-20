<?php
require_once "init.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);

$firstName = $_POST['firstName'];
$middleInitial = $_POST['middleInitial'];
$lastName = $_POST['lastName'];
$empID = $_POST['employeeID'];
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$streetAddress = $_POST['streetAddress'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zipcode'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$ssn = $_POST['ssn'];
$dept = $_POST['department'];
$pw = $_POST['password'];

$query = "INSERT INTO EMPLOYEE(first_name, minit, last_name, idnum, sex, birthdate, street_address, city, state, zipcode, phone, email, ssn, dept, emp_password) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
$stmt = $conn->prepare($query);
$stmt->bind_param("sssssssssssssss", $firstName, $middleInitial, $lastName, $empID, $gender, $birthdate, $streetAddress, $city, $state, $zipcode, $phone, $email, $ssn, $dept, $pw);

if($stmt->execute())
{
    echo json_encode(['status' => 'success']);
}
else
{
    echo json_encode(['status' => 'error', 'message' => $conn->error]);
}

$stmt->close();
$conn->close();
?>
