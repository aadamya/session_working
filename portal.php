<?php 

include('config.php');
session_start();

if(!isset($_SESSION['loggedinUser']))
{
	session_start();
	unset($_SESSION['loggedinUser']);
	session_destroy();
	header('location:http://localhost/session/login.php');
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Portal</title>
  </head>
  <body>
    
    <div class="container" style="margin-top:45px;">
    	<div class="alert alert-success" role="alert">Welcome , <?php echo $_SESSION['loggedinUser']; ?> &nbsp;. Your Profile at a glance shown below.</div>

    	<?php 

    		$fetchLoggedinUser = mysqli_query($config,"SELECT * FROM user_details WHERE username='{$_SESSION['loggedinUser']}'");
    		while($row = mysqli_fetch_assoc($fetchLoggedinUser))
    		{
    			$loggedinUsername = $row['username'];
    			$loggedinAddress = $row['address'];
    			$loggedinEmail = $row['	email'];
    			$loggedinLiveStatus = $row['live_status'];
    			$loggedinAvatar = $row['user_avatar'];
    			$loggedinTime = $row['signupDate'];

    		}


    	?>


<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-12">
      <img src="<?php echo $loggedinAvatar; ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Welcome, <?php echo  $loggedinUsername;?></h5>
        <p class="card-text">Hi, <?php echo  $loggedinUsername;?> you have now successfully logged in to the Profile Portal. Now your can access your Profile through the Portal</p>
        <p class="card-text"><small class="text-muted">Profile created on <?php echo $loggedinTime; ?></small></p>
      </div>
    </div>
  </div>
</div>

    	<div class="row">
    		<div class="col">
    			<a href="logout.php" class="btn btn-danger">Logout</a>
    		</div>
    	</div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>