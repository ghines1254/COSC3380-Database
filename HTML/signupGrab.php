<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        function get_unique_id() {
            $uniqueRandomNumber = random_int(1000000000, 9999999999) . time();
            return $uniqueRandomNumber;
        }


        $customerID = get_unique_id();
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $middleInitial = $_POST['middleinitial'];
        $address1 = $_POST['address-line-1'];
        $address2 = $_POST['address-line-2'];
        $city = $_POST['city1'];
        $state = $_POST['state'];
        $zipcode = $_POST['zip'];
        $email = $_POST['email'];
        $phoneNum = $_POST['phone1'];
        $password = $_POST['password'];

        echo $firstName . ' ' . $lastName;


    }
    else{
        header("Location: ../sign-up-page.php");
    }

