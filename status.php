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

    <title>User Live Status</title>
  </head>
  <body>

<div class="container">
  <div class="row">

  	    <div class="col">
    <a href="http://localhost/session/" class="btn btn-warning">Home</a>
    </div>


    <div class="col">
     <button type="button" class="btn btn-primary">
	  Total Registered Users <span class="badge bg-danger">
	  	<?php 

	  		$fetchTotalUsers = mysqli_query($config,"SELECT * FROM user_details");

	  		echo mysqli_num_rows($fetchTotalUsers);

	  	?>
	  </span>
	</button>
    </div>

    <div class="col">
    <button type="button" class="btn btn-success">
	  Live Users <span class="badge bg-warning">
	  	
	  	<?php 

	  		$fetchLiveUsers = mysqli_query($config,"SELECT * FROM user_details WHERE live_status='Online'");

	  		echo mysqli_num_rows($fetchLiveUsers);

	  	?>

	  </span>
	</button>
    </div>

    <div class="col">
    <button type="button" class="btn btn-danger">
	  Offline Users <span class="badge bg-info">
	  	
	  	<?php 

	  		$fetchOfflineUsers = mysqli_query($config,"SELECT * FROM user_details WHERE live_status='Offline'");

	  		echo mysqli_num_rows($fetchOfflineUsers);

	  	?>

	  </span>
	</button>
    </div>

     <div class="col">
    <a href="login.php" class="btn btn-secondary" target="_blank">User login</a>
    </div>

 
    

  </div>
</div>
    
    <div class="container" style="margin-top:45px;">
    
 <div class="row row-cols-1 row-cols-md-4 g-4">
    	<?php 

    		$fetchLiveStatus = mysqli_query($config,"SELECT * FROM user_details WHERE live_status = 'Online'");

    		while($row = mysqli_fetch_assoc($fetchLiveStatus))
    		{
    			
    			
    			echo '<div class="col">';
    			echo '<div class="card h-100">';
    			echo '<img src='.$row['user_avatar'].' class="card-img-top" alt="...">';
    			echo '<div class="card-body">';
    			echo '<h5 class="card-title">'.$row['username'].'</h5>';
    			echo '<p class="card-text">'.$row['live_status'].'</p>';
    			echo '</div>';
    			echo '</div>';
    			echo '</div>';
    			

    		}


    	?>  

    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>