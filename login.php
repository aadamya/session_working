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

    <title>User Login</title>
  </head>
  <body>

  	<div class="container" style="margin-top:45px;">
  		
		<form method="POST"> 

		<div class="mb-3">
		<label for="username" class="form-label">Username</label>
		<input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
		</div>

		<div class="mb-3">
		<label for="userpassword" class="form-label">Password</label>
		<input type="password" class="form-control" id="userpassword" name="password">
		</div>

		<button type="submit" class="btn btn-primary" name="loginBtn">Submit</button>
		</form>

  	</div>

  	<div class="container text-center">
  		<a href="http://localhost/session/" class="btn btn-info">Back to Home</a>
  	</div>
    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

<?php 

if(isset($_POST['loginBtn']))
{
	$username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
	$password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);

	$stmt = $config->prepare("SELECT username,password FROM user_details WHERE username=? AND password = ?");
	$stmt->bind_param("ss",$username,$password);
	$stmt->execute();
	$result = $stmt->get_result();

	if(mysqli_num_rows($result)>0)
	{
		session_start();
		$_SESSION['loggedinUser'] = $username;
		echo "<script>window.location.href='portal.php'</script>";

		mysqli_query($config,"UPDATE user_details SET live_status='Online' WHERE username='{$_SESSION['loggedinUser']}'");
	}
	else
	{
		echo "<script>alert('Invalid Credentials Provided. Please provide correct Details to access the Portal')</script>";
		echo "<script>window.location.href='login.php'</script>";
	}


}

?>