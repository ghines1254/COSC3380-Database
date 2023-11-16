<?php
require_once 'init.php';
?>

<?php
include("connection.php");

function checklogin($con)
    {
        if(isset($_SESSION['userid']))
        {
            $id = $_SESSION['userid'];
            $query = "SELECT W.UserId FROM WEBUSERS AS W WHERE W.UserId = '$id' limit 1";
            $result = mysqli_query($con, $query);

            if($result && mysqli_num_rows > 0)
            {
                $userdata = mysqli_fetch_assoc($result);
                return $userdata;
            }
        }


        header("Location: login-page.php");
        die;
        
    }