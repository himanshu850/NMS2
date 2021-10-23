<?php  include('../config.php'); ?>
<?php  include('../Pusers/includes/user_function.php'); 
     if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location:../login.php');
	}?>
<!-- // this code is used to get the details of a user from the db. -->
<!DOCTYPE html>
<html>
<head>
	<title>Update Profile</title>
</head>
<body>
<?php include('includes/navbar.php') ;?>
<div class="container content">

<?php include('includes/menu.php') ?>

<center><h1>User Profile<h1></center>
	<table class="table">
						<thead>
						<th>UserNo</th>
						<th>Child_name</th>
						<th>Email</th>
						<th>Phone_no</th>
						<th>Address</th>
                        <th>Gender</th>
                        <th>Nanny_type</th>
                        <th>Requirements</th>
						<th>Action</th>
</thead>
<tbody>
<?php
if (isset($_POST['updateprofile'])){
     header('location: updateuserprofile.php');
}
    $user_id = $_SESSION['user']['UserID'];
	$sql3 = "SELECT * FROM parent WHERE userNo = '$user_id' ";
	$result3 = $conn->query($sql3);
	if ($result3) {
		 while($rec = $result3->fetch_assoc()) {
			 
				 $userNo= $rec['userNo'];
				 $child_name=$rec['child_name'];
				 $email=$rec['email'];
				 $phone_no=$rec['phone_no'];
				 $address=$rec['address'];
                 $gender=$rec['gender'];
                 $nanny_type=$rec['nanny_type'];
                 $requirements=$rec['requirements'];
				 ?>
		<form method="post" action="updateprofile.php" >
				 <tr>
				 <td><?php echo $userNo ?></td>
				 <td><?php echo $child_name ?></td>
				 <td><?php echo $email ?></td>
				 <td><?php echo $phone_no ?></td>
				 <td><?php echo $address ?></td>
                 <td><?php echo $gender ?></td>
                 <td><?php echo $nanny_type ?></td>
                 <td><?php echo $requirements ?></td>
				 <td><input type="submit" name ='updateprofile' value="Update"></td>

			 </tr>
		 </form>
			<?php
				} 

		}
		else{
			echo $conn->error;
		}

		?>
		
	</tbody>	
</table>
<style>
		 table,th, td { border-collapse: collapse; width: 70%; margin: 20px auto;
 text-align: center; padding: 8px; text-align: left; border: 2px solid black; } 
	     </style>
</div>


</body>
</html>