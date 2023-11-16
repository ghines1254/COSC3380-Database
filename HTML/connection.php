<?php

$dbhost = "34.68.154.206";
$dbusername = "root";
$dbpassword = "umapuma";
$dbname = "Post_Office_Schema";
$con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname)

if(!$con)
{
    die(" database connection failed");
};

?>