<?php
session_start();
require_once 'init.php';
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate and sanitize inputs
    // ...

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT emp_password FROM EMPLOYEE WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password === $row['emp_password']) {
            $stmt = $conn->prepare("SELECT idnum, first_name, last_name FROM EMPLOYEE WHERE email = ?");
            $stmt->bind_param("s", $email);
        
            if (!$stmt->execute()) {
                die("Error in executing the statement: " . $stmt->error);
            }
        
            $stmt->bind_result($idnum, $first_name, $last_name);
            $stmt->fetch();
        
            $stmt->close();
            $stmt = $conn->prepare("SELECT POST_OFFICE.branch_id
                                    FROM EMPLOYEE
                                    JOIN DEPARTMENT ON EMPLOYEE.dept = DEPARTMENT.dept_id
                                    JOIN POST_OFFICE ON DEPARTMENT.works_at = POST_OFFICE.branch_id
                                    WHERE EMPLOYEE.email = ?");
            $stmt->bind_param("s", $email);

            if (!$stmt->execute()) {
                die("Error in executing the statement: " . $stmt->error);
            }
        
            $stmt->bind_result($branch_id);
            $stmt->fetch();
            $conn->close();
            $emp_info = ['idnum' => $idnum, 'first_name' => $first_name, 'last_name'=> $last_name, 'email' => $email, 'branch_id' => $branch_id];
            $_SESSION['emp_info'] = $emp_info;
            // Redirect to employee portal notifications page (adjust the URL as needed)
            header("Location: employee-portal-notifications-page.php");
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Email not found.";
    }


    $conn->close();
}
?>
