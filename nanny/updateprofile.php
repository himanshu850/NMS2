<!-- // this code is used to get the details of a user from the db. -->
<?php require 'function.php'?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Profile</title>
</head>
<body>
<?php include('navbar.php') ;?>
<div class="container content" >

<?php include('menu.php') ?>
<div class="action" style= form{
	display:inline-block;
}>

 <center><h1>User Profile<h1></center>

<tbody>
<?php
    $user_id = $_SESSION['user_nanny']['UserID'];
	$sql3 = "SELECT * FROM nanny_profile WHERE userNo = '$user_id' ";
	$result3 = $conn->query($sql3);
	
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
 				  ?>
			 <?php	
 			}

 		}
 		else{
 			echo $conn->error;
 		}

 		?> 
		<?php 
        if(isset($_POST['updateprofile'])){
            $name=$_SESSION['user_nanny']['username'];
            $email=$_POST['email'];
            $phone_no=$_POST['phone_no'];
			$gender=$_POST['gender'];
            $address=$_POST['address'];
			$nationality=$_POST['nationality'];
			$qualification=$_POST['qualification'];
			$dob=$_POST['dob'];
            $requirements=$_POST['requirements'];

            $conn = mysqli_connect("localhost", "root", "", "nanny");
            $user_id = $_SESSION['user_nanny']['UserID'];
            $sql3 = "UPDATE `nanny_profile` SET 
			                                `name`='$name',
                                            `email` = '$email',
                                            `phone_no` = '$phone_no',
											`gender` = '$gender',
                                            `address` = '$address',
											`nationality`='$nationality',
											`qualification`='$qualification',
											`dob`='$dob',
                                            `requirements` = '$requirements' WHERE userNo = '$user_id' ";
        if(mysqli_query($conn,$sql3)){
            ?>
            <script>
                window.alert("you have successfully update your profile");
                
            </script>
           <?php


}
}
	?>
		  	</tbody>	
 </table>



                <form method="post" action="updateprofile.php" >

	            <!-- //<input type="file" name="image" value="" placeholder="Upload Your Image"> -->
				<input type="number"   style="width: 93%;padding: 12px;"name="userNo" value="<?php if(!empty($_SESSION['user_nanny'])){echo $_SESSION['user_nanny']['UserID'];} ?>" selected disabled placeholder="User ID">
				<input type="text" name="name"  placeholder="Full Name" value="<?php if(!empty($_SESSION['user_nanny'])){echo $_SESSION['user_nanny']['username'];} ?>" selected disabled>
				<input type="text" name="email" value="<?php echo $email?>" placeholder="Email address">
				<input type="text" name="phone_no" value="<?php echo $phone_no?>" placeholder="Phone Number">
                <select class="gender"  name="gender">
			        <option ><?php echo $gender ?></option>
			        <option value="Male">Male</option>
			        <option value="Female">Female</option>
	            </select>
				<input type="Address"  style="width: 93%;padding: 12px;" name="address" value="<?php echo $address?>" placeholder="Address">
				<input type="text" name="nationality" value="<?php echo $nationality?>" placeholder="Nationality">
                <input type="text" name="qualification" value="<?php echo $qualification?>" placeholder="qualification">
                <input type="date" name="dob" style="width: 93%;padding: 12px;" value="<?php echo $dob?>" placeholder="dob">
				<input type="text" name="requirements" value="<?php echo $requirements?>" placeholder="Your requirements">		
                
				<button type="submit" class="btn" name="updateprofile" value="update">Update</button>

			    </form>

</div>
	</div>
</body>
</html>