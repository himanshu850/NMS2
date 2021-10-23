<head>
	<title>View Booking</title>
</head>

<body>
	<!-- PUser navbar -->
	<?php include('../nanny/navbar.php') ?>

	<div class="container content">
		<!-- Left side menu -->
		<?php include('../nanny/menu.php') ?>

		<!-- Display records from DB-->
		<div class="table-div" style="width: 80%;">
			<!-- Display notification message -->
			<?php include(ROOT_PATH . '/includes/messages.php') ?>
			<center>
				<h1 class="page-title">View Bookings</h1>
			</center>

			<?php
			$conn = mysqli_connect("localhost", "root", "", "nanny");
			$id = $_SESSION['user_nanny']['UserID'];

			$sql4 = "SELECT * FROM `booking` where `nanny_id`='$id' and `status`='booked'";
			$result = mysqli_query($conn, $sql4);
			$row = mysqli_fetch_assoc($result);
			$parent_id = $row['parent_id'];
			$query = "SELECT * FROM `parent` WHERE `userNo` = '$parent_id'";
			$result2 = mysqli_query($conn, $query);
			$num_rows = mysqli_num_rows($result2);
			$parent_fetch = mysqli_fetch_assoc($result2);

			if ($num_rows > 0) {
			?>
				<table class="table" style="width: 50%;">
					<thead>
						<th>UserNo</th>
						<th>Child_name</th>
						<th>Email</th>
						<th>Phone_no</th>
						<th>Address</th>
						<th>Gender</th>
						<th>Nanny_type</th>
						<th>Requirements</th>
						<th>Status</th>
						<th>Action</th>
					</thead>
					<tr>
						<td><?php echo $parent_fetch['userNo'] ?></td>
						<td><?php echo $parent_fetch['child_name'] ?></td>
						<td><?php echo $parent_fetch['email'] ?></td>
						<td><?php echo $parent_fetch['phone_no'] ?></td>
						<td><?php echo $parent_fetch['address'] ?></td>
						<td><?php echo $parent_fetch['gender'] ?></td>
						<td><?php echo $parent_fetch['nanny_type'] ?></td>
						<td><?php echo $parent_fetch['requirements'] ?></td>
						<td><?php echo $row['Status'] ?></td>
						<td><button><a href="unbook.php?unbook_parent=<?php echo $id ?>"> UNBOOK </button></td>
					</tr>
				</table>
			<?php
			} else {

				echo "<center><h1 class='alert'>No bookings yet!</h1></center>";
			}
			?>

			<style>
				.alert {
					margin-top: 20px;
				}

				table,
				th,
				td {
					border-collapse: collapse;
					width: 70%;
					margin: 20px auto;
					text-align: center;
					padding: 8px;
					text-align: left;
					border: 2px solid black;
				}
			</style>

			</table>
</body>

</html>