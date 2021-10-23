<?php include('../config.php'); ?>

<!DOCTYPE html>
<html>

<head>
	<?php error_reporting(error_reporting() & ~E_NOTICE); ?>
	<!-- Styling for public area -->
	<link rel="stylesheet" href="../static/css/user_styling.css">
	<title>User Feedback</title>
</head>

<body>
	<?php include(ROOT_PATH . '/Pusers/includes/navbar.php') ?>
	<div class="container content">
		<!-- Left side menu -->
		<?php include(ROOT_PATH . '/Pusers/includes/menu.php') ?>
		<?php


		if (isset($_POST['submit'])) {
			require '../config.php';
			$userNo = $_SESSION['user']['UserID'];
			$name = $_SESSION['user']['username'];
			$feedback = $_POST['feedback'];

			$query = "INSERT INTO `feedback` (`UserNo`,`name`,`feedback`) VALUES ('$userNo','$name','$feedback')";

			if ($query = mysqli_query($conn, $query)) {
		?>
				<script>
					window.alert("you have sent feedback sucesfully");
				</script>
		<?php
			}
		}


		?>
		<form method="POST" action="userfeedback.php">

			<input type="number" style="width: 95%;padding: 12px;border-radius: 2px;" name="userNo" value="<?php if (!empty($_SESSION['user'])) {
																												echo $_SESSION['user']['UserID'];
																											} ?>" selected disabled placeholder="User ID">
			<input type="text" name="name" placeholder="Full Name" value="<?php if (!empty($_SESSION['user'])) {
																				echo $_SESSION['user']['username'];
																			} ?>" selected disabled>
			<label for="subject">Feedback</label>
			<textarea id="feedback" name="feedback" placeholder="Write Your Feedback.." style="height:200px"></textarea>
			<input type="submit" value="Submit" name="submit">
		</form>
	</div>

</body>

</html>