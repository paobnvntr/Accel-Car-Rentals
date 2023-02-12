<?php
    session_start();
    require 'assets/database/connection.php';
    include("cars.php");
    $product = new Product();
    $availabilities = $product->getAvailability();
    $locations = $product->getLocation();
    $car_types = $product->getCarType();
    $seat_capacities = $product->getSeatCapacity();
    $car_transmissions = $product->getTransmission();
    $totalAvailableRecords = $product->getTotalAvailableProducts();
    $totalRecords = $product->getTotalProducts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accel</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png">

    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- css files -->
    <link rel="stylesheet" href="assets/css/w3.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom/style-cars.css">
    <link rel="stylesheet" href="assets/css/custom/style.css">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <?php include 'includes/header.php'; ?>

    <div class="bgimg-1">
        <header class="intro">
            <div class="intro-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h1 class="brand-heading" style="color: black">Accel Rentals</h1>
                            <p class="intro-text">Online Car Rental Service</p>
                            <a href="car-list.php" class="btn btn-circle page-scroll blink"><i class="fa fa-angle-double-down animated"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap.min.js"></script> <!-- for dropdown -->
    <script src="assets/js/script.js"></script> <!-- for customer car list -->
    <script src="assets/js/script-admin.js"></script> <!-- for admin car list -->

</body>
</html>