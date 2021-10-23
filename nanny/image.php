<?php
$con = mysqli_connect("localhost","root","","nanny");


if (isset($_POST['upload'])) {

    $file =  addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $query = "INSERT INTO `upload` (`image`) VALUES ('$file')";
    $res = mysqli_query($con,$query);
if($res){
    echo '<script> alert("image uploaded")</script>';
}else{
    echo '<script> alert("image NOT uploaded")</script>';
}
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Image Upload</title>

        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
       <div class="col-md-12">
           <div class="row">
               <div class="col-md-6">
                   <h3 class="text-center">ULPOAD IMAGE</h3>

                   <form class="my-5" action="../nanny/image.php" method="post" enctype="multipart/form-data">
                       <input type="file" name="image" class="form-control">
                       <input type="submit" name="upload" value="UPLOAD" class="btn btn-success my-3">
                   </form>
               </div>
               <div class="col-md-6">
                   <h3 class="text-center">DISPLAY IMAGE</h3>
                   <?php
                   $sel = "SELECT * FROM `upload`";
                   $que = mysqli_query($con,$sel);

                 
                   
                   while($row = mysqli_fetch_array($que))
                   {
                      ?>
                      <tr>
                          <td> <?php echo $row['id']; ?></td>
                          <td> <?php echo '<img src ="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width: 20%; height: 20%;" >'; ?></td> 
                      </tr>
                      <?php
                   }
                   ?>
               </div>
           </div>
       </div>  
    </div> 
</body>
</html>
