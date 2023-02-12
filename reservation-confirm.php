<?php
    $error = '';
        if (isset($_POST['submit'])) {

            if (isset($_POST['rent_start_date']) && isset($_POST['rent_end_date'])){
                $start_date = $_POST['rent_start_date'];
                $end_date = $_POST['rent_end_date'];
              
                $start_day = date('d', strtotime($start_date));
                $end_day = date('d', strtotime($end_date));
              
                if ($start_day == $end_day){
                  $error = "Start Date and End Date shouldn't be the same day!";
                } else {
                    if (isset($_POST['driverOption']) && $_POST['driverOption'] == 'withDriver') {
                        $driver_id = $conn->real_escape_string($_POST['driver_id_from_dropdown']);
                        $customer_username = $_SESSION["login_customer"];
                        $car_id = $conn->real_escape_string($_POST['hidden_carid']);
                        $rent_start_date = date('Y-m-d', strtotime($_POST['rent_start_date']));
                        $rent_end_date = date('Y-m-d', strtotime($_POST['rent_end_date']));
                        $reservation_status = "Pending";
                        $fare = "";

                        function dateDiff($start, $end) {
                            $start_ts = strtotime($start);
                            $end_ts = strtotime($end);
                            $diff = $end_ts - $start_ts;
                            return round($diff / 86400);
                        }
                        
                        $err_date = dateDiff("$rent_start_date", "$rent_end_date");

                        $sql0 = "SELECT * FROM cars WHERE car_id = '$car_id'";
                        $result0 = $conn->query($sql0);

                        if (mysqli_num_rows($result0) > 0) {
                            while($row0 = mysqli_fetch_assoc($result0)) {
                                $fare = $row0["rent_price"];
                                $total_amount = $err_date * $fare;
                            }
                        }

                        if($err_date >= 0) { 
                            $sql1 = "INSERT into reservation (customer_username, car_id, driver_id, reservation_date, rent_start_date, rent_end_date, fare, no_of_days, total_amount, reservation_status) 
                            VALUES('" . $customer_username . "','" . $car_id . "','" . $driver_id . "','" . date("Y-m-d") ."','" . $rent_start_date ."','" . $rent_end_date . "','" . $fare . "','" . $err_date . "','" . $total_amount . "','" . $reservation_status . "')";
                            $result1 = $conn->query($sql1);

                            $sql2 = "UPDATE cars SET car_availability = 'no' WHERE car_id = '$car_id'";
                            $result2 = $conn->query($sql2);

                            $sql3 = "UPDATE driver SET driver_availability = 'no' WHERE driver_id = '$driver_id'";
                            $result3 = $conn->query($sql3);

                            $sql4 = "SELECT * FROM  cars c, clients cl, driver d, reservation r WHERE c.car_id = '$car_id' AND d.driver_id = '$driver_id' AND cl.client_username = d.client_username";
                            $result4 = $conn->query($sql4);


                            if (mysqli_num_rows($result4) > 0) {
                                while($row = mysqli_fetch_assoc($result4)) {
                                    $id = $row["reservation_id"];
                                    $car_name = $row["car_name"];
                                    $driver_name = $row["driver_name"];
                                    $driver_gender = $row["driver_gender"];
                                    $dl_number = $row["dl_number"];
                                    $driver_phone = $row["driver_phone"];
                                }
                            }

                            if (!$result1){
                                die("Couldn't enter data: ".$conn->error);
                            }
                            header("location: reservation-with-success.php?id=$id");
                        }
                        

                    }else{
                            $customer_username = $_SESSION["login_customer"];
                            $car_id = $conn->real_escape_string($_POST['hidden_carid']);
                            $rent_start_date = date('Y-m-d', strtotime($_POST['rent_start_date']));
                            $rent_end_date = date('Y-m-d', strtotime($_POST['rent_end_date']));
                            $reservation_status = "Pending";
                            $fare = "";

                            function dateDiff($start, $end) {
                                $start_ts = strtotime($start);
                                $end_ts = strtotime($end);
                                $diff = $end_ts - $start_ts;
                                return round($diff / 86400);
                            }
                            
                            $err_date = dateDiff("$rent_start_date", "$rent_end_date");

                            $sql5 = "SELECT * FROM cars WHERE car_id = '$car_id'";
                            $result5 = $conn->query($sql5);

                            if (mysqli_num_rows($result5) > 0) {
                                while($row1 = mysqli_fetch_assoc($result5)) {
                                    $fare = $row1["rent_price"];
                                    $total_amount = $err_date * $fare;
                                }
                            }

                            if($err_date >= 0) { 
                                $sql1 = "INSERT into reservation (customer_username, car_id, reservation_date, rent_start_date, rent_end_date, fare, no_of_days, total_amount, reservation_status) 
                                VALUES('" . $customer_username . "','" . $car_id . "','" . date("Y-m-d") ."','" . $rent_start_date ."','" . $rent_end_date . "','" . $fare . "','" . $err_date . "','" . $total_amount . "','" . $reservation_status . "')";
                                $result1 = $conn->query($sql1);

                                $sql2 = "UPDATE cars SET car_availability = 'no' WHERE car_id = '$car_id'";
                                $result2 = $conn->query($sql2); 

                                $sql4 = "SELECT * FROM reservation r";
                                $result4 = $conn->query($sql4);

                                if (mysqli_num_rows($result4) > 0) {
                                    while($row = mysqli_fetch_assoc($result4)) {
                                        $id = $row["reservation_id"];
                                    }
                                }

                                if (!$result1){
                                    die("Couldn't enter data! ".$conn->error);
                                }
                                header("location: reservation-without-success.php?id=$id");
                            }     
                        }
            }
        }
    }
    ?>