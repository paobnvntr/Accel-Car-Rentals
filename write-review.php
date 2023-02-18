<?php
    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message

    $login_customer = $_SESSION['login_customer'];

    // Establishing Connection with Server by passing server_name, user_id and password as a parameter
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
    <link rel="stylesheet" href="assets/css/custom/style.css">
    <link rel="stylesheet" href="assets/css/w3.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body style="padding-top: 80px;">

    <?php include 'includes/header.php'; ?>
<?php
if (isset($_POST['submit'])) {
    $feedback = $conn->real_escape_string($_POST['feedback']);
    $query = "UPDATE rentedcars SET feedback = '" . $feedback . "' WHERE rent_id='" .$_GET['id']. "'";
    $success = $conn->query($query);
?>
<div class="container" style="padding-bottom: 10rem;">
        <div class="jumbotron" style="text-align: center;">
            <h2><?php echo "Thank you for your feedback!" ?></h2>
            <h1>Your thoughts mean a lot to us.</h1>
            <p>Write another feedback <a href="my-bookings.php">HERE</a></p>
        </div>
        </div>

    <?php
            if (!$success) {
                die("Couldn't enter data: " . $conn->error);
            }

            $conn->close();
        }
    ?>

    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>