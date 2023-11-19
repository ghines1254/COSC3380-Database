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

