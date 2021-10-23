<?php require_once 'function.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Intrend Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <!--// Meta tag Keywords -->
    <title>Nanny| Dashboard</title>
</head>

<body>
    <?php require 'navbar.php'; ?>
    <div class="container content" style="width: 100%;padding: 40px">
        <!-- Left side menu -->
        <?php include(ROOT_PATH . '../nanny/menu.php') ?>

        <div class="action">
            <h1 class="page-title">Nanny Profile</h1>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "nanny");
            $idd = $_SESSION['user_nanny']['UserID'];
            $sql3 = "SELECT * FROM nanny_profile WHERE userNo='$idd'";
            $result3 = $conn->query($sql3);

            $id = $_SESSION['user_nanny']['UserID'];
            $name = $_SESSION['user_nanny']['username'];
            ?>



            <?php
            $con = mysqli_connect("localhost", "root", "", "nanny");
            if (isset($_POST['upload'])) {
                $userNo = $_POST['userNo'];
                $file =  addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
                $query = " UPDATE `nanny_profile` SET `image` = '$file' WHERE `userNo` = '$userNo'";
                $res = mysqli_query($con, $query);
                if ($res) {
                    echo '<script> alert("image uploaded")</script>';
                } else {
                    echo '<script> alert("image NOT uploaded")</script>';
                }
            }
            ?>
            <?php
            $user_id = $_SESSION['user_nanny']['UserID'];
            $sel = "SELECT `image` FROM `nanny_profile` WHERE userNo = '$user_id'";
            $que = mysqli_query($con, $sel);
            while ($row = mysqli_fetch_array($que)) {
            ?>
                <tr>

                    <td> <?php echo '<img src ="data:image;base64,' . base64_encode($row['image']) . '" alt="Image" style="width: 20%; height: 20%;" >'; ?></td>
                </tr>
            <?php
            }
            ?>
            <form method="post" action="profile.php">

                <!-- <input type="file"   name="image" value="" placeholder="Upload Your Image"> -->
                <!-- <input type="submit" name="upload" value="UPLOAD" class="btn btn-success my-3"> -->
                <input type="number" name="userNo" style="width: 93%;padding: 12px;" value="<?php echo $id; ?>" placeholder="User ID">
                <input type="text" name="name" placeholder="Full Name" value="<?php echo $name;  ?>">
                <input type="text" name="email" value="" placeholder="Email address">
                <input type="text" name="phone_no" value="" placeholder="Phone Number">
                <select class="gender" name="gender">
                    <option value="" selected disabled>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <input type="Address" name="address" style="width: 93%;padding: 12px;" value="" placeholder="Address">
                <input type="text" name="nationality" value="" placeholder="Nationality">
                <input type="text" name="qualification" value="" placeholder="qualification">
                <input type="date" name="dob" style="width: 93%;padding: 12px;" value="" placeholder="dob">
                <input type="text" name="requirements" value="" placeholder="Your requirements">

                <button type="submit" class="btn" name="create_btn">SUBMIT</button>

            </form>
            <form class="my-5" action="../nanny/nanny.php" method="post" enctype="multipart/form-data">
                <input type="file" name="image" class="form-control">
                <input type="hidden" name="userNo" style="width: 93%;padding: 12px;" value="<?php echo $id; ?>" placeholder="User ID">
                <input type="submit" name="upload" value="UPLOAD" class="btn btn-success my-3">
            </form>

        </div>
    </div>
</body>