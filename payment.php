<?php
    include('session_customer.php');
    $id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment | Accel</title>
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

    <div class="container" style="margin-top: 95px;">
        <div class="col-md-7" style="float: none; margin: 0 auto;">
            <div class="form-area">
                <form role="form" action="booking-confirm.php?id=<?php echo $id;?>" method="POST">
                    <br style="clear: both">
                    <h3 style="margin-bottom: 5px; text-align: center; font-size: 30px;"> Payment Details </h3>
                    <br>

                    <?php
                        $query = "SELECT * FROM reservation WHERE reservation_id = '$id'";
                        $result = $conn->query($query);

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $driver_id = $row['driver_id'];
                                if($driver_id == '') {
                                    $sql5 = "SELECT r.customer_username, c.car_name, r.reservation_date, r.rent_start_date, r.rent_end_date, r.fare, r.no_of_days, r.total_amount
                                    FROM reservation r, cars c
                                    WHERE reservation_id = '$id' AND c.car_id = r.car_id";
                                    $result5 = $conn->query($sql5);

                                    if (mysqli_num_rows($result5) > 0) {
                                        while($row = mysqli_fetch_assoc($result5)) {
                                            $customer_username = $row['customer_username'];
                                            $car_name = $row["car_name"];
                                            $reservation_date = $row["reservation_date"];
                                            $rent_start_date = $row["rent_start_date"];
                                            $rent_end_date = $row["rent_end_date"];
                                            $fare = $row["fare"];
                                            $no_of_days = $row["no_of_days"];
                                            $total_amount = $row["total_amount"];
                                        }
                                    }                          
                    ?>

                    <h5> Customer:&nbsp;  <b><?php echo($customer_username);?></b></h5>
                    <h5> Car:&nbsp;  <b><?php echo($car_name);?></b></h5>
                    <h5> Reservation date:&nbsp;  <b><?php echo($rent_start_date);?></b></h5>
                    <h5> Rent Start date:&nbsp;  <b><?php echo($rent_start_date);?></b></h5>
                    <h5> Rent End Date:&nbsp;  <b><?php echo($rent_end_date);?></b></h5>
                    <h5> Fare:&nbsp;  <b>₱ <?php echo($fare);?></b></h5>
                    <br>
                    <h5> Number of Day(s):&nbsp;  <b><?php echo($no_of_days);?></b></h5>
                    <h5> Total Amount:&nbsp;  <b>₱ <?php echo($total_amount);?></b></h5>

                    <?php                                     
                                }else{
                                    $sql4 = "SELECT r.customer_username, c.car_name, r.reservation_date, r.rent_start_date, r.rent_end_date, r.fare, r.no_of_days, r.total_amount, d.driver_name, d.driver_phone
                                    FROM reservation r, cars c, driver d
                                    WHERE reservation_id = '$id' AND c.car_id = r.car_id AND d.driver_id = '$driver_id'";
                                    $result4 = $conn->query($sql4);

                                    if (mysqli_num_rows($result4) > 0) {
                                        while($row1 = mysqli_fetch_assoc($result4)) {
                                            $customer_username = $row1['customer_username'];
                                            $car_name = $row1["car_name"];
                                            $reservation_date = $row1["reservation_date"];
                                            $driver_name = $row1["driver_name"];
                                            $driver_phone = $row1["driver_phone"];
                                            $rent_start_date = $row1["rent_start_date"];
                                            $rent_end_date = $row1["rent_end_date"];
                                            $fare = $row1["fare"];
                                            $no_of_days = $row1["no_of_days"];
                                            $total_amount = $row1["total_amount"];
                                        }
                                    }
                    ?>
                    
                        <h5> Customer:&nbsp;  <b><?php echo($customer_username);?></b></h5>
                        <h5> Car:&nbsp;  <b><?php echo($car_name);?></b></h5>
                        <h5> Reservation date:&nbsp;  <b><?php echo($rent_start_date);?></b></h5>
                        <h5> Rent Start date:&nbsp;  <b><?php echo($rent_start_date);?></b></h5>
                        <h5> Rent End Date:&nbsp;  <b><?php echo($rent_end_date);?></b></h5>
                        <h5> Fare:&nbsp;  <b>₱ <?php echo($fare);?></b></h5>
                        <br>
                        <h5> Driver Name:&nbsp;  <b> <?php echo($driver_name);?></b></h5>
                        <h5> Driver Phone:&nbsp;  <b> <?php echo($driver_phone);?></b></h5>
                        <h5> Number of Day(s):&nbsp;  <b><?php echo($no_of_days);?></b></h5>
                        <h5> Total Amount:&nbsp;  <b>₱ <?php echo($total_amount);?></b></h5>

                    <?php
                                }
                            }
                        }
                    ?>

                    <br>
                    <h3 style="margin-bottom: 5px; text-align: center; font-size: 30px;"> Card Details </h3>
                    <br>
                    <label>
                        <h5>Card Number:&nbsp;</h5>
                    </label>
                    <input type="text" name="card_number" id="card_number" pattern="[0-9]{16}" title="16 digit number required" placeholder=" XXXX XXXX XXXX XXXX" style="margin-bottom: 1rem;" required>
                    <br>
                    <label>
                        <h5>Expiration Date:&nbsp;</h5>
                    </label>
                    <input type="text" name="expiration_date" id="expiration_date" placeholder=" MM/YY" style="margin-bottom: 1rem;" required>
                    <br>
                    <label>
                        <h5>CVV:&nbsp;</h5>
                    </label>
                    <input type="text" name="cvv" id="cvv" placeholder=" XXX" style="margin-bottom: 3rem;" required>
                    <br>
    
                    <input type="hidden" name="hidden_carid" value="<?php echo $car_id; ?>">
                    <input type="hidden" name="hidden_carprice" value="<?php echo $rent_price; ?>">

                    <input type="submit" name="submit" value="Pay Now" class="btn btn-warning pull-right login-btn">
                </form>
            </div>
        </div>

    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap.min.js"></script> <!-- for dropdown -->
    <script src="assets/js/script.js"></script> <!-- for customer car list -->
    <script src="assets/js/script-admin.js"></script> <!-- for admin car list -->

</body>
</html>