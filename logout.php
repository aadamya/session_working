<?php 

include('config.php');

mysqli_query($config,"UPDATE user_details SET live_status='Offline'");

session_start();
unset($_SESSION['loggedinUser']);
session_destroy();

echo "<script>alert('Active User Successfully Logged Out of the Portal')</script>";

header('location:http://localhost/session/login.php');

?>