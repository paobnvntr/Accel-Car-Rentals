<?php
session_start();
require 'assets/database/connection.php';
$conn = Connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Car | Accel</title>
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

    <div id="sec2" style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
        <h3 style="text-align:center;">Available Cars</h3>
        <br>
        <section class="menu-content">
            <?php
            $sql1 = "SELECT * FROM cars WHERE car_availability='yes'";
            $result1 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result1) > 0) {
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    $car_id = $row1["car_id"];
                    $car_img = $row1["car_img"];
                    $car_name = $row1["car_name"];
                    $rent_price = $row1["rent_price"];
                    $location = $row1["location"];
                    $car_type = $row1["car_type"];
                    $car_seat_capacity = $row1["car_seat_capacity"];
                    $car_transmission = $row1["car_transmission"];
            ?>

        <form action="delete-car1.php?id=<?php echo($car_id) ?>" method="POST">
            <div class="sub-menu">
                <img class="card-img-top" src="<?php echo $car_img; ?>" alt="<?php echo $car_name; ?>">
                <h5><b> <?php echo $car_name; ?> </b></h5>
                <h6> Fare: <?php echo ("₱" . $rent_price . "/day"); ?></h6>
                <h6> Location: <?php echo ("$location"); ?></h6>
                <h6> Car Type: <?php echo ("$car_type"); ?></h6>
                <h6> Seat Capacity: <?php echo ("$car_seat_capacity"); ?></h6>
                <h6> Transmission Type: <?php echo (" $car_transmission"); ?></h6>
                <br>
                <div class="text-center">
                    <button type="submit" id="submit" name="submit" class="btn btn-success">Delete Car</button>
                </div>  
            </div>
        </form>

            <?php
                    }
                } else {
            ?>
                <h1>No cars available</h1>
            <?php
                }
            ?>
        </section>
    </div>

    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap.min.js"></script> <!-- for dropdown -->

</body>
</html>