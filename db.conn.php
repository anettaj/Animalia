<?php
session_start();
$con=mysqli_connect('sql112.byethost10.com','b10_34325387','Siji1999','b10_34325387_encyclopedia');
//$db=mysqli_select_db($con,"sms");
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>