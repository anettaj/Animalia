<?php
require('db.conn.php');
if (isset($_SESSION['UNAME'])==true) {
    header('location:./index.php');
    die();
  }
//$_SESSION['logged_in'] = 0;
$msg="";
if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['conpass'])) {
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $username=mysqli_real_escape_string($con,$_POST['username']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $conpass=mysqli_real_escape_string($con,$_POST['conpass']);
$sql="SELECT `username` FROM `login` WHERE `username`='$username'";
$result = $con->query($sql) or die($con->error);
    $role=0;
    if(($email=="" || $username=="" || $password=="" || $conpass=="")==true){
        echo '<script type="text/javascript">
                msg="Please re-enter all the necessary details !!";
                alert(msg);
                </script>';
    }
    elseif($result->num_rows > 0){
        echo '<script type="text/javascript">
                msg="The username already exist ...";
                alert(msg);
                </script>';
    }
    elseif(($conpass !== $password)==true){
        echo '<script type="text/javascript">
                msg="Incorret Password !!.(Enter same values to confirm.)";
                alert(msg);
                </script>';
        }
    else{
        $res=mysqli_query($con,
        "INSERT INTO `login`(`email`, `username`, `password`,`Role`) VALUES ('$email','$username','$password','$role')");
            header('location:login.php');
        die();
    }
}
elseif(isset($_POST['username']) && isset($_POST['password'])){
 $username=mysqli_real_escape_string($con,$_POST['username']);
 $password=mysqli_real_escape_string($con,$_POST['password']);
    $res=mysqli_query($con,"SELECT * FROM `login` WHERE username='$username' and password='$password';");
    $count=mysqli_num_rows($res);
        if($username=="" || $password=""){
        echo '<script type="text/javascript">
                function myFunc1() {
                msg="Please enter details to login !!";
                alert(msg);
                }
                myFunc1()
                </script>';
        }elseif($count>0){
            $row=mysqli_fetch_assoc($res);
            $_SESSION['ROLE']=$row['Role'];
            $_SESSION['UNAME']=$row['username'];
            $_SESSION['PASS']=$row['password'];
            $_SESSION['name'];
            $_SESSION['logged_in']=1;
            if($_SESSION['ROLE']==1){
                print_r($_SESSION['ROLE']);
                header('location:./pages/adminh.php');
            }else{
                header('location:Index.php');
            }
            die();      
        }else{
        echo '<script type="text/javascript">
                function myFunc1() {
                msg="Please re-enter the correct login details !!";
                alert(msg);
                }
                myFunc1()
                </script>';

        }
        $con->close();
    }
?>
<html>

<head>
    <title>Login-Animalia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="KOGO Title Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./style/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="loginstyles.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>

<body>
<!--logo-->
<!-- Image and text -->
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="./Index.php">
    <img src="./images/lo.png" width="280" height="100" class="d-inline-block align-top" alt="">
    
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
      <li><a href="./pages/contactus.php">Contact</a></li>
    </ul>
  </nav> 
</div>
<div class="menu-bg" id="menu-bg"></div>

<!--hamburger menu button end-->
<script src="./java/script.js"></script>

    <div class="login-page">
        <div class="form">
            <form class="register-form" method="post" name="reg-form" id="reg_form">
                <p style="font-size: 32px;" class=loginheading>Register</p>
                <p id=subheadinglogin>Enter email:</p>
                <input type="text" id="email" name="email" placeholder="Email" />
                <p id=subheadinglogin>Username:</p>
                <input type="text" name="username" id="username" placeholder="Enter your username" />
                <p id=subheadinglogin>Enter password:</p>
                <input type="password" id="password" name="password" placeholder="Password" />
                <p id=subheadinglogin>Confirm password:</p>
                <input type="password" id="conpass" name="conpass" placeholder="Confirm Password" />
                <button type="submit" name="btn1" id="btn1">Create</button>
                <p class="message">Already Registered? <a href="#">Login</a></p>
            </form>

            <form class="login-form" method="post" name="log-form" id="log_form">
                <center>
                    <p class=loginheading>Login</p>
                </center>
                <p id=subheadinglogin>Username:</p>
                <input type="text" name="username" id="username" placeholder="Enter your username" />
                <p id=subheadinglogin>Password:</p>
                <input type="password" name="password" id="password" placeholder="Enter your password" />
                <button type="submit" name="btn2" id="btn2">LOGIN</button>
                <p class="message">Not Registered? <a href="#">Register</a></p>
            </form>
        </div>
    </div>
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'>
    </script>
    <script>
        $('.message a').click(function () {
            $('form').animate({
                height: "toggle",
                opacity: "toggle"
            },
                "slow");
        }
        )
    </script>
</body>
</head>

</html>