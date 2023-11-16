<?php

require_once('connection.php');

// handling post request for login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userID = $_POST['userid'];
    $password = $_POST['password'];

    // login check
    $query = "SELECT * FROM WEBUSERS AS W WHERE W.UserID = ? AND W.Password = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ss", $userID, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // check if credentials are valid
    if ($result->num_rows > 0) {
        // valid, do something 
        header("Location: ./cutomer-portal-nofications-page.html");
        exit();
    } else {
        // invalid
        echo "Invalid username or password";
    }

    $stmt->close();
}

?>