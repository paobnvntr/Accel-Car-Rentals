<?php 
    session_start(); 
    require 'assets/database/connection.php';
    $conn = Connect();

    function dateDiff($start, $end) {
        $start_ts = strtotime($start);
        $end_ts = strtotime($end);
        $diff = $end_ts - $start_ts;
        return round($diff / 86400);
    }

    $id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Car | Accel</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png">

    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- css files -->
    <link rel="stylesheet" href="assets/css/w3.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom/style.css">
</head>

<body style="padding-top: 20px;">
    <?php include 'includes/header.php'; ?>

    <?php
        $sql = "SELECT * FROM rentedcars WHERE rent_id = $id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $driver_id = $row['driver_id'];
                if($driver_id != '') {
                    $sql1 = "SELECT c.car_name, rc.rent_start_date, rc.rent_end_date, rc.fare, d.driver_name, d.driver_phone
                    FROM rentedcars rc, cars c, driver d
                    WHERE rent_id = '$id' AND c.car_id = rc.car_id AND d.driver_id = rc.driver_id";
                    $result1 = $conn->query($sql1);
                
                    if (mysqli_num_rows($result1) > 0) {
                        while($row = mysqli_fetch_assoc($result1)) {
                            $car_name = $row["car_name"];
                            $driver_name = $row["driver_name"];
                            $driver_phone = $row["driver_phone"];
                            $rent_start_date = $row["rent_start_date"];
                            $rent_end_date = $row["rent_end_date"];
                            $fare = $row["fare"];
                            $no_of_days = dateDiff("$rent_start_date", "$rent_end_date");
                        }
                    }
    ?>

    <div class="container" style="margin-top: 65px;" >
        <div class="col-md-7" style="float: none; margin: 0 auto;">
            <div class="form-area">
                <form role="form" action="print-bill.php?id=<?php echo $id ?>" method="POST">
                <br style="clear: both">
                <h3 style="margin-bottom: 5px; text-align: center; font-size: 30px;"> Journey Details </h3>
                <br>

                <h5> Car:&nbsp;  <b><?php echo($car_name);?></b></h5>

                <h5> Rent date:&nbsp;  <b><?php echo($rent_start_date);?></b></h5>

                <h5> End Date:&nbsp;  <b><?php echo($rent_end_date);?></b></h5>

                <h5> Fare:&nbsp;  ₱ <b><?php echo($fare);?></b></h5>

                <h5> Driver Name:&nbsp;  <b><?php echo($driver_name);?></b></h5>

                <h5> Driver Contact:&nbsp;  <b><?php echo($driver_phone);?></b></h5>

                    <h5> Number of Day(s):&nbsp;  <b><?php echo($no_of_days);?></b></h5>

                <input type="hidden" name="hid_no_of_days" value="<?php echo $no_of_days; ?>">
                <input type="hidden" name="hid_fare" value="<?php echo $fare; ?>">

                    <input type="submit" name="submit" value="return" id="add-btn" class="btn btn-success pull-right">    
                </form>
            </div>
        </div>
    </div>

    <?php
                }else{
                    $sql1 = "SELECT c.car_name, rc.rent_start_date, rc.rent_end_date, rc.fare
                    FROM rentedcars rc, cars c
                    WHERE rent_id = '$id' AND c.car_id = rc.car_id";
                    $result1 = $conn->query($sql1);
                
                    if (mysqli_num_rows($result1) > 0) {
                        while($row = mysqli_fetch_assoc($result1)) {
                            $car_name = $row["car_name"];
                            $rent_start_date = $row["rent_start_date"];
                            $rent_end_date = $row["rent_end_date"];
                            $fare = $row["fare"];
                            $no_of_days = dateDiff("$rent_start_date", "$rent_end_date");
                        }
                    }
    ?>

    <div class="container" style="margin-top: 65px;" >
        <div class="col-md-7" style="float: none; margin: 0 auto;">
            <div class="form-area">
                <form role="form" action="print-bill.php?id=<?php echo $id ?>" method="POST">
                <br style="clear: both">
                <h3 style="margin-bottom: 5px; text-align: center; font-size: 30px;"> Journey Details </h3>
                <br>

                <h5> Car:&nbsp;  <b><?php echo($car_name);?></b></h5>

                <h5> Rent date:&nbsp;  <b><?php echo($rent_start_date);?></b></h5>

                <h5> End Date:&nbsp;  <b><?php echo($rent_end_date);?></b></h5>

                <h5> Fare:&nbsp;  ₱ <b><?php echo($fare);?></b></h5>

                <h5> Number of Day(s):&nbsp;  <b><?php echo($no_of_days);?></b></h5>

                <input type="hidden" name="hid_no_of_days" value="<?php echo $no_of_days; ?>">
                <input type="hidden" name="hid_fare" value="<?php echo $fare; ?>">

                    <input type="submit" name="submit" value="return" id="add-btn" class="btn btn-success pull-right">    
                </form>
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