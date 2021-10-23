<?php
$conn = mysqli_connect("localhost", "root", "", "nanny");


if (isset($_GET['unbook_parent'])) {

    $nanny_id = $_GET['unbook_parent'];
    $update = "UPDATE `booking` SET `Status`= 'free' WHERE  `nanny_id` = '$nanny_id' and `Status`='booked'";
    $query = mysqli_query($conn, $update);
    if ($query) {
        echo "<script>
            alert('parent has been UNBOOKED')
            window.location.href='viewbookings.php';
            </script>";
    } else {
        echo "<script>alert('Unknown error has occured')</script>";
    }
    $update_for_nanny = "UPDATE `nanny_profile` set `Status`='free' where `userNo`='$nanny_id'";
    $query_for_nanny = mysqli_query($conn, $update_for_nanny);
}
