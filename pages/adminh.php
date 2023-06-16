<?php
require('../db.conn.php');
if (isset($_SESSION['UNAME']) == false) {
  header('location:../login.php');
  die();
}?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Encyclopdia Admin Dashboard</title>
  <link rel="stylesheet" href="../style/admin.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../style/style.css?v=<?php echo time(); ?>">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="../java/script.js"></script>
</head>

<body>
<!--logo-->
<!-- Image and text -->
<nav class="navbar navbar-light bg-light">
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
        <li><a href="./adminh.php">Home</a></li>
        <li style='color:#eee;'><a><?php echo $_SESSION['UNAME']; ?><a></li>
        <li><a id="logoutBtn"  href="../logout.php">Logout</a></li>

      </ul>
    </nav> 
  </div>
  <div class="menu-bg" id="menu-bg"></div>
  <script src="./java/script.js"></script>
  <!--hamburger menu button end-->
  <br>
<font style="color: #eee; font: 2em sans-serif;"><i>Hello Admin</i></font>
<!-- partial:index.partial.html -->
<div id="app">
  
  <div class="wrapper">
    <div class="card" v-for="post in filteredList">
      <a v-bind:href="post.link" target="_blank">
        <img v-bind:src="post.img"/>
        
        {{ post.title }}
      </a>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.9/vue.min.js'></script><script  src="../java/admin.js?v=<?php echo time(); ?>"></script>

</body>
</html>
