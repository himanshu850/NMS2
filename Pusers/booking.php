<?php
include('../function.php');

if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location:../login.php');
}
?>

<head>
	<meta charset="UTF-8">
	<?php include('includes/head_section.php'); ?>
	<title>Nanny Bookings</title>
</head>

<body>
	<!-- User navbar -->
	<?php error_reporting(error_reporting() & ~E_NOTICE); ?>
	<?php include('includes/navbar.php') ?>
	<div class="container content">
		<!-- Left side menu -->
		<?php include('includes/menu.php') ?>
		<p style="font-size:48px" float: left;> &#128151; </>
		</p>
		<center>
			<h1 class="page-title">Choose Your Preffered Nanny</h1>
		</center>
		<p style="font-size:48px" float:right;> &#128151;</p>


		<?php
		$conn = mysqli_connect("localhost", "root", "", "nanny");

		?>
		<table class="table" style="width: 50%;">
			<thead>
				<th>UserNo</th>
				<th>Image</th>
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
				<th>Book</th>
			</thead>
			<tbody>

				<?php

				$sql3 = "SELECT * FROM nanny_profile WHERE Status = 'free' ";
				$result3 = $conn->query($sql3);
				if ($result3) {
					while ($rec = $result3->fetch_assoc()) {

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
						<form method="post" action="book.php">
							<tr>
								<td><?php echo $userNo ?></td>
								<td> <?php echo '<img src ="data:image;base64,' . base64_encode($rec['image']) . '" alt="Image" style="width: 80px; height: 90px;" >'; ?></td>
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
								<td><button><a href="book.php?book=<?php echo $userNo ?>"> BOOK </button></td>
							</tr>
						</form>
				<?php
					}
				} else {
					echo $conn->error;
				}

				?>
				<?php
				?>

			</tbody>
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

	</div>



	</div>
</body>

</html>