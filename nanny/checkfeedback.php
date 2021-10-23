<?php  include('../config.php'); ?>

<!DOCTYPE html>
<html>
<head>
<?php error_reporting( error_reporting() & ~E_NOTICE ); ?>
<!-- Styling for public area -->
<link rel="stylesheet" href="../static/css/user_styling.css">
	<title>User Feedback</title>
</head>
<body>
	<?php include('navbar.php') ?>
    <div class="container content">
		<!-- Left side menu -->
    <?php include('menu.php') ?>
	<?php

	
if (isset($_POST['submit'])) {
	require '../config.php';

    $userNo= $_SESSION['user_nanny']['UserID'];
	$name=$_SESSION['user_nanny']['username'];
 	$feedback=$_POST['feedback'];

	$query = "INSERT INTO `feedback` (`userNo`,`name`,`feedback`) VALUES ('$userNo','$name','$feedback')";
	
	if($query=mysqli_query($conn,$query)){
		?>
		<script>
          window.alert("you have sent feedback sucesfully");
	   </script>
	   <?php
	} 

}
     

	?>
                <form method="POST" action="checkfeedback.php">

					<input type="number"   style="width: 95%;padding: 12px;border-radius: 2px;"name="userNo" value="<?php if(!empty($_SESSION['user_nanny'])){echo $_SESSION['user_nanny']['UserID'];} ?>" selected disabled placeholder="User ID">
					<input type="text" name="name"  placeholder="Full Name" value="<?php if(!empty($_SESSION['user_nanny'])){echo $_SESSION['user_nanny']['username'];} ?>"selected disabled >
                          <label for="subject">Feedback</label>
                          <textarea id="feedback" name="feedback" placeholder="Write Your Feedback.." style="height:200px"></textarea>
                          <input type="submit" value="Submit" name="submit">
                </form>
    </div>

</body>
</html>
