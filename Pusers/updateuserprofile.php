<?php
	include('../function.php');
	
	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location:../login.php');
	}
 ?>
<?php include( 'includes/head_section.php'); ?>
    
	<title>Parent Update Profile</title>
</head>
<body>
	<!-- PUser navbar -->
	<?php include( 'includes/navbar.php') ?>
	<div class="container content" style="width: 100%;padding: 40px">
		<!-- Left side menu -->
		<?php include( 'includes/menu.php') ?>
		<!-- Account  -->
        	<!-- Account  -->
		<div class="action">
			<h1 class="page-title">Parent Update Profile</h1>

        <?php
        $conn = mysqli_connect("localhost", "root", "", "nanny");
        $user_id = $_SESSION['user']['UserID'];
	    $sql3 = "SELECT * FROM parent WHERE userNo = '$user_id' ";
	    $result3 = $conn->query($sql3);
        $rec = $result3->fetch_assoc();
        ?>

        <?php 
        if(isset($_POST['update'])){
            $child_name=$_POST['child_name'];
            $email=$_POST['email'];
            $phone_no=$_POST['phone_no'];
            $address=$_POST['address'];
            $gender=$_POST['gender'];
            $nanny_type=$_POST['nanny_type'];
            $requirements=$_POST['requirements'];
            $conn = mysqli_connect("localhost", "root", "", "nanny");
            $user_id = $_SESSION['user']['UserID'];
            $sql3 = "UPDATE `parent` SET `child_name`='$child_name',
                                          `email` = '$email',
                                           `phone_no` = '$phone_no',
                                            `address` = '$address',
                                            `gender` = '$gender',
                                            `nanny_type` = '$nanny_type',
                                            `requirements` = '$requirements' WHERE userNo = '$user_id' ";
        if(mysqli_query($conn,$sql3)){
            ?>
            <script>
                window.alert("you have successfully update your profile");
                window.location.href="updateprofile.php"
            </script>
        <?php
         
         
    
    }
    }
        ?>
       
        

<form method="post" action="updateuserprofile.php" >

	
				<input type="number"   style="width: 95%;padding: 12px;border-radius: 2px;"name="userNo" value="<?php if(!empty($_SESSION['user'])){echo $_SESSION['user']['UserID'];} ?>" selected disabled placeholder="User ID">
				<input type="text" name="child_name"  placeholder="Full Name" value="<?php if(!empty($_SESSION['user'])){echo $_SESSION['user']['username'];} ?>" >
				<input type="text" name="email" value="<?php echo $rec['email']?>" placeholder="Email address">
				<input type="text" name="phone_no" value="<?php echo $rec['phone_no']?>" placeholder="Phone Number">
				<input type="Address"  style="width: 95%;padding: 12px;border-radius: 2px;" name="address" value="<?php echo $rec['address']?>" placeholder="Address">
				<select class="gender" required name="gender">
			        <option><?php echo $rec['gender']?></option>
			        <option value="Male">Male</option>
			        <option value="Female">Female</option>
	            </select>
			    <select class="role" required name="nanny_type">
			          <option><?php echo $rec['nanny_type']?></option>
			        <option value="fullTime">Full Time</option>
			         <option value="PartTime">Part_time</option>
	            </select>
				<input type="text" name="requirements" value="<?php echo $rec['requirements']?>" placeholder="Your requirements">		

				<button type="submit" class="btn" name="update">UPDATE</button>

			</form>