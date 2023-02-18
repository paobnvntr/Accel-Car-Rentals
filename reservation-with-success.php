<?php 
    include('session_customer.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation | Accel</title>
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

    <?php include 'includes/header.php';

	$id = $_GET['id'];

	$sql1 = "SELECT * FROM  cars c, reservation r, driver d WHERE reservation_id = '$id' AND c.car_id = r.car_id AND d.driver_id = r.driver_id";
    $result1 = $conn->query($sql1);

    function dateDiff($start, $end) {
        $start_ts = strtotime($start);
        $end_ts = strtotime($end);
        $diff = $end_ts - $start_ts;
        return round($diff / 86400);
    }

        if (mysqli_num_rows($result1) > 0) {
            while($row = mysqli_fetch_assoc($result1)) {
                $rent_start_date = $row['rent_start_date'];
                $rent_end_date = $row['rent_end_date'];
                $car_name = $row["car_name"];
                $fare = $row['rent_price'];
                $err_date = dateDiff("$rent_start_date", "$rent_end_date");
                $total_amount = $fare * $err_date;

				$driver_name = $row["driver_name"];
				$driver_gender = $row["driver_gender"];
				$dl_number = $row["dl_number"];
				$driver_phone = $row["driver_phone"];
				$driver_address = $row["driver_address"];
            }
        }
	?>

        <div class="container">
            <div class="jumbotron">
                <h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> Reservation Confirmed.</h1>
            </div>
        </div>

        <div class="container">
            <h5 class="text-center">Please read the following information about your reservation.</h5>
            <div class="box">
                <div class="col-md-10" style="float: none; margin: 0 auto; text-align: center;">
                    <h3 style="color: orange;">Your reservation has been received and placed into our reservation processing system.</h3>
                    <br>
                    <h2 class="text-center"> <strong>Your Reservation Number:</strong> <span style="color: #1ba39c;"><strong><?php echo "$id"; ?></strong></span> </h2>
                    <br>
                    <h4>Please make a note of your <strong>reservation number</strong> now and keep in the event you need to communicate with us about your reservation.</h4>
                    <br>
                    <h3 style="color: orange;">Invoice</h3>
                    <br>
                </div>
                <div class="col-md-10" style="float: none; margin: 0 auto; ">
                    <h4> <strong>Car Name: </strong> <?php echo $car_name; ?></h4>
                    <br>
                    <h4> <strong>Rent Price:</strong> ₱ <?php echo $fare; ?>/day</h4>
                    <br>
                    <h4> <strong>Total Rent Amount:</strong> ₱ <?php echo $total_amount; ?></h4>
                    <br>
                    <br>
                    <h4> <strong>Reservation Date: </strong> <?php echo date("Y-m-d"); ?> </h4>
                    <br>
                    <h4> <strong>Rent Start Date: </strong> <?php echo $rent_start_date; ?></h4>
                    <br>
                    <h4> <strong>Rent Return Date: </strong> <?php echo $rent_end_date; ?></h4>
                    <br>
					<br>
					<h4> <strong>Driver Name: </strong> <?php echo $driver_name; ?></h4>
                    <br>
					<h4> <strong>Driver Gender: </strong> <?php echo $driver_gender; ?></h4>
                    <br>
					<h4> <strong>Driver License Number: </strong> <?php echo $dl_number; ?></h4>
                    <br>
					<h4> <strong>Driver Phone Number: </strong> <?php echo $driver_phone; ?></h4>
                    <br>
                    <h4> <strong>Driver Address: </strong> <?php echo $driver_address; ?></h4>
                    <br>
                </div>
            </div>

	<?php 
		include 'includes/footer.php'; 
	?>

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.easing.min.js"></script>
	<script src="assets/js/theme.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>