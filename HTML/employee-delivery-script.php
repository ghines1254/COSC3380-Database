<?php
  session_start();

  // Check if the user is logged in
  if (!isset($_SESSION['emp_info'])) {
      // Redirect to the login page if the user is not logged in
      header('Location: employee-login-page.php');
      exit();
  }

  $emp_info = $_SESSION['emp_info'];
?>


<?php
// Database connection details
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

// Handle POST request for status update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trackingNumber = $_POST['trackingNumber'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE PACKAGE SET status = ? WHERE tracking_number = ?");
    if (!$stmt) {
        echo "Prepare statement failed: " . $conn->error;
        exit;
    }
    $stmt->bind_param("ss", $status, $trackingNumber);
    if (!$stmt->execute()) {
        echo "Execution failed: " . $stmt->error;
    } else {
        if ($stmt->affected_rows > 0) {
            echo "Status updated successfully";
        } else {
            echo "Error or no change in status";
        }
    }
    $stmt->close();
    //Updating TRACKING_INFO based on the status change//

    //Determine on_truck based on table VEHICLE since it is NOT being delivered
    if ($status != "Delivered"){
        echo "entering not delivered";
        $stmt = $conn->prepare("SELECT vin FROM VEHICLE WHERE emp_id = ?");
        if (!$stmt) {
            echo "Prepare statement failed: " . $conn->error;
            exit;
        }
        $stmt->bind_param("s", $emp_info['idnum']);
        if (!$stmt->execute()) {
            echo "Execution failed: " . $stmt->error;
        } else {
            $stmt->store_result();
            $stmt->close();
            //execution successful, check if employee operates vehicle
            $numRows = $stmt->num_rows;

            if ($numRows > 0){
                //Employee drives car, update tracking info with status
                $onVehicle = 1;
                $stmt = $conn->prepare("UPDATE TRACKING_INFO SET on_truck = ? WHERE package_id = ?");
                $stmt->bind_param("ss", $onVehicle, $trackingNumber);
                $stmt->execute();
            }
            else{
                //Employee does NOT drive vehicle, make sure on_truck is set to "false"
                $onVehicle = 0;
                $stmt = $conn->prepare("UPDATE TRACKING_INFO SET on_truck = ? WHERE package_id = ?");
                $stmt->bind_param("ss", $onVehicle, $trackingNumber);
                $stmt->execute();
            }
        }
    }
    else{
        echo "entering delivered";
        //package has been marked as delivered, adjust tracking info
        $onVehicle = 0;
        $stmt = $conn->prepare("UPDATE TRACKING_INFO SET on_truck = ?, delivered_by = ? WHERE package_id = ?");
        $stmt->bind_param("sss", $onVehicle, $emp_info['idnum'], $trackingNumber);
        $stmt->execute();
    }
    $conn->close();
}

// Handle GET request for fetching status
elseif (isset($_GET['tracking_number'])) {
    $trackingNumber = $_GET['tracking_number'];

    $stmt = $conn->prepare("SELECT status FROM PACKAGE WHERE tracking_number = ?");
    if (!$stmt) {
        echo "Prepare statement failed: " . $conn->error;
        exit;
    }
    $stmt->bind_param("s", $trackingNumber);
    if (!$stmt->execute()) {
        echo "Execution failed: " . $stmt->error;
    } else {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo json_encode(array('status' => $row['status']));
        } else {
            echo json_encode(array('status' => 'not_found'));
        }
    }

    $stmt->close();
    $conn->close();
}
?>
