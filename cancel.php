<?php
    include('session_customer.php');
    if(!isset($_SESSION['login_customer'])){
       session_destroy();
       header("location: customer-login.php");
    }
?> 
    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel Reservation | Accel</title>
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
        $id = $_GET["id"];
        $query = "SELECT * FROM reservation WHERE reservation_id = '$id'";
        $result = $conn->query($query);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $driver_id = $row['driver_id'];
                if($driver_id != '') {
                    $sql1 = "UPDATE reservation SET reservation_status = 'Cancelled' WHERE reservation_id = '$id'";
                    $result1 = $conn->query($sql1);

                    $sql2 = "UPDATE cars SET car_availability = 'yes' WHERE car_id IN (SELECT r.car_id FROM reservation r WHERE r.reservation_id = '$id')";
                    $result2 = $conn->query($sql2);

                    $sql3 = "UPDATE driver SET driver_availability = 'yes' WHERE driver_id IN (SELECT r.driver_id FROM reservation r WHERE r.reservation_id = '$id')";
                    $result3 = $conn->query($sql3);

                    if (!$result1 | !$result2 | !$result3){
                        die("Couldn't delete data: ".$conn->error);
                    }

                    $sql4 = "SELECT c.car_name, r.rent_start_date, r.rent_end_date, r.fare, r.no_of_days, r.total_amount, d.driver_name, d.driver_phone
                    FROM reservation r, cars c, driver d
                    WHERE reservation_id = '$id' AND c.car_id = r.car_id AND d.driver_id = r.driver_id";
                    $result4 = $conn->query($sql4);

                    if (mysqli_num_rows($result4) > 0) {
                        while($row = mysqli_fetch_assoc($result4)) {
                            $car_name = $row["car_name"];
                            $rent_start_date = $row["rent_start_date"];
                            $rent_end_date = $row["rent_end_date"];
                            $no_of_days = $row["no_of_days"];
                            
                            $fare = $row["fare"];
                            $total_amount = $row["total_amount"];
                            
                            $driver_name = $row["driver_name"];
                            $driver_phone = $row["driver_phone"];
                            $driver_address = $row["driver_address"];
                        }
                    }
    ?>

        <div class="container">
            <div class="jumbotron">
                <h1 class="text-center" style="color: red;"><span class="glyphicon glyphicon-remove-circle"></span> Reservation Cancelled.</h1>
            </div>
        </div>

        <div class="container" style="margin-top: 65px;" >
            <div class="col-md-7" style="float: none; margin: 0 auto;">
                <div class="form-area">
                    <br style="clear: both">
                    <h3 style="margin-bottom: 5px; text-align: center; font-size: 30px;"> Reservation Details </h3>
                    <br>
                    <h5> Car:&nbsp;  <b><?php echo($car_name);?></b></h5>
                    <h5> Rent Start date:&nbsp;  <b><?php echo($rent_start_date);?></b></h5>
                    <h5> Rent End Date:&nbsp;  <b><?php echo($rent_end_date);?></b></h5>
                    <h5> Number of Day(s):&nbsp;  <b><?php echo($no_of_days);?></b></h5>
                    <br>
                    <h5> Fare:&nbsp;  <b>₱ <?php echo($fare);?></b></h5>
                    <h5> Total Amount:&nbsp;  <b>₱ <?php echo($total_amount);?></b></h5>
                    <br>
                    <h5> Driver Name:&nbsp;  <b><?php echo($driver_name);?></b></h5>
                    <h5> Driver Phone:&nbsp;  <b><?php echo($driver_phone);?></b></h5>
                    <h5> Driver Address:&nbsp;  <b><?php echo($driver_address);?></b></h5>
                </div>
            </div>
        </div>
    
    <?php 
                }else{
                    $sql5 = "UPDATE reservation SET reservation_status = 'Cancelled' WHERE reservation_id = '$id'";
                    $result5 = $conn->query($sql5);

                    $sql6 = "UPDATE cars SET car_availability = 'yes' WHERE car_id IN (SELECT r.car_id FROM reservation r WHERE r.reservation_id = '$id')";
                    $result6 = $conn->query($sql6);

                    if (!$result5 | !$result6){
                        die("Couldn't delete data: ".$conn->error);
                    }

                    $sql7 = "SELECT c.car_name, r.rent_start_date, r.rent_end_date, r.fare, r.no_of_days, r.total_amount
                    FROM reservation r, cars c
                    WHERE reservation_id = '$id' AND c.car_id = r.car_id";
                    $result7 = $conn->query($sql7);

                    if (mysqli_num_rows($result7) > 0) {
                        while($row1 = mysqli_fetch_assoc($result7)) {
                            $car_name = $row["car_name"];
                            $rent_start_date = $row["rent_start_date"];
                            $rent_end_date = $row["rent_end_date"];
                            $no_of_days = $row["no_of_days"];
                            
                            $fare = $row["fare"];
                            $total_amount = $row["total_amount"];
                        }
                    }
    ?>

        <div class="container">
            <div class="jumbotron">
                <h1 class="text-center" style="color: red;"><span class="glyphicon glyphicon-remove-circle"></span> Reservation Cancelled.</h1>
            </div>
        </div>

        <div class="container" style="margin-top: 65px;" >
            <div class="col-md-7" style="float: none; margin: 0 auto;">
                <div class="form-area">
                    <br style="clear: both">
                    <h3 style="margin-bottom: 5px; text-align: center; font-size: 30px;"> Reservation Details </h3>
                    <br>
                    <h5> Car:&nbsp;  <b><?php echo($car_name);?></b></h5>
                    <h5> Rent Start date:&nbsp;  <b><?php echo($rent_start_date);?></b></h5>
                    <h5> Rent End Date:&nbsp;  <b><?php echo($rent_end_date);?></b></h5>
                    <h5> Number of Day(s):&nbsp;  <b><?php echo($no_of_days);?></b></h5>
                    <br>
                    <h5> Fare:&nbsp;  <b>₱ <?php echo($fare);?></b></h5>
                    <h5> Total Amount:&nbsp;  <b>₱ <?php echo($total_amount);?></b></h5>
                </div>
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