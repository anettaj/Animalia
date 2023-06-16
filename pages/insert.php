<?php
require('../db.conn.php');
if (isset($_SESSION['UNAME'])==false) {
  header('location:../login.php');
  die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animalia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/upload.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../java/script.js"></script>
    <link rel="stylesheet" href="../style/style.css">
  
</head>
<body>
<!-- Image and text -->
<nav class="navbar navbar-light ">
    <a class="navbar-brand" href="../Index.php">
      <img src="../images/lo.png" width="200" height="80" class="d-inline-block align-top" alt="">
      
    </a>
  </nav>
  <!--logo end-->

<!--hamburger menu button-->
<div id="menu">
    <div id="menu-bar" onclick="menuOnClick()">
      <div id="bar1" class="bar"></div>
      <div id="bar2" class="bar"></div>
      <div id="bar3" class="bar"></div>
    </div>
    <nav class="nav" id="nav">
      <ul>
        <li><a href="../Index.php">Home</a></li>
        <li><a href="./adminh.php">Admin</a></li>
        <li style='color:#eee;'><a><?php echo $_SESSION['UNAME']; ?><a></li>
        <li><a id="logoutBtn"  href="../logout.php">Logout</a></li>
      </ul>
    </nav> 
  </div>
  <div class="menu-bg" id="menu-bg"></div>
  
  <!--hamburger menu button end-->

    <!-- images -->
    <form method="POST" enctype="multipart/form-data">

    <div class="content-md-lg py-3">
       

        
        <div class="container-xlg">
            <div class="row py-1">
                <div class="col-lg-4 col-md-5 col-sm-10 col-12 mx-auto">
                    <div class="card bg-dark rounded-0 border-dark-subtle">
                        <div class="card-body rounded-0">
                            <!-- Avatar File Input Wrapper  -->
                                <div id="AvatarFileUpload">
                                    <!-- Image Preview Wrapper -->
                                    <div class="selected-image-holder">
                                        <img src="../images/default-avatar.png" alt="AvatarInput">
                                    </div>
                                    <!-- Image Preview Wrapper -->
                                    <!-- Browse Image to Upload Wrapper -->
                                    <div class="avatar-selector">
                                        <a href="#" class="avatar-selector-btn">
                                            <img src="../images/camera.svg" alt="cam">
                                        </a>
                                        <input type="file" name="image" accept="image/*">
                                    <!-- </div> -->
                                    <!-- Browse Image to Upload Wrapper -->
                                </div>
                            <!-- Avatar File Input Wrapper  -->
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label" style="color: #eee;">Name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Name">
                          </div>
                          <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label" style="color: #eee;" >Details</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"></textarea>
                          </div>
                          <lable style="color:white;font-weight: bold;">Type</lable>
                          <div style="margin-top:10px"><center>
                           <button type="submit" name="button" value="Animal" class="btn btn-danger" style="margin-left:10px ;padding:20px;padding-left:30px;padding-right:30px;" ><b>Animal</b></button>
                           <button type="submit" name="button" value="Bird" class="btn btn-danger"  style="margin-left:10px; padding:20px;padding-left:30px; padding-right:30px;" ><b>Birds</b></button>
                           <button type="submit" name="button" value="Insect" class="btn btn-danger"  style="margin-left:10px; padding:20px;padding-left:30px;padding-right:30px;"><b>Insects</b></button>
                           </center>
                           </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../java/upload.js?v=<?php echo time() ?>"></script>
    </form>
<!-- end image -->

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if the image file is uploaded without any errors
  if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
    $tmpName = $_FILES["image"]["tmp_name"];
    //$imageName = $_FILES["image"]["name"];
    $imageName = $_POST['name'];
    $imageContent = $_POST["content"];
    $table = $_POST["button"];
    // Open and read the image file
    $imageData = file_get_contents($tmpName);

    // Prepare and execute the SQL statement
    $stmt = $con->prepare("INSERT INTO $table (name, image, content) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $imageName, $imageData, $imageContent);
    $stmt->execute();

    // Close the database connection
    $con->close();

    echo "<h1 style='color: #eee; text-align: center;'> Image uploaded successfully. </h1>";
  } else {
    echo "<h1 style='color: #eee; text-align: center;'> Error uploading image. </h1>";
  }
}
?>
</body>
</html>