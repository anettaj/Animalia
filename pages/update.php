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
    <link rel="stylesheet" href="../style/search-bar-pages.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../java/script.js"></script>
    <link rel="stylesheet" href="../style/style.css">
  
</head>
<body>
<!-- Image and text -->
<nav class="navbar navbar-light ">
    <a class="navbar-brand" href="../Index.php">
      <img src="../images/lo.png" width="280" height="100" class="d-inline-block align-top" alt="">
      
    </a>
  </nav>
  <!--logo end-->
  <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
    <fieldset class="input-box">
      <i class="uil uil-search"></i>
        <input type="text" name="input" placeholder="Search here..." />
        <button type="submit" name="search" class="button">Search</button>
    </fieldset>
  </form>
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
    <form method="post" enctype="multipart/form-data">

    <div class="content-md-lg py-3">
       
        
        <div class="container-lg">
            <div class="row py-3">
                <div class="col-lg-4 col-md-5 col-sm-10 col-12 mx-auto">
                    <div class="card bg-dark rounded-0 border-dark-subtle">
                        <div class="card-body rounded-0">
                            <!-- Avatar File Input Wrapper  -->
                                <div id="AvatarFileUpload">
                                    <!-- Image Preview Wrapper -->
                                    <div class="selected-image-holder">
                              <?php
                              //$_SESSION['old']='';
                              //$_SESSION['content']='';
                                    if(isset($_POST['search']) && isset($_POST['input'])){
                                        $input = $_POST['input'];
                                        $sql="SELECT * FROM Animal where name='$input' UNION SELECT * FROM Bird where name='$input' UNION SELECT * FROM Insect where name='$input' ";
                                        $result = $con->query($sql) or die($con->error);
                                        $res = $result -> num_rows;
                                      }
                                        else{
                                          $res = 0 ;
                                        }
                                        if ( $res > 0 ){
                                            $row = $result -> fetch_assoc();
                                            $_SESSION['old']=$row['name'];
                                            $_SESSION['content']=$row['content'];
                                            echo "<img src='data:image/jpeg;base64,".base64_encode($row["image"])."' alt='AvatarInput'>";
                                        ?>
                                    </div>
                                    <!-- Image Preview Wrapper -->
                                    <!-- Browse Image to Upload Wrapper -->
                                    <div class="avatar-selector">
                                        <a href="#" class="avatar-selector-btn">
                                            <img src="../images/camera.svg" alt="cam">
                                        </a>
                                        <input type="file"  accept="image/*"    name="image" >
                                    </div>
                                        <!-- Browse Image to Upload Wrapper -->
                                </div>
                                <!-- Avatar File Input Wrapper  -->
                            </div>
                
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label" style="color: #eee;">Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="<?php echo $_SESSION['old'];?>">
                              </div>
                              <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label" style="color: #eee;" >Details</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3" value="<?php echo $_SESSION['content']; ?>"><?php echo $_SESSION['content']; ?></textarea>
                              </div>
                              <button type="submit" name="button" class="btn btn-outline" style="color: #eee; background:#DC5F00;" ><b>Submit</b></button>
                              <?php } else{ ?>
                                        <img src="../images/default-avatar.png" alt="AvatarInput">
                                    </div>
                                    <!-- Image Preview Wrapper -->
                                    <!-- Browse Image to Upload Wrapper -->
                                    <div class="avatar-selector">
                                        <a href="#" class="avatar-selector-btn">
                                            <img src="../images/camera.svg" alt="cam">
                                        </a>
                                        <!-- <input type="file" name="image" accept="image/*" > -->
                                    </div>
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
                <?php }?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../java/upload.js"></script>
    </form>
<!-- end image -->
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if the image file is uploaded without any errors
  $old=$_SESSION['old'];
  $content = $_SESSION['content'];
  if (isset($_POST['name']) && isset($_POST['content'])){
    $name = $_POST['name'];
    $content = mysqli_real_escape_string($con,$_POST['content']);
    $query="SELECT TABLE_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME = 'image'";
    $result = $con->query($query) or die($con->error);
      while($rows=$result->fetch_assoc()){
        $t_name=$rows['TABLE_NAME'];
        
        $new="SELECT * from $t_name where name='$old'";
        $res = $con->query($new) or die($con->error);
        
        if($res->num_rows > 0){

          echo "#".$t_name;
          $sql="UPDATE $t_name SET name='$name',content='$content' where name='$old'";
          if ($con->query($sql) or die($con->error))
            break;
      }
    }
  }

  if (isset($_FILES["image"])  && $_FILES["image"]["error"] == UPLOAD_ERR_OK ) {
    $tmpName = $_FILES["image"]["tmp_name"];
    $imageData = file_get_contents($tmpName);

    // Prepare and execute the SQL statement
    $name=$_POST['name'];
    $query="SELECT TABLE_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME = 'image' ";
    $result = $con->query($query) or die($con->error);
      while($rows=$result->fetch_assoc()){
        $t_name=$rows['TABLE_NAME'];
        $new="SELECT * from $t_name where name='$name'";
        $res = $con->query($new) or die($con->error);
        if($res->num_rows > 0){
          $sql = "UPDATE $t_name SET image = ? WHERE name = ? OR name = ?";
          $stmt = $con->prepare($sql);
          $stmt->bind_param("sss", $imageData,$name,$old);
          if ($stmt->execute()) {
            echo "<h1 style='color: #eee; text-align: center;'> Updated successfully. </h1>";
            $con->close();
          break;
          }
        }
    }
  }
}
?>
</body>
</html>