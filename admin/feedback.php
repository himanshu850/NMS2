<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); 

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location:../login.php');
	}?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>View feedback</title>
</head>
<body>
<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
<div class="container content">
<?php include(ROOT_PATH . '/admin/includes/menu.php') ?>
<center><h1>User Feedback<h1></center>
	<table class="table">
						<thead>
						<th>FeedbackID</th>
						<th>UserNo</th>
						<th>Name </th>
						<th>Feedback</th>
						
						
</thead>
<tbody>
<?php
    $conn = mysqli_connect("localhost", "root", "", "nanny");
	//$UserNo =$_SESSION['user']['UserID'];
	$sql3 = "SELECT * FROM `feedback`  ";
	$result3 = $conn->query($sql3);
	if ($result3) {
		 while($rec = $result3->fetch_assoc()) {
			 
				 $FeedbackID= $rec['Id'];
				 $userNo = $rec['userNo'];
				 $name=$rec['name'];
				 $feedback=$rec['feedback'];
				 
				
		echo "
			<tr>
				 <td>$FeedbackID</td>
				 <td>$userNo</td>
				 <td>$name</td>
				 <td>$feedback</td>
				 <td> <button></button></td>
			</tr>

				 ";
			}

		}
		else{
			echo $conn->error;
		}

		?>
		
	</tbody>	
</table>
</div>

</body>
</html>