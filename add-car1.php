<?php 
    session_start(); 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car | Accel</title>
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

        function GetImageExtension($imagetype) {
            if(empty($imagetype)) return false;
            
            switch($imagetype) {
                case 'assets/img/cars/bmp': return '.bmp';
                case 'assets/img/cars/gif': return '.gif';
                case 'assets/img/cars/jpeg': return '.jpg';
                case 'assets/img/cars/png': return '.png';
                default: return false;
            }
        }

        $car_name = $conn->real_escape_string($_POST['car_name']);
        $car_type = $conn->real_escape_string($_POST['car_type']);
        $car_seat_capacity = $conn->real_escape_string($_POST['car_seat_capacity']);
        $car_transmission = $conn->real_escape_string($_POST['car_transmission']);
        $rent_price = $conn->real_escape_string($_POST['rent_price']);
        $location = $conn->real_escape_string($_POST['location']);
        $client_username = $_SESSION['login_client'];
        $car_availability = "yes";

        if (!empty($_FILES["car_image"]["name"])) {
            $file_name=$_FILES["car_image"]["name"];
            $temp_name=$_FILES["car_image"]["tmp_name"];
            $imgtype=$_FILES["car_image"]["type"];
            $ext= GetImageExtension($imgtype);
            $imagename=$_FILES["car_image"]["name"];
            $target_path = "assets/img/cars/".$imagename;

            if(move_uploaded_file($temp_name, $target_path)) {
                $query = "INSERT INTO `cars` (car_name, car_type, car_seat_capacity, car_transmission, rent_price, location, client_username, car_img, car_availability) 
                VALUES ('" . $car_name . "','" . $car_type . "','" . $car_seat_capacity . "','" . $car_transmission . "','" . $rent_price . "','" . $location . "','" . $client_username . "','" . $target_path . "','" . $car_availability . "')";
                $success = $conn->query($query);
                $conn->close();
            }else{
                die("Couldn't enter data: " . $conn->error);
            }
        }
    ?>

    <div class="container" style="padding-bottom: 12rem; padding-top: 80px;">
        <div class="jumbotron">
            <h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> Car Added</h1>
            <h2 class="text-center"><?php echo "$car_name added successfully!" ?></h2>
            <p class="text-center">Add more car <a href="add-car.php">HERE</a></p>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>