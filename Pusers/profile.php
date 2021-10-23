<?php
  $userNo = $_POST['userNo'];
  $child_name = $_POST['child_name'];
  $email = $_POST['email'];
  $phone_no = $_POST['phone_no'];
  $address= $_POST['address'];
  $gender = $_POST['gender'];
  $nanny_type = $_POST['nanny_type'];
  $requirements = $_POST['requirements'];



  // form validation: ensure that the form is correctly filled
  if (empty($userNo)) { array_push($errors, "uh-oh you forgot to input your name"); }
  if (empty($child_name)) { array_push($errors, "uh-oh you forgot to input your child's name"); }
  if (empty($email)) { array_push($errors, "uh-oh you forgot to input your email"); }
  if (empty($phone_no)) { array_push($errors, "uh-oh you forgot to input your phone_no"); }
  if (empty($address)) { array_push($errors, "uh-oh you forgot to input your Address"); }
  if (empty($gender)) { array_push($errors, "input Your Gender"); }
  if (empty($nanny_type)) { array_push($errors, "Input your preffered Nanny_type"); }
  if (empty($requirements)) { array_push($errors, "input additional requirements for the child "); }

  // Ensure that no user is registered twice.
  // the email and usernames should be unique
  $sql = "INSERT INTO parent (`userNo`,`child_name`,`email`, `phone_no`, `address`, `gender`, `nanny_type`, `requirements`)
                      VALUES('$userNo','$child_name','$email','$phone_no','$address','$gender','$nanny_type', '$requirements')";

    $conn = mysqli_connect("localhost", "root", "", "nanny");
    if ($conn->query($sql)) {
      $_SESSION['message'] = "You have Successfully filled in the form.";
      header('location: booking.php');
      // code...
    }
    else {
      echo $conn->error;
    }




 ?>
