<?php 
    session_start(); 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Driver | Accel</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png">

    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- css files -->
    <link rel="stylesheet" href="assets/css/w3.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom/style.css">
</head>

<body>

    <?php include 'includes/header.php'; ?>

    <?php
        require 'assets/database/connection.php';
        $conn = Connect();

        $driver_name = $conn->real_escape_string($_POST['driver_name']);
        $dl_number = $conn->real_escape_string($_POST['dl_number']);
        $driver_phone = $conn->real_escape_string($_POST['driver_phone']);
        $driver_address = $conn->real_escape_string($_POST['driver_address']);
        $driver_gender = $conn->real_escape_string($_POST['driver_gender']);
        $client_username = $_SESSION['login_client'];
        $driver_availability = "yes";

        $query = "INSERT into driver(driver_name,dl_number,driver_phone,driver_address,driver_gender,client_username,driver_availability) VALUES('" . $driver_name . "','" . $dl_number . "','" . $driver_phone . "','" . $driver_address . "','" . $driver_gender ."','" . $client_username ."','" . $driver_availability ."')";
        $success = $conn->query($query);
        

        if (!$success){ 
            die("Couldn't enter data: " . $conn->error);
        }else{
            $conn->close();
        }
    ?>

    <div class="container" style="padding-bottom: 12rem; padding-top: 80px;">
        <div class="jumbotron" style="text-align: center;">
            <h2><?php echo "$driver_name added successfully!" ?></h2>
            <p>Add more driver <a href="add-driver.php">HERE</a></p>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>