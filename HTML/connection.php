<?php
$servername = "34.68.154.206";
$username = "root";
$password = "umapuma";
$database = "Post_Office_Schema";

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Perform database operations here...

    // Close connection (optional for PDO, as it will be automatically closed when script ends)
    $conn = null;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
