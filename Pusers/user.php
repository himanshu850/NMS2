
<?php
	include('../function.php');
	
	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location:../login.php');
	}
 ?>
<?php include( 'includes/head_section.php'); ?>
    
	<title>Parent Profile</title>
</head>
<body>
	<!-- PUser navbar -->
	<?php include( 'includes/navbar.php') ?>
	<div class="container content" style="width: 100%;padding: 40px">
		<!-- Left side menu -->
		<?php include( 'includes/menu.php') ?>
		<!-- Account  -->
		<div class="action">
			<h1 class="page-title">Parent Profile</h1>
		<?php
		$conn = mysqli_connect("localhost", "root", "", "nanny");
		$idd = $_SESSION['user']['UserID'];
		$sql3 = "SELECT * FROM parent WHERE userNo='$idd'";
		$result3 = $conn->query($sql3);
		if($rec = $result3->num_rows==0): ?>
			<form method="post" action="profile.php" >

	
				<input type="number"   style="width: 95%;padding: 12px;border-radius: 2px;"name="userNo" value="<?php if(!empty($_SESSION['user'])){echo $_SESSION['user']['UserID'];} ?>" placeholder="User ID">
				<input type="text" name="child_name"  placeholder="Full Name" value="<?php if(!empty($_SESSION['user'])){echo $_SESSION['user']['username'];} ?>" >
				<input type="text" name="email" value="" placeholder="Email address">
				<input type="text" name="phone_no" value="" placeholder="Phone Number">
				<input type="Address"  style="width: 95%;padding: 12px;border-radius: 2px;" name="address" value="" placeholder="Address">
				<select class="gender"  name="gender">
			        <option value="" selected disabled>Gender</option>
			        <option value="Male">Male</option>
			        <option value="Female">Female</option>
	            </select>
			    <select class="role"  name="nanny_type">
			          <option value="" selected disabled>Nanny_type</option>
			        <option value="fullTime">Full Time</option>
			         <option value="PartTime">Part_time</option>
	            </select>
				<input type="text" name="requirements" value="" placeholder="Your requirements">		

				<button type="submit" class="btn" name="create_btn">SUBMIT</button>

			</form>
			<?php else: ?>
				<h1>Your Information Has Been Successfully Saved.</h1>
					<?php endif ?>
		</div>
</div>
</body>
</html>
