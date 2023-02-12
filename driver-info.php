<?php
    require 'assets/database/connection.php';
    $conn = Connect();

    if(isset($_POST['hps_level'])){
        $selected_level = $_POST['hps_level'];
        $sql3 = "SELECT * FROM driver d WHERE d.driver_availability = 'yes' AND driver_id = '$selected_level'";
        $result3 = mysqli_query($conn, $sql3);

    if (mysqli_num_rows($result3) > 0) {
        while ($row3 = mysqli_fetch_assoc($result3)) {
            $driver_id = $row3["driver_id"];
            $driver_name = $row3["driver_name"];
            $driver_gender = $row3["driver_gender"];
            $driver_phone = $row3["driver_phone"];
            $driver_address = $row3["driver_address"];
        }
        }
    }
?>
    

    <h5>Driver Name:&nbsp; <b><?php echo ($driver_name); ?></b></h5>
    <p>Gender:&nbsp; <b><?php echo ($driver_gender); ?></b> </p>
    <p>Contact:&nbsp; <b><?php echo ($driver_phone); ?></b> </p>
    <p>Address:&nbsp; <b><?php echo ($driver_address); ?></b> </p>