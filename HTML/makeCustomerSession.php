<?php
function connectToDatabase() {
    $host = "34.68.154.206";
    $database = "Post_Office_Schema";
    $user = "root";
    $password = "umapuma";

    $conn = new mysqli($host, $user, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
        return $conn;
}

function getCustomerInfo($email) {
    $conn = connectToDatabase();

    $stmt = $conn->prepare("SELECT customer_id, first_name, email FROM CUSTOMERS WHERE email = ?");
    $stmt->bind_param("s", $email);

    $stmt->execute();

    $stmt->bind_result($customer_id, $first_name, $email);

    $stmt->fetch();

    $stmt->close();
    $conn->close();

    return ['customer_id' => $customer_id, 'first_name' => $first_name, 'email' => $email];
}
