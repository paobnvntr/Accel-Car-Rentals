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
    <title>Booking List | Accel</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png">

    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- css files -->
    <link rel="stylesheet" href="assets/css/w3.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom/style.css">
</head>

<body style="padding-top: 80px;">

    <?php include 'includes/header.php'; ?>

    <?php 
        $login_client = $_SESSION['login_client'];
        $sql1 = "SELECT * FROM rentedcars rc, customers c, cars WHERE cars.car_id = rc.car_id AND c.customer_username = rc.customer_username AND rc.return_status = 'Returned' ORDER BY rc.rent_id";
        $result1 = $conn->query($sql1);

        if (mysqli_num_rows($result1) > 0) {
    ?>

        <div class="container">
            <div class="jumbotron">
                <h1 class="text-center">Returned Bookings</h1>
            </div>
        </div>

        <div class="table-responsive" style="padding-left: 100px; padding-right: 100px; padding-bottom: 50px;">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Customer Name</th>
                        <th>Car</th>
                        <th>Rent Start Date</th>
                        <th>Rent End Date</th>
                        <th>Total Amount</th>
                        <th>Return Status</th>
                    </tr>
                </thead>

                <?php
                    while ($row = mysqli_fetch_assoc($result1)) {
                ?>

                    <tr>
                        <td><?php echo $row["customer_name"]; ?></td>
                        <td><?php echo $row["car_name"]; ?></td>
                        <td><?php echo $row["rent_start_date"] ?></td>
                        <td><?php echo $row["rent_end_date"]; ?></td>
                        <td>₱ <?php echo $row["total_amount"]; ?></td>
                        <td><?php echo $row["return_status"]; ?></td>
                    </tr>

                <?php        
                    } 
                ?>

            </table>
        </div>

    <?php 
        } else {
    ?>

        <div class="container" style="padding-bottom: 50px;">
            <div class="jumbotron">
                <h1 class="text-center">No Returned Bookings</h1>
                <p><?php echo $conn->error; ?> </p>
            </div>
        </div>

    <?php
        }

        $sql1 = "SELECT * FROM rentedcars rc, customers c, cars WHERE cars.car_id = rc.car_id AND c.customer_username = rc.customer_username AND rc.return_status = 'Not Returned' ORDER BY rc.rent_id";
        $result1 = $conn->query($sql1);

        if (mysqli_num_rows($result1) > 0) {
    ?>

        <div class="container">
            <div class="jumbotron">
                <h1 class="text-center">Not Returned Bookings</h1>
            </div>
        </div>

        <div class="table-responsive" style="padding-left: 100px; padding-right: 100px; padding-bottom: 50px;">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Customer Name</th>
                        <th>Car</th>
                        <th>Rent Start Date</th>
                        <th>Rent End Date</th>
                        <th>Total Amount</th>
                        <th>Return Status</th>
                    </tr>
                </thead>

                <?php
                    while ($row = mysqli_fetch_assoc($result1)) {
                ?>

                    <tr>
                        <td><?php echo $row["customer_name"]; ?></td>
                        <td><?php echo $row["car_name"]; ?></td>
                        <td><?php echo $row["rent_start_date"] ?></td>
                        <td><?php echo $row["rent_end_date"]; ?></td>
                        <td>₱ <?php echo $row["total_amount"]; ?></td>
                        <td><?php echo $row["return_status"]; ?></td>
                    </tr>

                <?php
                    } 
                ?>

            </table>
        </div>

    <?php 
        } else {
    ?>

        <div class="container" style="padding-bottom: 50px;">
            <div class="jumbotron">
                <h1 class="text-center">No Pending Bookings</h1>
                <p><?php echo $conn->error; ?> </p>
            </div>
        </div>

    <?php
        } 
   
   include 'includes/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>