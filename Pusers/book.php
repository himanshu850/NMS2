<?php  include('../config.php'); ?>
<?php  include('../Pusers/includes/user_function.php'); 
     if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location:../login.php');
	}?>

<?php
require_once('../PHPMailer-5.2-stable/PHPMailerAutoload.php');
 
$conn = mysqli_connect("localhost", "root", "", "nanny");


	
	if(isset($_GET['book'])){
		$Status=$_GET['book'];
		$update = "UPDATE `nanny_profile` SET `Status`= 'booked' WHERE  `userNo` = '$Status'";
	    $query = mysqli_query($conn,$update);
		$email = "SELECT `email` FROM nanny_profile WHERE  `userNo` = '$Status' ";
		$email_run = mysqli_query($conn,$email);
		$row = mysqli_fetch_assoc($email_run);
		$fetched_email = $row['email'];
		
  
 $mail= new PHPMailer();
 $mail ->isSMTP();
 $mail ->SMTPAuth = true;
 $mail ->SMTPSecure = 'ssl';
 $mail ->Host='smtp.gmail.com';
 $mail ->Port='465';
 $mail ->isHTML();
 $mail ->Username='nannymanagement.system@gmail.com';
 $mail ->Password='nanny@parmar';
 $mail ->setFrom('no-reply@gmail.com');

 //message
 $mail ->Subject='NMS';
 $mail ->Body='this is to inform you that you have been chosen as a nanny!';

 $mail ->addAddress($fetched_email);
 $mail ->send();
	if($query){
         echo "<script>
		 alert('Nanny has been booked')
		 window.location.href='viewbookings.php';
		 </script>";
	}else{
		echo"<script>alert('Unknown error has occured')</script>";
	}
	}	
	?>

	<?php 
	
		if(isset($_GET['book'])){
			$conn = mysqli_connect("localhost", "root", "", "nanny");
          $nanny_id=$_GET['book'];
		  $user_id=$_SESSION['user']['UserID'];


		  $sql= "INSERT INTO `booking`( `nanny_id`, `parent_id`) VALUES ('$nanny_id','$user_id')";
		  $query = mysqli_query($conn,$sql);


		}
	
	?>
 
