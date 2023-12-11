<?php 

$hostname = 'localhost';
$username = 'root';
$password = 'Admin1234#@';
$dbname = 'crud_app';

$base_address = "http://localhost/session/";

$config = mysqli_connect($hostname,$username,$password,$dbname);

if($config)
{
	echo "Database Connection Successful";
}
else
{
	echo "Database Connection Failed with error: " . mysqli_connect_error();
}

?>

