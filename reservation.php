<?php 
    include('session_customer.php');
    if(!isset($_SESSION['login_customer'])){
        session_destroy();
        header("location: customer-login.php");
    }
    include('reservation-confirm.php');
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

<body>
    <?php include 'includes/header.php'; ?>

    <div class="container" style="margin-top: 95px;">
        <div class="col-md-7" style="float: none; margin: 0 auto;">
            <div class="form-area">
                <form role="form" action="" method="POST">
                    <br style="clear: both">
                    <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;">Reservation Details </h3>

                    <?php
                    $car_id = $_GET["id"];
                    $no_driver = "No Driver";
                    $sql1 = "SELECT * FROM cars WHERE car_id = '$car_id'";
                    $result1 = mysqli_query($conn, $sql1);

                    if (mysqli_num_rows($result1)) {
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            $car_name = $row1["car_name"];
                            $car_type = $row1["car_type"];
                            $car_seat_capacity = $row1["car_seat_capacity"];
                            $car_transmission = $row1["car_transmission"];
                            $rent_price = $row1["rent_price"];
                            $location = $row1["location"];
                        }
                    }
                    ?>

                    <h5> Selected Car:&nbsp; <b><?php echo ($car_name); ?></b></h5>
                    <h5> Car Type:&nbsp; <b><?php echo ($car_type); ?></b></h5>
                    <h5> Seat Capacity:&nbsp; <b><?php echo ($car_seat_capacity); ?></b></h5>
                    <h5> Transmission Type:&nbsp; <b><?php echo ($car_transmission); ?></b></h5>
                    <h5> Rent Price:&nbsp; <b>₱ <?php echo ($rent_price); ?></b></h5>
                    <h5> Location:&nbsp; <b><?php echo ($location); ?></b></h5>

                    <div class="text-center">
                        <label style="margin-left: 5px; color: red;"><span> <?php echo $error; ?> </span></label> <!-- error prompt -->
                    </div>

                    <?php $today = date("Y-m-d") ?>
                    <label>
                        <h5>Start Date:</h5>
                    </label>
                    <input type="date" name="rent_start_date" min="<?php echo ($today); ?>" required="">
                    &nbsp;
                    <label>
                        <h5>End Date:</h5>
                    </label>
                    <input type="date" name="rent_end_date" min="<?php echo ($today); ?>" required="">
                    <br>

                    <input type="radio" name="driverOption" id="withDriver" value="withDriver" onclick="showDriverDropdown()">
                    <label for="withDriver" style="padding-right: 5px;">With Driver</label>

                    <input type="radio" name="driverOption" id="withoutDriver" value="withoutDriver">
                    <label for="withoutDriver" onclick="showDriverDropdown()">Without Driver</label>
                    
                    <select name="driver_id_from_dropdown" id="driver_id_from_dropdown" style="display: none;">
                        <?php
                            $sql2 = "SELECT * FROM driver d WHERE d.driver_availability = 'yes'";
                            $result2 = mysqli_query($conn, $sql2);

                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    $driver_id = $row2["driver_id"];
                                    $driver_name = $row2["driver_name"];
                                    $driver_gender = $row2["driver_gender"];
                                    $driver_phone = $row2["driver_phone"];
                                    $driver_address = $row2["driver_address"];
                        ?>

                            <option value="<?php echo ($driver_id); ?>"><?php echo ($driver_name); ?></option>

                        <?php 
                                }
                            }else{
                        ?>

                            <option value="NULL" selected disabled>No drivers are currently available, try again later...</option>
                            
                        <?php
                            }
                        ?>
                    </select>
                    <br>

                    <div id="driverInfo"></div>

                    <input type="hidden" name="hidden_carid" value="<?php echo $car_id; ?>">
                    <input type="hidden" name="hidden_carprice" value="<?php echo $rent_price; ?>">

                    <br>
                    <input type="submit" name="submit" value="Rent Now" class="btn btn-warning pull-right login-btn">
                </form>
            </div>
        </div>
        <div class="col-md-12" style="float: none; margin: 0 auto; text-align: center;">
            <h6><strong>Note:</strong> You will be charged with extra <span class="text-danger">₱500</span> for each day after the due date ends.</h6>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script>
        jQuery(document).ready(function($) {
            $("#driver_id_from_dropdown").on('change', function() {
                var level = $(this).val();
                if(level){
                    $.ajax ({
                        type: 'POST',
                        url: 'driver-info.php',
                        data: { hps_level: '' + level + '' },
                        success : function(htmlresponse) {
                            $('#driverInfo').html(htmlresponse);
                            console.log(htmlresponse);
                        }
                    });
                }
            });
        });

        function showDriverDropdown() {
            document.getElementById("withDriver").addEventListener("change", function() {
            if (this.checked) {
                document.getElementById("driver_id_from_dropdown").style.display = "block";
            }
            });

            document.getElementById("withoutDriver").addEventListener("change", function() {
            if (this.checked) {
                document.getElementById("driver_id_from_dropdown").style.display = "none";
                document.getElementById("driverInfo").style.display = "none";
            }
            });
        }
    </script>
</body>
</html>