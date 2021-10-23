<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location:../login.php');
	} ?>
<?php include(ROOT_PATH . '../admin/includes/head_section.php'); ?>
<head>
<meta charset="UTF-8">
<?php include('includes/head_section.php'); ?>
	<title>Nanny Bookings</title>
	<style media="screen">
		.ed{
			background-color:blue;
			width: 10px;
			float: left;
		}
		.fl{
			
			width: 10%;
		}
	</style>

</head>
<body>
<!-- User navbar -->
<?php error_reporting( error_reporting() & ~E_NOTICE ); ?>
	<?php include( '../admin/includes/navbar.php') ?>
	<div class="container content" style="width: 100%;" >
		<!-- Left side menu -->
		<?php include('../admin/includes/menu.php') ?>
		<p style="font-size:48px" float: left;>  </></p><center><h1 class="page-title">View Nannies</h1></center><p style="font-size:48px" float:right;> </p>
		
		
		<?php
			$conn = mysqli_connect("localhost", "root", "", "nanny");
		if (!empty($_GET['edit-pos'])) {
			$rr = $_GET['edit-pos'];
		$sql3 = "UPDATE `nanny_profile` SET `Status`='free' WHERE userNo ='$rr' ";

		$conn->query($sql3);
		}
		if (!empty($_GET['free-pos'])) {
			$rr = $_GET['free-pos'];
		$sql3 = "UPDATE `nanny_profile` SET `Status`='booked' WHERE userNo ='$rr' ";

		$conn->query($sql3);
		}
		if (!empty($_GET['delete-pos'])) {
			$rr = $_GET['delete-pos'];
		$sql3 = "DELETE FROM `nanny_profile` WHERE userNo='$rr' ";

		$conn->query($sql3);
		}


	
	
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
						<th>Action</th>
</thead>
<tbody>

<?php
 
	$sql4 = "SELECT * FROM nanny_profile  ";
	$result3 = $conn->query($sql4);
	if ($result3) {
		 while($rec = $result3->fetch_assoc()) {
			 
				 $userNo= $rec['userNo'];
				 $name=$rec['name'];
				 $email=$rec['email'];
				 $phone_no=$rec['phone_no'];
				 $gender=$rec['gender'];
                 $address=$rec['address'];
                 $nationality=$rec['nationality'];
				 $qualification=$rec['qualification'];
				 $dob=$rec['dob'];
                 $requirements=$rec['requirements'];
				 $Status=$rec['Status'];
				 ?>
		<form method="post" action="slots.php" >
				 <tr>
				 <td><?php echo$userNo?></td>
				 <td> <?php echo '<img src ="data:image;base64,'.base64_encode($rec['image']).'" alt="Image" style="width: 80px; height: 90px;" >'; ?></td>      
				 <td><?php echo$name?></td>
				 <td><?php echo$email?></td>
				 <td><?php echo$phone_no?></td>
				 <td><?php echo$gender?></td>
                 <td><?php echo$address?></td>
                 <td><?php echo$nationality?></td>
				 <td><?php echo$qualification?></td>
				 <td><?php echo$dob?></td>
                 <td><?php echo$requirements?></td>
				 <td><?php echo$Status?></td>
                 <td class="fl">
								<a class=" ed fa fa-pencil btn edit"
									href="slots.php?free-pos=<?php echo $userNo; ?>">B
								</a>
								<a class=" ed fa fa-pencil btn edit"
									href="slots.php?edit-pos=<?php echo $userNo; ?>">F
								</a>
								<a  class="fa fa-trash btn delete"
									href="slots.php?delete-pos=<?php echo $userNo;?>">DELETE
								</a>
							</td>
						</tr>
					
	</tbody>
			 </tr>
			 </form>
			<?php
				} 
		}
		else{
			echo $conn->error;
		}

		?>
	    <?php
?>
	
	<style>
		 table,th, td { border-collapse: collapse; width: 70%; margin: 20px auto;
 text-align: center; padding: 8px; text-align: left; border: 2px solid black; } 
	     </style>
	
</table>
<button onclick ="window.print();" class="btn btn-primary" id="print-btn">Print</a>
</div>

		
	
</div>
</body>
</html>
