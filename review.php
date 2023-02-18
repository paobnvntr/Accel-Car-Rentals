<?php
    include('session_customer.php');

    $sql1 = "SELECT * FROM rentedcars WHERE rentedcars.rent_id='" .$_GET['id']. "'";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1)) {
        while ($row1 = mysqli_fetch_assoc($result1)) {
            $rent_start_date = $row1["rent_start_date"];
            $rent_end_date = $row1["rent_end_date"];
            $car_id = $row1["car_id"];
        }
    }

    $sql2 = "SELECT * FROM cars WHERE cars.car_id='" .$car_id. "'";
            $result2 = mysqli_query($conn, $sql2);

            if (mysqli_num_rows($result2)) {
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $car_name = $row2["car_name"];
                }
            }
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

<body style="padding-top: 80px;">

    <?php include 'includes/header.php'; ?>

    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center">Accel - Review Panel</span></h1>
            <br>
            <p class="text-center"><?php echo $user_check; ?>, help us make things better.</p>
        </div>
    </div>

    <div class="container" style="margin-top: -2%; margin-bottom: 2%;">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-primary" style="margin-top: 5%;">
                <div class="panel-heading login-form text-center"> Leave a feedback regarding your last booking </div>
                    <div class="panel-body">
                        <p class="col-lg-12"><?php echo "Car Rented: " .$car_name; ?></p>
                        <p class="col-lg-12"><?php echo "Rented Date: " .$rent_start_date , " to " .$rent_end_date;?></p>
                        
                        <form action="write-review.php?id=<?php echo $_GET['id']; ?>" method="POST">

                            <div class="col-lg-12" style="margin-bottom: 5%;">
                                <fieldset>
                                    <textarea name="feedback" rows="6" class="form-control" id="feedback" placeholder="Write review here" required=""></textarea>
                                </fieldset>
                            </div>

                            <div class="row" style="padding-bottom: 2%;">
                                <div class="form-group text-center">
                                    <button class="btn btn-primary login-btn" name="submit" type="submit" value="submit">Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>