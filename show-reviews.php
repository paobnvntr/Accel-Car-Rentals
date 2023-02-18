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
    <title>Review | Accel</title>
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

    <div id="sec2" style="color: #777;background-color:white;text-align:center;padding:80px 80px; text-align: justify;">
        <h3 style="text-align:center;">Customer Reviews</h3>
        <br>
        <section class="menu-content">
            <?php
            $sql1 = "SELECT * FROM rentedcars WHERE feedback != '' ORDER BY rent_id";
            $result1 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result1) > 0) {
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    $customer_username = $row1["customer_username"];
                    $feedback = $row1["feedback"];
            ?>

            <div class="sub-menu">
                <h5><b><?php echo $customer_username; ?> </b></h5>
                <h6> Feedback: <br><br><?php echo ("$feedback"); ?></h6>
            </div>

            <?php
                    }
                } else {
            ?>
                <h1>No reviews available</h1>
            <?php
                }
            ?>
        </section>
    </div>

    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>