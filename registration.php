<?php 
require_once 'connection.php';

$response['message'] = "";
$response['error'] = true;

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$username = $_POST['username'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$SQL = "INSERT INTO users(username,email,password) VALUES('$username','$email','$pass')";
	$query = mysqli_query($connection,$SQL);
	if($query)
	{
		$response['message'] = "Registration Successful";
		$response['error'] = false;
	}
	else
	{
		$response['message'] = "Error occurred. Please try again later.";
		$response['error'] = true;
	}
}
else
{
		$response['message'] = "Invalid Request";
		$response['error'] = true;
}

echo json_encode($response);
?>