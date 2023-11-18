<?php
function connectToDatabase() {
    $host = "34.68.154.206";
    $database = "Post_Office_Schema";
    $user = "root";
    $password = "umapuma";

    $connection = new mysqli($host, $user, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
        return $connection;
}

function getCustomerInfo($email) {
    $connection = connectToDatabase();

    $stmt = $connection->prepare("SELECT customer_id, first_name, email FROM CUSTOMERS WHERE email = ?");
    $stmt->bind_param("s", $email);

    $stmt->execute();

    $stmt->bind_result($customer_id, $first_name, $email);

    $stmt->fetch();

    $stmt->close();
    $connection->close();

    return ['customer_id' => $customer_id, 'first_name' => $first_name, 'email' => $email];
}
