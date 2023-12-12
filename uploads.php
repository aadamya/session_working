<?php 

include('config.php')

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    
    <div class="container" style="margin-top:45px">
      
      <form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label class="form-label">Picture Title</label>
    <input type="text" class="form-control" id="picture_title" name="picture_title" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label class="form-label">Upload your Pic</label>
    <input type="file" class="form-control" id="file" name="userpic">
  </div>

  
  <button type="submit" class="btn btn-primary" name="uploadPic">Submit</button>
</form>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>

<?php 

$picTitle = $_POST['picture_title'];

// Script for file handling starts here
$targetFolder = 'uploads/';
$orgFileName = $_FILES['userpic']['name']; //~Desktop/Pictures/abc.png
$tempFileName = $_FILES['userpic']['tmp_name']; //serverlocation/abc.png

$fullImageAddress = $base_address.$targetFolder.$orgFileName;

if(isset($_POST['uploadPic']))
{
  $checkImageUpload = mysqli_query($config,"INSERT INTO file_uploads(pic_title,file_location) VALUES('$picTitle','$fullImageAddress')");

  if($checkImageUpload)
  {
    move_uploaded_file($tempFileName,$targetFolder.$orgFileName);
    echo "<script>alert('Pic Uploaded Successfully')</script>";

  }
  else
  {
    echo "<script>alert('Nothing Uploaded')</script>";
  }
}

?>