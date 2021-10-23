<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); 

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location:../login.php');
	}?>
<?php
	// Get all admin users from DB
	$admins = getAdminUsers();
	$roles = ['Admin','Guard', 'parkinguser'];

	

?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
	<title>Admin | View Bookings</title>
	<style media="screen">
		.ed{
			width: 25px;
			float: left;
		}
		.fl{
			width: 95px;
		}
		.page-titleb{
			margin-top: 100px;
		}
	</style>
</head>
<body>
	<!-- admin navbar -->
	<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
	<div class="container content">
		<!-- Left side menu -->
		<?php include(ROOT_PATH . '/admin/includes/menu.php') ?>
		<!-- Middle form - to create and edit  -->
		
			<center><h1>PARENT PROFILES</h1></center>
		<!-- // Middle form - to create and edit -->

		<!-- Display records from DB-->
		<div class="table-div"  style="width: 80%;">
			<!-- Display notification message -->
			<?php include(ROOT_PATH . '/includes/messages.php') ?>

			<?php if (empty($admins)): ?>
				<h1>No Bookings in the database.</h1>
			<?php else: ?>
				<table class="table">
					<thead>
						<th>UserNo</th>
						<th>Child Name</th>
						<th>Email</th>
						<th>Phone Number</th>
						<th>Address</th>
						<th>Gender</th>
						<th>Nanny Type Required</th>
						<th>Requirements</th>
					</thead>
					<tbody>
					<?php
					$conn = mysqli_connect("localhost", "root", "", "nanny");
					$sql3 = "SELECT * FROM parent  ";
					$result3 = $conn->query($sql3);

				while($rec = $result3->fetch_assoc()): ?>
						<tr>
							<td><?php echo $rec['userNo']; ?></td>
							<td><?php echo $rec['child_name']; ?></td>
							<td><?php echo $rec['email']; ?></td>
							<td><?php echo $rec['phone_no']; ?></td>
							<td><?php echo $rec['address']; ?></td>
							<td><?php echo $rec['gender']; ?></td>
							<td><?php echo $rec['nanny_type']; ?></td>
							<td><?php echo $rec['requirements']; ?></td>

						</tr>
						
					<?php endwhile ?>
					</tbody>
					<style>
		 table,th, td { border-collapse: collapse; width: 70%; margin: 20px auto;
 text-align: center; padding: 8px; text-align: left; border: 2px solid black; } 
	     </style>

				</table>
				<div class="text-center">
    <button onclick ="window.print();" class="btn btn-primary" id="print-btn">Print</a>
</div>
			<?php endif ?>
		</div>
		<!-- // Display records from DB -->
	</div>
</body>
</html>
