<?php
 $conn = mysqli_connect("localhost", "root", "", "nanny");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Useractive</title>
</head>
<body>
    <?php
$sql4 = "SELECT * FROM nanny_profile  ";
$result = $conn->query($sql4);
	if ( $result) {
		 while($rec = $result->fetch_assoc() ) {
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
						
</thead>
		<tr>
				 <td><?php echo$userNo?></td>
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
                
			 </tr>
             ?>

</body>
</html>
