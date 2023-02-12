<?php
session_start();
require 'assets/database/connection.php';
$conn = Connect();


$id = $_GET['id'];

$sql = "DELETE FROM driver WHERE driver_id='$id'";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Driver | Accel</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png">

    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- css files -->
    <link rel="stylesheet" href="assets/css/custom/style.css">
    <link rel="stylesheet" href="assets/css/w3.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>

    <?php include 'includes/header.php'; ?>

    <?php
      if ($conn->query($sql) === TRUE) {
    ?>
      <div class="container" style="padding-bottom: 12rem; padding-top: 80px;">
        <div class="jumbotron" style="text-align: center;">
          <h2>Driver deleted successfully!</h2>
          <br>
          <p>Delete more driver <a href="add-driver.php">HERE</a></p>
        </div>
      </div>

    <?php 
      } else {
        echo "Error deleting record: " . $conn->error;
      }
      $conn->close();
    ?>

    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>