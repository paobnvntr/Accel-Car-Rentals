<?php 
    session_start(); 
    require 'assets/database/connection.php';
    $conn = Connect();

    $id = $_GET["id"];
    $hid_no_of_days = $conn->real_escape_string($_POST['hid_no_of_days']);
    $fare = $conn->real_escape_string($_POST['hid_fare']);
    $total_amount = $hid_no_of_days * $fare;
    $car_return_date = date('Y-m-d');
    $return_status = "Returned";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill | Accel</title>
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
                        $query = "SELECT * FROM rentedcars WHERE rent_id = '$id'";
                        $result = $conn->query($query);

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $driver_id = $row['driver_id'];
                                if($driver_id != '') {
                                    $sql0 = "SELECT rc.rent_id, rc.rent_end_date, rc.rent_start_date, c.car_name, rc.fare FROM rentedcars rc, cars c WHERE rent_id = '$id' AND c.car_id = rc.car_id";
                                    $result0 = $conn->query($sql0);
                                
                                    if(mysqli_num_rows($result0) > 0) {
                                        while($row0 = mysqli_fetch_assoc($result0)){
                                                $rent_end_date = $row0["rent_end_date"];  
                                                $rent_start_date = $row0["rent_start_date"];
                                                $car_name = $row0["car_name"];
                                                $fare = $row0["fare"];
                                        }
                                    }
                                
                                    function dateDiff($start, $end) {
                                        $start_ts = strtotime($start);
                                        $end_ts = strtotime($end);
                                        $diff = $end_ts - $start_ts;
                                        return round($diff / 86400);
                                    }
                                
                                    $extra_days = dateDiff("$rent_end_date", "$car_return_date");
                                    $total_fine = $extra_days * 200;
                                
                                    $duration = dateDiff("$rent_start_date","$rent_end_date");
                                
                                    if($extra_days > 0) {
                                        $total_amount = $total_amount + $total_fine;  
                                    }
                                
                                    $no_of_days = $hid_no_of_days;
                                    $sql1 = "UPDATE rentedcars SET car_return_date='$car_return_date', no_of_days='$no_of_days', total_amount='$total_amount', return_status='$return_status' WHERE rent_id = '$id' ";
                                    $result1 = $conn->query($sql1);
                                
                                    if ($result1){
                                        $sql2 = "UPDATE cars c, driver d, rentedcars rc SET c.car_availability='yes', d.driver_availability='yes' 
                                        WHERE rc.car_id=c.car_id AND rc.driver_id=d.driver_id AND rc.rent_id = '$id'";
                                        $result2 = $conn->query($sql2);
                                    }
                                    else {
                                        echo $conn->error;
                                    }
    ?>

    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> Car Returned</h1>
        </div>
    </div>

    <h2 class="text-center">Receipt Details:</h2>
    <br>
    <h2 class="text-center"> <strong>Booking Number:</strong> <span style="color: #1ba39c;"><strong><?php echo "$id"; ?></strong></span> </h2>


    <div class="container">

        <div class="box">
            <div class="col-md-10" style="float: none; margin: 0 auto; text-align: center;">
            </div>
            <div class="col-md-10" style="float: none; margin: 0 auto; ">
                <h4> <strong>Vehicle Name: </strong> <?php echo $car_name;?></h4>
                <br>
                <h4> <strong>Fare:&nbsp;</strong>  ₱ <?php echo $fare;?></h4>
                <br>
                <h4> <strong>Booking Date: </strong> <?php echo date("Y-m-d"); ?> </h4>
                <br>
                <h4> <strong>Start Date: </strong> <?php echo $rent_start_date; ?></h4>
                <br>
                <h4> <strong>Rent End Date: </strong> <?php echo $rent_end_date; ?></h4>
                <br>
                <h4> <strong>Car Return Date: </strong> <?php echo $car_return_date; ?> </h4>
                <br>
                <h4> <strong>Number of days:</strong> <?php echo $hid_no_of_days; ?> day(s)</h4>
                <br>
                <?php
                    if($extra_days > 0){     
                ?>
                <h4> <strong>Total Fine:</strong> <label class="text-danger"> ₱ <?php echo $total_fine; ?>/- </label> for <?php echo $extra_days;?> extra days.</h4>
                <br>
                <?php } ?>
                <h4> <strong>Total Amount: </strong> ₱ <?php echo $total_amount; ?>/-     </h4>
                <br>
            </div>
        </div>
        
    <?php
                                }else{
                                    $sql0 = "SELECT rc.rent_id, rc.rent_end_date, rc.rent_start_date, c.car_name, rc.fare FROM rentedcars rc, cars c WHERE rent_id = '$id' AND c.car_id = rc.car_id";
                                    $result0 = $conn->query($sql0);
                                
                                    if(mysqli_num_rows($result0) > 0) {
                                        while($row0 = mysqli_fetch_assoc($result0)){
                                                $rent_end_date = $row0["rent_end_date"];  
                                                $rent_start_date = $row0["rent_start_date"];
                                                $car_name = $row0["car_name"];
                                                $fare = $row0["fare"];
                                        }
                                    }
                                
                                    function dateDiff($start, $end) {
                                        $start_ts = strtotime($start);
                                        $end_ts = strtotime($end);
                                        $diff = $end_ts - $start_ts;
                                        return round($diff / 86400);
                                    }
                                
                                    $extra_days = dateDiff("$rent_end_date", "$car_return_date");
                                    $total_fine = $extra_days * 200;
                                
                                    $duration = dateDiff("$rent_start_date","$rent_end_date");
                                
                                    if($extra_days > 0) {
                                        $total_amount = $total_amount + $total_fine;  
                                    }
                                
                                    $no_of_days = $hid_no_of_days;
                                    $sql1 = "UPDATE rentedcars SET car_return_date='$car_return_date', no_of_days='$no_of_days', total_amount='$total_amount', return_status='$return_status' WHERE rent_id = '$id' ";
                                    $result1 = $conn->query($sql1);
                                
                                    if ($result1){
                                        $sql2 = "UPDATE cars c, rentedcars rc SET c.car_availability='yes' 
                                        WHERE rc.car_id=c.car_id AND rc.rent_id = '$id'";
                                        $result2 = $conn->query($sql2);
                                    }
                                    else {
                                        echo $conn->error;
                                    }    
                                
    ?>
    
    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> Car Returned</h1>
        </div>
    </div>

    <h2 class="text-center">Receipt Details:</h2>
    <br>
    <h2 class="text-center"> <strong>Booking Number:</strong> <span style="color: #1ba39c;"><strong><?php echo "$id"; ?></strong></span> </h2>


    <div class="container">

        <div class="box">
            <div class="col-md-10" style="float: none; margin: 0 auto; text-align: center;">
            </div>
            <div class="col-md-10" style="float: none; margin: 0 auto; ">
                <h4> <strong>Vehicle Name: </strong> <?php echo $car_name;?></h4>
                <br>
                <h4> <strong>Fare:&nbsp;</strong>  ₱ <?php echo $fare;?></h4>
                <br>
                <h4> <strong>Booking Date: </strong> <?php echo date("Y-m-d"); ?> </h4>
                <br>
                <h4> <strong>Start Date: </strong> <?php echo $rent_start_date; ?></h4>
                <br>
                <h4> <strong>Rent End Date: </strong> <?php echo $rent_end_date; ?></h4>
                <br>
                <h4> <strong>Car Return Date: </strong> <?php echo $car_return_date; ?> </h4>
                <br>
                <h4> <strong>Number of days:</strong> <?php echo $hid_no_of_days; ?> day(s)</h4>
                <br>
                <?php
                    if($extra_days > 0){     
                ?>
                <h4> <strong>Total Fine:</strong> <label class="text-danger"> ₱ <?php echo $total_fine; ?>/- </label> for <?php echo $extra_days;?> extra days.</h4>
                <br>
                <?php } ?>
                <h4> <strong>Total Amount: </strong> ₱ <?php echo $total_amount; ?>/-     </h4>
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