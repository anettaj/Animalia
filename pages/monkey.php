<?php
require('../db.conn.php');
if (isset($_SESSION['UNAME']) == false) {
  header('location:../login.php');
  die();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./style/style.css?v=<?php echo time(); ?>">
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../style/bird-gird.css">

</head>
<body class="p-4 m-0 border-0 bd-example">
 
  <?php

  $id=$_SESSION['id'];
  $name=$_SESSION['name'];
  $sql="SELECT * FROM $name where id=$id";
        $result = $con->query($sql) or die($con->error);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()) { 
  ?>
 <!--logo-->
<!-- Image and text -->
<section>
<nav class="navbar navbar-light bg"> 
  <a class="navbar-brand" href="../Index.php">
    <img src="../images/lo.png" width="250" height="40" class="d-inline-block align-top" alt="">
    
  </a> </nav> 
</section>
<!--logo end-->
<!--hamburger menu button-->
<!--<div id="menu">
  <div id="menu-bar" onclick="menuOnClick()">
    <div id="bar1" class="bar"></div>
    <div id="bar2" class="bar"></div>
    <div id="bar3" class="bar"></div>
  </div>
  <nav class="nav" id="nav">
    <ul>
      <li><a href="../Index.html">Home</a></li>
      <li><a href="../pages/contactus.html">Contact</a></li>
      <li><a href="#">Login</a></li>
    </ul>
  </nav> 
</div>
<div class="menu-bg" id="menu-bg"></div>
<script src="../java/script.js"></script>-->
<!--hamburger menu button end-->

<!--icon back-->
<nav aria-label="breadcrumb" style="color: #eee;;" >
  <ol class="breadcrumb" style="color: #DC5F00;">
    <li class="breadcrumb-item"><a href="../Index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="../pages/Animals.php">Animals</a></li>
    <li class="breadcrumb-item active aria-current="page" style= "color: #eee;"><?php echo $row['name']; ?></li>
  </ol>
</nav>

<!--icon back end-->
<!--profile grid-->
<section class="text-eeee-600 body-font overflow-hidden">
    <div class="container px-5 py-24 mx-auto">
      <div class="lg:w-4/5 mx-auto flex flex-wrap">
        <img alt="image" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src='data:image/jpeg;base64,<?php echo base64_encode($row["image"])?>'>
        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
          <h1 class="text-900 text-3xl title-font font-medium mb-2" style="color: #DC5F00"><?php echo $row['name']; ?></h1>
          <p class="leading-relaxed" style="color: #eee"><?php echo $row['content']; ?></p>
          </div>
          <?php
            }
            $con->close();
        }
  ?>       
        </div>
      </div>
    </div>
  </section>
<!--end profile grid-->
</body>
</html>