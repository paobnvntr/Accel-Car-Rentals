<?php
    $error = '';
    if (isset($_POST['submit'])) {
        $client_username = $_POST['client_username'];
        $client_password = $_POST['client_password'];
        $client_confirm_password = $_POST['client_confirm_password'];
        require 'assets/database/connection.php';
        $conn = Connect();

        $query = "SELECT client_username FROM clients WHERE client_username = '$client_username'";
        $result = $conn->query($query);

        if (mysqli_num_rows($result) > 0) { //fetching the contents of the row
            $error = "Username is already taken!"; // error prompt
        } else {
            if ($client_password != $client_confirm_password) {
                $error = "Password do not matched!";
            }else {
                $client_name = $conn->real_escape_string($_POST['client_name']);
                $client_username = $conn->real_escape_string($_POST['client_username']);
                $client_email = $conn->real_escape_string($_POST['client_email']);
                $client_password = $conn->real_escape_string(md5($_POST['client_password']));

                $query = "INSERT into clients(client_name,client_username,client_email,client_password) VALUES('" . $client_name . "','" . $client_username . "','" . $client_email . "','" . $client_password . "')";
                $success = $conn->query($query);
                header("location: client-registered-success.php");

                if (!$success) {
                    die("Couldn't enter data: " . $conn->error);
                }
                $conn->close();
            }
        }
    }
?>