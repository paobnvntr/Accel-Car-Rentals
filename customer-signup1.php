<?php        
        $error = '';
        if (isset($_POST['submit'])) {
            $customer_username = $_POST['customer_username'];
            $customer_password = $_POST['customer_password'];
            $customer_confirm_password = $_POST['customer_confirm_password'];
            require 'assets/database/connection.php';
            $conn = Connect();
    
            $query = "SELECT customer_username FROM customers WHERE customer_username = '$customer_username'";
            $result = $conn->query($query);
    
            if (mysqli_num_rows($result) > 0) { //fetching the contents of the row
                $error = "Username is already taken!"; // error prompt
            } else {
                if ($customer_password != $customer_confirm_password) {
                    $error = "Password do not matched!";
                }else {
                    $customer_name = $conn->real_escape_string($_POST['customer_name']);
                    $customer_username = $conn->real_escape_string($_POST['customer_username']);
                    $customer_email = $conn->real_escape_string($_POST['customer_email']);
                    $customer_phone = $conn->real_escape_string($_POST['customer_phone']);
                    $customer_address = $conn->real_escape_string($_POST['customer_address']);
                    $customer_password = $conn->real_escape_string(md5($_POST['customer_password']));

                    $query = "INSERT into customers(customer_name,customer_username,customer_email,customer_phone,customer_address,customer_password) VALUES('" . $customer_name . "','" . $customer_username . "','" . $customer_email . "','" . $customer_phone . "','" . $customer_address ."','" . $customer_password ."')";
                    $success = $conn->query($query);
                    header("location: customer-registered-success.php");

                    if (!$success){
                        die("Couldn't enter data: ".$conn->error);
                    }

                    $conn->close();
                }
            }
        }
?>