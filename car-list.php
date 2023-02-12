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
    $totalRecords = $product->getTotalProducts();
    $totalAvailableRecords = $product->getTotalAvailableProducts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars | Accel</title>
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

    <?php 
        include 'includes/header.php';

        if(isset($_SESSION['login_client'])){
    ?>

    <div class="content" id="sec2">
        <div class="container-fluid">
            <form method="post" id="search_form" style="padding-top: 50px;">
                <h3 style="text-align:center;">All Cars</h3>
                <br>
                <div class="row">
                    <aside class="col-lg-3 col-md-4">
                        <div class="panel list">
                            <div class="panel-heading">
                                <h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Availability</h3>
                            </div>
                            <div class="panel-body collapse in" id="panelOne">
                                <ul class="list-group">
                                    <?php
                                    foreach ($availabilities as $key => $car_availability) {
                                        if (isset($_POST['car_availability'])) {
                                            if (in_array($product->cleanString($car_availability['car_availability']), $_POST['car_availability'])) {
                                                $car_availabilityCheck = 'checked="checked"';
                                            } else {
                                                $car_availabilityCheck = "";
                                            }
                                        }
                                    ?>
                                        <li class="list-group-item">
                                            <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($car_availability['car_availability']); ?>" <?php echo @$car_availabilityCheck ?> name="car_availability[]" class="sort_rang car_availability"><?php echo ucfirst($car_availability['car_availability']); ?></label></div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                        <div class="panel list">
                            <div class="panel-heading">
                                <h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Sort By </h3>
                            </div>
                            <div class="panel-body collapse in" id="panelOne">
                                <div class="radio disabled">
                                    <label><input type="radio" name="sorting" value="newest" <?php if (isset($_POST['sorting']) && ($_POST['sorting'] == 'newest' || $_POST['sorting'] == '')) {
                                                                                                    echo "checked";
                                                                                                } ?> class="sort_rang sorting">Newest</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sorting" value="low" <?php if (isset($_POST['sorting']) && $_POST['sorting'] == 'low') {
                                                                                                echo "checked";
                                                                                            } ?> class="sort_rang sorting">Price: Low to High</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sorting" value="high" <?php if (isset($_POST['sorting']) && $_POST['sorting'] == 'high') {
                                                                                                echo "checked";
                                                                                            } ?> class="sort_rang sorting">Price: High to Low</label>
                                </div>
                            </div>
                        </div>

                        <div class="panel list">
                            <div class="panel-heading">
                                <h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Location</h3>
                            </div>
                            <div class="panel-body collapse in" id="panelOne">
                                <ul class="list-group">
                                    <?php
                                    foreach ($locations as $key => $location) {
                                        if (isset($_POST['location'])) {
                                            if (in_array($product->cleanString($location['location']), $_POST['location'])) {
                                                $locationCheck = 'checked="checked"';
                                            } else {
                                                $locationCheck = "";
                                            }
                                        }
                                    ?>
                                        <li class="list-group-item">
                                            <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($location['location']); ?>" <?php echo @$locationCheck; ?> name="location[]" class="sort_rang location"><?php echo ucfirst($location['location']); ?></label></div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                        <div class="panel list">
                            <div class="panel-heading">
                                <h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Car Type</h3>
                            </div>
                            <div class="panel-body collapse in" id="panelOne">
                                <ul class="list-group">
                                    <?php
                                    foreach ($car_types as $key => $car_type) {
                                        if (isset($_POST['car_type'])) {
                                            if (in_array($product->cleanString($car_type['car_type']), $_POST['car_type'])) {
                                                $car_typeCheck = 'checked="checked"';
                                            } else {
                                                $car_typeCheck = "";
                                            }
                                        }
                                    ?>
                                        <li class="list-group-item">
                                            <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($car_type['car_type']); ?>" <?php echo @$car_typeCheck; ?> name="car_type[]" class="sort_rang car_type"><?php echo ucfirst($car_type['car_type']); ?></label></div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                        <div class="panel list">
                            <div class="panel-heading">
                                <h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Car Transmission</h3>
                            </div>
                            <div class="panel-body collapse in" id="panelTwo">
                                <ul class="list-group">
                                    <?php
                                    foreach ($car_transmissions as $key => $car_transmission) {
                                        if (isset($_POST['car_transmission'])) {
                                            if (in_array($product->cleanString($car_transmission['car_transmission']), $_POST['car_transmission'])) {
                                                $car_transmissionChecked = 'checked="checked"';
                                            } else {
                                                $car_transmissionChecked = "";
                                            }
                                        }
                                    ?>
                                        <li class="list-group-item">
                                            <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($car_transmission['car_transmission']); ?>" <?php echo @$car_transmissionChecked; ?> name="car_transmission[]" class="sort_rang car_transmission"><?php echo ucfirst($car_transmission['car_transmission']); ?></label></div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                        <div class="panel list">
                            <div class="panel-heading">
                                <h3 class="panel-title" data-toggle="collapse" data-target="#panelTwo" aria-expanded="true">Seat Capacity</h3>
                            </div>
                            <div class="panel-body collapse in" id="panelFour">
                                <ul class="list-group">
                                    <?php
                                    foreach ($seat_capacities as $key => $car_seat_capacity) {
                                        if (isset($_POST['car_seat_capacity'])) {
                                            if (in_array($product->cleanString($car_seat_capacity['car_seat_capacity']), $_POST['car_seat_capacity'])) {
                                                $car_seat_capacityCheck = 'checked="checked"';
                                            } else {
                                                $car_seat_capacityCheck = "";
                                            }
                                        }
                                    ?>
                                        <li class="list-group-item">
                                            <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($car_seat_capacity['car_seat_capacity']); ?>" <?php echo @$car_seat_capacityCheck ?> name="car_seat_capacity[]" class="sort_rang car_seat_capacity"><?php echo ucfirst($car_seat_capacity['car_seat_capacity']); ?></label></div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </aside>

                    <section class="col-lg-9 col-md-8">
                        <div class="row car-result">
                            <div id="results-admin" onclick="return confirm('You need to login as a customer to proceed in reservation. Are you sure you want to continue?');"></div>
                        </div>
                    </section>
                </div>
                <input type="hidden" id="totalRecords" value="<?php echo $totalRecords; ?>">
            </form>
        </div>
    </div>

    <?php
        }else{
    ?>
    <div class="content" id="sec2">
        <div class="container-fluid">
            <form method="post" id="search_form" style="padding-top: 50px;">
                <h3 style="text-align:center;">Available Cars</h3>
                <br>
                <div class="row">
                    <aside class="col-lg-3 col-md-4">
                        <div class="panel list">
                            <div class="panel-heading">
                                <h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Sort By </h3>
                            </div>
                            <div class="panel-body collapse in" id="panelOne">
                                <div class="radio disabled">
                                    <label><input type="radio" name="sorting" value="newest" <?php if (isset($_POST['sorting']) && ($_POST['sorting'] == 'newest' || $_POST['sorting'] == '')) {
                                                                                                    echo "checked";
                                                                                                } ?> class="sort_rang sorting">Newest</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sorting" value="low" <?php if (isset($_POST['sorting']) && $_POST['sorting'] == 'low') {
                                                                                                echo "checked";
                                                                                            } ?> class="sort_rang sorting">Price: Low to High</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sorting" value="high" <?php if (isset($_POST['sorting']) && $_POST['sorting'] == 'high') {
                                                                                                echo "checked";
                                                                                            } ?> class="sort_rang sorting">Price: High to Low</label>
                                </div>
                            </div>
                        </div>

                        <div class="panel list">
                            <div class="panel-heading">
                                <h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Location</h3>
                            </div>
                            <div class="panel-body collapse in" id="panelOne">
                                <ul class="list-group">
                                    <?php
                                    foreach ($locations as $key => $location) {
                                        if (isset($_POST['location'])) {
                                            if (in_array($product->cleanString($location['location']), $_POST['location'])) {
                                                $locationCheck = 'checked="checked"';
                                            } else {
                                                $locationCheck = "";
                                            }
                                        }
                                    ?>
                                        <li class="list-group-item">
                                            <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($location['location']); ?>" <?php echo @$locationCheck; ?> name="location[]" class="sort_rang location"><?php echo ucfirst($location['location']); ?></label></div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                        <div class="panel list">
                            <div class="panel-heading">
                                <h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Car Type</h3>
                            </div>
                            <div class="panel-body collapse in" id="panelOne">
                                <ul class="list-group">
                                    <?php
                                    foreach ($car_types as $key => $car_type) {
                                        if (isset($_POST['car_type'])) {
                                            if (in_array($product->cleanString($car_type['car_type']), $_POST['car_type'])) {
                                                $car_typeCheck = 'checked="checked"';
                                            } else {
                                                $car_typeCheck = "";
                                            }
                                        }
                                    ?>
                                        <li class="list-group-item">
                                            <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($car_type['car_type']); ?>" <?php echo @$car_typeCheck; ?> name="car_type[]" class="sort_rang car_type"><?php echo ucfirst($car_type['car_type']); ?></label></div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                        <div class="panel list">
                            <div class="panel-heading">
                                <h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Car Transmission</h3>
                            </div>
                            <div class="panel-body collapse in" id="panelTwo">
                                <ul class="list-group">
                                    <?php
                                    foreach ($car_transmissions as $key => $car_transmission) {
                                        if (isset($_POST['car_transmission'])) {
                                            if (in_array($product->cleanString($car_transmission['car_transmission']), $_POST['car_transmission'])) {
                                                $car_transmissionChecked = 'checked="checked"';
                                            } else {
                                                $car_transmissionChecked = "";
                                            }
                                        }
                                    ?>
                                        <li class="list-group-item">
                                            <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($car_transmission['car_transmission']); ?>" <?php echo @$car_transmissionChecked; ?> name="car_transmission[]" class="sort_rang car_transmission"><?php echo ucfirst($car_transmission['car_transmission']); ?></label></div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                        <div class="panel list">
                            <div class="panel-heading">
                                <h3 class="panel-title" data-toggle="collapse" data-target="#panelTwo" aria-expanded="true">Seat Capacity</h3>
                            </div>
                            <div class="panel-body collapse in" id="panelFour">
                                <ul class="list-group">
                                    <?php
                                    foreach ($seat_capacities as $key => $car_seat_capacity) {
                                        if (isset($_POST['car_seat_capacity'])) {
                                            if (in_array($product->cleanString($car_seat_capacity['car_seat_capacity']), $_POST['car_seat_capacity'])) {
                                                $car_seat_capacityCheck = 'checked="checked"';
                                            } else {
                                                $car_seat_capacityCheck = "";
                                            }
                                        }
                                    ?>
                                        <li class="list-group-item">
                                            <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($car_seat_capacity['car_seat_capacity']); ?>" <?php echo @$car_seat_capacityCheck ?> name="car_seat_capacity[]" class="sort_rang car_seat_capacity"><?php echo ucfirst($car_seat_capacity['car_seat_capacity']); ?></label></div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </aside>

                    <section class="col-lg-9 col-md-8">
                        <div class="row">
                                <div id="results">                   
                                </div>
                        </div>
                    </section>
                </div>
                <input type="hidden" id="totalAvailableRecords" value="<?php echo $totalAvailableRecords; ?>">
            </form>
        </div>
    </div>
    <?php
        }
    
    include 'includes/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap.min.js"></script> <!-- for dropdown -->
    <script src="assets/js/script.js"></script> <!-- for customer car list -->
    <script src="assets/js/script-admin.js"></script> <!-- for admin car list -->

</body>
</html>