<?php include('../config.php'); ?>
<?php include(ROOT_PATH . '/Pusers/includes/head_section.php'); ?>

<head>
	<title>View Booking</title>
</head>

<body>
	<!-- PUser navbar -->
	<?php include(ROOT_PATH . '/Pusers/includes/navbar.php') ?>

	<div class="container content" style="width: 100%;">
		<!-- Left side menu -->
		<?php include(ROOT_PATH . '/Pusers/includes/menu.php') ?>

		<!-- Display records from DB-->
		<div class="table-div" style="width: 50%;">
			<!-- Display notification message -->
			<?php include(ROOT_PATH . '/includes/messages.php') ?>
			<center>
				<h1 class="page-title">View Bookings</h1>
			</center>

			<?php
			$conn = mysqli_connect("localhost", "root", "", "nanny");
			$id = $_SESSION['user']['UserID'];
			$sql4 = "SELECT * FROM nanny_profile WHERE Status = 'booked' ";;

			$result = $conn->query($sql4);
			if ($result) {
				while ($rec = $result->fetch_assoc()) {
					$userNo = $rec['userNo'];
					$name = $rec['name'];
					$email = $rec['email'];
					$phone_no = $rec['phone_no'];
					$gender = $rec['gender'];
					$address = $rec['address'];
					$nationality = $rec['nationality'];
					$qualification = $rec['qualification'];
					$dob = $rec['dob'];
					$requirements = $rec['requirements'];
					$Status = $rec['Status'];
			?>


					<table class="table" style="width: 50%;">
						<thead>
							<th>UserNo</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone_no</th>
							<th>Gender</th>
							<th>Address</th>
							<th>Nationality</th>
							<th>Qualification</th>
							<th>Dob</th>
							<th>Requirements</th>
							<th>Status</th>
							<th>Action</th>
						</thead>
						<tr style="width: 50%;">
							<td><?php echo $userNo ?></td>
							<td><?php echo $name ?></td>
							<td><?php echo $email ?></td>
							<td><?php echo $phone_no ?></td>
							<td><?php echo $gender ?></td>
							<td><?php echo $address ?></td>
							<td><?php echo $nationality ?></td>
							<td><?php echo $qualification ?></td>
							<td><?php echo $dob ?></td>
							<td><?php echo $requirements ?></td>
							<td><?php echo $Status ?></td>
							<td><button><a href="unbook.php?unbook=<?php echo $userNo ?>"> UNBOOK </button></td>
						</tr>

				<?php
				}
			}

				?>
				<style>
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