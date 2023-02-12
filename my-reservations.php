<?php
    session_start();
    require 'assets/database/connection.php';
    $conn = Connect();
    $login_customer = $_SESSION['login_customer'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reservations | Accel</title>
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

        $sql1 = "SELECT * FROM reservation r, cars c
        WHERE r.customer_username='$login_customer' AND c.car_id = r.car_id AND r.reservation_status = 'Pending' ORDER BY r.reservation_id";
        $result1 = $conn->query($sql1);

        if (mysqli_num_rows($result1) > 0) {
    ?>

        <div class="container">
            <div class="jumbotron">
                <h1 class="text-center">Your Pending Reservations</h1>
            </div>
        </div>
    
        <div class="table-responsive" style="padding-left: 100px; padding-right: 100px; padding-bottom: 50px;">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Car</th>
                        <th>Reservation Date</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Fare</th>
                        <th>Number of Days</th>
                        <th>Total Amount</th>
                        <th>Payment</th>
                        <th>Cancellation</th>
                    </tr>
                </thead>

                <?php
                    while ($row = mysqli_fetch_assoc($result1)) {
                ?>

                    <tr>
                        <td><?php echo $row["car_name"]; ?></td>
                        <td><?php echo $row["reservation_date"]; ?></td>
                        <td><?php echo $row["rent_start_date"] ?></td>
                        <td><?php echo $row["rent_end_date"]; ?></td>
                        <td>₱ <?php echo ($row["fare"] . "/day"); ?></td>
                        <td><?php echo $row["no_of_days"]; ?> </td>
                        <td>₱ <?php echo $row["total_amount"]; ?></td>
                        <td><a href="payment.php?id=<?php echo $row["reservation_id"];?>" class="update-btn"> Proceed to Payment </a></td>
                        <td><a href="cancel.php?id=<?php echo $row["reservation_id"];?>" class="delete-btn" onclick="return confirm('Are you sure you want to cancel this reservation?');" style="color: red;"> Cancel </a></td>
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
                <h1 class="text-center">No pending reservations</h1>
            </div>
        </div>

    <?php
        }
    ?>

    <?php

        $sql1 = "SELECT * FROM reservation r, cars c
        WHERE r.customer_username='$login_customer' AND c.car_id = r.car_id AND r.reservation_status = 'Paid' ORDER BY r.reservation_id";
        $result1 = $conn->query($sql1);

        if (mysqli_num_rows($result1) > 0) {
    ?>

    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center">Your Paid Reservations</h1>
        </div>
    </div>

    <div class="table-responsive" style="padding-left: 100px; padding-right: 100px; padding-bottom: 50px;">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Car</th>
                    <th>Reservation Date</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Fare</th>
                    <th>Number of Days</th>
                    <th>Total Amount</th>
                </tr>
            </thead>

            <?php
                while ($row = mysqli_fetch_assoc($result1)) {
            ?>

                <tr>
                    <td><?php echo $row["car_name"]; ?></td>
                    <td><?php echo $row["reservation_date"]; ?></td>
                    <td><?php echo $row["rent_start_date"] ?></td>
                    <td><?php echo $row["rent_end_date"]; ?></td>
                    <td>₱ <?php echo ($row["fare"] . "/day"); ?></td>
                    <td><?php echo $row["no_of_days"]; ?> </td>
                    <td>₱ <?php echo $row["total_amount"]; ?></td>
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
            <h1 class="text-center">No paid reservations</h1>
        </div>
    </div>

    <?php
        }
    ?>

    <?php

        $sql1 = "SELECT * FROM reservation r, cars c
        WHERE r.customer_username='$login_customer' AND c.car_id = r.car_id AND r.reservation_status = 'Cancelled' ORDER BY r.reservation_id";
        $result1 = $conn->query($sql1);

        if (mysqli_num_rows($result1) > 0) {
    ?>

    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center">Your Cancelled Reservations</h1>
        </div>
    </div>

    <div class="table-responsive" style="padding-left: 100px; padding-right: 100px; padding-bottom: 50px;">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Car</th>
                    <th>Reservation Date</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Fare</th>
                    <th>Number of Days</th>
                    <th>Total Amount</th>
                </tr>
            </thead>

        <?php
            while ($row = mysqli_fetch_assoc($result1)) {
        ?>

            <tr>
                <td><?php echo $row["car_name"]; ?></td>
                <td><?php echo $row["reservation_date"]; ?></td>
                <td><?php echo $row["rent_start_date"] ?></td>
                <td><?php echo $row["rent_end_date"]; ?></td>
                <td>₱ <?php echo ($row["fare"] . "/day"); ?></td>
                <td><?php echo $row["no_of_days"]; ?> </td>
                <td>₱ <?php echo $row["total_amount"]; ?></td>
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
            <h1 class="text-center">No cancelled reservations</h1>
        </div>
    </div>

    <?php
        }
    ?>

    <?php include 'includes/footer.php'; ?>
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>