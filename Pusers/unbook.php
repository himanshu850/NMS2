<?php
$conn = mysqli_connect("localhost", "root", "", "nanny");



if (isset($_GET['unbook'])) {
	$Status = $_GET['unbook'];
	$update = "UPDATE `nanny_profile` SET `Status`= 'free' WHERE  `userNo` = '$Status'";
	$query = mysqli_query($conn, $update);
	if ($query) {
		echo "<script>
		 alert('Nanny has been UNBOOKED')
		 window.location.href='booking.php';
		 </script>";
	} else {
		echo "<script>alert('Unknown error has occured')</script>";
	}
	$update_for_nanny = "UPDATE `booking` set `Status`='free' where `nanny_id`='$Status'";
	$query_for_nanny = mysqli_query($conn, $update_for_nanny);
}
