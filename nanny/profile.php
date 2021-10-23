<?php
$con = mysqli_connect("localhost","root","","nanny");
  //$image = $_POST['image'];
  $userNo = $_POST['userNo'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone_no = $_POST['phone_no'];
  $gender = $_POST['gender'];
  $address= $_POST['address'];
  $nationality= $_POST['nationality'];
  $qualification = $_POST['qualification'];
  $dob = $_POST['dob'];
  $requirements = $_POST['requirements'];



  // form validation: ensure that the form is correctly filled
  //if (empty($image)) { array_push($errors, "uh-oh you forgot to upload your image"); }
  if (empty($userNo)) { array_push($errors, "uh-oh you forgot to input your user number"); }
  if (empty($name)) { array_push($errors, "uh-oh you forgot to input your name"); }
  if (empty($email)) { array_push($errors, "uh-oh you forgot to input your email"); }
  if (empty($phone_no)) { array_push($errors, "uh-oh you forgot to input your phone_no"); }
  if (empty($gender)) { array_push($errors, "input Your Gender"); }
  if (empty($address)) { array_push($errors, "uh-oh you forgot to input your Address"); }
  if (empty($nationality)) { array_push($errors, "input Your nationality"); }
  if (empty($qualification)) { array_push($errors, "Input your qualifications!"); }
  if (empty($dob)) {array_push($errors, "input your date of birth");}
  if (empty($requirements)) { array_push($errors, "input additional requirements for the child "); }

  // Ensure that no user is registered twice.
  // the email and usernames should be unique
  




    $sql = "INSERT INTO nanny_profile (`userNo`, `name`,`email`, `phone_no`, `gender`,`address`,`nationality`, `qualification`,`dob`, `requirements`)
                                VALUES('$userNo','$name','$email','$phone_no','$gender','$address','$nationality','$qualification','$dob', '$requirements')";

    $conn = mysqli_connect("localhost", "root", "", "nanny");
    if ($conn->query($sql)) {
     $_SESSION['message'] = "You have Successfully filled in the form.";
      header('location: updateprofile.php');
      // code...
    }
    else {
      echo $conn->error;
    }
      
  ?>
