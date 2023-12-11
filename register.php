<?php 

include('config.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Register User</title>
  </head>
  <body>

  	<div class="container">
  	<form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" required="">
    </div>

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required="">
    </div>

     <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Address</label>
    <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp" required="">
    </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required="">
  </div>


  <button type="submit" class="btn btn-primary" name="registerUser">Submit</button>
</form>
</div>


<div class="container text-center">
	<a href="status.php" class="btn btn-warning">Show Live Status</a>
</div>
   
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>


<?php 

if(isset($_POST['registerUser']))
{
	$username = $_POST['username'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$password = $_POST['password'];
	$userLiveStatus = "Offline";

	$usrImage = array('avatar1.png','avatar2.png','avatar3.png','avatar4.png','avatar5.png','avatar6.png','avatar7.png','avatar8.png','avatar9.png','avatar10.png','avatar11.png');
	$useravatar = $base_address."avatar/".$usrImage[array_rand($usrImage,1)];

  $redundancyCheck = mysqli_query($config,"SELECT username,email FROM user_details WHERE email='$email' OR username='$username'");

	if(mysqli_num_rows($redundancyCheck)>0)
	{
    echo "<script>alert('User Already Exist. Registration Failed. Try Login with your Correct Credentials')</script>";
    echo "<script>window.location.href='login.php'</script>";
	}

  else
  {
    mysqli_query($config,"INSERT INTO user_details(username,email,address,password,live_status,user_avatar) VALUES('$username','$email','$address','$password','$userLiveStatus','$useravatar')");

    echo "<script>alert('Thankyou for registring with the Portal. You will be able to see your Dashboard once you logged in')</script>";
     echo "<script>window.location.href='login.php'</script>";
  }

  
	
}

?>


