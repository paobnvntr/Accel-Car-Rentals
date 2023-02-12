<?php
    include('session_client.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Driver | Accel</title>
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

    <div class="container" style="margin-top: 65px;">
        <div class="col-md-7" style="float: none; margin: 0 auto;">
            <div class="form-area">
                <form role="form" action="add-driver1.php" method="POST">
                    <br style="clear: both">
                    <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Add Driver Details </h3>

                    <div class="form-group">
                        <input type="text" class="form-control" id="driver_name" name="driver_name" placeholder="Driver Name " required autofocus="">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="dl_number" name="dl_number" placeholder="Driving License Number" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="driver_phone" name="driver_phone" placeholder="Contact" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="driver_address" name="driver_address" placeholder="Address" required>
                    </div>

                    <div class="form-group">
                        <select name="driver_gender" class="form-control">
                            <option value="" selected disabled>--Select Gender--</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <button type="submit" id="add-btn" name="submit" class="btn btn-primary pull-right">Add Driver</button>
                </form>
            </div>
        </div>

        <div class="col-md-12" style="float: none; margin: 0 auto;">
            <div class="form-area" style="padding: 0px 100px 100px 100px;">
                <form action="" method="POST">
                    <br style="clear: both">
                    <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;">Driver List</h3>

                    <?php
                        $user_check = $_SESSION['login_client'];
                        $sql = "SELECT * FROM driver";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                    ?>

                        <div style="overflow-x:auto;">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th></th>
                                        <th> Name</th>
                                        <th> License Number </th>
                                        <th> Phone Number </th>
                                        <th> Address </th>
                                        <th> Gender </th>
                                        <th> Client </th>
                                        <th> Availability </th>
                                        <th> Delete Driver</th>
                                    </tr>
                                </thead>

                                <?PHP
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                    <tbody>
                                        <tr>
                                            <td> <span class="glyphicon glyphicon-menu-right"></span> </td>
                                            <td><?php echo $row["driver_name"]; ?></td>
                                            <td><?php echo $row["dl_number"]; ?></td>
                                            <td><?php echo $row["driver_phone"]; ?></td>
                                            <td><?php echo $row["driver_address"]; ?></td>
                                            <td><?php echo $row["driver_gender"]; ?></td>
                                            <td><?php echo $row["client_username"]; ?></td>
                                            <td><?php echo $row["driver_availability"]; ?></td>
                                            <td><a href="delete-driver.php?id=<?php echo $row["driver_id"]; ?>" class="delete-btn"> Delete </a></td>
                                        </tr>
                                    </tbody>

                                <?php
                                    }
                                ?>

                            </table>
                        </div>
                        <br>

                    <?php
                        } else {
                    ?>

                        <h4>
                            <center>0 Drivers Available</center>
                        </h4>

                    <?php
                        }
                    ?>
                </form>
            </div>
        </div>

        <?php include 'includes/footer.php'; ?>

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.easing.min.js"></script>
        <script src="assets/js/theme.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        
</body>
</html>