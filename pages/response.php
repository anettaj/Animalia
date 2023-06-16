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
<link rel="stylesheet" href="../style/style.css">
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../style/style.css">
<script src="../java/script.js"></script>
</head>
<body>
<!--logo-->
<!-- Image and text -->
<nav class="navbar navbar-light ">
  <a class="navbar-brand" href="../Index.php">
    <img src="../images/lo.png" width="280" height="50" class="d-inline-block align-top" alt="">
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
      <li><a href="./contactus.php">Contact</a></li>
      <li><a href="#">Login</a></li>
    </ul>
  </nav> 
</div>
<div class="menu-bg" id="menu-bg"></div>
<script src="./java/script.js"></script>
<!--hamburger menu button end-->
<!-- response -->
<br>
<div style="margin-left:200px;margin-right:200px">
<table class="table table-dark m-6" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col" style="width: 30%">Name</th>
      <th scope="col" style="width: 30%">Email</th>
      <th scope="col" style="width: 30%">Comments</th>
    </tr>
  </thead>
  <tbody>

  <?php 
                        $sql="SELECT * FROM comments";
                        $result = $con -> query($sql) or die($con -> error);
                        if($result -> num_rows > 0){
                            while($rows = $result -> fetch_assoc()){
                                ?>
                                  <tr>
                                     <th scope="row"> <?php echo $rows['id']; ?></th>
                                       <td> <?php echo $rows['name']; ?></td>
                                        <td> <?php echo $rows['email']; ?></td>
                                        <td> <?php echo $rows['message']; ?></td>
                                        </tr>
  
                        <?php    }
                        $con->close();
                        }
                    ?>



     
  </tbody>
</table>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var toastEl = document.querySelector('.toast');
        var toast = new bootstrap.Toast(toastEl);
        toast.show();
    </script>
<!-- response end -->
</body>
</html>