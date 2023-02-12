<?php
	include('session_client.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Car | Accel</title>
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
				<form role="form" action="add-car1.php" enctype="multipart/form-data" method="POST">
					<br style="clear: both">
					<h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;">Add Car Details </h3>

					<div class="form-group">
						<input type="text" class="form-control" id="car_name" name="car_name" placeholder="Car Name" required autofocus="">
					</div>

					<div class="form-group">
						<select name="car_type" class="form-control">
							<option value="" selected disabled>--Select Car Type--</option>
							<option value="Sedan">Sedan</option>
							<option value="SUV">SUV</option>
							<option value="Coupe">Coupe</option>
							<option value="Hatchback">Hatchback</option>
							<option value="Van">Van</option>
							<option value="MiniVan">Mini Van</option>
							<option value="Pickup">Pickup Trucks</option>
							<option value="Wagons">Station Wagons</option>
							<option value="Sports">Sports Car</option>
						</select>
					</div>

					<div class="form-group">
						<input type="text" class="form-control" id="car_seat_capacity" name="car_seat_capacity" placeholder="No. of Seat Capacity" required>
					</div>

					<div class="form-group">
						<select name="car_transmission" class="form-control">
							<option value="" selected disabled>--Select Transmission Type--</option>
							<option value="Automatic">Automatic</option>
							<option value="Manual">Manual</option>
						</select>
					</div>

					<div class="form-group">
						<input type="number" class="form-control" id="rent_price" name="rent_price" placeholder="Fare per day" required>
					</div>

					<div class="form-group">
						<select name="location" class="form-control">
							<option value="" selected disabled>--Select Location--</option>
							<option value="Luzon">Luzon</option>
							<option value="Visayas">Visayas</option>
							<option value="Mindanao">Mindanao</option>
						</select>
					</div>

					<div class="form-group">
						<input name="car_image" type="file">
					</div>
					<button type="submit" id="add-btn" name="submit" class="btn btn-success pull-right">Add Car</button>
				</form>
			</div>
		</div>
	</div>

	<br style="clear: both">
	<h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;">Car List</h3>

	<?php
		$user_check = $_SESSION['login_client'];
		$sql = "SELECT * FROM cars ORDER BY car_id";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
	?>

		<div class="table-responsive" style="padding-left: 100px; padding-right: 100px; padding-bottom: 50px;">
			<table class="table table-striped">
				<thead class="thead-dark">
					<tr>
						<th></th>
						<th> Name</th>
						<th> Car Type </th>
						<th> Seat Capacity </th>
						<th> Car Transmission </th>
						<th> Rent Price </th>
						<th> Location</th>
						<th> Client</th>
						<th> Availability </th>
					</tr>
				</thead>

				<?PHP
					while ($row = mysqli_fetch_assoc($result)) {
				?>

					<tbody>
						<tr>
							<td> <span class="glyphicon glyphicon-menu-right"></span> </td>
							<td><?php echo $row["car_name"]; ?></td>
							<td><?php echo $row["car_type"]; ?></td>
							<td><?php echo $row["car_seat_capacity"]; ?></td>
							<td><?php echo $row["car_transmission"]; ?></td>
							<td><?php echo $row["rent_price"]; ?></td>
							<td><?php echo $row["location"]; ?></td>
							<td><?php echo $row["client_username"]; ?></td>
							<td><?php echo $row["car_availability"]; ?></td>	
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
			<center>0 Cars Available</center>
		</h4>

	<?php
		}
	?>

	<?php include 'includes/footer.php'; ?>

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.easing.min.js"></script>
	<script src="assets/js/theme.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>