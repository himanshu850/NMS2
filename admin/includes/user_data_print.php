<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <link rel="stylesheet" type="text/css" href="../admin/includes/print.css" media="print">
</head>
<body>
    <div class ="container">
        <div class="row">
            <div class="col-md-12">
                <center><h2>User Data</h2><center>
                <table class="table" style="width: 50%;">

        <thead>
            <tr>
                <th>UserID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
</tr>
</thead>
<tbody>
    <?php
    $sn=1;
    $conn = mysqli_connect("localhost", "root", "", "nanny");
    $user_qry="select * from `users`";
    $user_res=mysqli_query($conn,$user_qry);
    while($user_data=mysqli_fetch_assoc($user_res)){
        ?>
        <tr>
            <td><?php echo $sn;?></td>
            <td><?php echo $user_data['username']?></td>
            <td><?php echo $user_data['email']?></td>
            <td><?php echo $user_data['role']?></td>
    </tr>
    <?php
    $sn++;
    }
    ?>
</tbody>
<style>
		 table,th, td { border-collapse: collapse; width: 70%; margin: 20px auto;
 text-align: center; padding: 8px; text-align: left; border: 2px solid black; } 
	     </style>
</table>
<div class="text-center">
    <button onclick ="window.print();" class="btn btn-primary" id="print-btn">Print</a>
</div>
</body>
</html>