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
    <title>My Bookings | Accel</title>
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

        $sql1 = "SELECT * FROM rentedcars rc, cars c
        WHERE rc.customer_username='$login_customer' AND c.car_id = rc.car_id AND return_status = 'Not Returned' ORDER BY rc.rent_id";
        $result1 = $conn->query($sql1);

        if (mysqli_num_rows($result1) > 0) {
    ?>

        <div class="container">
            <div class="jumbotron">
                <h1 class="text-center">Your Current Bookings</h1>
            </div>
        </div>
    
        <div class="table-responsive" style="padding-left: 100px; padding-right: 100px; padding-bottom: 50px;">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Car</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Fare</th>
                        <th>Number of Days</th>
                        <th>Total Amount</th>
                        <th>Return Status</th>
                    </tr>
                </thead>

                <?php
                    while ($row = mysqli_fetch_assoc($result1)) {
                ?>

                    <tr>
                        <td><?php echo $row["car_name"]; ?></td>
                        <td><?php echo $row["rent_start_date"] ?></td>
                        <td><?php echo $row["rent_end_date"]; ?></td>
                        <td>₱ <?php echo ($row["fare"] . "/day"); ?></td>
                        <td><?php echo $row["no_of_days"]; ?> </td>
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

        <div class="container">
            <div class="jumbotron">
                <h1 class="text-center">You have not rented any cars</h1>
                <p class="text-center"> Please rent cars in order to view your data here </p>
            </div>
        </div>

    <?php
        }
    ?>

    <?php

        $sql1 = "SELECT * FROM rentedcars rc, cars c
        WHERE rc.customer_username='$login_customer' AND c.car_id = rc.car_id AND return_status = 'Returned' ORDER BY rc.rent_id";
        $result1 = $conn->query($sql1);

        if (mysqli_num_rows($result1) > 0) {
    ?>

        <div class="container">
            <div class="jumbotron">
                <h1 class="text-center">Your Finished Bookings</h1>
                <p class="text-center"> Hope you enjoyed our service </p>
            </div>
        </div>
    
        <div class="table-responsive" style="padding-left: 100px; padding-right: 100px; padding-bottom: 50px;">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Car</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Fare</th>
                        <th>Number of Days</th>
                        <th>Total Amount</th>
                        <th>Return Status</th>
                        <th width="30%">Your Feedback</th>
                        <th></th>
                    </tr>
                </thead>

                <?php
                    while ($row = mysqli_fetch_assoc($result1)) {
                ?>

                    <tr>
                        <td><?php echo $row["car_name"]; ?></td>
                        <td><?php echo $row["rent_start_date"] ?></td>
                        <td><?php echo $row["rent_end_date"]; ?></td>
                        <td>₱ <?php echo ($row["fare"] . "/day"); ?></td>
                        <td><?php echo $row["no_of_days"]; ?> </td>
                        <td>₱ <?php echo $row["total_amount"]; ?></td>
                        <td><?php echo $row["return_status"]; ?></td>
                        <td><?php echo $row["feedback"];?>
                        <td><?php if ($row["feedback"] == NULL){

                        ?>
                            <a href="review.php?id=<?php echo $row["rent_id"]?>" class="update-btn">Post a Review</td>
                        <?php } else {
                            
                        ?>
                        <a href="review.php?id=<?php echo $row["rent_id"]?>" class="update-btn"> Edit</td>
                        <?php
                        }
                        ?></td>
                    </tr>

                <?php
                    }
                ?>

            </table>
        </div>

    <?php
        } else {
    ?>

        <div class="container">
            <div class="jumbotron">
                <h1 class="text-center">You have not rented any cars</h1>
                <p class="text-center"> Please rent cars in order to view your data here </p>
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