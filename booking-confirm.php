<?php
    include('session_customer.php');
    if (!isset($_SESSION['login_customer'])) {
        session_destroy();
        header("location: customer-login.php");
    }

    $id = $_GET["id"];
    $card_number = $conn->real_escape_string($_POST['card_number']);
    $return_status = "Not Returned"; // not returned
    $fare = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking | Accel</title>
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
        $sql = "SELECT * FROM reservation WHERE reservation_id = $id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $driver_id = $row['driver_id'];
                if($driver_id != '') {
                    $insert_sql = "INSERT INTO rentedcars (customer_username, car_id, driver_id, booking_date, rent_start_date, rent_end_date, fare, no_of_days, return_status) 
                    VALUES ('" . $row['customer_username'] . "', '" . $row['car_id'] . "', '" . $row['driver_id'] . "','" . date("Y-m-d") . "','" . $row['rent_start_date'] . "','" . $row['rent_end_date']  . "','" . $row['fare']  . "','" . $row['no_of_days']  . "','" . $return_status  . "')";
                    mysqli_query($conn, $insert_sql);

                    $sql2 = "UPDATE reservation SET reservation_status = 'Paid' WHERE reservation_id = '$id'";
                    $result2 = $conn->query($sql2);

                    $sql3 = "UPDATE reservation SET booking_date = now() WHERE reservation_id = '$id'";
                    $result3 = $conn->query($sql3);

                    $sql4 = "SELECT * FROM  rentedcars rc, reservation r, cars c, driver d WHERE reservation_id = '$id' AND c.car_id = r.car_id AND d.driver_id = r.driver_id";
                    $result4 = $conn->query($sql4);

                    if (mysqli_num_rows($result4) > 0) {
                        while($row = mysqli_fetch_assoc($result4)) {
                            $booking_id = $row["rent_id"];
                            $car_name = $row["car_name"];
                            $fare = $row['fare'];
                            $driver_name = $row["driver_name"];
                            $driver_gender = $row["driver_gender"];
                            $dl_number = $row["dl_number"];
                            $driver_phone = $row["driver_phone"];
                            $rent_start_date = $row["rent_start_date"];
                            $rent_end_date = $row["rent_end_date"];
                        }
                    }
    ?>

    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> Booking Confirmed.</h1>
        </div>
    </div>

    <div class="container">
        <h5 class="text-center">Please read the following information about your booking.</h5>
        <div class="box">
            <div class="col-md-10" style="float: none; margin: 0 auto; text-align: center;">
                <h3 style="color: orange;">Your booking has been received and placed into our booking processing system.</h3>
                <br>
                <h2 class="text-center"> <strong>Your Booking Number:</strong> <span style="color: #1ba39c;"><strong><?php echo "$booking_id"; ?></strong></span> </h2>
                <br>
                <h4>Please make a note of your <strong>booking number</strong> now and keep in the event you need to communicate with us about your reservation.</h4>
                <br>
                <h3 style="color: orange;">Invoice</h3>
                <br>
            </div>
            <div class="col-md-10" style="float: none; margin: 0 auto; ">
                <h4> <strong>Vehicle Name: </strong> <?php echo $car_name; ?></h4>
                <br>
                <h4> <strong>Fare:</strong> ₱ <?php echo $fare; ?>/day</h4>
                <br>
                <h4> <strong>Booking Date: </strong> <?php echo date("Y-m-d"); ?> </h4>
                <br>
                <h4> <strong>Start Date: </strong> <?php echo $rent_start_date; ?></h4>
                <br>
                <h4> <strong>Return Date: </strong> <?php echo $rent_end_date; ?></h4>
                <br>
                <br>
                <h4> <strong>Driver Name: </strong> <?php echo $driver_name; ?> </h4>
                <br>
                <h4> <strong>Driver Gender: </strong> <?php echo $driver_gender; ?> </h4>
                <br>
                <h4> <strong>Driver License number: </strong>  <?php echo $dl_number; ?> </h4>
                <br>
                <h4> <strong>Driver Contact:</strong>  <?php echo $driver_phone; ?></h4>
                <br>
            </div>
        </div>
    
    <?php
                }else{
                    $insert_sql = "INSERT INTO rentedcars (customer_username, car_id, booking_date, rent_start_date, rent_end_date, fare, no_of_days, return_status) 
                    VALUES ('" . $row['customer_username'] . "', '" . $row['car_id'] . "','" . date("Y-m-d") . "','" . $row['rent_start_date'] . "','" . $row['rent_end_date']  . "','" . $row['fare']  . "','" . $row['no_of_days']  . "','" . $return_status  . "')";
                    mysqli_query($conn, $insert_sql);

                    $sql2 = "UPDATE reservation SET reservation_status = 'Paid' WHERE reservation_id = '$id'";
                    $result2 = $conn->query($sql2);

                    $sql3 = "UPDATE reservation SET booking_date = now() WHERE reservation_id = '$id'";
                    $result3 = $conn->query($sql3);

                    $sql4 = "SELECT * FROM  rentedcars rc, reservation r, cars c WHERE reservation_id = '$id' AND c.car_id = r.car_id";
                    $result4 = $conn->query($sql4);

                    if (mysqli_num_rows($result4) > 0) {
                        while($row = mysqli_fetch_assoc($result4)) {
                            $booking_id = $row["rent_id"];
                            $car_name = $row["car_name"];
                            $fare = $row['fare'];
                            $rent_start_date = $row["rent_start_date"];
                            $rent_end_date = $row["rent_end_date"];
                        }
                    }
    ?>

    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> Booking Confirmed.</h1>
        </div>
    </div>

    <div class="container">
        <h5 class="text-center">Please read the following information about your booking.</h5>
        <div class="box">
            <div class="col-md-10" style="float: none; margin: 0 auto; text-align: center;">
                <h3 style="color: orange;">Your booking has been received and placed into our booking processing system.</h3>
                <br>
                <h2 class="text-center"> <strong>Your Booking Number:</strong> <span style="color: #1ba39c;"><strong><?php echo "$booking_id"; ?></strong></span> </h2>
                <br>
                <h4>Please make a note of your <strong>booking number</strong> now and keep in the event you need to communicate with us about your reservation.</h4>
                <br>
                <h3 style="color: orange;">Invoice</h3>
                <br>
            </div>
            <div class="col-md-10" style="float: none; margin: 0 auto; ">
                <h4> <strong>Vehicle Name: </strong> <?php echo $car_name; ?></h4>
                <br>
                <h4> <strong>Fare:</strong> ₱ <?php echo $fare; ?>/day</h4>
                <br>
                <h4> <strong>Booking Date: </strong> <?php echo date("Y-m-d"); ?> </h4>
                <br>
                <h4> <strong>Start Date: </strong> <?php echo $rent_start_date; ?></h4>
                <br>
                <h4> <strong>Return Date: </strong> <?php echo $rent_end_date; ?></h4>
                <br>
            </div>
        </div>
    
    <?php
                }
            }
        }
    ?>

    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>